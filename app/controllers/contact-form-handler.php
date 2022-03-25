<?php
$name = $_POST['Name'];
$user_email = $_POST['Email'];
$message = $_POST['Message'];

$email_from = 'avijayaweera1@gmail.com';
$email_subject = "New Form Submission";
$email_body =
"User Name: $name.\n".
"User Email: $user_email.\n".
"User Message: $message.\n";

$to = "ceylonnurture@gmail.com";
$headers = "From: $email_from \r\n";
$headers .="Reply-To: $user_email \r\n";
mail($to,$email_subject,$email_body,$headers);
header("Location: about.php");
?>