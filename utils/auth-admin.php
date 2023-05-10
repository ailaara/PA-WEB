<?php
session_start();
$uri = $_SERVER['REQUEST_URI'];

if ($_SESSION['role'] !== 'admin') {
  if ($_SESSION['role'] === 'vip' || $_SESSION['role'] === 'user') {
    header("Location: /home");
    return;
  }

  if (empty($_SESSION)) {
    header("Location: /");
  }
}

if (isset($_POST['logout'])) {
  echo "<script>alert('Berhasil Logout')</script>";
  // echo "<script>localS</script>";
  session_destroy();
  session_unset();
  header("Location: /");
}
