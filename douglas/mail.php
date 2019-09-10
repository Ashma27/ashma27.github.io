<?php

$to = "suthar.ashwani@gmail.com, contact@chainzilla.io";

$email = $_POST['email'];

$header = "From:  <info@chainzilla.com>\r\n";

$header.="Reply-To:<" . $email . ">\r\n";

$from = 'info@chainzilla.com';


$subject = "Message From ChainZilla Launch Form";


$message1 = "Project Manager Name : " . $_POST['name'] . "\n" . "Email : " . $email . "\n" . "Project Info :" . $_POST['info'];

mail($to, $subject, $message1, $header);
?>