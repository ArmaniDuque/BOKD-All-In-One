<?php require "../../../header.php"; ?>

<?php
// Alert
if (isset($_POST['savealert'])) {
    // $reservationid = $_POST['reservationid'];
    // $alertid = $_POST['alertid'];
    // $area = $_POST['area'];
    // $description = $_POST['description'];

    echo $reservationid = filter_input(INPUT_POST, 'reservationid', FILTER_SANITIZE_NUMBER_INT);
    echo $alertid = filter_input(INPUT_POST, 'alertid', FILTER_SANITIZE_NUMBER_INT);
    echo $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or FILTER_SANITIZE_STRING
    echo $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or FILTER_SANITIZE_STRING

    $query = "INSERT INTO hmsresalert (reservationid, alertid, area, description) VALUES(:reservationid, :alertid, :area, :description)";
    $arr = [
        ":reservationid" => $reservationid,
        ":alertid" => $alertid,
        ":area" => $area,
        ":description" => $description,
    ];

    // Construct the path with a parameter to trigger the modal
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openAlertModal=1";

    $app->register($query, $arr, $path);
}


if (isset($_POST['updatealert'])) {
    echo $alertedit = $_POST['alertedit'];
    echo $reservationid = $_POST['reservationid'];
    echo $alertid = $_POST['alertid'];
    echo $area = $_POST['area'];
    echo $description = $_POST['description'];
    $query = "UPDATE hmsresalert SET reservationid=:reservationid, area=:area, alertid=:alertid, description=:description WHERE id=:alertedit"; // Corrected query
    $arr = [
        ":reservationid" => $reservationid,
        ":alertid" => $alertid,
        ":area" => $area,
        ":description" => $description,
        ":alertedit" => $alertedit, // Corrected parameter usage
    ];
    $path = "update-guestreservationinfo2.php?alertedit=$alertedit&reservationid=$reservationid&area=$area&description=$description&openAlertModal=1&alertid=$alertid";
    $app->update($query, $arr, $path);
}

if (isset($_GET['alertdelete'])) {
    $reservationid = $_GET['reservationid'];
    $id = $_GET['alertdelete'];
    $query = "DELETE FROM hmsresalert where id='$id'";
    $app = new App;
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openAlertModal=1";
    $app->delete($query, $path);
}

?>
<?php
// Comment
if (isset($_POST['savecomment'])) {
    // Validate and sanitize the input data.
    $reservationid = filter_input(INPUT_POST, 'reservationid', FILTER_SANITIZE_NUMBER_INT);
    $commentid = filter_input(INPUT_POST, 'commentid', FILTER_SANITIZE_NUMBER_INT);
    $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or use FILTER_SANITIZE_STRING if you don't need special characters.

    // Prepare the SQL query using prepared statements.
    $query = "INSERT INTO hmsrescomments (reservationid, commentid, comments) VALUES (:reservationid, :commentid, :comments)";
    // Create the parameter array.
    $arr = [
        ":reservationid" => $reservationid,
        ":commentid" => $commentid,
        ":comments" => $comments,
    ];

    // Construct the path with a parameter to trigger the modal.
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openCommentModal=1";

    // Execute the query using your App class's register method.
    $app->register($query, $arr, $path);

}


if (isset($_POST['updatecomment'])) {
    echo $commentedit = $_POST['commentedit'];
    echo $reservationid = $_POST['reservationid'];
    echo $commentid = $_POST['commentid'];
    echo $comments = $_POST['comments'];
    $query = "UPDATE hmsrescomments SET reservationid=:reservationid, commentid=:commentid, comments=:comments WHERE id=:commentedit"; // Corrected query
    $arr = [
        ":reservationid" => $reservationid,
        ":commentid" => $commentid,
        ":comments" => $comments,
        ":commentedit" => $commentedit, // Corrected parameter usage
    ];
    $path = "update-guestreservationinfo2.php?commentedit=$commentedit&reservationid=$reservationid&comments=$comments&openCommentModal=1&commentid=$commentid";
    $app->update($query, $arr, $path);
}


