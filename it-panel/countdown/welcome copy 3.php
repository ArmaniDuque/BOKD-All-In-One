<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel Boracay - Guest Welcome</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            overflow: hidden;
            background-color: black;
            font-family: 'Montserrat', sans-serif;
        }

        /* 1. BACKGROUND LAYER (BOTTOM) */
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            /* Set to bottom */
        }

        .bg-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(45%);
        }

        /* 2. SNOW LAYER (MIDDLE) */
        #snow-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            /* Above background, below content */
            pointer-events: none;
        }

        /* 3. CONTENT LAYER (TOP) */
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
            background: #000;
            z-index: 2000;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
        }

        #start-btn {
            padding: 22px 60px;
            font-size: 1.2rem;
            font-weight: 800;
            color: white;
            background: #c41e3a;
            border: none;
            cursor: pointer;
            border-radius: 50px;
        }

        /* LOGO WITH PULSING WHITE GLOW */
        .company-logo {
            width: 1000px;
            max-width: 80vw;
            margin-bottom: -40px;
            animation: logo-pulse 3s infinite ease-in-out;
        }

        @keyframes logo-pulse {
            0% {
                filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.4));
                transform: scale(1);
            }

            50% {
                filter: drop-shadow(0 0 25px rgba(255, 255, 255, 0.9));
                transform: scale(1.02);
            }

            100% {
                filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.4));
                transform: scale(1);
            }
        }

        /* FANCY WELCOME TEXT */
        .welcome-text {
            font-family: 'Great Vibes', cursive;
            font-size: 6rem;
            color: #fff;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            margin-bottom: -20px;
        }

        /* FLASHING GUEST NAME */
        .guest-name {
            font-family: 'Montserrat', sans-serif;
            font-size: 8rem;
            font-weight: 900;
            color: #ffd700;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.6);
            margin-bottom: 10px;
            text-transform: uppercase;
            animation: flash-animation 2s infinite alternate;
        }

        @keyframes flash-animation {
            0% {
                opacity: 0.2;
                transform: scale(0.98);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .hotel-note {
            font-family: 'Great Vibes', cursive;
            font-size: 3.8rem;
            font-weight: 300;
            opacity: 0.9;
            letter-spacing: 5px;
        }
    </style>
</head>

<body>

    <div id="start-overlay">
        <button id="start-btn">START DISPLAY</button>
    </div>

    <audio id="bg-music" loop>
        <source src="christmas.mp3" type="audio/mpeg">
    </audio>

    <canvas id="snow-canvas"></canvas>

    <div class="background-container">
        <img src="bg.jpg" class="bg-media" alt="Background">
    </div>

    <div class="content">
        <img src="FelizLogo.png" alt="Feliz Hotel Logo" class="company-logo">

        <p class="welcome-text">Welcome</p>
        <h1 id="display-name" class="guest-name">Feliz Hotel Boracay</h1>
        <p class="hotel-note">Thank you for staying here in Feliz Hotel Boracay</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        const SHEET_URL =
            "https://docs.google.com/spreadsheets/d/e/2PACX-1vQuAlDETDNZ-Z58q-1vGwy42ALMwL7HUMzzQgQmfED1fBOcwc6uh05oy_1KP9oSSveRpikZbm8b4Jus/pub?gid=0&single=true&output=csv";

        let filteredGuests = [];
        let guestIndex = 0;

        function getTodayString() {
            const today = new Date();
            const options = {
                month: 'long',
                day: 'numeric'
            };
            return today.toLocaleDateString('en-US', options);
        }

        async function fetchGuests() {
            try {
                const response = await fetch(SHEET_URL);
                const data = await response.text();
                const rows = data.split("\n").slice(1);
                const todayStr = getTodayString();

                filteredGuests = rows.map(row => {
                    const columns = row.split(",");
                    return {
                        name: columns[0] ? columns[0].trim() : "",
                        checkIn: columns[1] ? columns[1].trim() : "",
                        checkOut: columns[2] ? columns[2].trim() : ""
                    };
                }).filter(guest =>
                    guest.name !== "" &&
                    (guest.checkIn === todayStr || guest.checkOut === todayStr)
                );
            } catch (error) {
                console.error("Error fetching guest list:", error);
            }
        }

        function rotateGuests() {
            const nameEl = document.getElementById("display-name");
            if (filteredGuests.length > 0) {
                const guest = filteredGuests[guestIndex];
                nameEl.innerText = guest.name;
                guestIndex = (guestIndex + 1) % filteredGuests.length;
            } else {
                nameEl.innerText = "HAPPY HOLIDAYS";
            }
        }

        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.display = 'none';
            document.getElementById('bg-music').play();

            fetchGuests().then(() => {
                rotateGuests();
                setInterval(rotateGuests, 6000);
                setInterval(fetchGuests, 300000);
            });
            // Start snow animation loop when clicked
            anim();
        });

        // --- SNOW ANIMATION ---
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
                ctx.fillStyle = 'rgba(255,255,255,0.7)';
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
    </script>
</body>

</html>