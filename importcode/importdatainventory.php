<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "montemardpo");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//Select database
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to mysqli: " . mysqli_connect_error();
}

error_reporting(0);

?>

<div id="registerpanel">
    List Of Data
</div>

<div id="upload">

    <?php if (isset($_POST["Import"]))


        $filename = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        $count = 0;
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $count++;

            if ($count > 1) {
                $x = $emapData[0];
                $alumni = mysqli_query($conn, "select * from datainventory WHERE datainventoryid='$x'") or die(mysqli_error());
                $alum = mysqli_fetch_array($alumni);
                $count1 = mysqli_num_rows($alumni);
                if ($count1 == '0') {
                    mysqli_query($conn, "INSERT INTO datainventory VALUES('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]')");
                    echo '<script>alert("Succesfully  Save")</script>';
                    // echo "<script type='text/javascript'>window.location.href = 'show-camera.php';</script>";
                }

            }


        }
        fclose($file);
        echo 'CSV File has been successfully Imported';
    } else {
    }
    ?>

    <form enctype="multipart/form-data" method="post">
        <div id="upload1">
            <label id="uploadtxt">File Upload</label>
            <input type="file" name="file" id="file" size="200" style="float:left;">
            <label id="uploadtxt">Note!!! Please Import CSV File only.</label>
        </div>
        <button type="submit" name="Import" id="uploadbtn" value="Import" style="float:left;">Upload</button>
    </form>
</div>


</div>