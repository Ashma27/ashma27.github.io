<?php
   $email = $_POST['email'];

include('MailChimp.php'); 

use \DrewM\MailChimp\MailChimp;

$list_id = '07e73c631f';
$api_key = '0e701669ec3dc7c05caf8257157566ad-us5';
$MailChimp = new MailChimp($api_key);

if($_POST){
   $email = $_POST['email']; 
   
   $result = $MailChimp->post("lists/$list_id/members", [
				'email_address' => $_POST['email'],
				'status'        => 'subscribed'
			]);

if ($MailChimp->success()) {
	 $data = $result;
	 if($result){
$to = "ruchika@designoweb.com" ;
$subject = "Message from App Designer website";
$header = "From:ruchika@designoweb.com   \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$message = 'Subscription successfully';
$message = "Email:" ." ". $email;
$retval = mail($to, $subject, $message, $header);
$data = "Thanks for connecting with us. We will response soon.";
	 }
}
else {
	$data = "You Have Already Subscribed";
}
echo json_encode($data);
}

?>