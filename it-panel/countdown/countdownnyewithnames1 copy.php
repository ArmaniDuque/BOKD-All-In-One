<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Holiday Countdown & Raffle</title>
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
            transition: 0.3s;
        }

        /* Background Layers */
        .background-container {
            position: fixed;
            top: -5%;
            left: -5%;
            width: 110%;
            height: 110%;
            z-index: -2;
        }

        .bg-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(35%) contrast(110%);
        }

        #snow-canvas {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            pointer-events: none;
        }

        /* UI Elements */
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
        }

        .company-logo {
            width: 800px;
            max-width: 90vw;
            margin-bottom: 20px;
            transition: all 1s ease;
        }

        /* Names & Timer */
        .thank-you-container {
            margin-bottom: 30px;
            transition: opacity 0.5s ease;
        }

        #fixed-thanks {
            font-size: 2.2rem;
            font-weight: 400;
            color: #ffffff;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }

        #family-names {
            font-size: 6.5rem;
            font-weight: 800;
            color: #ffd700;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
            transition: opacity 0.5s ease;
        }

        #timer {
            display: flex;
            gap: 40px;
        }

        .time-block span {
            display: block;
            font-size: 10rem;
            font-weight: 900;
        }

        .time-block p {
            font-size: 2.2rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: #ffd700;
        }

        /* Raffle UI */
        #raffle-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 100;
            padding: 15px 30px;
            background: #ffd700;
            color: #000;
            font-weight: 900;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        #raffle-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.98);
            z-index: 3000;
            display: none;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
        }

        .winner-display {
            font-size: 6rem;
            font-weight: 900;
            color: #ffd700;
            text-shadow: 0 0 30px #ffd700;
            margin: 40px 0;
        }

        /* Last Minute (60s) Styles */
        .last-minute .time-block:not(.seconds-block) {
            display: none;
        }

        .last-minute .thank-you-container,
        .last-minute #raffle-btn {
            display: none !important;
            opacity: 0 !important;
        }

        .last-minute .company-logo {
            position: absolute;
            width: 100vw;
            opacity: 0.15;
            z-index: -1;
            animation: logo-flash 1s infinite alternate;
        }

        .last-minute .seconds-block span {
            font-size: 35vw;
            animation: pulse-glow 1s infinite alternate;
        }

        /* Celebration Styles */
        #celebration-text {
            font-size: 10rem;
            font-weight: 900;
            background: linear-gradient(to bottom, #fff, #ffd700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }

        .celebrating #family-names {
            font-size: 10rem;
            line-height: 1;
            animation: text-flash 1s infinite alternate;
        }

        @keyframes logo-flash {
            0% {
                opacity: 0.1;
            }

            100% {
                opacity: 0.25;
            }
        }

        @keyframes text-flash {
            0% {
                text-shadow: 0 0 20px #ffd700;
                opacity: 0.7;
            }

            100% {
                text-shadow: 0 0 60px #ffd700, 0 0 100px #ffffff;
                opacity: 1;
            }
        }

        @keyframes pulse-glow {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.05);
            }
        }

        .hidden {
            display: none;
        }

        #sync-overlay {
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 5px 15px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 20px;
            font-size: 0.7rem;
            color: #0f0;
            z-index: 100;
            font-family: monospace;
        }
    </style>
</head>

