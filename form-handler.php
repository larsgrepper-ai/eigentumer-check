<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
if (!$data) {
    $data = $_POST;
}
if (!is_array($data)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid payload']);
    exit;
}
$name = trim($data['name'] ?? ($data['caseType'] ?? 'Unbekannt'));
$email = isset($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? $data['email'] : 'kontakt@eigentumer-check.ch';
$type = $data['type'] ?? 'lead';
$focus = $data['fokus'] ?? ($data['caseType'] ?? 'Allgemein');
$subject = '[Lead] ' . strtoupper($type) . ' – ' . $focus;
$body = "Neue Anfrage über eigentümer-check.ch\n\n";
$body .= 'Timestamp: ' . date('c') . "\n";
$body .= 'Typ: ' . $type . "\n";
$body .= 'Fokus: ' . $focus . "\n";
$body .= 'Name: ' . $name . "\n";
$body .= 'E-Mail: ' . $email . "\n";
$body .= 'Telefon: ' . ($data['tel'] ?? '-') . "\n";
$body .= 'Timeline: ' . ($data['timeline'] ?? '-') . "\n";
$body .= 'Nachricht: ' . ($data['message'] ?? '-') . "\n\n";
$body .= 'Payload:\n' . print_r($data, true);
$headers = [];
$headers[] = 'From: Eigentuemer-Check <noreply@eigentumer-check.ch>';
$headers[] = 'Reply-To: ' . $email;
$headers[] = 'Content-Type: text/plain; charset=UTF-8';
$mailResult = mail('kontakt@eigentumer-check.ch', $subject, $body, implode("\r\n", $headers));
if ($mailResult) {
    echo json_encode(['status' => 'ok']);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Mail send failed']);
}
