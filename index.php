<?php
session_start();
$data = $_SESSION['response'];
$scalar_data = $data->scalar;
$dataArray = json_decode($scalar_data, true);

$status_code = $dataArray[0]['status_code'];
$status_desc = $dataArray[0]['status_desc'];
$message_id = $dataArray[0]['message_id'];
$mobile_number = $dataArray[0]['mobile_number'];
$message_cost = $dataArray[0]['message_cost'];
$credit_balance = $dataArray[0]['credit_balance'];

// print_r($dataArray[0]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Message Sender</title>
</head>

<body>
    <section class="mt-3">
        <form action="send.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter Phone</label>
                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">The number should be the recepient's.</div>
                <div id="emailHelp" class="form-text">Format should be like 0712123434.</div>

            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" name='action' value="Send" class="btn btn-primary">Send</button>
        </form>
        <div class="notification">
            <?php foreach ($_SESSION['response'][0] as $item) { ?>
                <div class="notification-display">
                    <p><?php print_r($item) ?></p>
                </div>
            <?php } ?>
        </div>
    </section>

</body>

</html>