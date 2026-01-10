<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Feliz Holiday Experience</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body,
        html {
            height: 100%;
            overflow: hidden;
            background: #000;
            perspective: 1000px;
        }

        /* Start Overlay */
        #start-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, #1a1a1a 0%, #000 100%);
            z-index: 2000;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            transition: opacity 0.8s ease;
        }

        #start-btn {
            padding: 22px 60px;
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: 3px;
            color: white;
            background: linear-gradient(45deg, #c41e3a, #ff4d4d);
            border: none;
            cursor: pointer;
            border-radius: 50px;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(196, 30, 58, 0.4);
        }

        #start-btn:hover {
            transform: scale(1.05) translateY(-5px);
            box-shadow: 0 15px 40px rgba(196, 30, 58, 0.6);
        }

        /* Parallax Background */
        .background-container {
            position: fixed;
            top: -5%;
            left: -5%;
            width: 110%;
            height: 110%;
            z-index: 0;
            transition: transform 0.1s ease-out;
        }

        .bg-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(35%) contrast(110%);
        }

        /* Floating Layers */
        #snow-canvas {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 2;
            pointer-events: none;
        }

        .content {
            position: relative;
            z-index: 10;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            pointer-events: none;
        }

        .company-logo {
            width: 1000px;
            margin-bottom: -40px;
            filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.2));
            transition: transform 0.1s ease-out;
        }

        /* Glowing Timer Effect */
        #timer {
            display: flex;
            gap: 50px;
        }

        .time-block span {
            display: block;
            font-size: 12rem;
            font-weight: 900;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            animation: pulse-glow 3s infinite ease-in-out;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
                transform: scale(1);
            }

            50% {
                text-shadow: 0 0 40px rgba(255, 255, 255, 0.7);
                transform: scale(1.02);
            }
        }

        .time-block p {
            font-size: 1rem;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: #ffd700;
        }

        /* NEW: BIG SCREEN FLASHING SECONDS */
        #big-seconds-wrap {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            /* Hidden by default */
        }

        #big-seconds-text {
            font-size: 50rem;
            font-weight: 900;
            color: #fff;
            text-shadow: 0 0 50px #ff0000, 0 0 100px #ffd700;
            animation: flash-red 1s infinite;
        }

        @keyframes flash-red {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.1);
                color: #ff4d4d;
            }
        }

        #celebration-text {
            font-size: 10rem;
            font-weight: 900;
            background: linear-gradient(to bottom, #fff 20%, #ffd700 80%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 40px rgba(255, 215, 0, 0.6));
        }

        .hidden {
            display: none;
        }

        .animate-pop {
            animation: popIn 1s cubic-bezier(0.17, 0.89, 0.32, 1.49) forwards;
        }

        @keyframes popIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .time-block span {
                font-size: 3.5rem;
            }

            #timer {
                gap: 15px;
            }

            .company-logo {
                width: 280px;
            }

            #big-seconds-text {
                font-size: 20rem;
            }
        }

        #sync-status {
            position: fixed;
            bottom: 10px;
            right: 10px;
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.3);
            z-index: 100;
        }
    </style>
</head>

