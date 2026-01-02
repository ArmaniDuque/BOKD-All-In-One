<?php require "../../../header.php"; ?>
<?php

if (isset($_POST['checkin'])) {
    // echo "Checkin na";
    echo $reservationid = $_POST['reservationid'];
    echo $status = "Checkin";
    $query = "UPDATE hmsreservations SET status=:status WHERE reservationid=:reservationid";


    $arr = [
        ":reservationid" => $reservationid,
        ":status" => $status,
    ];

    $path = "update-guestreservationinfo2.php?reservationid=$reservationid";
    $app->update($query, $arr, $path);
}
?>
<?php

if (isset($_POST['reserve'])) {
    // echo "Checkin na";
    echo $reservationid = $_POST['reservationid'];
    echo $status = "Reserve";
    $query = "UPDATE hmsreservations SET status=:status WHERE reservationid=:reservationid";


    $arr = [
        ":reservationid" => $reservationid,
        ":status" => $status,
    ];

    $path = "update-guestreservationinfo2.php?reservationid=$reservationid";
    $app->update($query, $arr, $path);
}
?>
<?php

if (isset($_POST['checkout'])) {
    // echo "Checkin na";
    echo $reservationid = $_POST['reservationid'];
    echo $status = "Checkout";
    $query = "UPDATE hmsreservations SET status=:status WHERE reservationid=:reservationid";


    $arr = [
        ":reservationid" => $reservationid,
        ":status" => $status,
    ];

    $path = "update-guestreservationinfo2.php?reservationid=$reservationid";
    $app->update($query, $arr, $path);
}
?>
<?php
if (isset($_POST['cancel'])) {
    // echo "Cancel na";
    echo $reservationid = $_POST['reservationid'];
    echo $status = "Cancel";
    $query = "UPDATE hmsreservations SET status=:status WHERE reservationid=:reservationid";


    $arr = [
        ":reservationid" => $reservationid,
        ":status" => $status,
    ];

    $path = "update-guestreservationinfo2.php?reservationid=$reservationid";
    $app->update($query, $arr, $path);
}
?>

