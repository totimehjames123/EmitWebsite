<?php
session_start();

// Check if the user has submitted their email address
  
  // Get the email address from the form submission
  $email = $_POST['email'];
  
  // Generate a random verification code
  $verification_code = rand(10000, 99999);
  
  // Store the verification code in a session variable for later comparison
  $_SESSION['verification_code'] = $verification_code;
  echo $_SESSION['verification_code'];
  
  // Send the verification code to the user's email address
  $to = $email;
  $subject = "Email Verification Code";
  $message = "Your verification code is: " . $verification_code;
  $headers = "From: no-reply@example.com";
//   $headers = "From: no-reply@accounts.google.com";
  mail($to, $subject, $message, $headers);
  
  // Redirect the user to the verification form
//   header("Location: verification_form.php");
//   exit;


?>
