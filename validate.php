<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
  // redirect them to your desired location
  //  header('location: http://localhost/restoran/index.php');
  echo "<script type='text/javascript'>window.location.href = '" . APPURL . "auth/login.php';</script>";

  exit;
}


?>