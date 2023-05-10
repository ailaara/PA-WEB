<?php
// Admin
$adminEmail = 'admin@gmail.com';
$adminPass = '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918';

session_start();


if ($_SESSION['role'] === 'vip' || $_SESSION['role'] === 'user') {
  header("Location: /home");
} else if ($_SESSION['role'] === 'admin') {
  header("Location: /admin/");
}

if (!empty($_POST)) {
  if ($adminEmail === $_POST['email']) {
    if ($adminPass === hash('sha256', $_POST['pass'])) {
      $_SESSION['username'] = 'Admin';
      $_SESSION['email'] = 'admin@gmail.com';
      $_SESSION['role'] = 'admin';
      header('Location: /admin/');
      return;
    }
    echo '<script>alert("Username dan Password Salah")</script>';
  } else {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['role'] = $_POST['roleUser'] > 0  ? 'vip' : 'user';
    header('Location: /home/');
  }
}
$_POST = array();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="/styles/login.css">
</head>

<body>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <div class="container">
    <div class="login-container">
      <input id="item-1" type="radio" name="item" class="sign-in" checked><label for="item-1" class="item">Sign
        In</label>
      <input id="item-2" type="radio" name="item" class="sign-up"><label for="item-2" class="item">Sign Up</label>
      <div class="login-form">
        <form id="login" name="login" method="POST">
          <div class="sign-in-htm">
            <div class="group">
              <input placeholder="email" id="email" name="email" type="email" class="input" required>
            </div>
            <div class="group">
              <input placeholder="Password" id="pass2" name="pass" type="password" class="input" data-type="password" autocomplete="off" required>
            </div>
            <div class="group">
              <button type="submit" id="loginwe" class="button">Sign in</button>
            </div>
            <input hidden name="roleUser" />
            <input hidden name="username" />
            <div class="hr"></div>
            <div class="footer">
              <label for="item-2">anda belum memiliki akun? sign-up</label>
            </div>
          </div>
        </form>
        <form name="daftar" id="daftar" method="POST">
          <div class="sign-up-htm">
            <div class="group" id="dftr">
              <input placeholder="Username" id="user1" type="text" class="input" required>
            </div>
            <div class="group">
              <input placeholder="Email adress" id="emailA" type="text" class="input" required>
            </div>
            <div class="group">
              <input placeholder="Password" id="pass1" type="password" class="input" data-type="password" required>
            </div>
            <div class="group">
              <input placeholder="Repeat password" id="pass0" type="password" class="input" data-type="password" required>
            </div>
            <div class="group">
              <button type="submit" id="sign1" class="button">Sign Up</button>
            </div>
            <div class="hr"></div>
            <div class="footer">
              <label for="item-1">Already have an account?</a>
            </div>
          </div>
      </div>
    </div>
    </form>
    
    <script src="/scripts/cash.min.js"></script>
    <script src="/scripts/loginx.js"></script>
</body>

</html>