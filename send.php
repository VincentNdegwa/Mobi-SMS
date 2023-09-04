<?php
$baseurl = "https://api.mobitechtechnologies.com/sms/sendsms";
$ch = curl_init($baseurl);
$data = array(
    "mobile" => "0769287724",
    "response_type" => "json",
    "sender_name" => "23107",
    "service_id" => 0,
    "message" => 'message from vincent',
);
$payload = json_encode($data);

curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'h_api_key:ab247e45600f700f396843af5a9e99bc4a9624f14b44e1210ba938025cba03f3'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
echo $result;
curl_close($ch);
