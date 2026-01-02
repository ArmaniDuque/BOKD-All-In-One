<?php
if (isset($_GET['roomid'])) {
    $roomid = $_GET['roomid'];
    $query = "SELECT * FROM roomsetup where roomnumber=$roomid";
    $app = new App;
    $roomstatusids = $app->selectAll($query);
    foreach ($roomstatusids as $roomstatusid) {
        // echo '<option value=' . $roomstatusid->roomstatusid . '>' . $roomstatusid->roomstatusid . '</option>';
        echo '  <input type="text" class="form-control form-control-sm" value=' . $roomstatusid->roomstatusid . '>';
    }
}
?>