<body>
    <div id="sync-overlay">Syncing with Server...</div>

    <div id="start-overlay">
        <button id="start-btn">START EXPERIENCE</button>
    </div>

    <button id="raffle-btn" onclick="openRaffle()">DRAW RAFFLE 🎁</button>

    <div id="raffle-modal">
        <h2 style="letter-spacing: 10px; opacity: 0.8;">PICKING A WINNER</h2>
        <div id="winner-name" class="winner-display">...</div>
        <button onclick="closeRaffle()"
            style="background: none; border: 1px solid white; color: white; padding: 10px 30px; cursor: pointer; border-radius: 5px;">CLOSE</button>
    </div>

    <audio id="bg-music" loop>
        <source src="christmas.mp3" type="audio/mpeg">
    </audio>
    <audio id="fireworks-sound">
        <source src="Fireworks.mp3" type="audio/mpeg">
    </audio>
    <canvas id="snow-canvas"></canvas>

    <div class="background-container"><img src="bg.jpg" class="bg-media"></div>

    <div class="content" id="main-content">
        <img src="FelizLogo.png" alt="Logo" class="company-logo" id="logo-parallax">

        <div class="thank-you-container" id="names-box">
            <div id="fixed-thanks">Thank you for joining us !!</div>
            <div id="family-names">Feliz Hotel Family</div>
        </div>

        <div id="countdown-wrap">
            <div id="timer">
                <div class="time-block">
                    <span id="days">00</span>
                    <p>Days</p>
                </div>
                <div class="time-block">
                    <span id="hours">00</span>
                    <p>Hours</p>
                </div>
                <div class="time-block">
                    <span id="minutes">00</span>
                    <p>Mins</p>
                </div>
                <div class="time-block seconds-block">
                    <span id="seconds">00</span>
                    <p>Secs</p>
                </div>
            </div>
        </div>
        <h1 id="celebration-text" class="hidden">Happy New Year!</h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        const SHEET_CSV_URL =
            "https://docs.google.com/spreadsheets/d/e/2PACX-1vTlK_3vTjh5mF1aInYXdzzPxQWLgRD7Mw9F87VH6jkf-TTU5pqFyk9mqhHR5pQyDhBCaa2rZpfIadr5/pub?gid=0&single=true&output=csv";
        const APPS_SCRIPT_URL = "YOUR_APPS_SCRIPT_URL_HERE";
        const targetDate = new Date("Jan 1, 2026 00:00:00").getTime();
        const SERVER_IP = "time.php";

        let families = ["Feliz Hotel Family"];
        let isLastMinute = false;
        let familyIndex = 0;
        let serverTimeOffset = 0;

        async function syncTimeWithServer() {
            const syncOverlay = document.getElementById('sync-overlay');
            try {
                const start = performance.now();
                const response = await fetch(SERVER_IP);
                const data = await response.json();
                const end = performance.now();
                const latency = (end - start) / 2;
                const actualServerTime = new Date(data.datetime).getTime() + latency;
                serverTimeOffset = actualServerTime - Date.now();
                syncOverlay.innerText = "✓ SYNCED WITH SERVER";
                syncOverlay.style.color = "#0f0";
            } catch (e) {
                syncOverlay.innerText = "⚠ SYNC FAILED: USING LOCAL PC TIME";
                syncOverlay.style.color = "#f00";
            }
        }
        syncTimeWithServer();
        setInterval(syncTimeWithServer, 600000);

        async function fetchNames() {
            try {
                const res = await fetch(SHEET_CSV_URL);
                const text = await res.text();
                const rows = text.split("\n").map(r => r.trim()).filter(r => r !== "" && r !== "Name");
                if (rows.length > 0) families = rows;
            } catch (e) {
                console.log("Fetch error", e);
            }
        }

        function openRaffle() {
            document.getElementById('raffle-modal').style.display = 'flex';
            let shuffleCount = 0;
            const shuffle = setInterval(() => {
                document.getElementById('winner-name').innerText = families[Math.floor(Math.random() * families
                    .length)];
                if (++shuffleCount > 30) {
                    clearInterval(shuffle);
                    const winner = families[Math.floor(Math.random() * families.length)];
                    document.getElementById('winner-name').innerText = winner.toUpperCase();
                    confetti({
                        particleCount: 200,
                        spread: 90,
                        origin: {
                            y: 0.6
                        },
                        colors: ['#ffd700', '#ffffff']
                    });
                }
            }, 100);
        }

        function closeRaffle() {
            document.getElementById('raffle-modal').style.display = 'none';
        }

        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.display = 'none';
            document.getElementById('bg-music').play();
            fetchNames();
            setInterval(fetchNames, 300000);
            // AUTO-SCHEDULE SWITCHING LOGIC REMOVED
        });

        // NAME ROTATION
        setInterval(() => {
            const el = document.getElementById("family-names");
            el.style.opacity = 0;
            setTimeout(() => {
                familyIndex = (familyIndex + 1) % families.length;
                el.innerText = families[familyIndex];
                el.style.opacity = 1;
            }, 500);
        }, 3000);

        // COUNTDOWN
        setInterval(() => {
            const now = Date.now() + serverTimeOffset;
            const distance = targetDate - now;

            const d = Math.floor(distance / 86400000);
            const h = Math.floor((distance % 86400000) / 3600000);
            const m = Math.floor((distance % 3600000) / 60000);
            const s = Math.floor((distance % 60000) / 1000);

            if (distance > 0 && distance < 60000) {
                isLastMinute = true;
                document.body.classList.add('last-minute');
            } else {
                isLastMinute = false;
                document.body.classList.remove('last-minute');
            }

            document.getElementById("days").innerText = String(d).padStart(2, '0');
            document.getElementById("hours").innerText = String(h).padStart(2, '0');
            document.getElementById("minutes").innerText = String(m).padStart(2, '0');
            document.getElementById("seconds").innerText = String(s).padStart(2, '0');

            if (distance < 0 && !document.body.classList.contains('celebrating')) {
                document.body.classList.add('celebrating');
                document.getElementById("countdown-wrap").classList.add("hidden");
                document.getElementById("logo-parallax").classList.add("hidden");
                document.getElementById("celebration-text").classList.remove("hidden");
                document.getElementById("names-box").style.opacity = '1';
                document.getElementById('bg-music').pause();
                document.getElementById('fireworks-sound').play();

                const end = Date.now() + 20000;
                const fireworks = setInterval(() => {
                    if (Date.now() > end) clearInterval(fireworks);
                    confetti({
                        particleCount: 80,
                        spread: 360,
                        origin: {
                            x: Math.random(),
                            y: Math.random() - 0.2
                        },
                        zIndex: -1
                    });
                }, 400);
            }
        }, 100);

        // SNOW ANIMATION
        const canvas = document.getElementById('snow-canvas');
        const ctx = canvas.getContext('2d');
        let parts = [];

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();
        class P {
            constructor() {
                this.reset();
            }
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.s = Math.random() * 2 + 1;
                this.v = Math.random() * 0.5 + 0.2;
            }
            up() {
                this.y += this.v;
                if (this.y > canvas.height) this.y = -10;
            }
            dr() {
                ctx.fillStyle = 'rgba(255,255,255,0.5)';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.s, 0, 6.28);
                ctx.fill();
            }
        }
        for (let i = 0; i < 100; i++) parts.push(new P());

        function anim() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            parts.forEach(p => {
                p.up();
                p.dr();
            });
            requestAnimationFrame(anim);
        }
        anim();
    </script>
</body>

</html>