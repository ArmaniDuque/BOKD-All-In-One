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

        /* 1. LAYER STACKING */
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

        /* 2. BIG SCREEN COUNTDOWN FLASH */
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

        /* 3. LOGO & TEXT */
        .company-logo {
            width: 900px;
            max-width: 80vw;
            margin-bottom: -30px;
            filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.2));
            transition: all 0.5s ease;
        }

        .thank-you-container {
            /* margin-bottom: 30px; */
            transition: opacity 0.5s;
        }

        #family-names {
            font-size: 9rem;
            font-weight: 900;
            color: #ffd700;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
            transition: opacity 0.5s ease;
        }

        #timer {
            margin-top: -40px;
            display: flex;
            gap: 50px;
            /* transition: opacity 0.5s; */
        }

        .time-block span {
            display: block;
            font-size: 13rem;
            font-weight: 900;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            animation: pulse-glow 2s infinite ease-in-out;
        }

        .time-block p {
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: #ffd700;
        }

        #celebration-text {
            font-size: 10rem;
            font-weight: 900;
            background: linear-gradient(to bottom, #fff 20%, #ffd700 80%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 40px rgba(255, 215, 0, 0.6));
        }

        /* 4. RAFFLE STYLES */
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
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.4);
            transition: 0.3s;
        }

        #raffle-btn:hover {
            transform: scale(1.1);
        }

        #raffle-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 3000;
            display: none;
            /* Hidden by default */
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .winner-display {
            font-size: 6rem;
            font-weight: 900;
            color: #ffd700;
            text-shadow: 0 0 50px #ffd700;
            margin: 40px 0;
            text-align: center;
            padding: 0 20px;
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
    </style>
</head>

<body>
    <div id="sync-status">Syncing Time...</div>

    <div id="start-overlay">
        <button id="start-btn">BEGIN EXPERIENCE</button>
    </div>

    <button id="raffle-btn" onclick="openRaffle()">DRAW RAFFLE 🎁</button>

    <div id="raffle-modal">
        <h2 style="letter-spacing: 10px; opacity: 0.7; text-transform: uppercase;">Picking a Winner</h2>
        <div id="winner-name" class="winner-display">...</div>
        <button onclick="closeRaffle()"
            style="background:none; border: 1px solid white; color:white; padding: 10px 20px; cursor:pointer; border-radius:5px;">Close
            Raffle</button>
    </div>

    <div id="big-seconds-wrap">
        <div id="big-seconds-text">00</div>
    </div>

    <audio id="bg-music" loop>
        <source src="nye.mp3" type="audio/mpeg">
    </audio>
    <audio id="fireworks-sound">
        <source src="Fireworks.mp3" type="audio/mpeg">
    </audio>
    <canvas id="snow-canvas"></canvas>

    <div class="background-container"><img src="bg.jpg" class="bg-media"></div>

    <div class="content" id="main-content">
        <img src="FelizLogo.png" alt="Logo" class="company-logo" id="logo-parallax">
        <h1 id="celebration-text" class="hidden">Happy New Year!</h1>

        <div class="thank-you-container" id="names-box">
            <div id="fixed-thanks" style="font-size: 2.2rem; font-weight: 400; letter-spacing: 2px;">Thank you for
                joining us !!</div>
            <div id="family-names">Feliz Hotel Boracay</div>
        </div>

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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        // 1. GUEST LIST ARRAY
        const guests = [
            "Feliz Hotel Boracay",
            "Mr. Mikael Torma and Family",
            "Mr. and Mrs. Velden",
            "Mr. and Mrs. Kaisers",
            "Mr. Aston and Ms. May",
            "Mr. Watson and Ms. Zimmerman",
            "Canal Direto Japan Group",
            "Ms. Siya Shehtanova and Pty.",
            "Mr. Yannick Chevrier and Pty.",
            "Ms. Anna Jegorcenkova",
            "Catalasan Family",
            "Ms. Darina Abdulina and Pty.",
            "Mr. Andrew Lawrence and Pty.",
            "Mr. Gran and Ms. Carlestal",
            "Corpuz Family",
            "Ms. Marla Punzalan and Pty.",
            "Ms. Vladislava Bakshaeva and Pty.",
            "Mr. Rafael Ocampo and Family",
            "Mr. and Mrs. Webster",
            "Aquino Family",
            "Bañares Family",
            "Balaga Family",
            "Mr. and Mrs. Beemster",
            "Block Family",
            "Brandt Family",
            "Brennan Family",
            "Cabusao Family",
            "Caravaggio Family",
            "Catanus Family",
            "Chan Family",
            "Chang Family",
            "Chavez Family",
            "Chunayev Family",
            "Clerigo Family",
            "Mr. and Mrs. Landenberge",
            "Del Rosario Family",
            "Demetillo Family",
            "Domaoan Family",
            "Eaton Family",
            "El Hellal Family",
            "Esperanzate Family",
            "Estifano Family",
            "Fernando Family",
            "Gonthier Family",
            "Gonzaga Family",
            "Herrera Family",
            "Jeelani Family",
            "Khambatta Family",
            "Lammertz Family",
            "Laut Family",
            "Li Family",
            "Lopez Family",
            "Lovas Family",
            "Malvar Family",
            "May Family",
            "Miranda Family",
            "Mora Family",
            "Munsod Family",
            "Olave Family",
            "Orgela Family",
            "Palaypayon Family",
            "Pasamba Family",
            "Pearson Family",
            "Potapov Family",
            "Mr. Justin Reichard",
            "Reyes Family",
            "Santiago Family",
            "Shigetomi Family",
            "Mr. Bjorn Sjoqvist Family",
            "Spreadborough Family",
            "Sychev Family",
            "Tablazon Family",
            "Tan Family",
            "Tayting Family",
            "Teruel Family",
            "Mr. Tariq Tucker",
            "Williamson Family",
            "Wilson Family",
            "Zhalnin Family"
        ];

        // 2. CONFIG & SYNC
        const targetDate = new Date("Jan 1, 2026 00:00:00").getTime();
        let guestIndex = 0;
        let serverTimeOffset = 0;

        // RAFFLE LOGIC
        function openRaffle() {
            document.getElementById('raffle-modal').style.display = 'flex';
            let shuffleCount = 0;
            // Shuffle names quickly
            const shuffle = setInterval(() => {
                const randomName = guests[Math.floor(Math.random() * guests.length)];
                document.getElementById('winner-name').innerText = randomName;
                shuffleCount++;

                // Stop after 30 shuffles
                if (shuffleCount > 30) {
                    clearInterval(shuffle);
                    const winner = guests[Math.floor(Math.random() * guests.length)];
                    document.getElementById('winner-name').innerText = winner.toUpperCase();

                    // Winner Confetti
                    confetti({
                        particleCount: 200,
                        spread: 100,
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

        async function syncTime() {
            const syncEl = document.getElementById('sync-status');
            try {
                const start = performance.now();
                const response = await fetch('time2.php');
                const data = await response.json();
                const latency = (performance.now() - start) / 2;
                serverTimeOffset = (data.serverTime + latency) - Date.now();
                syncEl.innerText = "✓ SYNCED (MS)";
            } catch (e) {
                syncEl.innerText = "⚠ USING LOCAL PC TIME";
                syncEl.style.color = "#ff4d4d";
            }
        }
        syncTime();
        setInterval(syncTime, 600000);

        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('start-overlay').style.display = 'none';
                document.getElementById('bg-music').play();
            }, 800);
        });

        // NAME ROTATION
        setInterval(() => {
            const el = document.getElementById("family-names");
            el.style.opacity = 0;
            setTimeout(() => {
                guestIndex = (guestIndex + 1) % guests.length;
                el.innerText = guests[guestIndex];
                el.style.opacity = 1;
            }, 500);
        }, 4000);

        // COUNTDOWN ENGINE
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
            const logo = document.getElementById('logo-parallax');
            const timerWrap = document.getElementById('countdown-wrap');
            const namesWrap = document.getElementById('names-box');

            if (distance > 0 && distance < 60000) {
                bigSecsWrap.style.display = 'flex';
                bigSecsText.innerText = s;
                logo.style.opacity = '0.1';
                timerWrap.style.opacity = '0';
                namesWrap.style.opacity = '0';
            } else {
                bigSecsWrap.style.display = 'none';
                if (!document.body.classList.contains('celebrating')) {
                    logo.style.opacity = '1';
                    timerWrap.style.opacity = '1';
                    namesWrap.style.opacity = '1';
                }
            }

            if (distance <= 0 && !document.body.classList.contains('celebrating')) {
                document.body.classList.add('celebrating');
                bigSecsWrap.style.display = 'none';
                timerWrap.classList.add("hidden");
                logo.classList.add("hidden");
                namesWrap.style.opacity = '1';
                document.getElementById("celebration-text").classList.remove("hidden");
                document.getElementById('bg-music').pause();
                document.getElementById('fireworks-sound').play();

                // 30 MINUTE CELEBRATION (1,800,000 ms)
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

        // SNOW
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