<?php
if (isset($_POST['save'])) {
    echo $customerid = $_POST['customerid'];
    echo $lastname = $_POST['lastname'];
    echo $firstname = $_POST['firstname'];
    echo $middlename = $_POST['middlename'];
    echo $tittle = $_POST['tittle'];
    echo $number1 = $_POST['number1'];
    echo $number2 = $_POST['number2'];
    echo $email1 = $_POST['email1'];
    echo $address = $_POST['address'];
    echo $city = $_POST['city'];
    echo $province = $_POST['province'];
    echo $region = $_POST['region'];
    echo $nationality = $_POST['nationality'];
    echo $language = $_POST['language'];
    echo $vip = $_POST['vip'];
    echo $agentid = $_POST['agentid'];
    echo $companyid = $_POST['companyid'];
    echo $groupid = $_POST['groupid'];
    echo $passportid = $_POST['passportid'];
    echo $memberid = $_POST['memberid'];
    echo $seniorid = $_POST['seniorid'];
    echo $pwdid = $_POST['pwdid'];

    echo '<br>';
    echo $checkindate = $_POST['checkindate'];
    echo $checkoutdate = $_POST['checkoutdate'];
    echo $noofnights = $_POST['noofnights'];
    echo $noofrooms = $_POST['noofrooms'];
    echo $adults = $_POST['adults'];
    echo $kids = $_POST['kids'];
    echo $ratecodeid = $_POST['ratecodeid'];
    echo $roomnumber = $_POST['roomnumber'];
    echo $roomtypeid = $_POST['roomtypeid'];
    echo '<br>';
    echo $rate = $_POST['rate'];
    echo $manurate = $_POST['manurate'];
    echo $packageid = $_POST['packageid'];
    echo $noofsenior = $_POST['noofsenior'];
    echo $blockecodeid = $_POST['blockecodeid'];
    echo $currencyid = $_POST['currencyid'];
    echo $eta = $_POST['eta'];
    echo $etd = $_POST['etd'];
    echo '<br>';
    echo $reservationtype = $_POST['reservationtype'];
    echo $cardnumber = $_POST['cardnumber'];
    echo $marketid = $_POST['marketid'];
    echo $cardtype = $_POST['cardtype'];
    echo $agentid = $_POST['agentid'];
    echo $originid = $_POST['originid'];
    echo $discount = $_POST['discount'];
    echo $paymenttypeid = $_POST['paymenttypeid'];
    echo $expdate = $_POST['expdate'];
    echo $optiondate = $_POST['optiondate'];
    echo $badult = $_POST['badult'];
    echo $bkids = $_POST['bkids'];
    echo $ladult = $_POST['ladult'];
    echo $lkids = $_POST['lkids'];
    echo $dadult = $_POST['dadult'];
    echo $dkids = $_POST['dkids'];
    echo $sourceid = $_POST['sourceid'];
    echo $folioid = $_POST['folioid'];
    echo $status = "Reserve";
    echo $remarks = "REMARKS";
    echo $roomstatus = "ROOM STATUS";
    echo $accompany = $_POST['folioid'];
    echo $otherdetails = "otherdetails";


    $query = "INSERT INTO hmsreservations (
    folioid, customerid, checkindate, checkoutdate, roomtypeid, roomnumber, noofnights, noofrooms, adults, kids, noofsenior,
    ratecodeid, roomstatus, rate, blockecodeid, companyid, groupid, currencyid, eta, etd, accompany, otherdetails,
    reservationtype, marketid, sourceid, agentid, originid, paymenttypeid, cardnumber, cardtype, expdate, 
    discount, optiondate, badult, bkids, ladult, lkids, dadult, dkids, status, remarks) VALUES (
    :folioid, :customerid, :checkindate, :checkoutdate, :roomtypeid, :roomnumber, :noofnights, :noofrooms, :adults, :kids, :noofsenior,
    :ratecodeid, :roomstatus, :rate, :blockecodeid, :companyid, :groupid, :currencyid, :eta, :etd, :accompany, :otherdetails,
    :reservationtype, :marketid, :sourceid, :agentid, :originid, :paymenttypeid, :cardnumber, :cardtype, :expdate, 
    :discount, :optiondate, :badult, :bkids, :ladult, :lkids, :dadult, :dkids, :status, :remarks)";


    $arr = [
        ":folioid" => $folioid,
        ":customerid" => $customerid,
        ":checkindate" => $checkindate,
        ":checkoutdate" => $checkoutdate,
        ":roomtypeid" => $roomtypeid,
        ":roomnumber" => $roomnumber,
        ":noofnights" => $noofnights,
        ":noofrooms" => $noofrooms,
        ":adults" => $adults,
        ":kids" => $kids,
        ":noofsenior" => $noofsenior,
        ":ratecodeid" => $ratecodeid,
        ":roomstatus" => $roomstatus,
        ":rate" => $rate,
        ":blockecodeid" => $blockecodeid,
        ":companyid" => $companyid,
        ":groupid" => $groupid,
        ":currencyid" => $currencyid,
        ":eta" => $eta,
        ":etd" => $etd,
        ":accompany" => $accompany,
        ":otherdetails" => $otherdetails,
        ":reservationtype" => $reservationtype,
        ":marketid" => $marketid,
        ":sourceid" => $sourceid,
        ":agentid" => $agentid,
        ":originid" => $originid,
        ":paymenttypeid" => $paymenttypeid,
        ":cardnumber" => $cardnumber,
        ":cardtype" => $cardtype,
        ":expdate" => $expdate,
        ":discount" => $discount,
        ":optiondate" => $optiondate,
        ":badult" => $badult,
        ":bkids" => $bkids,
        ":ladult" => $ladult,
        ":lkids" => $lkids,
        ":dadult" => $dadult,
        ":dkids" => $dkids,
        ":status" => $status,
        ":remarks" => $remarks,

    ];

    $path = "update-reservation.php";
    $app->register($query, $arr, $path);

}
?>

