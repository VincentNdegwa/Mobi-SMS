<?php
session_start();
$url = "https://api.mobitechtechnologies.com/sms/sendsms";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'Send') {
        $curl = curl_init($url);
        $data = array(
            "mobile" => $_POST['phone'],
            "response_type" => "json",
            "sender_name" => "23107",
            "service_id" => 0,
            "message" => $_POST['message'],
        );

        $json_data = json_encode($data);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'h_api_key:ab247e45600f700f396843af5a9e99bc4a9624f14b44e1210ba938025cba03f3'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);



        $response = (object)curl_exec($curl);
        $_SESSION['response'] = $response;
        // print_r($response);
        curl_close($curl);
        header("Location: index.php");
    }
}
