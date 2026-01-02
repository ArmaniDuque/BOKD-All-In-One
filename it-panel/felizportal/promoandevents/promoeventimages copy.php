<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel - Cinematic Promo Display</title>
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
        #slideshow {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 2s ease-in-out;
            /* Smooth Fade Transition */
            background-size: cover;
            background-position: center;
            /* The Ken Burns slow zoom effect */
            animation: kenburns 12s infinite alternate;
        }

        .slide.active {
            opacity: 1;
        }

        @keyframes kenburns {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.15) translate(10px, 10px);
            }
        }

        /* 2. BOKEH / SPARKLE OVERLAY */
        #sparkle-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 5;
            pointer-events: none;
            /* Adds a soft high-end glow to the whole screen */
            mix-blend-mode: screen;
        }

        /* 3. VIGNETTE (Dark edges to focus the eye) */
        .vignette {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            background: radial-gradient(circle, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.6) 100%);
            pointer-events: none;
        }

        /* 4. START OVERLAY */
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
            font-family: sans-serif;
            font-size: 1.5rem;
            font-weight: bold;
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
        <button id="start-btn">START PROMO SLIDESHOW</button>
    </div>

    <div id="slideshow">
        <div class="slide active" style="background-image: url('../imgpromo/1.jpg');"></div>
        <div class="slide" style="background-image: url('../imgpromo/2jpg');"></div>
        <div class="slide" style="background-image: url('../imgpromo/3.jpg');"></div>
        <div class="slide" style="background-image: url('../imgpromo/1.jpg');"></div>
    </div>

    <canvas id="sparkle-canvas"></canvas>
    <div class="vignette"></div>

    <script>
        // --- SLIDESHOW LOGIC ---
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const slideInterval = 1000; // Change image every 8 seconds

        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }

        // --- BOKEH / SPARKLE ANIMATION ---
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
                this.size = Math.random() * 8 + 2; // Soft blurred circles
                this.speedX = Math.random() * 0.5 - 0.25;
                this.speedY = Math.random() * -0.5 - 0.1; // Float upwards
                this.opacity = Math.random() * 0.5;
                this.fadeSpeed = Math.random() * 0.005 + 0.002;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                this.opacity -= this.fadeSpeed;

                if (this.opacity <= 0 || this.y < -10) {
                    this.init();
                    this.y = canvas.height + 10;
                }
            }
            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                // Golden/Warm White light
                ctx.fillStyle = `rgba(255, 230, 180, ${this.opacity})`;
                ctx.shadowBlur = 15;
                ctx.shadowColor = "white";
                ctx.fill();
            }
        }

        function setupParticles() {
            for (let i = 0; i < 40; i++) {
                particles.push(new Sparkle());
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

        // START BUTTON TRIGGER
        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.display = 'none';
            setupParticles();
            animate();
            setInterval(nextSlide, slideInterval);
        });
    </script>
</body>

</html>