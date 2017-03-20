<?php

if (isset($_POST["name"])) {
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $human = empty($_POST['human']);


  $from = 'Kristianavellucci.com Contact Form';
  $to = 'me@kristianavellucci.com';
  $subject = 'Message from Portfolio Website ';

$headers = 'From: me@kristianavellucci.com' . "\r\n" .
    'Reply-To: me@kristianavellucci.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $body = "From: $name\n Subject: $subject\n E-Mail: $email\n Message:\n $message";


  // Check if name has been entered
  if (empty($_POST['name'])) {
  	$errName = 'Please enter your name';
  }

  // Check if email has been entered and is valid
  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  	$errEmail = 'Please enter a valid email address';
  }

  //Check if message has been entered
  if (empty($_POST['message'])) {
  	$errMessage = 'Please enter your message';
  }
  //Check if simple anti-bot test is correct
  if (!$human) {
  	$errHuman = 'Your anti-spam is incorrect';
  }

  // If there are no errors, send the email
  if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
  	if (mail ($to, $subject, $body, $headers)) {
      header('Location: thank-you.html');
  	} else {
  		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
  	}
   } else {
	print "Parameters incorrect";
   }
} else {
	print "Noooo";
}
