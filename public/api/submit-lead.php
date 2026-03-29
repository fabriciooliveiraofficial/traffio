<?php
/**
 * API for Form Lead Submission - Traffio Odonto (Hostinger Final Fix)
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// 🔐 CREDENCIAIS EMBUTIDAS (Extraídas do seu .env)
$config = [
    'telegram_token' => '8732456855:AAFyRzsBF0Gtw7EHz19VpBO2JGjEessiocU',
    'telegram_chat_id' => '1045895672',
    'email_to' => 'fabricio@traffio.com.br',
    'email_from' => 'fabricio@traffio.com.br', // Deve ser um e-mail criado na Hostinger
];

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    die(json_encode(['success' => false, 'error' => 'No data received']));
}

$name = $data['name'] ?? 'Não informado';
$email = $data['email'] ?? 'Não informado';
$clinic = $data['clinic'] ?? 'Não informado';
$whatsapp = $data['whatsapp'] ?? 'Não informado';
$budget = $data['budget'] ?? 'Não informado';

// ---------------------------------------------------------
// 1. ENVIO TELEGRAM (Método 1: cURL)
// ---------------------------------------------------------
$tgMessage = "🌟 NOVO LEAD: $name\n" .
             "🏥 Clínica: $clinic\n" .
             "📧 E-mail: $email\n" .
             "📱 WhatsApp: $whatsapp\n" .
             "💰 Orçamento: $budget";

$tgUrl = "https://api.telegram.org/bot" . $config['telegram_token'] . "/sendMessage";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $tgUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'chat_id' => $config['telegram_chat_id'],
    'text' => $tgMessage
]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$tgResult = curl_exec($ch);
$tgStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// ---------------------------------------------------------
// 2. ENVIO E-MAIL (Método nativo Hostinger)
// ---------------------------------------------------------
$subject = "Novo Lead: $name - Traffio Odonto";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Traffio Odonto <" . $config['email_from'] . ">" . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "X-Priority: 1 (Highest)\n";

$body = "
<div style='font-family: sans-serif; padding: 20px; color: #333;'>
    <h1 style='color: #0d6efd;'>🚀 Novo Lead Recebido!</h1>
    <hr>
    <p><strong>Nome:</strong> $name</p>
    <p><strong>Clínica:</strong> $clinic</p>
    <p><strong>E-mail:</strong> $email</p>
    <p><strong>WhatsApp:</strong> $whatsapp</p>
    <p><strong>Orçamento:</strong> $budget</p>
    <hr>
    <p style='font-size: 12px; color: #777;'>Enviado via sistema Traffio Odonto.</p>
</div>
";

$mailSent = mail($config['email_to'], $subject, $body, $headers);

// ---------------------------------------------------------
// RETORNO FINAL
// ---------------------------------------------------------
echo json_encode([
    'success' => ($tgStatus === 200 || $mailSent),
    'details' => [
        'telegram_ok' => ($tgStatus === 200),
        'telegram_response' => json_decode($tgResult),
        'email_ok' => $mailSent
    ]
]);
