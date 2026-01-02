<?php require "../config/config.php"; ?>
<?php require "../libs/app.php"; ?>
<?php include "../layouts/url.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel Luxury Display</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <style>
        :root {
            --feliz-gold: #ffd700;
            --feliz-bg: #000;
        }

        body,
        html {
            height: 100%;
            width: 100%;
            background-color: var(--feliz-bg);
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Montserrat', sans-serif;
        }

        /* 0 PADDING SEAMLESS GRID */
        .master-container {
            display: grid;
            grid-template-columns: 65% 35%;
            grid-template-rows: 82% 18%;
            height: 100vh;
            width: 100vw;
            /* No gap, no padding for edge-to-edge look */
            gap: 0;
            padding: 0;
        }

        /* CONTAINER STYLING */
        .section-box {
            position: relative;
            overflow: hidden;
            background: #111;
            /* Subtle internal separator instead of heavy borders */
            outline: 1px solid rgba(255, 255, 255, 0.1);
        }

        .section-left {
            grid-row: 1;
            grid-column: 1;
        }

        .section-right {
            grid-row: 1 / span 2;
            grid-column: 2;
        }

        .section-bottom {
            grid-row: 2;
            grid-column: 1;
            background: linear-gradient(to right, #000, #1a1a1a);
        }

        /* CINEMATIC KEN BURNS (ZOOM IN) */
        .ken-burns {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            display: none;
            /* Focus on a slow, elegant forward zoom */
            /* animation: luxury-zoom 15s ease-in-out infinite alternate; */
        }

        @keyframes luxury-zoom {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        /* ELEGANT ANNOUNCEMENT STYLING */
        .announcement-slide {
            width: 100%;
            height: 100%;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 10px;
            color: white;
        }

        .announcement-slide h1 {
            font-family: 'Great Vibes', cursive;
            font-size: 2vw;
            margin: 0;
            /* color: var(--feliz-gold); */
            color: #e1b952;

            letter-spacing: 2px;
        }

        .announcement-slide h3 {
            font-size: 1vw;
            font-weight: 300;
            margin-top: -5px;
            text-transform: uppercase;
            letter-spacing: 4px;
            opacity: 0.8;
        }

        /* TRANSITIONS */
        .active {
            display: block !important;
        }

        .active-flex {
            display: flex !important;
        }

        /* VIGNETTE EFFECT for high-end look */
        .vignette {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.5);
            pointer-events: none;
            z-index: 5;
        }
    </style>
</head>

<body>

    <div class="master-container">

        <div class="section-box section-left">
            <div class="vignette"></div>
            <?php
            $currentdate = date("Y-m-d");
            $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='1'";
            $app = new App;
            $mktgdisplay1s = $app->selectAll($query);
            foreach ($mktgdisplay1s as $mktgdisplay1): ?>
                <img class="mySlides1 ken-burns w3-animate-opacity"
                    src="../img/mktg/landscape/<?php echo $mktgdisplay1->checkofficephoto ?>" alt="Promo">
            <?php endforeach; ?>
        </div>

        <div class="section-box section-right">
            <div class="vignette"></div>
            <?php
            $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='2'";
            $mktgdisplay2s = $app->selectAll($query);
            foreach ($mktgdisplay2s as $mktgdisplay2): ?>
                <img class="mySlides2 ken-burns w3-animate-fading"
                    src="../img/mktg/portrait/<?php echo $mktgdisplay2->checkofficephoto ?>" alt="Safety">
            <?php endforeach; ?>
        </div>

        <div class="section-box section-bottom">
            <?php
            $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='3'";
            $mktgdisplay3s = $app->selectAll($query);
            foreach ($mktgdisplay3s as $mktgdisplay3):
                ?>
                <div class="mySlides3 announcement-slide w3-animate-bottom">
                    <h1><?php echo $mktgdisplay3->title ?></h1>
                    <h3><?php echo $mktgdisplay3->description ?></h3>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <script>
        var slideIndices = [0, 0, 0];
        var slideGroups = ["mySlides1", "mySlides2", "mySlides3"];
        // Staggered timings for a more dynamic feel
        var timings = [8000, 11000, 7000];

        function runSlider(n) {
            var i;
            var x = document.getElementsByClassName(slideGroups[n]);
            if (x.length === 0) return;

            for (i = 0; i < x.length; i++) {
                x[i].classList.remove("active");
                x[i].classList.remove("active-flex");
            }

            slideIndices[n]++;
            if (slideIndices[n] > x.length) {
                slideIndices[n] = 1;
            }

            if (n === 2) {
                x[slideIndices[n] - 1].classList.add("active-flex");
            } else {
                x[slideIndices[n] - 1].classList.add("active");
            }

            setTimeout(function () {
                runSlider(n);
            }, timings[n]);
        }

        window.onload = function () {
            runSlider(0);
            runSlider(1);
            runSlider(2);
        };
    </script>

</body>

</html>