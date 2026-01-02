<?php require "../config/config.php"; ?>
<?php require "../libs/app.php"; ?>
<?php include "../layouts/url.php"; ?>

<?php require "../validate.php"; ?>

<?php

session_start();
session_unset();
session_destroy();

header("location: $http/$ip/$project/auth/login.php");

?>