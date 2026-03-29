import express from 'express';
import { createServer as createViteServer } from 'vite';
import nodemailer from 'nodemailer';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

async function startServer() {
  const app = express();
  const PORT = process.env.PORT || 3000;

  app.use(express.json());

  app.post('/api/submit-lead', async (req, res) => {
    const { name, email, clinic, whatsapp, budget } = req.body;

    if (!name || !email || !clinic || !whatsapp || !budget) {
      return res.status(400).json({ error: 'Todos os campos são obrigatórios.' });
    }

    const messageText = `
🌟 Novo Lead - Traffio Odonto 🌟

👤 Nome: ${name}
📧 E-mail: ${email}
🏥 Clínica: ${clinic}
📱 WhatsApp: ${whatsapp}
💰 Orçamento Mensal: ${budget}
`.trim();

    const messageHtml = `
      <h2>🌟 Novo Lead - Traffio Odonto 🌟</h2>
      <p><strong>👤 Nome:</strong> ${name}</p>
      <p><strong>📧 E-mail:</strong> ${email}</p>
      <p><strong>🏥 Clínica:</strong> ${clinic}</p>
      <p><strong>📱 WhatsApp:</strong> ${whatsapp}</p>
      <p><strong>💰 Orçamento Mensal:</strong> ${budget}</p>
    `;

    let telegramSuccess = false;
    let emailSuccess = false;

    // 1. Envio para Telegram
    const tgToken = process.env.TELEGRAM_BOT_TOKEN;
    const tgChatId = process.env.TELEGRAM_CHAT_ID;
    
    if (tgToken && tgChatId) {
      try {
        const tgUrl = `https://api.telegram.org/bot${tgToken}/sendMessage`;
        const tgResponse = await fetch(tgUrl, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            chat_id: tgChatId,
            text: messageText,
          })
        });
        
        if (tgResponse.ok) {
          telegramSuccess = true;
        } else {
          console.error('Erro ao enviar para Telegram:', await tgResponse.text());
        }
      } catch (e) {
        console.error('Erro de conexão com Telegram:', e);
      }
    } else {
      console.log('Credenciais do Telegram não configuradas.');
    }

    // 2. Envio para E-mail
    const smtpHost = process.env.SMTP_HOST;
    const smtpPort = process.env.SMTP_PORT;
    const smtpUser = process.env.SMTP_USER;
    const smtpPass = process.env.SMTP_PASS;
    const emailTo = process.env.EMAIL_TO;

    if (smtpHost && smtpUser && smtpPass && emailTo) {
      try {
        const transporter = nodemailer.createTransport({
          host: smtpHost,
          port: Number(smtpPort) || 587,
          secure: Number(smtpPort) === 465,
          auth: {
            user: smtpUser,
            pass: smtpPass,
          },
        });

        await transporter.sendMail({
          from: `"Traffio Odonto" <${smtpUser}>`,
          replyTo: email,
          to: emailTo,
          subject: `Novo Lead: ${name} - ${clinic}`,
          text: messageText,
          html: messageHtml,
        });
        emailSuccess = true;
      } catch (e) {
        console.error('Erro ao enviar E-mail:', e);
      }
    } else {
      console.log('Credenciais de E-mail não configuradas.');
    }

    res.json({ success: true, telegramSuccess, emailSuccess });
  });

  // Vite middleware for development
  if (process.env.NODE_ENV !== 'production') {
    const vite = await createViteServer({
      server: { middlewareMode: true },
      appType: 'spa',
    });
    app.use(vite.middlewares);
  } else {
    // Use STATIC_DIR env var if provided, otherwise default to process.cwd()/dist
    const staticDir = process.env.STATIC_DIR || path.join(process.cwd(), 'dist');
    console.log(`Serving static files from: ${staticDir}`);
    
    app.use(express.static(staticDir));
    app.get('*all', (req, res) => {
      res.sendFile(path.join(staticDir, 'index.html'));
    });
  }

  app.listen(PORT, () => {
    console.log(`Server environment: ${process.env.NODE_ENV || 'development'}`);
    console.log(`Server running on port ${PORT}`);
  });
}

startServer().catch(err => {
  console.error('Fatal error during startup:', err);
  process.exit(1);
});
