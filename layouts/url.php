<?php
// $http = 'http:/';
// $ip = 'localhost';
$http = 'http:/';
// $ip = '10.60.0.22';
$ip = 'localhost';
$project = 'BOKD-All-In-One';

// error_reporting(E_ALL);
// ini_set("display_errors", 0);
$app = new App;
$app->startSession();
define("APPURL", "$http/$ip/$project/");

// $app = new App;
// $app->startSession();
define("OPENURL", "$http/");
?>