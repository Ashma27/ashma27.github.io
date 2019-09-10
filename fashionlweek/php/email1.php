<?php
session_cache_limiter( 'nocache' );
$subject = $_REQUEST['subject']; // Subject of your email
$name = isset($_REQUEST['name'])?$_REQUEST['name']:'No name';
if ($name == '') $name = 'No name';
$from = 'info@fashionshowmonde.com';

$to = "owmrod19@gmail.com";  //Recipient's E-mail
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "From: Info" .'<'.$from .'>'. "\r\n"; 
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

/*
$message  = 'Name: ' . $_REQUEST['name'] . "<br>";
$message .= 'Email: ' . $_REQUEST['email'] . "<br>";
$message .= 'Message: ' . $_REQUEST['message'] ;
*/

$message = '';
foreach($_REQUEST as $key=>$value) {
  $message .= $key . ': '. $value. "<br>";
    // do stuff
}

if (@mail($to, $subject, $message, $headers))
{
	// Transfer the value 'sent' to ajax function for showing success message.
	echo 'sent';
	// header('Location: ../index.html');
}
else
{
	// Transfer the value 'failed' to ajax function for showing error message.
	echo 'failed';
}
?>