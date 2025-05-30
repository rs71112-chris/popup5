<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit();
}
$data = json_decode(file_get_contents("php://input"));
$ip_address = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('America/Chicago');
$data->ip_address = $ip_address;
$data->timestamp = date('Y-m-d H:i:s');
$file = fopen("click_data.txt", "a");
fwrite($file, json_encode($data) . "\n");
fclose($file);
echo json_encode(["message" => "Click tracked successfully"]);
?>
