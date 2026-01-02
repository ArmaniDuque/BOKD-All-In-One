<?php //require "config/config.php"; ?>
<?php
class App
{

    public $host = HOST;
    public $dbname = DBNAME;
    public $user = USER;
    public $pass = PASSWORD;

    public $link;

    //create a construct

    public function __construct()
    {

        $this->connect();

    }
    //connect to database
    public function connect()
    {

        $this->link = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . "", $this->user, $this->pass);

        // if ($this->link) {
        //     echo "Database Cnnection is working";
        // }
    }

    //select all data
    public function selectAll($query)
    {

        $rows = $this->link->query($query);
        $rows->execute();
        $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

        if ($allRows) {
            return $allRows;
        } else {
            return false;
        }
    }
    //select one row
    public function selectOne($query)
    {

        $rows = $this->link->query($query);
        $rows->execute();
        $singleRow = $rows->fetch(PDO::FETCH_OBJ);

        if ($singleRow) {
            return $singleRow;
        } else {
            return false;
        }
    }



    public function validateCart($q)
    {

        $rows = $this->link->query($q);
        $rows->execute();
        $count = $rows->rowCount();
        return $count;

    }


    //insert
    public function insert($query, $arr, $path)
    {

        if ($this->validate($arr) == "empty") {
            echo "<script>alert('one or more inputs are empty')</script>";
        } else {
            $insert_recored = $this->link->prepare($query);
            $insert_recored->execute($arr);
            echo "<script type='text/javascript'>window.location.href = '$path';</script>";

        }
    }

    //update
    public function update($query, $arr, $path)
    {

        if ($this->validate($arr) == "empty") {
            echo "<script>alert('one or more inputs are empty')</script>";
        } else {
            $update_recored = $this->link->prepare($query);
            $update_recored->execute($arr);
            echo '<script>alert("Succesfully  Update")</script>';

            echo "<script type='text/javascript'>window.location.href = '$path';</script>";

        }
    }

    //detete
    public function delete($query, $path)
    {
        $detete_recored = $this->link->prepare($query);
        $detete_recored->execute();
        echo '<script>alert("Succesfully  Delete")</script>';

        echo "<script type='text/javascript'>window.location.href = '$path';</script>";

    }

    public function validate($arr)
    {
        if (in_array("", $arr)) {
            echo "empty";
        }
    }

    //register
    public function register($query, $arr, $path)
    {

        if ($this->validate($arr) == "empty") {
            echo "<script>alert('one or more inputs are empty')</script>";
        } else {
            $register_user = $this->link->prepare($query);
            $register_user->execute($arr);
            echo '<script>alert("Succesfully  Save")</script>';
            echo "<script type='text/javascript'>window.location.href = '$path';</script>";

            // header("location:".$path."");
        }
    }


    //login
    public function login($query, $data, $path)
    {

        //email
        $login_user = $this->link->query($query);
        $login_user->execute();
        $fetch = $login_user->fetch(PDO::FETCH_ASSOC);
        // $fetch = $login_user->fetch(PDO::FETCH_OBJ);

        if ($login_user->rowCount() > 0) {

            //password
            if (password_verify($data['userpassword'], $fetch['userpassword'])) {
                //start session variables
                // echo  "<script>alert('login successfull')</script>";

                echo $_SESSION['email'] = $fetch['email'];
                echo $_SESSION['userrole'] = $fetch['userrole'];
                echo $_SESSION['username'] = $fetch['username'];
                echo $_SESSION['userfullname'] = $fetch['userfullname'];
                echo $_SESSION['userdepartment'] = $fetch['userdepartment'];
                echo $_SESSION['userid'] = $fetch['userid'];

                //    echo "<script type='text/javasript'>window.location.href = '".$path."';</script>";
                //    echo "<script type='text/javascript'>window.location.href = '/auth/register.php';</script>";
                header("location:" . $path . "");
            }

        }
        // else {
        //     echo "<script type='text/javascript'>window.location.href = '".APPURL."/auth/register.php';</script>";

        // }
    }


    public function startSession()
    {

        session_start();
    }
    public function validateSession()
    {
        if (isset($_SESSION['userid'])) {
            echo "<script type='text/javascript'>window.location.href = '" . APPURL . "';</script>";

        }
    }
    public function validateSessionAdmin()
    {
        if (isset($_SESSION['userid'])) {
            // echo "<script type='text/javascript'>window.location.href = '" . APPURL . "index.php';</script>";
            echo "<script type='text/javascript'>window.location.href = '" . APPURL . "auth/login.php';</script>";

        }
    }

    public function validateSessionAdminInside()
    {
        if (!isset($_SESSION['userid'])) {
            echo "<script type='text/javascript'>window.location.href = '" . APPURL . "auth/login.php';</script>";
            // echo "<script type='text/javascript'>window.location.href = '" . APPURL . "';</script>";


        }
    }


}


// $obj = new App;

?>