<?php
$to = "careers@dsah.sa,a.alnadwi@dsah.sa";
$subject = "Message from Dr Samir Abbas Hospital Website Job Seeker";

$header = "From:info@dsah.sa \r\n";
$header .= "MIME-Version: 1.0\r\n";

$upload_name = $_FILES["file"]["name"];
$upload_type = $_FILES["file"]["type"];
$upload_size = $_FILES["file"]["size"];
$upload_temp = $_FILES["file"]["tmp_name"];

$fp = fopen($upload_temp, "rb");
$file = fread($fp, $upload_size);

$file = chunk_split(base64_encode($file));
$eol = PHP_EOL;
$uid = md5(time());
error_reporting(E_ALL);
ini_set('display_errors', 'On');




$header = "From: Dsah<info@dsah.sa>" . $eol;
$header .= "Reply-To: test";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"" . $uid . "\"";

// Put everything else in $message
$message = "--" . $uid . $eol;
$message .= "Content-Type: text/html; charset=ISO-8859-1" . $eol;
$message .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
$message .= "--" . $uid . $eol;
$message .= "Content-Type: application/pdf; name=\"" . $upload_name . "\"" . $eol;
$message .= "Content-Transfer-Encoding: base64" . $eol;
$message .= "Content-Disposition: attachment; filename=\"" . $upload_name . "\"" . $eol;
$message .= $file . $eol;
$message .= "--" . $uid . "--";


if (mail($to, $subject, $message, $header)) {
    return "mail_success";
} else {
    return "mail_error";
    
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