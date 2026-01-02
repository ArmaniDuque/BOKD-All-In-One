<!DOCTYPE html>
<html lang="en">
<?php require "../../../config/config.php"; ?>
<?php require "../../../libs/app.php"; ?>
<?php include "../../../layouts/url.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel - Professional Promo Slideshow</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            width: 100%;
            overflow: hidden;
            background-color: #000;
        }

        /* 1. SLIDESHOW CONTAINER */
        #slideshow-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            /* Fade + Left-to-Right Transition */
            transition: opacity 2s ease-in-out, transform 2s ease-in-out;
            transform: translateX(20px);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slide.active {
            opacity: 1;
            transform: translateX(0);
        }

        /* 2. KEN BURNS EFFECT (Moving Forward) */
        /* This applies the zoom-in effect to the image inside the active slide */
        .slide.active .image-content {
            animation: kenBurnsForward 10s ease-in-out infinite alternate;
        }

        .image-content {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        @keyframes kenBurnsForward {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        /* 3. GOLDEN SPARKLE / BOKEH OVERLAY */
        #sparkle-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 5;
            pointer-events: none;
            mix-blend-mode: screen;
        }

        /* 4. OVERLAYS */
        .vignette {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            background: radial-gradient(circle, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.5) 100%);
            pointer-events: none;
        }

        /* 5. START BUTTON */
        #start-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #start-btn {
            padding: 25px 60px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            font-weight: 900;
            color: white;
            background: #c41e3a;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(196, 30, 58, 0.4);
        }
    </style>
</head>

<body>

    <div id="start-overlay">
        <button id="start-btn">START PROMO DISPLAY</button>
    </div>

    <div id="slideshow-container">
        <div class="slide active">
            <div class="image-content" style="background-image: url('../../../img/mktg/landscape/felizlaptopbg.jpg');">
            </div>
        </div>
        <?php
        $currentdate = date("Y-m-d");
        $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='1'";
        $app = new App;
        $mktgdisplay1s = $app->selectAll($query);
        ?>
        <?php foreach ($mktgdisplay1s as $mktgdisplay1): ?>

            <div class="slide">
                <div class="image-content"
                    style="background-image: url('../../../img/mktg/landscape/<?php echo $mktgdisplay1->checkofficephoto ?>');">
                </div>
            </div>
            <!-- <div class="slide">
                <div class="image-content" style="background-image: url('../imgpromo/2.jpg');"></div>
            </div>
            <div class="slide">
                <div class="image-content" style="background-image: url('../imgpromo/3.jpg');"></div>
            </div>
            <div class="slide">
                <div class="image-content" style="background-image: url('../imgpromo/1.jpg');"></div>
            </div> -->
        <?php endforeach; ?>
    </div>

    <canvas id="sparkle-canvas"></canvas>
    <div class="vignette"></div>

    <script>
        // --- SLIDESHOW LOGIC ---
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const slideInterval = 7000; // Change image every 7 seconds

        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }

        // --- GOLDEN SPARKLE ANIMATION ---
        const canvas = document.getElementById('sparkle-canvas');
        const ctx = canvas.getContext('2d');
        let particles = [];

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();

        class Sparkle {
            constructor() {
                this.init();
            }
            init() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 6 + 1;
                this.speedX = Math.random() * 0.4 - 0.2;
                this.speedY = Math.random() * -0.4 - 0.1;
                this.opacity = Math.random() * 0.6;
                this.fade = Math.random() * 0.005 + 0.002;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                this.opacity -= this.fade;
                if (this.opacity <= 0 || this.y < -10) this.init();
            }
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(255, 215, 0, ${this.opacity})`;
                ctx.fill();
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }

        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.display = 'none';
            for (let i = 0; i < 50; i++) particles.push(new Sparkle());
            animate();
            setInterval(nextSlide, slideInterval);
        });
    </script>
</body>

</html>