<?php
if (isset($_POST['update'])) {
    echo $reservationid = $_POST['reservationid'];
    echo $customerid = $_POST['customerid'];
    echo $lastname = $_POST['lastname'];
    echo $firstname = $_POST['firstname'];
    echo $middlename = $_POST['middlename'];
    echo $tittle = $_POST['tittle'];
    echo $number1 = $_POST['number1'];
    echo $number2 = $_POST['number2'];
    echo $email1 = $_POST['email1'];
    echo $address = $_POST['address'];
    echo $city = $_POST['city'];
    echo $province = $_POST['province'];
    echo $region = $_POST['region'];
    echo $nationality = $_POST['nationality'];
    echo $language = $_POST['language'];
    echo $vip = $_POST['vip'];
    echo $agentid = $_POST['agentid'];
    echo $companyid = $_POST['companyid'];
    echo $groupid = $_POST['groupid'];
    echo $passportid = $_POST['passportid'];
    echo $memberid = $_POST['memberid'];
    echo $seniorid = $_POST['seniorid'];
    echo $pwdid = $_POST['pwdid'];

    echo '<br>';
    echo $checkindate = $_POST['checkindate'];
    echo $checkoutdate = $_POST['checkoutdate'];
    echo $noofnights = $_POST['noofnights'];
    echo $noofrooms = $_POST['noofrooms'];
    echo $adults = $_POST['adults'];
    echo $kids = $_POST['kids'];
    echo $ratecodeid = $_POST['ratecodeid'];
    echo $roomnumber = $_POST['roomnumber'];
    echo $roomtypeid = $_POST['roomtypeid'];
    echo '<br>';
    echo $rate = $_POST['rate'];
    echo $manurate = $_POST['manurate'];
    echo $packageid = $_POST['packageid'];
    echo $noofsenior = $_POST['noofsenior'];
    echo $blockecodeid = $_POST['blockecodeid'];
    echo $currencyid = $_POST['currencyid'];
    echo $eta = $_POST['eta'];
    echo $etd = $_POST['etd'];
    echo '<br>';
    echo $reservationtype = $_POST['reservationtype'];
    echo $cardnumber = $_POST['cardnumber'];
    echo $marketid = $_POST['marketid'];
    echo $cardtype = $_POST['cardtype'];
    echo $agentid = $_POST['agentid'];
    echo $originid = $_POST['originid'];
    echo $discount = $_POST['discount'];
    echo $paymenttypeid = $_POST['paymenttypeid'];
    echo $expdate = $_POST['expdate'];
    echo $optiondate = $_POST['optiondate'];
    echo $badult = $_POST['badult'];
    echo $bkids = $_POST['bkids'];
    echo $ladult = $_POST['ladult'];
    echo $lkids = $_POST['lkids'];
    echo $dadult = $_POST['dadult'];
    echo $dkids = $_POST['dkids'];
    echo $sourceid = $_POST['sourceid'];
    echo $folioid = $_POST['folioid'];
    echo $status = "Reserve";
    echo $remarks = "REMARKS";
    echo $roomstatus = "ROOM STATUS";
    echo $accompany = $_POST['folioid'];
    echo $otherdetails = "otherdetails";

    $query = "UPDATE hmsreservations SET folioid=:folioid, 
customerid=:customerid,
checkindate=:checkindate,
checkoutdate=:checkoutdate,
roomtypeid=:roomtypeid,
roomnumber=:roomnumber,
noofnights=:noofnights,
noofrooms=:noofrooms,
adults=:adults,
kids=:kids,
noofsenior=:noofsenior,
ratecodeid=:ratecodeid,
roomstatus=:roomstatus,
rate=:rate,
blockecodeid=:blockecodeid,
companyid=:companyid,
groupid=:groupid,
currencyid=:currencyid,
eta=:eta,
etd=:etd,
accompany=:accompany,
otherdetails=:otherdetails,
reservationtype=:reservationtype,
marketid=:marketid,
sourceid=:sourceid,
agentid=:agentid,
originid=:originid,
paymenttypeid=:paymenttypeid,
cardnumber=:cardnumber,
cardtype=:cardtype,
expdate=:expdate,
discount=:discount,
optiondate=:optiondate,
badult=:badult,
bkids=:bkids,
ladult=:ladult,
lkids=:lkids,
dadult=:dadult,
dkids=:dkids,
status=:status,
remarks=:remarks WHERE reservationid=:reservationid";


    $arr = [
        ":reservationid" => $reservationid,
        ":folioid" => $folioid,
        ":customerid" => $customerid,
        ":checkindate" => $checkindate,
        ":checkoutdate" => $checkoutdate,
        ":roomtypeid" => $roomtypeid,
        ":roomnumber" => $roomnumber,
        ":noofnights" => $noofnights,
        ":noofrooms" => $noofrooms,
        ":adults" => $adults,
        ":kids" => $kids,
        ":noofsenior" => $noofsenior,
        ":ratecodeid" => $ratecodeid,
        ":roomstatus" => $roomstatus,
        ":rate" => $rate,
        ":blockecodeid" => $blockecodeid,
        ":companyid" => $companyid,
        ":groupid" => $groupid,
        ":currencyid" => $currencyid,
        ":eta" => $eta,
        ":etd" => $etd,
        ":accompany" => $accompany,
        ":otherdetails" => $otherdetails,
        ":reservationtype" => $reservationtype,
        ":marketid" => $marketid,
        ":sourceid" => $sourceid,
        ":agentid" => $agentid,
        ":originid" => $originid,
        ":paymenttypeid" => $paymenttypeid,
        ":cardnumber" => $cardnumber,
        ":cardtype" => $cardtype,
        ":expdate" => $expdate,
        ":discount" => $discount,
        ":optiondate" => $optiondate,
        ":badult" => $badult,
        ":bkids" => $bkids,
        ":ladult" => $ladult,
        ":lkids" => $lkids,
        ":dadult" => $dadult,
        ":dkids" => $dkids,
        ":status" => $status,
        ":remarks" => $remarks,

    ];

    $path = "update-guestreservationinfo2.php?reservationid=$reservationid";
    $app->update($query, $arr, $path);

}
?>