<?php
session_start();
if ($_SESSION['role'] !== 'vip' || $_SESSION['role'] !== 'user') {
  if ($_SESSION['role'] === 'admin') {
    header('Location: /admin');
    return;
  }

  if (empty($_SESSION))  {
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
