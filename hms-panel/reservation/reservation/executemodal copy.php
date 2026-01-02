<?php require "../../../header.php"; ?>

<?php
// wakeupcall
if (isset($_POST['savewakeupcall'])) {
    // $reservationid = $_POST['reservationid'];
    // $wakeupcallid = $_POST['wakeupcallid'];
    // $area = $_POST['area'];
    // $description = $_POST['description'];

    echo $reservationid = filter_input(INPUT_POST, 'reservationid', FILTER_SANITIZE_NUMBER_INT);
    echo $wakeupcallid = filter_input(INPUT_POST, 'wakeupcallid', FILTER_SANITIZE_NUMBER_INT);
    echo $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or FILTER_SANITIZE_STRING
    echo $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or FILTER_SANITIZE_STRING

    $query = "INSERT INTO reswakeup (reservationid, wakeupcallid, area, description) VALUES(:reservationid, :wakeupcallid, :area, :description)";
    $arr = [
        ":reservationid" => $reservationid,
        ":wakeupcallid" => $wakeupcallid,
        ":area" => $area,
        ":description" => $description,
    ];

    // Construct the path with a parameter to trigger the modal
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openwakeupcallModal=1";

    $app->register($query, $arr, $path);
}


if (isset($_POST['updatewakeupcall'])) {
    echo $wakeupcalledit = $_POST['wakeupcalledit'];
    echo $reservationid = $_POST['reservationid'];
    echo $date = $_POST['date'];
    echo $time = $_POST['time'];
    echo $description = $_POST['description'];
    $query = "UPDATE reswakeup SET reservationid=:reservationid, date=:date, date=:date, description=:description WHERE id=:wakeupcalledit"; // Corrected query
    $arr = [
        ":reservationid" => $reservationid,
        ":date" => $date,
        ":time" => $time,
        ":description" => $description,
        ":wakeupcalledit" => $wakeupcalledit, // Corrected parameter usage
    ];
    $path = "update-guestreservationinfo2.php?wakeupcalledit=$wakeupcalledit&reservationid=$reservationid&date=$date&time=$time&description=$description&openwakeupcallModal=1&wakeupcallid=$wakeupcallid";
    $app->update($query, $arr, $path);
}

if (isset($_GET['wakeupcalldelete'])) {
    $reservationid = $_GET['reservationid'];
    $id = $_GET['wakeupcalldelete'];
    $query = "DELETE FROM reswakeup where id='$id'";
    $app = new App;
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openwakeupcallModal=1";
    $app->delete($query, $path);
}

?>