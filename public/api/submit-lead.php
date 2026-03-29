<?php
/**
 * API for Form Lead Submission - Traffio Odonto (PHP Version)
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Configuration (Loaded from existing credentials)
$config = [
    'telegram_token' => '8732456855:AAFyRzsBF0Gtw7EHz19VpBO2JGjEessiocU',
    'telegram_chat_id' => '1045895672',
    'email_to' => 'fabricio@traffio.com.br',
    'email_from' => 'fabricio@traffio.com.br',
];

// Get JSON Input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    echo json_encode(['success' => false, 'error' => 'Nenhum dado recebido.']);
    exit;
}

$name = $data['name'] ?? '';
$email = $data['email'] ?? '';
$clinic = $data['clinic'] ?? '';
$whatsapp = $data['whatsapp'] ?? '';
$budget = $data['budget'] ?? '';

if (!$name || !$email || !$clinic || !$whatsapp || !$budget) {
    echo json_encode(['success' => false, 'error' => 'Todos os campos são obrigatórios.']);
    exit;
}

// 1. Prepare Message
$messageText = "🌟 Novo Lead - Traffio Odonto 🌟\n\n" .
               "👤 Nome: $name\n" .
               "📧 E-mail: $email\n" .
               "🏥 Clínica: $clinic\n" .
               "📱 WhatsApp: $whatsapp\n" .
               "💰 Orçamento Mensal: $budget";

$messageHtml = "
<h2>🌟 Novo Lead - Traffio Odonto 🌟</h2>
<p><strong>👤 Nome:</strong> $name</p>
<p><strong>📧 E-mail:</strong> $email</p>
<p><strong>🏥 Clínica:</strong> $clinic</p>
<p><strong>📱 WhatsApp:</strong> $whatsapp</p>
<p><strong>💰 Orçamento Mensal:</strong> $budget</p>
";

$telegramSuccess = false;
$emailSuccess = false;

// 2. Send to Telegram
if ($config['telegram_token'] && $config['telegram_chat_id']) {
    $tgUrl = "https://api.telegram.org/bot" . $config['telegram_token'] . "/sendMessage";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tgUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'chat_id' => $config['telegram_chat_id'],
        'text' => $messageText,
        'parse_mode' => 'HTML'
    ]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $tgResponse = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode === 200) {
        $telegramSuccess = true;
    }
}

// 3. Send Email (using native mail function - standard for Shared Hosting)
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Traffio Odonto <" . $config['email_from'] . ">" . "\r\n";
$headers .= "Reply-To: $email" . "\r\n";

$emailSubject = "Novo Lead: $name - $clinic";

if (mail($config['email_to'], $emailSubject, $messageHtml, $headers)) {
    $emailSuccess = true;
}

// Return result
echo json_encode([
    'success' => true,
    'telegramSuccess' => $telegramSuccess,
    'emailSuccess' => $emailSuccess
]);
