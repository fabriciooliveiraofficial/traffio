<?php
/**
 * API for Form Lead Submission - Traffio Odonto (Simplified for Hostinger)
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// 🔐 CREDENCIAIS 
$config = [
    'telegram_token' => '8732456855:AAFyRzsBF0Gtw7EHz19VpBO2JGjEessiocU',
    'telegram_chat_id' => '1045895672',
    'email_to' => 'fabricio@traffio.com.br',
    'email_from' => 'fabricio@traffio.com.br',
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
// 1. ENVIO TELEGRAM
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
curl_setopt($ch, CURLOPT_POSTFIELDS, ['chat_id' => $config['telegram_chat_id'], 'text' => $tgMessage]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$tgResult = curl_exec($ch);
$tgStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
$telegramOk = ($tgStatus === 200);

// ---------------------------------------------------------
// 2. ENVIO E-MAIL
// ---------------------------------------------------------
$subject = "Novo Lead: $name - Traffio Odonto";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Traffio Odonto <" . $config['email_from'] . ">" . "\r\n";

$body = "<h2>🚀 Novo Lead: $name</h2><p>Clínica: $clinic</p><p>E-mail: $email</p><p>WhatsApp: $whatsapp</p><p>Orçamento: $budget</p>";

$mailSent = @mail($config['email_to'], $subject, $body, $headers);

echo json_encode([
    'success' => true,
    'telegram' => $telegramOk ? 'Sent' : 'Failed',
    'email' => $mailSent ? 'Sent' : 'Failed'
]);