if (isset($_GET['commentdelete'])) {
    $reservationid = $_GET['reservationid'];
    $id = $_GET['commentdelete'];
    $query = "DELETE FROM hmsrescomments where id='$id'";
    $app = new App;
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openCommentModal=1";
    $app->delete($query, $path);
}

?>
<?php
// note
if (isset($_POST['savenote'])) {
    // Validate and sanitize the input data.
    $reservationid = filter_input(INPUT_POST, 'reservationid', FILTER_SANITIZE_NUMBER_INT);
    $noteid = filter_input(INPUT_POST, 'noteid', FILTER_SANITIZE_NUMBER_INT);
    $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or use FILTER_SANITIZE_STRING if you don't need special characters.

    // Prepare the SQL query using prepared statements.
    $query = "INSERT INTO hmsresnote (reservationid, noteid, note) VALUES (:reservationid, :noteid, :note)";
    // Create the parameter array.
    $arr = [
        ":reservationid" => $reservationid,
        ":noteid" => $noteid,
        ":note" => $note,
    ];

    // Construct the path with a parameter to trigger the modal.
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&opennoteModal=1";

    // Execute the query using your App class's register method.
    $app->register($query, $arr, $path);

}


if (isset($_POST['updatenote'])) {
    echo $noteedit = $_POST['noteedit'];
    echo $reservationid = $_POST['reservationid'];
    echo $noteid = $_POST['noteid'];
    echo $note = $_POST['note'];
    $query = "UPDATE hmsresnote SET reservationid=:reservationid, noteid=:noteid, note=:note WHERE id=:noteedit"; // Corrected query
    $arr = [
        ":reservationid" => $reservationid,
        ":noteid" => $noteid,
        ":note" => $note,
        ":noteedit" => $noteedit, // Corrected parameter usage
    ];
    $path = "update-guestreservationinfo2.php?noteedit=$noteedit&reservationid=$reservationid&note=$note&opennoteModal=1&noteid=$noteid";
    $app->update($query, $arr, $path);
}


if (isset($_GET['notedelete'])) {
    $reservationid = $_GET['reservationid'];
    $id = $_GET['notedelete'];
    $query = "DELETE FROM hmsresnote where id='$id'";
    $app = new App;
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&opennoteModal=1";
    $app->delete($query, $path);
}

?>

<?php
// message
if (isset($_POST['savemessage'])) {
    // Validate and sanitize the input data.
    $reservationid = filter_input(INPUT_POST, 'reservationid', FILTER_SANITIZE_NUMBER_INT);
    $messageid = filter_input(INPUT_POST, 'messageid', FILTER_SANITIZE_NUMBER_INT);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or use FILTER_SANITIZE_STRING if you don't need special characters.

    // Prepare the SQL query using prepared statements.
    $query = "INSERT INTO hmsresmessage (reservationid, messageid, description) VALUES (:reservationid, :messageid, :description)";
    // Create the parameter array.
    $arr = [
        ":reservationid" => $reservationid,
        ":messageid" => $messageid,
        ":description" => $description,
    ];

    // Construct the path with a parameter to trigger the modal.
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openmessageModal=1";

    // Execute the query using your App class's register method.
    $app->register($query, $arr, $path);

}


if (isset($_POST['updatemessage'])) {
    echo $messageedit = $_POST['messageedit'];
    echo $reservationid = $_POST['reservationid'];
    echo $messageid = $_POST['messageid'];
    echo $description = $_POST['description'];
    $query = "UPDATE hmsresmessage SET reservationid=:reservationid, messageid=:messageid, description=:description WHERE id=:messageedit"; // Corrected query
    $arr = [
        ":reservationid" => $reservationid,
        ":messageid" => $messageid,
        ":description" => $description,
        ":messageedit" => $messageedit, // Corrected parameter usage
    ];
    $path = "update-guestreservationinfo2.php?messageedit=$messageedit&reservationid=$reservationid&description=$description&openmessageModal=1&messageid=$messageid";
    $app->update($query, $arr, $path);
}