<body>

    <div id="sync-status">Syncing with server...</div>

    <div id="big-seconds-wrap">
        <div id="big-seconds-text">60</div>
    </div>

    <div id="start-overlay">
        <button id="start-btn">BEGIN COUNTDOWN</button>
    </div>

    <audio id="bg-music" loop>
        <source src="nye.mp3" type="audio/mpeg">
    </audio>
    <audio id="fireworks-sound">
        <source src="Fireworks.mp3" type="audio/mpeg">
    </audio>


    <canvas id="snow-canvas"></canvas>

    <div class="background-container" id="bg-parallax">
        <img src="../bg.jpg" class="bg-media" alt="Background">
    </div>

    <div class="content">
        <img src="../FelizLogo.png" alt="Logo" class="company-logo" id="logo-parallax">

        <div id="countdown-wrap">
            <div id="timer">
                <div class="time-block"><span id="days">00</span>
                    <p>Days</p>
                </div>
                <div class="time-block"><span id="hours">00</span>
                    <p>Hours</p>
                </div>
                <div class="time-block"><span id="minutes">00</span>
                    <p>Mins</p>
                </div>
                <div class="time-block"><span id="seconds">00</span>
                    <p>Secs</p>
                </div>
            </div>
        </div>

        <h1 id="celebration-text" class="hidden">Merry Christmas!</h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        // 1. PARALLAX EFFECT
        document.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth / 2 - e.pageX) / 50;
            const y = (window.innerHeight / 2 - e.pageY) / 50;
            document.getElementById('bg-parallax').style.transform = `translate(${x}px, ${y}px)`;
            document.getElementById('logo-parallax').style.transform = `translate(${-x}px, ${-y}px)`;
        });

        // 2. SERVER TIME SYNC LOGIC
        let timeOffset = 0;
        const targetDate = new Date("Dec 25, 2027 00:00:00").getTime();

        async function syncWithServer() {
            try {
                const start = Date.now();
                const response = await fetch('time1.php');
                const data = await response.json();
                const end = Date.now();
                const latency = (end - start) / 2;
                const serverTimeAtArrival = data.serverTime + latency;
                timeOffset = serverTimeAtArrival - Date.now();
                document.getElementById('sync-status').innerText = "✓ Synced with Server (10.60.0.15)";
            } catch (err) {
                document.getElementById('sync-status').innerText = "⚠ Sync Failed. Using Local Clock.";
            }
        }

        syncWithServer();
        setInterval(syncWithServer, 300000);

        // 3. AUDIO & START
        const startBtn = document.getElementById('start-btn');
        startBtn.addEventListener('click', () => {
            document.getElementById('start-overlay').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('start-overlay').style.display = 'none';
                document.getElementById('bg-music').play();
            }, 800);
        });

        // 4. COUNTDOWN & FIREWORKS
        const countdownInterval = setInterval(() => {
            const now = Date.now() + timeOffset;
            const distance = targetDate - now;

            const d = Math.floor(distance / (1000 * 60 * 60 * 24));
            const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerText = d.toString().padStart(2, '0');
            document.getElementById("hours").innerText = h.toString().padStart(2, '0');
            document.getElementById("minutes").innerText = m.toString().padStart(2, '0');
            document.getElementById("seconds").innerText = s.toString().padStart(2, '0');

            // TRIGGER BIG SECONDS FLASH (FINAL 60 SECONDS)
            const bigSecsWrap = document.getElementById('big-seconds-wrap');
            const bigSecsText = document.getElementById('big-seconds-text');

            if (distance > 0 && distance <= 60000) {
                bigSecsWrap.style.display = 'flex';
                bigSecsText.innerText = s.toString();
                // Hide normal logo and countdown to focus on big numbers
                document.getElementById('countdown-wrap').style.opacity = '0';
                document.getElementById('logo-parallax').style.opacity = '0.2';
            } else {
                bigSecsWrap.style.display = 'none';
            }

            if (distance < 0) {
                clearInterval(countdownInterval);
                bigSecsWrap.style.display = 'none'; // Hide big seconds
                document.getElementById("countdown-wrap").classList.add("hidden");
                const celeb = document.getElementById("celebration-text");
                celeb.classList.remove("hidden");
                celeb.classList.add("animate-pop");
                document.getElementById('logo-parallax').style.opacity = '1';

                document.getElementById('bg-music').pause();
                document.getElementById('fireworks-sound').play();

                const end = Date.now() + (15 * 1000);
                (function frame() {
                    confetti({
                        particleCount: 3,
                        angle: 60,
                        spread: 55,
                        origin: {
                            x: 0
                        },
                        colors: ['#ffd700', '#ffffff', '#ff0000']
                    });
                    confetti({
                        particleCount: 3,
                        angle: 120,
                        spread: 55,
                        origin: {
                            x: 1
                        },
                        colors: ['#ffd700', '#ffffff', '#ff0000']
                    });
                    if (Date.now() < end) requestAnimationFrame(frame);
                }());
            }
        }, 100);

        // 5. ADVANCED SNOW
        const canvas = document.getElementById('snow-canvas');
        const ctx = canvas.getContext('2d');
        let particles = [];

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();
        class Particle {
            constructor() {
                this.reset();
            }
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 2 + 1;
                this.speed = Math.random() * 0.8 + 0.2;
                this.wind = Math.random() * 0.5 - 0.25;
                this.opacity = Math.random() * 0.5 + 0.3;
            }
            update() {
                this.y += this.speed;
                this.x += this.wind;
                if (this.y > canvas.height) this.y = -10;
            }
            draw() {
                ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }
        for (let i = 0; i < 150; i++) particles.push(new Particle());

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }
        animate();
    </script>
</body>

</html>