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

        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .bg-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(40%);
        }

        #snow-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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
        }

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
            padding: 25px 70px;
            font-size: 1.5rem;
            font-weight: 800;
            color: white;
            background: #c41e3a;
            border: none;
            cursor: pointer;
            border-radius: 60px;
        }

        .company-logo {
            width: 1000px;
            max-width: 75vw;
            margin-bottom: -30px;
            animation: logo-pulse 3s infinite ease-in-out;
        }

        @keyframes logo-pulse {

            0%,
            100% {
                filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.3));
                transform: scale(1);
            }

            50% {
                filter: drop-shadow(0 0 25px rgba(255, 255, 255, 0.8));
                transform: scale(1.02);
            }
        }

        .welcome-text {
            font-family: 'Great Vibes', cursive;
            font-size: 6rem;
            color: #fff;
            margin-bottom: -15px;
        }

        .guest-name {
            font-family: 'Montserrat', sans-serif;
            font-size: 7.5rem;
            font-weight: 900;
            color: #ffd700;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.5);
            text-transform: uppercase;
            animation: name-flash 2s infinite alternate;
        }

        @keyframes name-flash {
            0% {
                opacity: 0.4;
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
        }
    </style>
</head>

<body>

    <div id="start-overlay">
        <button id="start-btn">START TV DISPLAY</button>
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
        <h1 id="display-name" class="guest-name">Syncing...</h1>
        <p class="hotel-note">Thank you for staying at Feliz Hotel Boracay</p>
    </div>

    <script>
        const SHEET_URL_BASE =
            "https://docs.google.com/spreadsheets/d/e/2PACX-1vQuAlDETDNZ-Z58q-1vGwy42ALMwL7HUMzzQgQmfED1fBOcwc6uh05oy_1KP9oSSveRpikZbm8b4Jus/pub?gid=0&single=true&output=csv";

        let filteredGuests = [];
        let guestIndex = 0;

        async function fetchGuests() {
            try {
                const response = await fetch(`${SHEET_URL_BASE}&t=${Date.now()}`);
                const data = await response.text();
                const rows = data.split("\n").slice(1);

                const today = new Date();
                today.setHours(0, 0, 0, 0);
                const currentYear = today.getFullYear();

                filteredGuests = rows.map(row => {
                    // Splitting by comma carefully
                    const columns = row.split(",");
                    const name = columns[0] ? columns[0].trim() : "";
                    const rawIn = columns[1] ? columns[1].trim() : "";
                    const rawOut = columns[2] ? columns[2].trim() : "";

                    if (!name || !rawIn || !rawOut) return null;

                    let checkInDate = new Date(`${rawIn}, ${currentYear}`);
                    let checkOutDate = new Date(`${rawOut}, ${currentYear}`);

                    // NEW YEAR LOGIC: 
                    // If Check-In is December and Check-Out is January, the Check-Out must be next year.
                    if (checkOutDate < checkInDate) {
                        checkOutDate.setFullYear(currentYear + 1);
                    }

                    return {
                        name,
                        checkInDate,
                        checkOutDate
                    };
                }).filter(guest => {
                    return guest !== null &&
                        today >= guest.checkInDate &&
                        today <= guest.checkOutDate;
                });

                console.log("Current active guests:", filteredGuests);
            } catch (error) {
                console.error("Fetch error:", error);
            }
        }

        function rotateGuests() {
            const nameEl = document.getElementById("display-name");
            if (filteredGuests.length > 0) {
                if (guestIndex >= filteredGuests.length) guestIndex = 0;
                nameEl.innerText = filteredGuests[guestIndex].name;
                guestIndex = (guestIndex + 1) % filteredGuests.length;
            } else {
                nameEl.innerText = "FELIZ HOTEL FAMILY";
            }
        }

        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.display = 'none';
            document.getElementById('bg-music').play().catch(() => { });

            fetchGuests().then(() => {
                rotateGuests();
                setInterval(rotateGuests, 5000); // 5 seconds per name
                setInterval(fetchGuests, 30000); // Check sheet every 30 seconds
            });
            anim();
        });

        // Snow Animation
        const canvas = document.getElementById('snow-canvas');
        const ctx = canvas.getContext('2d');
        let parts = [];

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
                this.s = Math.random() * 2 + 1;
                this.v = Math.random() * 0.5 + 0.2;
            }
            update() {
                this.y += this.v;
                if (this.y > canvas.height) this.y = -10;
            }
            draw() {
                ctx.fillStyle = 'rgba(255,255,255,0.6)';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.s, 0, Math.PI * 2);
                ctx.fill();
            }
        }
        for (let i = 0; i < 120; i++) parts.push(new Particle());

        function anim() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            parts.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(anim);
        }
    </script>
</body>

</html>