if (isset($_GET['messagedelete'])) {
    $reservationid = $_GET['reservationid'];
    $id = $_GET['messagedelete'];
    $query = "DELETE FROM hmsresmessage where id='$id'";
    $app = new App;
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openmessageModal=1";
    $app->delete($query, $path);
}

?>
<?php
// accompany
if (isset($_GET['addaccompanyid'])) {
    echo $reservationid = $_GET['reservationid'];
    echo $customerid = $_GET['addaccompanyid'];
    $query = "INSERT INTO hmsaccompany (reservationid, customerid) VALUES (:reservationid, :customerid)";
    $arr = [
        ":reservationid" => $reservationid,
        ":customerid" => $customerid,
    ];

    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openaccompanyModal=1";

    $app->register($query, $arr, $path);

}


if (isset($_POST['updateaccompany'])) {
    echo $accompanyedit = $_POST['accompanyedit'];
    echo $reservationid = $_POST['reservationid'];
    echo $accompanyid = $_POST['accompanyid'];
    echo $description = $_POST['description'];
    $query = "UPDATE hmsaccompany SET reservationid=:reservationid, accompanyid=:accompanyid, description=:description WHERE id=:accompanyedit"; // Corrected query
    $arr = [
        ":reservationid" => $reservationid,
        ":accompanyid" => $accompanyid,
        ":description" => $description,
        ":accompanyedit" => $accompanyedit, // Corrected parameter usage
    ];
    $path = "update-guestreservationinfo2.php?accompanyedit=$accompanyedit&reservationid=$reservationid&description=$description&openaccompanyModal=1&accompanyid=$accompanyid";
    $app->update($query, $arr, $path);
}


if (isset($_GET['accompanydelete'])) {
    $reservationid = $_GET['reservationid'];
    $id = $_GET['accompanydelete'];
    $query = "DELETE FROM hmsaccompany where id='$id'";
    $app = new App;
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openaccompanyModal=1";
    $app->delete($query, $path);
}

?>
<?php
// wakeupcall
if (isset($_POST['savewakeupcall'])) {
    echo $reservationid = filter_input(INPUT_POST, 'reservationid', FILTER_SANITIZE_NUMBER_INT);
    echo $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or FILTER_SANITIZE_STRING
    echo $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or FILTER_SANITIZE_STRING
    echo $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Or FILTER_SANITIZE_STRING

    $query = "INSERT INTO hmsreswakeup (reservationid, date, time, description) VALUES(:reservationid, :date, :time, :description)";
    $arr = [
        ":reservationid" => $reservationid,
        ":date" => $date,
        ":time" => $time,
        ":description" => $description,
    ];
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openwakeupcallModal=1";
    $app->register($query, $arr, $path);
}

if (isset($_POST['updatewakeupcall'])) {
    echo $wakeupcalledit = $_POST['wakeupcalledit'];
    echo $reservationid = $_POST['reservationid'];
    echo $date = $_POST['date'];
    echo $time = $_POST['time'];
    echo $description = $_POST['description'];
    $query = "UPDATE hmsreswakeup SET reservationid=:reservationid, date=:date, date=:date, description=:description WHERE id=:wakeupcalledit"; // Corrected query
    $arr = [
        ":reservationid" => $reservationid,
        ":date" => $date,
        ":time" => $time,
        ":description" => $description,
        ":wakeupcalledit" => $wakeupcalledit, // Corrected parameter usage
    ];
    $path = "update-guestreservationinfo2.php?wakeupcalledit=$wakeupcalledit&reservationid=$reservationid&date=$date&time=$time&description=$description&openwakeupcallModal=1";
    $app->update($query, $arr, $path);
}
if (isset($_GET['wakeupcalldelete'])) {
    $reservationid = $_GET['reservationid'];
    $id = $_GET['wakeupcalldelete'];
    $query = "DELETE FROM hmsreswakeup where id='$id'";
    $app = new App;
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openwakeupcallModal=1";
    $app->delete($query, $path);
}
?>

