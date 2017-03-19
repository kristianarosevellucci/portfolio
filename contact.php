<?php

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $human = intval($_POST['human']);
  $from = 'Kristianavellucci.com Contact Form';
  $to = 'hello@kvellucci.com';
  $subject = 'Message from Portfolio Website ';

  $body = "From: $name\n Subject: $subject\n E-Mail: $email\n Message:\n $message";

  // Check if name has been entered
  if (!$_POST['name']) {
  	$errName = 'Please enter your name';
  }

  // Check if email has been entered and is valid
  if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  	$errEmail = 'Please enter a valid email address';
  }

  //Check if message has been entered
  if (!$_POST['message']) {
  	$errMessage = 'Please enter your message';
  }
  //Check if simple anti-bot test is correct
  if ($human !== 5) {
  	$errHuman = 'Your anti-spam is incorrect';
  }

  // If there are no errors, send the email
  if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
  	if (mail ($to, $subject, $body, $from)) {
      header('Location: thank-you.html');
      exit();
  	} else {
  		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
  	}
  }
?>
