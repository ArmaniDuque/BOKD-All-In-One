<?php require "../../../header.php"; ?>
<?php require "../../sidebar.php"; ?>


<?php
if (isset($_GET['details'])) {

    $id = $_GET['details'];
    $query = "SELECT * FROM hmsratecode where id=$id";
    $app = new App;
    $ratecodes = $app->selectAll($query);

}
?>
<?php
if (isset($_GET['delete'])) {
    // $id = $_GET['delete'];
    // $query = "DELETE FROM transactions where id='$id'";
    // $app = new App;
    // $path = "transactions.php";
    // $app->delete($query, $path);
}
?>
<?php
if (isset($_POST['submit'])) {





    // echo $ratecodeid = $_POST['ratecodeid'];
    // echo $roomtypeid = $_POST['roomtypeid'];
    // echo $selldate = $_POST['selldate'];
    // echo $enddate = $_POST['enddate'];
    // echo $marketid = $_POST['marketid'];
    // echo $sourceid = $_POST['sourceid'];
    // echo $packageid = $_POST['packageid'];
    // echo $deptid = $_POST['deptid'];
    // // isset($_POST['collection']) ? $_POST['collection'] : 0;
    // echo $monday = isset($_POST['monday']) ? $_POST['monday'] : 0;

    // echo $tuesday = isset($_POST['tuesday']) ? $_POST['tuesday'] : 0;
    // echo $wednesday = isset($_POST['wednesday']) ? $_POST['wednesday'] : 0;
    // echo $thursday = isset($_POST['thursday']) ? $_POST['thursday'] : 0;
    // echo $friday = isset($_POST['friday']) ? $_POST['friday'] : 0;
    // echo $saturday = isset($_POST['saturday']) ? $_POST['saturday'] : 0;
    // echo $sunday = isset($_POST['sunday']) ? $_POST['sunday'] : 0;






    if (!empty($_POST['check_list'])) {

        // Counting number of checked checkboxes.
        $checked_count = count($_POST['check_list']);
        echo "You have selected following " . $checked_count . " option(s): <br/>";
        // Loop to store and display values of individual checked checkbox.
        foreach ($_POST['check_list'] as $roomtypeid) {

            echo $ratecodeid = $_POST['ratecodeid'];
            echo $roomtypeid1 = $roomtypeid;
            echo " <br>";


            $query = "SELECT COUNT(*) AS count_rcdetails FROM hmsratecodedetails where ratecodeid=$ratecodeid and roomtypeid=$roomtypeid1 ";
            $app = new App;
            $count_rcdetails = $app->selectOne($query);
            $count_rcdetails->count_rcdetails;
            if ($count_rcdetails->count_rcdetails == 1) {
                echo "Match Update";
                echo $selldate = $_POST['selldate'];
                echo $enddate = $_POST['enddate'];
                echo $marketid = $_POST['marketid'];
                echo $sourceid = $_POST['sourceid'];
                echo $packageid = $_POST['packageid'];
                echo $deptid = $_POST['deptid'];
                echo $monday = isset($_POST['monday']) ? $_POST['monday'] : 0;
                echo $tuesday = isset($_POST['tuesday']) ? $_POST['tuesday'] : 0;
                echo $wednesday = isset($_POST['wednesday']) ? $_POST['wednesday'] : 0;
                echo $thursday = isset($_POST['thursday']) ? $_POST['thursday'] : 0;
                echo $friday = isset($_POST['friday']) ? $_POST['friday'] : 0;
                echo $saturday = isset($_POST['saturday']) ? $_POST['saturday'] : 0;
                echo $sunday = isset($_POST['sunday']) ? $_POST['sunday'] : 0;
                echo " <br>";

                $query = "UPDATE hmsratecodedetails SET selldate=:selldate, enddate=:enddate, marketid=:marketid, sourceid=:sourceid, packageid=:packageid,
                 deptid=:deptid, monday=:monday, tuesday=:tuesday, wednesday=:wednesday, thursday=:thursday, friday=:friday,
                  saturday=:saturday, sunday=:sunday WHERE ratecodeid='$ratecodeid' AND roomtypeid1='$roomtypeid1'";
                $arr = [
                    ":ratecodeid" => $ratecodeid,
                    ":roomtypeid" => $roomtypeid,
                    ":selldate" => $selldate,
                    ":enddate" => $enddate,
                    ":marketid" => $marketid,
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
                $path = "setup-ratecode.php?details=$ratecodeid";
                $app->register($query, $arr, $path);



            } else {
                echo "Not Match Save";
                echo $selldate = $_POST['selldate'];
                echo $enddate = $_POST['enddate'];
                echo $marketid = $_POST['marketid'];
                echo $sourceid = $_POST['sourceid'];
                echo $packageid = $_POST['packageid'];
                echo $deptid = $_POST['deptid'];
                echo $monday = isset($_POST['monday']) ? $_POST['monday'] : 0;
                echo $tuesday = isset($_POST['tuesday']) ? $_POST['tuesday'] : 0;
                echo $wednesday = isset($_POST['wednesday']) ? $_POST['wednesday'] : 0;
                echo $thursday = isset($_POST['thursday']) ? $_POST['thursday'] : 0;
                echo $friday = isset($_POST['friday']) ? $_POST['friday'] : 0;
                echo $saturday = isset($_POST['saturday']) ? $_POST['saturday'] : 0;
                echo $sunday = isset($_POST['sunday']) ? $_POST['sunday'] : 0;


                $query = "INSERT INTO hmsratecodedetails (ratecodeid, roomtypeid, selldate, enddate, marketid, sourceid, packageid, deptid, monday, tuesday, wednesday, thursday, friday, saturday, sunday)
VALUES(:ratecodeid, :roomtypeid, :selldate, :enddate, :marketid, :sourceid, :packageid, :deptid, :monday,  :tuesday, :wednesday, :thursday, :friday, :saturday, :sunday)";
                $arr = [
                    ":ratecodeid" => $ratecodeid,
                    ":roomtypeid" => $roomtypeid,
                    ":selldate" => $selldate,
                    ":enddate" => $enddate,
                    ":marketid" => $marketid,
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
                $path = "setup-ratecode.php?details=$ratecodeid";
                $app->register($query, $arr, $path);
            }

        }


    }

}
?>
<!-- Content Wrapper. Contains page content -->

<!-- /.content-wrapper -->
<?php require "../../../footer1.php"; ?>