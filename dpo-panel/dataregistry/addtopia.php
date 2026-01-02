<?php require "../../config/config.php"; ?>
<?php require "../../libs/app.php"; ?>
<?php include "../../layouts/url.php"; ?>
<?php require "../../validate.php"; ?>
<?php

if (isset($_GET['dataregistryid'])) {

    $dataregistryid = $_GET['dataregistryid'];

    $query = "SELECT * FROM dpodataregistry WHERE dataregistryid='$dataregistryid'";
    $app = new App;
    $datas = $app->selectAll($query);
    foreach ($datas as $data) {
        $refid = $data->refid;
        $query = "INSERT INTO dpopia (refid) VALUES (:refid)";
        $arr = [
            ":refid" => $refid,
            // ":dataregistryid" => $dataregistryid
        ];

        // Execute the queries
        $path = "registry.php";
        $app->register($query, $arr, $path);

    }



}


if (isset($_POST['submit'])) {


    $dataregistryid = $_POST['dataregistryid'];
    $userdepartment = $_POST['userdepartment'];

    preg_match_all('/\b\w/', $userdepartment, $matches);
    $userdepartments = implode('', $matches[0]);
    $refid = "MBCI-" . $userdepartments . "-00" . $dataregistryid . ""; // Outputs: "TiaTs"

    $query = "UPDATE dataregistry SET refid=:refid WHERE dataregistryid=:dataregistryid";


    $arr = [
        ":refid" => $refid,
        ":dataregistryid" => $dataregistryid
    ];

    $path = "addtopia.php?dataregistryid=$dataregistryid";
    $app->update($query, $arr, $path);

}
?>