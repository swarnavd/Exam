<?php
require 'Query.php';
require 'Sendmail.php';
// Checks if email field is not empty.
if (!empty($_POST['email'])) {
  if (isset($_POST['submit'])) {
    session_start();
    $ob = new Query();
    $sendMail = new Sendmail();
    // Stores the hashed token respective to a particular user.
    $token = $ob->addToken($_POST['email']);
    // Token stores in session for further checking.
    $_SESSION['token'] = $token;
    $_SESSION['email'] = $_POST['email'];
    // Generating unique reset link by concating token.
    $link = 'http://local-iplfix.com/Reset?token=' . $token;
    // Sending mail of reseting password.
    if ($ob->isExistingUser($_POST['email'])) {
      $sendMail->sendReset($_POST['email'], $link);
    }
    else {
      $existMessage = "Email id not exists in your database!";
    }
  }
}
