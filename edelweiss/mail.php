<?php

$b_name = $_POST['b_name'];
$p_number = $_POST['p_number'];
$b_date = $_POST['b_date'];
$nu_adult = $_POST['nu_adult'];
$nu_kids = $_POST['nu_kids'];
$b_time = $_POST['b_time'];
$email = $_POST['email'];
$message = $_POST['message'];


$to = "booking.coffs@edelweissrestaurant.com.au";
$subject = "Online Booking for" . "\r\n" .$b_name. "\r\n" . "for the" . "\r\n" . $b_date . "\r\n" . "with" . "\r\n" . $nu_adult . "\r\n" . "at" . "\r\n" . $b_time;


$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    // Create email headers
    $headers .= 'From: coffs@edelweissrestaurant.com.au'."\r\n".
    'Reply-To: booking.coffs@edelweissrestaurant.com.au'."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$message = "Booking Name: " . $b_name . "\n<br />" . "Phone Number: " . $p_number . "\n<br />"  ."Email:" . $email  . "\n<br />" .  "Number of adult: " . $nu_adult . "\n<br />" . "Number of Kids: " . $nu_kids . "\n<br />" . "Booking Date:" . $b_date . "\n<br />"  . "Booking Time:" . $b_time . "\n<br />" . "Message:" . $message;
//$message.= $b_name . "\r\n" . "," . $p_number . "\r\n" . "for the" . "\r\n" . $b_date . "\r\n" . "with" . "\r\n" . $nu_adult . "\r\n" . "at" . "\r\n" . $b_time;
$retval = mail($to, $subject, $message, $headers  );

if (isset($_POST['want_to'])) {
// MailChimp API credentials
    $apiKey = 'bc1be8cadd6ef864f423168b70e9d35e-us9';
    $listID = '063bae86d4';

    // MailChimp API URL
    $memberID = md5(strtolower($email));
    $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;

    // member information
    $json = json_encode([
        'email_address' => $email,
        'status' => 'subscribed',
        'merge_fields' => [
            'FNAME' => $b_name,
        ]
    ]);

    // send a HTTP POST request with curl
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200) {
        $_SESSION['msg'] = '<p style="color: #34A853">You have successfully subscribed to our list.</p>';
    } else {
        switch ($httpCode) {
            case 214:
                $msg = 'You are already subscribed.';
                break;
            default:
                $msg = 'Some problem occurred, please try again.';
                break;
        }
    }

    //echo $msg;
    
}


if ($retval == true) {
    echo "Message sent successfully...";
} else {
    echo "Message could not be sent...";
}
?>