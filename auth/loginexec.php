<?php

//     <!-- Accounting System Login -->
if (isset($_POST['submitlogin-acctg'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM usermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/acctg-panel/";
    $app->login($query, $data, $path);
}

// <!-- Payroll System Login -->
if (isset($_POST['submitlogin-payroll'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM usermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/payroll-panel/";
    $app->login($query, $data, $path);
}


// <!-- Time Keeping System Login -->
if (isset($_POST['submitlogin-timekeeping'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM usermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/timekeeping-panel/";
    $app->login($query, $data, $path);
}


// <!-- Hotel Management System Login -->
if (isset($_POST['submitlogin-hms'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM hmsusermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/hms-panel/";
    $app->login($query, $data, $path);
}


// <!-- Point of Sale System Login -->
if (isset($_POST['submitlogin-pos'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM posusermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/pos-panel/";
    $app->login($query, $data, $path);
}


// <!-- Inventory Management System Login -->
if (isset($_POST['submitlogin-inv'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM itusermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/inv-panel/";
    $app->login($query, $data, $path);
}


// <!-- Asset Management System Login -->
if (isset($_POST['submitlogin-asset'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM assetusermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/asset-panel/assetlist/index.php";
    $app->login($query, $data, $path);
}


// <!-- IT Management System Login -->
if (isset($_POST['submitlogin-it'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM itusermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/it-panel/";
    $app->login($query, $data, $path);
}


// <!-- Data PrivacySystem Login -->
if (isset($_POST['submitlogin-dpo'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM dpousermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/dpo-panel/";
    $app->login($query, $data, $path);
}
// <!--MarketingSystem Login -->
if (isset($_POST['submitlogin-marketing'])) {
    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];
    $query = "SELECT * FROM hmsusermasterfile WHERE email='$email'";
    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];
    $path = "$http/$ip/$project/marketing-panel/";
    $app->login($query, $data, $path);
}




?>