<?php require "../../../header.php"; ?>

<?php if (isset($_POST['submit'])) {
    $customerid = $_POST['customerid'];
    $sequenceid = $_POST['sequenceid'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $birthday = $_POST['birthday'];
    $companyid = $_POST['companyid'];
    $address = $_POST['address'];
    $tittle = $_POST['tittle'];
    $nickname = $_POST['nickname'];
    $religion = $_POST['religion'];
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $nationality = $_POST['nationality'];
    $status = $_POST['status'];
    $typeprofile = $_POST['typeprofile'];
    $viptype = $_POST['viptype'];
    $language = $_POST['language'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $region = $_POST['region'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $membersid = $_POST['membersid'];
    $seniorid = $_POST['seniorid'];
    $pwdid = $_POST['pwdid'];
    $passportid = $_POST['passportid'];
    $ismember = isset($_POST['membersid']) ? $_POST['membersid'] : 0;
    $issenior = isset($_POST['seniorid']) ? $_POST['seniorid'] : 0;
    $ispwd = isset($_POST['pwdid']) ? $_POST['pwdid'] : 0;

    // `id`, `customerid`, `sequenceid`, `firstname`, `lastname`, `middlename`, `birthday`, `companyid`, 
// `address`, `tittle`, `nickname`, `religion`, `number1`, `number2`, `email1`, `email2`, `nationality`,
//  `status`, `typeprofile`, `viptype`, `language`, `city`, `province`,
//  `region`, `country`, `gender`, `membersid`, `ismember`, `issenior`, 
//  `seniorid`, `ispwd`, `pwdid`, `passportid`

    $query = "UPDATE hmst_customerinfo SET firstname=:firstname, lastname=:lastname, middlename=:middlename, birthday=:birthday
    , companyid=:companyid, address=:address, tittle=:tittle, nickname=:nickname, religion=:religion, number1=:number1
    , number2=:number2, email1=:email1, email2=:email2, nationality=:nationality, status=:status, typeprofile=:typeprofile
    , viptype=:viptype, language=:language, city=:city, province=:province, region=:region, country=:country, gender=:gender
    , membersid=:membersid, ismember=:ismember, issenior=:issenior, seniorid=:seniorid, ispwd=:ispwd
    , pwdid=:pwdid, passportid=:passportid WHERE customerid='$customerid'";

    $arr = [

        ":lastname" => $lastname,
        ":firstname" => $firstname,
        ":middlename" => $middlename,
        ":birthday" => $birthday,
        ":companyid" => $companyid,
        ":address" => $address,
        ":tittle" => $tittle,
        ":nickname" => $nickname,
        ":religion" => $religion,
        ":number1" => $number1,
        ":number2" => $number2,
        ":email1" => $email1,
        ":email2" => $email2,
        ":nationality" => $nationality,
        ":status" => $status,
        ":typeprofile" => $typeprofile,
        ":viptype" => $viptype,
        ":language" => $language,
        ":city" => $city,
        ":province" => $province,
        ":region" => $region,
        ":country" => $country,
        ":gender" => $gender,
        ":membersid" => $membersid,
        ":ismember" => $ismember,
        ":issenior" => $issenior,
        ":seniorid" => $seniorid,
        ":ispwd" => $ispwd,
        ":pwdid" => $pwdid,
        ":passportid" => $passportid,

    ];

    $path = "update-profile.php?edit=$customerid";
    $app->update($query, $arr, $path);

    // $path = "update-profile.php?edit=$customerid";
    // $app->update($query, $arr, $path);

}
?>