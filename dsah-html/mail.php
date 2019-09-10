<?php $name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['message'];


$to = "mittaldivya522@gmail.com,info@dsah.sa";
$subject = "Message from Dr Samir Abbas Hospital Website";


$header = "From:info@dsah.sa \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$message = "Email: " . $email . "\r\n" . "Name: " . $name . "\r\n" . "Phone No.:" . $phone . "\r\n" . "Message:" . $msg ;

$retval = mail($to, $subject, $message, $header);


if ($retval == true) {
    echo "Message sent successfully...";
} else {
    echo "Message could not be sent...";
}
?>

//<?php
//$file_path = "career.html"; // server path where file is placed
//$file_path_type = "text/html"; // File Type
//$file_path_name = "newfilename.html"; // this file name will be used at reciever end 
// 
//$from = "info@dsah.sa"; // E-mail address of sender
//$to = "info@dsah.sa"; // E-mail address of reciever
//$subject = "Please check the Attachment."; // Subject of email
//$message = "This is the message body.&lt;br&gt;&lt;br&gt;Thank You!&lt;br&gt;&lt;a href='http://7tech.co.in'&gt;7tech.co.in Team&lt;/a&gt;"; 
// 
//$headers = "From: ".$from; 
// 
//$file = fopen($file_path,'rb');
//$data = fread($file,filesize($file_path));
//fclose($file); 
// 
//$rand = md5(time());
//$mime_boundary = "==Multipart_Boundary_x{$rand}x"; 
// 
//$headers .= "\nMIME-Version: 1.0\n" .
//"Content-Type: multipart/mixed;\n" .
//" boundary=\"{$mime_boundary}\""; 
// 
//$message .= "This is a multi-part message in MIME format.\n\n" .
//"--{$mime_boundary}\n" .
//"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
//"Content-Transfer-Encoding: 7bit\n\n" .
//$message .= "\n\n"; 
// 
//$data = chunk_split(base64_encode($data)); 
// 
//$message .= "--{$mime_boundary}\n" .
//"Content-Type: {$file_path_type};\n" .
//" name=\"{$file_path_name}\"\n" .
//"Content-Disposition: attachment;\n" .
//" filename=\"{$file_path_name}\"\n" .
//"Content-Transfer-Encoding: base64\n\n" .
//$data .= "\n\n" .
//"--{$mime_boundary}--\n";  
// 
//if(@mail($to, $subject, $message, $headers)) {
//echo "File send!";
// 
//} else {
//echo 'Failed';
//}
//?>