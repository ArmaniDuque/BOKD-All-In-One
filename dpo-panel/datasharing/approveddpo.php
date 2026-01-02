<?php require "../../config/config.php"; ?>
<?php require "../../libs/app.php"; ?>
<?php include "../../layouts/url.php"; ?>
<?php require "../../validate.php"; ?>
<?php

if (isset($_GET['id'])) {

    $sharingid = $_GET['id'];
    $approved = "Approved";

    $query = "UPDATE dposharing SET statusdpo=:approved WHERE sharingid=:sharingid";


    $arr = [
        ":approved" => $approved,
        ":sharingid" => $sharingid,
    ];

    $path = "datasharing.php";
    $app->update($query, $arr, $path);



}