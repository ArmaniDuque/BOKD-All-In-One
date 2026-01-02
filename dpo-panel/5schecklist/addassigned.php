<?php require "../../config/config.php"; ?>
<?php require "../../libs/app.php"; ?>
<?php include "../../layouts/url.php"; ?>
<?php require "../../validate.php"; ?>
<?php
if (isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $datainventoryid = $_POST['datainventoryid'];
    $query = "INSERT INTO dpochecklistdatainventory (userid, datainventoryid)
     VALUES(:userid, :datainventoryid)";
    $arr = [

        ":userid" => $userid,
        ":datainventoryid" => $datainventoryid,
    ];
    $path = "assignedinventory.php?id=$userid";
    $app->register($query, $arr, $path);
}
?>