<?php

// payment
if (isset($_POST['savepay'])) {
    $reservationid = filter_input(INPUT_POST, 'reservationid', FILTER_SANITIZE_NUMBER_INT);
    $transactionid = filter_input(INPUT_POST, 'transactionid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $amount1 = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // More appropriate for amount

    $amount = -abs($amount1);
    $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT); // Assuming quantity is an integer
    $win = filter_input(INPUT_POST, 'win', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $checkno = filter_input(INPUT_POST, 'checkno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $supplement = filter_input(INPUT_POST, 'supplement', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reference = filter_input(INPUT_POST, 'reference', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $chitno = filter_input(INPUT_POST, 'chitno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = date("Y-m-d");
    $time = date('H:i:s'); // Using 24-hour format for consistency
    //  $userid = ;

    // $created = date("Y-m-d H:i:s");
    // $updated = date("Y-m-d H:i:s");

    $query = "INSERT INTO hmsguestfolio (reservationid, transactionid, amount, qty, win, checkno, supplement, reference, chitno, userid, date, time)
              VALUES(:reservationid, :transactionid, :amount, :qty, :win, :checkno, :supplement, :reference, :chitno, :userid, :date, :time)";
    $arr = [
        ":reservationid" => $reservationid,
        ":transactionid" => $transactionid,
        ":amount" => $amount,
        ":qty" => $qty,
        ":win" => $win,
        ":checkno" => $checkno,
        ":supplement" => $supplement,
        ":reference" => $reference,
        ":chitno" => $chitno,
        ":userid" => $userid,
        ":date" => $date,
        ":time" => $time,
        // ":created" => $created,
        // ":updated" => $updated,
    ];
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openpaymentModal=1";
    $app->register($query, $arr, $path);
}

if (isset($_POST['updatepay'])) {
    echo $wakeupcalledit = $_POST['wakeupcalledit'];
    echo $reservationid = $_POST['reservationid'];
    echo $date = $_POST['date'];
    echo $time = $_POST['time'];
    echo $description = $_POST['description'];
    $query = "UPDATE hmsreswakeup SET reservationid=:reservationid, date=:date, date=:date, description=:description WHERE id=:wakeupcalledit"; // Corrected query
    $arr = [
        ":reservationid" => $reservationid,
        ":date" => $date,
        ":time" => $time,
        ":description" => $description,
        ":wakeupcalledit" => $wakeupcalledit, // Corrected parameter usage
    ];
    $path = "update-guestreservationinfo2.php?wakeupcalledit=$wakeupcalledit&reservationid=$reservationid&date=$date&time=$time&description=$description&openwakeupcallModal=1";
    $app->update($query, $arr, $path);
}
if (isset($_GET['paydelete'])) {
    $reservationid = $_GET['reservationid'];
    $id = $_GET['paydelete'];
    $query = "DELETE FROM hmsreswakeup where id='$id'";
    $app = new App;
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openwakeupcallModal=1";
    $app->delete($query, $path);
}
?>
<?php

// Post
if (isset($_POST['savepost'])) {
    $reservationid = filter_input(INPUT_POST, 'reservationid', FILTER_SANITIZE_NUMBER_INT);
    $transactionid = filter_input(INPUT_POST, 'transactionid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // More appropriate for amount
    $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT); // Assuming quantity is an integer
    $win = filter_input(INPUT_POST, 'win', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $checkno = filter_input(INPUT_POST, 'checkno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $supplement = filter_input(INPUT_POST, 'supplement', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reference = filter_input(INPUT_POST, 'reference', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $chitno = filter_input(INPUT_POST, 'chitno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = date("Y-m-d");
    $time = date('H:i:s'); // Using 24-hour format for consistency
// $userid = ;

    // $created = date("Y-m-d H:i:s");
// $updated = date("Y-m-d H:i:s");

    $query = "INSERT INTO hmsguestfolio (reservationid, transactionid, amount, qty, win, checkno, supplement, reference,
chitno, userid, date, time)
VALUES(:reservationid, :transactionid, :amount, :qty, :win, :checkno, :supplement, :reference, :chitno, :userid, :date,
:time)";
    $arr = [
        ":reservationid" => $reservationid,
        ":transactionid" => $transactionid,
        ":amount" => $amount,
        ":qty" => $qty,
        ":win" => $win,
        ":checkno" => $checkno,
        ":supplement" => $supplement,
        ":reference" => $reference,
        ":chitno" => $chitno,
        ":userid" => $userid,
        ":date" => $date,
        ":time" => $time,
        // ":created" => $created,
// ":updated" => $updated,
    ];
    $path = "guestbilling.php?reservationid=$reservationid&openpostModal=1";
    $app->register($query, $arr, $path);
}

if (isset($_POST['updatepost'])) {
    echo $wakeupcalledit = $_POST['wakeupcalledit'];
    echo $reservationid = $_POST['reservationid'];
    echo $date = $_POST['date'];
    echo $time = $_POST['time'];
    echo $description = $_POST['description'];
    $query = "UPDATE hmsreswakeup SET reservationid=:reservationid, date=:date, date=:date, description=:description WHERE
id=:wakeupcalledit"; // Corrected query
    $arr = [
        ":reservationid" => $reservationid,
        ":date" => $date,
        ":time" => $time,
        ":description" => $description,
        ":wakeupcalledit" => $wakeupcalledit, // Corrected parameter usage
    ];
    $path =
        "update-guestreservationinfo2.php?wakeupcalledit=$wakeupcalledit&reservationid=$reservationid&date=$date&time=$time&description=$description&openwakeupcallModal=1";
    $app->update($query, $arr, $path);
}
if (isset($_GET['postdelete'])) {
    $reservationid = $_GET['reservationid'];
    $id = $_GET['postdelete'];
    $query = "DELETE FROM hmsreswakeup where id='$id'";
    $app = new App;
    $path = "update-guestreservationinfo2.php?reservationid=$reservationid&openwakeupcallModal=1";
    $app->delete($query, $path);
}
?>
<!-- savesettlement -->
<?php

// Post
if (isset($_POST['savesettlement'])) {
    $reservationid = filter_input(INPUT_POST, 'reservationid', FILTER_SANITIZE_NUMBER_INT);
    $transactionid = filter_input(INPUT_POST, 'transactionid', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $amount1 = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // More appropriate for amount

    $amount = -abs($amount1);
    $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT); // Assuming quantity is an integer
    $win = filter_input(INPUT_POST, 'win', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $checkno = filter_input(INPUT_POST, 'checkno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $supplement = filter_input(INPUT_POST, 'supplement', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reference = filter_input(INPUT_POST, 'reference', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $chitno = filter_input(INPUT_POST, 'chitno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = date("Y-m-d");
    $time = date('H:i:s'); // Using 24-hour format for consistency
// $userid = ;

    // $created = date("Y-m-d H:i:s");
// $updated = date("Y-m-d H:i:s");

    $query = "INSERT INTO hmsguestfolio (reservationid, transactionid, amount, qty, win, checkno, supplement, reference,
chitno, userid, date, time)
VALUES(:reservationid, :transactionid, :amount, :qty, :win, :checkno, :supplement, :reference, :chitno, :userid, :date,
:time)";
    $arr = [
        ":reservationid" => $reservationid,
        ":transactionid" => $transactionid,
        ":amount" => $amount,
        ":qty" => $qty,
        ":win" => $win,
        ":checkno" => $checkno,
        ":supplement" => $supplement,
        ":reference" => $reference,
        ":chitno" => $chitno,
        ":userid" => $userid,
        ":date" => $date,
        ":time" => $time,
        // ":created" => $created,
// ":updated" => $updated,
    ];
    $path = "guestbilling.php?reservationid=$reservationid";
    $app->register($query, $arr, $path);
}