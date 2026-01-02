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

        .master-container {
            display: grid;
            grid-template-columns: 65% 35%;
            grid-template-rows: 82% 18%;
            height: 100vh;
            width: 100vw;
            gap: 0;
            padding: 0;
        }

        .section-box {
            position: relative;
            overflow: hidden;
            background: #111;
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

        .slide-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            display: none;
        }

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
            /* font-family: 'Great Vibes', cursive; */
            font-family: 'Montserrat', sans-serif;
            font-size: 2vw;
            margin: 0;
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

        .active {
            display: block !important;
        }

        .active-flex {
            display: flex !important;
        }

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
            $app = new App;
            $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='1'";
            $mktgdisplay1s = $app->selectAll($query);
            foreach ($mktgdisplay1s as $mktgdisplay1):
                $file = $mktgdisplay1->checkofficephoto;
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                ?>
                <?php if ($ext == 'mp4' || $ext == 'webm'): ?>
                    <video class="mySlides1 slide-media" muted playsinline>
                        <source src="../img/mktg/landscape/<?php echo $file; ?>" type="video/mp4">
                    </video>
                <?php else: ?>
                    <img class="mySlides1 slide-media w3-animate-opacity" src="../img/mktg/landscape/<?php echo $file ?>"
                        alt="Promo">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="section-box section-right">
            <div class="vignette"></div>
            <?php
            $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='2'";
            $mktgdisplay2s = $app->selectAll($query);
            foreach ($mktgdisplay2s as $mktgdisplay2):
                $file = $mktgdisplay2->checkofficephoto;
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                ?>
                <?php if ($ext == 'mp4' || $ext == 'webm'): ?>
                    <video class="mySlides2 slide-media" muted playsinline>
                        <source src="../img/mktg/portrait/<?php echo $file; ?>" type="video/mp4">
                    </video>
                <?php else: ?>
                    <img class="mySlides2 slide-media w3-animate-fading" src="../img/mktg/portrait/<?php echo $file ?>"
                        alt="Safety">
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="section-box section-bottom">
            <?php
            $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='3'";
            $mktgdisplay3s = $app->selectAll($query);
            foreach ($mktgdisplay3s as $mktgdisplay3): ?>
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
        var defaultTimings = [8000, 11000, 7000]; // Default for images

        function runSlider(n) {
            var i;
            var x = document.getElementsByClassName(slideGroups[n]);
            if (x.length === 0) return;

            // Cleanup current active
            for (i = 0; i < x.length; i++) {
                x[i].classList.remove("active");
                x[i].classList.remove("active-flex");
                if (x[i].tagName === "VIDEO") {
                    x[i].pause();
                    x[i].onended = null; // Clear previous listeners
                }
            }

            slideIndices[n]++;
            if (slideIndices[n] > x.length) {
                slideIndices[n] = 1;
            }

            var currentElement = x[slideIndices[n] - 1];

            if (n === 2) {
                currentElement.classList.add("active-flex");
                // Text slides always use fixed timing
                setTimeout(function () {
                    runSlider(n);
                }, defaultTimings[n]);
            } else {
                currentElement.classList.add("active");

                if (currentElement.tagName === "VIDEO") {
                    currentElement.currentTime = 0;
                    currentElement.play();

                    // Logic: Wait for video to finish
                    currentElement.onended = function () {
                        runSlider(n);
                    };
                } else {
                    // Logic: If it's an image, use default timing
                    setTimeout(function () {
                        runSlider(n);
                    }, defaultTimings[n]);
                }
            }
        }

        window.onload = function () {
            runSlider(0);
            runSlider(1);
            runSlider(2);
        };
    </script>

</body>

</html>