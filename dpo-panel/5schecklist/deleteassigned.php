<?php require "../../config/config.php"; ?>
<?php require "../../libs/app.php"; ?>
<?php include "../../layouts/url.php"; ?>
<?php require "../../validate.php"; ?>
<?php
if (isset($_POST['submit'])) {
    $userid = $_POST['userid'];
    $checklistdatainventoryid = $_POST['checklistdatainventoryid'];

    $query = "DELETE FROM dpochecklistdatainventory WHERE checklistdatainventoryid='$checklistdatainventoryid'";
    $app = new App;
    $path = "assignedinventory.php?id=$userid";
    $app->delete($query, $path);
}
?>