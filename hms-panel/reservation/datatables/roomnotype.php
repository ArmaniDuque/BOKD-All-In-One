<?php
if (isset($_GET['roomtypeid'])) {
    $roomtypeid = $_GET['roomtypeid'];
    $query = "SELECT * FROM roomsetup where roomtypeid=$roomtypeid";
    $app = new App;
    $roomsetups = $app->selectAll($query);
    foreach ($roomsetups as $roomsetup) {
        echo '<option value=' . $roomsetup->roomnumber . '>' . $roomsetup->roomnumber . '</option>';
    }
}
?>