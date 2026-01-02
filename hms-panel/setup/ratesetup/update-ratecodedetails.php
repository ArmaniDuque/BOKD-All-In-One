<?php require "../../../header.php"; ?>


<?php
if (isset($_POST['update'])) {
    echo $id = $_POST['details'];
    echo $ratecodeid = $_POST['ratecodeid'];
    echo $roomtypeid = $_POST['roomtypeid'];
    echo $selldate = $_POST['selldate'];
    echo $enddate = $_POST['enddate'];
    echo $marketid = $_POST['marketid'];
    echo $sourceid = $_POST['sourceid'];
    echo $rate = $_POST['rate'];
    echo $packageid = $_POST['packageid'];
    echo $deptid = $_POST['deptid'];
    // echo $monday = $_POST['mondayrate'];
    echo $monday = isset($_POST['mondayrate']) ? $_POST['mondayrate'] : 0;

    echo $tuesday = isset($_POST['tuesdayrate']) ? $_POST['tuesdayrate'] : 0;
    echo $wednesday = isset($_POST['wednesdayrate']) ? $_POST['wednesdayrate'] : 0;
    echo $thursday = isset($_POST['thursdayrate']) ? $_POST['thursdayrate'] : 0;
    echo $friday = isset($_POST['fridayrate']) ? $_POST['fridayrate'] : 0;
    echo $saturday = isset($_POST['saturdayrate']) ? $_POST['saturdayrate'] : 0;
    echo $sunday = isset($_POST['sundayrate']) ? $_POST['sundayrate'] : 0;
    $query = "UPDATE hmsratecodedetails SET ratecodeid=:ratecodeid, roomtypeid=:roomtypeid, selldate=:selldate,
enddate=:enddate, marketid=:marketid, rate=:rate, sourceid=:sourceid, packageid=:packageid,
deptid=:deptid, monday=:monday, tuesday=:tuesday, wednesday=:wednesday, thursday=:thursday, friday=:friday,
saturday=:saturday, sunday=:sunday WHERE id='$id'";
    $arr = [
        ":ratecodeid" => $ratecodeid,
        ":roomtypeid" => $roomtypeid,
        ":selldate" => $selldate,
        ":enddate" => $enddate,
        ":marketid" => $marketid,
        ":rate" => $rate,
        ":sourceid" => $sourceid,
        ":packageid" => $packageid,
        ":deptid" => $deptid,
        ":monday" => $monday,
        ":tuesday" => $tuesday,
        ":wednesday" => $wednesday,
        ":thursday" => $thursday,
        ":friday" => $friday,
        ":saturday" => $saturday,
        ":sunday" => $sunday,

    ];

    $path = "setup-ratecodedetails.php?details=$id";
    $app->update($query, $arr, $path);

}
?>