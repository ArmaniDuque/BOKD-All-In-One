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

        /* 1. BACKGROUND & SNOW */
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        /* THE GRID LAYOUT - LOCKED POSITIONS */
        .content {
            position: relative;
            z-index: 10;
            height: 100vh;
            display: grid;
            /* Row 1: Logo | Row 2: Names | Row 3: Timer or NY Text */
            grid-template-rows: 1.2fr 1fr 1.2fr;
            align-items: center;
            justify-items: center;
            color: white;
            text-align: center;
            padding: 0 40px;
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
        }

        /* BIG SCREEN FLASH */
        #big-seconds-wrap {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 50;
            display: none;
            justify-content: center;
            align-items: center;
            pointer-events: none;
        }

        #big-seconds-text {
            font-size: 45vw;
            font-weight: 900;
            color: white;
            text-shadow: 0 0 50px rgba(255, 255, 255, 0.5);
            animation: pulse-zoom 1s infinite alternate;
        }

        @keyframes pulse-zoom {
            0% {
                transform: scale(1);
                opacity: 0.6;
            }

            100% {
                transform: scale(1.1);
                opacity: 1;
                text-shadow: 0 0 100px #ffd700;
            }
        }

        /* ROW 1: LOGO AREA (FIXED TOP) */
        .logo-area {
            grid-row: 1;
            align-self: center;
        }

        .company-logo {
            width: 800px;
            max-width: 55vw;
            filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.2));
        }

        /* ROW 2: NAMES AREA (FIXED MIDDLE) */
        .names-area {
            grid-row: 2;
            width: 100%;
            max-width: 95vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow: hidden;
        }

        #family-names {
            /* Auto-fit: Shrinks for long names, stays big for short ones */
            font-size: clamp(1.5rem, 6vw, 7.5rem);
            font-weight: 900;
            color: #ffd700;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
            transition: opacity 0.5s ease;
            line-height: 1;
            text-transform: uppercase;
            word-wrap: break-word;
        }

        /* ROW 3: BOTTOM AREA (TIMER OR NY TEXT) */
        .bottom-area {
            grid-row: 3;
            align-self: center;
            width: 100%;
        }

        #timer {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .time-block span {
            display: block;
            font-size: clamp(3rem, 10vw, 9.5rem);
            font-weight: 900;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            animation: timer-pulse 3s infinite ease-in-out;
        }

        .time-block p {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: #ffd700;
        }

        @keyframes timer-pulse {

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

        #celebration-text {
            font-size: clamp(3rem, 10vw, 9.5rem);
            font-weight: 900;
            background: linear-gradient(to bottom, #fff 20%, #ffd700 80%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 40px rgba(255, 215, 0, 0.6));
        }

        #sync-status {
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

        .hidden {
            display: none !important;
        }

        .last-minute .content {
            opacity: 0;
        }
    </style>
</head>

<body>
    <div id="sync-status">Syncing Time...</div>

    <div id="start-overlay">
        <button id="start-btn">BEGIN EXPERIENCE</button>
    </div>

    <div id="big-seconds-wrap">
        <div id="big-seconds-text">00</div>
    </div>

    <audio id="bg-music" loop>
        <source src="christmas.mp3" type="audio/mpeg">
    </audio>
    <audio id="fireworks-sound">
        <source src="Fireworks.mp3" type="audio/mpeg">
    </audio>
    <canvas id="snow-canvas"></canvas>

    <div class="background-container"><img src="../bg.jpg" class="bg-media"></div>

    <div class="content" id="main-content">
        <div class="logo-area">
            <img src="../FelizLogo.png" alt="Logo" class="company-logo">
        </div>

        <div class="names-area" id="names-box">
            <div id="fixed-thanks"
                style="font-size: 1.5rem; font-weight: 400; letter-spacing: 2px; margin-bottom: 10px; color: white; opacity: 0.8;">
                Thank you for joining us !!</div>
            <div id="family-names">Feliz Hotel Boracay</div>
        </div>

        <div class="bottom-area">
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
                    <div class="time-block seconds-block"><span id="seconds">00</span>
                        <p>Secs</p>
                    </div>
                </div>
            </div>
            <h1 id="celebration-text" class="hidden">Merry Christmas!</h1>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        const guests = ["Feliz Hotel Boracay", "Mr. Mikael Torma and Family", "Mr. and Mrs. Velden", "Mr. and Mrs. Kaisers",
            "Mr. Aston and Ms. May", "Mr. Watson and Ms. Zimmerman", "Canal Direto Japan Group",
            "Ms. Siya Shehtanova and Pty.", "Mr. Yannick Chevrier and Pty.", "Ms. Anna Jegorcenkova",
            "Catalasan Family", "Ms. Darina Abdulina and Pty.", "Mr. Andrew Lawrence and Pty.",
            "Mr. Gran and Ms. Carlestal", "Corpuz Family", "Ms. Marla Punzalan and Pty.",
            "Ms. Vladislava Bakshaeva and Pty.", "Mr. Rafael Ocampo and Family", "Mr. and Mrs. Webster",
            "Aquino Family", "Bañares Family", "Balaga Family", "Mr. and Mrs. Beemster", "Block Family",
            "Brandt Family", "Brennan Family", "Cabusao Family", "Caravaggio Family", "Catanus Family", "Chan Family",
            "Chang Family", "Chavez Family", "Chunayev Family", "Clerigo Family", "Mr. and Mrs. Landenberge",
            "Del Rosario Family", "Demetillo Family", "Domaoan Family", "Eaton Family", "El Hellal Family",
            "Esperanzate Family", "Estifano Family", "Fernando Family", "Gonthier Family", "Gonzaga Family",
            "Herrera Family", "Jeelani Family", "Khambatta Family", "Lammertz Family", "Laut Family", "Li Family",
            "Lopez Family", "Lovas Family", "Malvar Family", "May Family", "Miranda Family", "Mora Family",
            "Munsod Family", "Olave Family", "Orgela Family", "Palaypayon Family", "Pasamba Family", "Pearson Family",
            "Potapov Family", "Mr. Justin Reichard", "Reyes Family", "Santiago Family", "Shigetomi Family",
            "Mr. Bjorn Sjoqvist Family", "Spreadborough Family", "Sychev Family", "Tablazon Family", "Tan Family",
            "Tayting Family", "Teruel Family", "Mr. Tariq Tucker", "Williamson Family", "Wilson Family",
            "Zhalnin Family"
        ];

        const targetDate = new Date("Dec 25, 2026 00:00:00").getTime();
        let guestIndex = 0;
        let serverTimeOffset = 0;

        async function syncTime() {
            try {
                const start = performance.now();
                const response = await fetch('time2.php');
                const data = await response.json();
                const latency = (performance.now() - start) / 2;
                serverTimeOffset = (data.serverTime + latency) - Date.now();
                document.getElementById('sync-status').innerText = "✓ SYNCED (MS)";
            } catch (e) {
                document.getElementById('sync-status').innerText = "⚠ LOCAL TIME";
            }
        }
        syncTime();

        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('start-overlay').style.display = 'none';
                document.getElementById('bg-music').play();
            }, 800);
        });

        setInterval(() => {
            const el = document.getElementById("family-names");
            el.style.opacity = 0;
            setTimeout(() => {
                guestIndex = (guestIndex + 1) % guests.length;
                el.innerText = guests[guestIndex];
                el.style.opacity = 1;
            }, 500);
        }, 4000);

        setInterval(() => {
            const syncedNow = Date.now() + serverTimeOffset;
            const distance = targetDate - syncedNow;

            const d = Math.floor(distance / 86400000);
            const h = Math.floor((distance % 86400000) / 3600000);
            const m = Math.floor((distance % 3600000) / 60000);
            const s = Math.floor((distance % 60000) / 1000);

            document.getElementById("days").innerText = String(d).padStart(2, '0');
            document.getElementById("hours").innerText = String(h).padStart(2, '0');
            document.getElementById("minutes").innerText = String(m).padStart(2, '0');
            document.getElementById("seconds").innerText = String(s).padStart(2, '0');

            const bigSecsWrap = document.getElementById('big-seconds-wrap');
            const bigSecsText = document.getElementById('big-seconds-text');

            if (distance > 0 && distance < 60000) {
                bigSecsWrap.style.display = 'flex';
                bigSecsText.innerText = s;
                document.body.classList.add('last-minute');
            } else {
                bigSecsWrap.style.display = 'none';
                document.body.classList.remove('last-minute');
            }

            if (distance <= 0 && !document.body.classList.contains('celebrating')) {
                document.body.classList.add('celebrating');
                bigSecsWrap.style.display = 'none';
                document.getElementById("countdown-wrap").classList.add("hidden");
                document.getElementById("celebration-text").classList.remove("hidden");

                document.getElementById('bg-music').pause();
                document.getElementById('fireworks-sound').play();

                const fwEnd = Date.now() + 1800000;
                const fireworks = setInterval(() => {
                    if (Date.now() > fwEnd) return clearInterval(fireworks);
                    confetti({
                        particleCount: 150,
                        spread: 200,
                        origin: {
                            x: Math.random(),
                            y: Math.random() - 0.2
                        }
                    });
                }, 800);
            }
        }, 100);

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
                this.v = Math.random() * 0.8 + 0.2;
                this.w = Math.random() * 0.5 - 0.25;
            }
            up() {
                this.y += this.v;
                this.x += this.w;
                if (this.y > canvas.height) this.y = -10;
            }
            dr() {
                ctx.fillStyle = 'rgba(255,255,255,0.5)';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.s, 0, 6.28);
                ctx.fill();
            }
        }
        for (let i = 0; i < 150; i++) parts.push(new P());

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