<?php require "../config/config.php"; ?>
<?php require "../libs/app.php"; ?>
<?php include "../layouts/url.php"; ?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<style>
    /* Ensure images fill their containers without empty space */
    .mySlides1,
    .mySlides2 {
        width: 100%;
        height: 100%;
        /* Make sure images fill the height of their parent */
        object-fit: cover;
        /* This will crop the image to fit, ensuring no empty space */
        display: none;
    }

    .mycontainer {
        width: 100%;
        overflow: hidden;
    }

    .mycontainerleft {
        width: 70%;
        float: left;
        /* background: green; */
        height: 750px;
        /* Changed back to height to ensure children have a definite height to inherit */
        border-right: 10px solid green;
        position: relative;
        overflow: hidden;
    }

    .mycontainerright {
        width: 30%;
        float: left;
        /* background: green; */
        height: 750px;
        /* Changed back to height */
        position: relative;
        overflow: hidden;
        padding-left: 10px;
    }

    .mycontainerright img {
        width: 99%;
        position: absolute;
        overflow: hidden;
    }

    .mycontainerbottom {
        width: 100%;
        float: left;
        /* background: red; */
        height: 167px;
        /* Changed max-height to height for consistency and reliable filling */
        overflow: hidden;
        border-top: 10px solid green;
        /* border-top: 10px solid transparent;
        border-image-source: linear-gradient(to right, #00e307, #f0ff03);
        border-image-slice: 1;
        border-image-width: 5px; */
    }

    /* Adjust w3-display-container to take full height of its parent */
    .w3-display-container {
        width: 100%;
        height: 100%;
    }

    /* Styles for the text slides to fit their container */
    .mySlides3.w3-container {
        display: none;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        box-sizing: border-box;
        padding: 10px;
    }

    .mySlides3 h1 {
        margin: 0;
        padding: 5px 0;
        font-size: 2vw;
        word-wrap: break-word;
        max-width: 95%;
    }

    /* Make sure all slides are hidden by default to prevent initial flicker */
    .mySlides1,
    .mySlides2,
    .mySlides3 {
        display: none;
    }
</style>

<body>

    <div class="mycontainer">
        <!-- Marketing Promos -->
        <div class="mycontainerleft">

            <div class="w3-display-container">
                <?php
                $currentdate = date("Y-m-d");
                $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='1'";
                $app = new App;
                $mktgdisplay1s = $app->selectAll($query);
                ?>
                <?php foreach ($mktgdisplay1s as $mktgdisplay1): ?>
                    <img class="mySlides1 w3-animate-left"
                        src="../img/mktg/landscape/<?php echo $mktgdisplay1->checkofficephoto ?>"
                        alt="<?php echo $mktgdisplay1->title ?>">
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Safety Poster -->
        <div class="mycontainerright">
            <div class="w3-display-container ">
                <?php
                $currentdate = date("Y-m-d");
                $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='2'";
                $app = new App;
                $mktgdisplay2s = $app->selectAll($query);
                ?>
                <?php foreach ($mktgdisplay2s as $mktgdisplay2): ?>
                    <img class="mySlides2 w3-animate-zoom"
                        src="../img/mktg/portrait/<?php echo $mktgdisplay2->checkofficephoto ?>"
                        alt="<?php echo $mktgdisplay2->title ?>">
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Anouncement -->
        <div class="mycontainerbottom">
            <div class="w3-content" style="max-width:100%; height: 100%;">
                <?php
                $currentdate = date("Y-m-d");
                $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='3'";
                $app = new App;
                $mktgdisplay3s = $app->selectAll($query);
                ?>
                <?php foreach ($mktgdisplay3s as $mktgdisplay3): ?>
                    <?php
                    $query = "SELECT * FROM mktgcategory WHERE id='$mktgdisplay3->categoryid'";
                    $app = new App;
                    $mktgcategory3s = $app->selectAll($query);
                    ?>
                    <?php foreach ($mktgcategory3s as $mktgcategory3): ?>

                        <div class="mySlides3 w3-container w3-<?php echo $mktgcategory3->color ?> w3-animate-opacity">
                            <h1><b><?php echo $mktgdisplay3->title ?></b></h1>
                            <h3><i><?php echo $mktgdisplay3->description ?></i></h3>

                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <script>
        var slideIndex = [1, 1, 1]; // One index for each slider: mySlides1, mySlides2, mySlides3
        var slideId = ["mySlides1", "mySlides2", "mySlides3"];

        carousel(); // Start the auto-slider immediately

        function showDivs(n, no) {
            var i;
            var x = document.getElementsByClassName(slideId[no]);
            if (n > x.length) {
                slideIndex[no] = 1
            }
            if (n < 1) {
                slideIndex[no] = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex[no] - 1].style.display = "block";
        }

        function carousel() {
            var i;
            var x;

            // Slider 1 (mySlides1)
            x = document.getElementsByClassName(slideId[0]);
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex[0]++;
            if (slideIndex[0] > x.length) {
                slideIndex[0] = 1
            }
            x[slideIndex[0] - 1].style.display = "block";

            // Slider 2 (mySlides2)
            x = document.getElementsByClassName(slideId[1]);
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex[1]++;
            if (slideIndex[1] > x.length) {
                slideIndex[1] = 1
            }
            x[slideIndex[1] - 1].style.display = "block";

            // Slider 3 (mySlides3)
            x = document.getElementsByClassName(slideId[2]);
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex[2]++;
            if (slideIndex[2] > x.length) {
                slideIndex[2] = 1
            }
            x[slideIndex[2] - 1].style.display = "block";

            setTimeout(carousel, 4000); // Changed to 5 seconds as per your new code (previously 3)
        }
    </script>

</body>

</html>