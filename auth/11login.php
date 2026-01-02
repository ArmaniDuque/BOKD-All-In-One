<?php require "../config/config.php"; ?>
<?php require "../libs/app.php"; ?>
<?php include "../layouts/url.php"; ?>
<?php include "../head.php"; ?>

<?php

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $userpassword = $_POST['userpassword'];

    $query = "SELECT * FROM usermasterfile WHERE email='$email'";

    $data = [
        "email" => $email,
        "userpassword" => $userpassword,
    ];

    // $path = "$http/$ip/2023Design/cctvcomcen/users-panel/users-profile.php";
    // $app->login($query, $data, $path);

    $path = "$http/$ip/$project/admin-panel/";
    $app->login($query, $data, $path);

}

?>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="logout.php" class="h3">Montemar Beach Club</a>
            </div>
            <div class="card-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->
                <form method="POST" action="login.php">
                    <div class="input-group mb-3">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="userpassword" id="password" class="form-control"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>