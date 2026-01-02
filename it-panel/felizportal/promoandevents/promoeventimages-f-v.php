<!DOCTYPE html>
<html lang="en">
<?php require "../../../config/config.php"; ?>
<?php require "../../../libs/app.php"; ?>
<?php include "../../../layouts/url.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel - Cinematic Promo Display</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet">
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
            font-family: 'Montserrat', sans-serif;
        }

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
            transition: opacity 2s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000;
        }

        .slide.active {
            opacity: 1;
            z-index: 2;
        }

        .image-content {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        /* Ken Burns Effect for active image slides */
        .slide.active[data-type="image"] .image-content {
            animation: kenBurnsForward 15s ease-in-out forwards;
        }

        @keyframes kenBurnsForward {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .fixed-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 85px;
            background: rgb(0 0 0 / 40%);
            backdrop-filter: blur(15px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 20;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 60px;
            color: white;
        }

        .footer-logo {
            height: 180px;
            margin-top: -85px;
            animation: logo-glow 3s infinite ease-in-out;
        }

        @keyframes logo-glow {

            0%,
            100% {
                filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.3));
                transform: scale(1);
            }

            50% {
                filter: drop-shadow(0 0 30px rgba(255, 255, 255, 0.7));
                transform: scale(1.05);
            }
        }

        .footer-right {
            display: flex;
            gap: 40px;
            text-align: right;
        }

        .contact-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            color: #ffd700;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .contact-value {
            font-size: 1.1rem;
            font-weight: 400;
        }

        #sparkle-canvas {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 5;
            pointer-events: none;
            mix-blend-mode: screen;
        }

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
            font-size: 1.5rem;
            font-weight: 900;
            color: white;
            background: #c41e3a;
            border: none;
            border-radius: 50px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div id="start-overlay">
        <button id="start-btn">START EXPERIENCE</button>
    </div>

    <div id="slideshow-container">
        <div class="slide active" data-type="image" data-duration="8000">
            <div class="image-content" style="background-image: url('../../../img/mktg/landscape/felizlaptopbg.jpg');">
            </div>
        </div>

        <?php
        $currentdate = date("Y-m-d");
        $query = "SELECT * FROM mktgdisplay WHERE enddate>='$currentdate' AND startdate <= '$currentdate' AND slidecategory='1'";
        $app = new App;
        $mktgdisplay1s = $app->selectAll($query);

        foreach ($mktgdisplay1s as $mktgdisplay1):
            $file = $mktgdisplay1->checkofficephoto;
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            ?>
            <?php if (strtolower($ext) === 'mp4'): ?>
                <div class="slide" data-type="video">
                    <video muted playsinline>
                        <source src="../../../img/mktg/landscape/<?php echo $file; ?>" type="video/mp4">
                    </video>
                </div>
            <?php else: ?>
                <div class="slide" data-type="image" data-duration="8000">
                    <div class="image-content"
                        style="background-image: url('../../../img/mktg/landscape/<?php echo $file; ?>');"></div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <footer class="fixed-footer">
        <div class="footer-left">
            <img src="../FelizLogo.png" alt="Feliz Hotel Logo" class="footer-logo">
        </div>
        <div class="footer-right">
            <div class="contact-item">
                <span class="contact-label">Reservations</span>
                <span class="contact-value">+63 (36) 288 3424 / 0995-026-5428</span>
            </div>
            <div class="contact-item">
                <span class="contact-label">Website</span>
                <span class="contact-value">www.felizhotelboracay.com</span>
            </div>
            <div class="contact-item">
                <span class="contact-label">Email</span>
                <span class="contact-value">info@felizhotelboracay.com</span>
            </div>
        </div>
    </footer>

    <canvas id="sparkle-canvas"></canvas>
    <div class="vignette"></div>

    <script>
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;
        let slideTimeout;

        function playNext() {
            slides[currentSlide].classList.remove('active');

            // If the current slide was a video, stop it
            const currentVideo = slides[currentSlide].querySelector('video');
            if (currentVideo) currentVideo.pause();

            currentSlide = (currentSlide + 1) % slides.length;
            const nextItem = slides[currentSlide];
            nextItem.classList.add('active');

            if (nextItem.getAttribute('data-type') === 'video') {
                const video = nextItem.querySelector('video');
                video.currentTime = 0;
                video.play();
                video.onended = () => playNext();
            } else {
                const duration = parseInt(nextItem.getAttribute('data-duration')) || 8000;
                slideTimeout = setTimeout(playNext, duration);
            }
        }

        // --- Sparkle Animation ---
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
                this.size = Math.random() * 5 + 1;
                this.speedY = Math.random() * -0.3 - 0.1;
                this.opacity = Math.random() * 0.5;
                this.fade = Math.random() * 0.005 + 0.001;
            }
            update() {
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
            for (let i = 0; i < 40; i++) particles.push(new Sparkle());
            animate();

            // Handle first slide
            const first = slides[0];
            if (first.getAttribute('data-type') === 'video') {
                const v = first.querySelector('video');
                v.play();
                v.onended = () => playNext();
            } else {
                setTimeout(playNext, 7000);
            }
        });
    </script>
</body>

</html>