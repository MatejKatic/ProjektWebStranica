<?php 
$errors = '';
$myemail = 'http://www.fulek.com/VUA/SUPIT/ContactUs';
if(empty($_POST['name'])  || 
   empty($_POST['email']) ||  
   empty($_POST['poruka']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$poruka = $_POST['poruka']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Kontakt obrazac je poslan od: $name";
	$email_body = "Imate novu poruku. ".
	" Deatlji poruke:\n Ime: $name \n Email: $email_address \n Važnost poruke $vaznost \n Poruka \n $poruka"; 
	
	$headers = "Od: $myemail\n"; 
	$headers .= "Odgovori na: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>