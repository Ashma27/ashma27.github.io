<?php

$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];


$to = "swastiverma031@gmail.com, da.agcy@gmail.com";
$subject = "Message from Digital Agency";


$header = "From:da.agcy@gmail.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$message = "Email: " . $email . "\r\n" . "Name: " . $name . "\r\n" . "Company Name:" . $company;

$retval = mail($to, $subject, $message, $header);


if ($retval == true) {
    echo "Message sent successfully...";
} else {
    echo "Message could not be sent...";
}
?>