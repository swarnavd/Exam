<?php
require_once __DIR__ . '/Loginprocess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./CSS/login-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="bg-img">
    <div class="content">
      <header>Login Form</header>
      <form action="" method="post">
        <div class="field">
          <span class="fa fa-user"></span>
          <input type="text" required placeholder="Email" name="email">
        </div>
        <div class="field space">
          <span class="fa fa-lock"></span>
          <input type="password" class="password" required placeholder="Password" name="password">
        </div>
        <div class="pass">
          <a href="/Forget">Forgot Password?</a>
        </div>
        <div class="field">
          <input type="submit" value="LOGIN" name="login">
        </div>
      </form>
    </div>
  </div>
</body>

</html>
