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
            transition: 0.3s;
        }

        /* Background */
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
            margin-bottom: -40px;
            transition: all 1s ease;
        }

        /* UPDATED FULLSCREEN SCHEDULE BOX */
        #schedule-box {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.95);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease-in-out;
            pointer-events: none;
        }

        #schedule-box.show {
            opacity: 1;
            visibility: visible;
        }

        .sched-title {
            font-size: 5rem;
            color: #ff69b4;
            font-style: italic;
            margin-bottom: 20px;
            text-shadow: 0 0 20px rgba(255, 105, 180, 0.5);
        }

        .sched-date {
            font-size: 2.5rem;
            letter-spacing: 5px;
            margin-bottom: 40px;
            border-bottom: 3px solid #ffd700;
            padding-bottom: 20px;
            width: 80%;
        }

        .sched-list {
            width: 80%;
            max-width: 1200px;
        }

        .sched-item {
            font-size: 2.5rem;
            margin: 25px 0;
            display: flex;
            justify-content: flex-start;
            text-align: left;
            border-left: 5px solid transparent;
            padding-left: 20px;
            transition: border-color 0.3s;
        }

        .sched-item:hover {
            border-left: 5px solid #ff69b4;
        }

        .sched-time {
            color: #ffd700;
            font-weight: bold;
            margin-right: 40px;
            min-width: 350px;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.3);
        }

        /* THANK YOU CONTAINER */
        .thank-you-container {
            margin-bottom: 3px;
            transition: all 0.5s ease;
        }

        #fixed-thanks {
            font-size: 2.2rem;
            font-weight: 400;
            color: #ffffff;
            letter-spacing: 2px;
            margin-bottom: 2px;
        }

        #family-names {
            font-size: 6.5rem;
            font-weight: 800;
            color: #ffd700;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
            margin-bottom: 2px;
        }

        /* TIMER */
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

        /* RAFFLE UI */
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
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
            transition: 0.3s;
            letter-spacing: 1px;
        }

        #raffle-btn:hover {
            transform: scale(1.1);
            background: #fff;
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

        /* LAST MINUTE (60s) */
        .last-minute .time-block:not(.seconds-block) {
            display: none;
        }

        .last-minute .thank-you-container,
        .last-minute #schedule-box,
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

        /* CELEBRATION */
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
            animation: text-flash 1.0s infinite alternate;
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

        /* Responsive adjustments for the big schedule */
        @media (max-width: 1200px) {
            .sched-title {
                font-size: 3.5rem;
            }

            .sched-date {
                font-size: 1.8rem;
            }

            .sched-item {
                font-size: 1.8rem;
            }

            .sched-time {
                min-width: 250px;
            }
        }
    </style>
</head>

<body>

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

    <div class="background-container">
        <img src="bg.jpg" class="bg-media" alt="Background">
    </div>

    <div class="content" id="main-content">
        <img src="FelizLogo.png" alt="Logo" class="company-logo" id="logo-parallax">

        <div id="schedule-box">
            <div class="sched-title">La Dulce Navidad</div>
            <div class="sched-date">DECEMBER 31, 2025 | 7PM - 12MN</div>
            <div class="sched-list">
                <div class="sched-item"><span class="sched-time">7:00PM</span> Dinner Buffet is open | DJ Q2</div>
                <div class="sched-item"><span class="sched-time">8:00 - 8:30PM</span> Full Band Performance</div>
                <div class="sched-item"><span class="sched-time">8:30 - 9:30PM</span> Full Band and Raffle</div>
                <div class="sched-item"><span class="sched-time">9:30 - 10:00PM</span> Fire Dance</div>
                <div class="sched-item"><span class="sched-time">10:00 - 11:30PM</span> Full Band Performance</div>
            </div>
        </div>

        <div class="thank-you-container" id="names-box">
            <div id="fixed-thanks">Thank you for joining us !!</div>
            <div id="family-names">Feliz Hotel Boracay Family</div>
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
                <div class="time-block seconds-block"><span id="seconds">00</span>
                    <p>Secs</p>
                </div>
            </div>
        </div>

        <h1 id="celebration-text" class="hidden">Merry Christmas!</h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        const schedBox = document.getElementById('schedule-box');
        const namesBox = document.getElementById('names-box');
        const raffleModal = document.getElementById('raffle-modal');
        const winnerName = document.getElementById('winner-name');
        let isLastMinute = false;

        const families = [
            "Velarde Family", "Del Rosario Family", "Crespo Family", "Llorico Family",
            "Costelo Family", "Gibson Family", "Naraja Family", "Macaraig Family",
            "Gutierrez Family", "Pangilinan Family", "Stopka Family", "Zbigniew Family",
            "Bowers Family", "Depluet Family", "Baquiano Family", "Okamura Family",
            "Castañeda Family", "Thompson Family", "Girotti Family", "Damaso Family",
            "Hoganson Family", "Villarda Family", "Jesion Family", "Islao Family",
            "Komorowska Family", "Martinez Family", "Arroyo Family", "Chia Family",
            "Wong Family", "Krakowska Family", "Ignacio Family", "Smith Family",
            "Kim Family", "Seo Family", "Gilbert Family", "Huang Family",
            "Kopelchak Family", "Alinio Family", "Halai Family", "Kazantseva Family",
            "Franklin Family", "Cha Family", "Huston Family", "Acera Family",
            "Jo Family", "Villanueva Family", "Laut Family", "Palaypayon Family",
            "Orgela Family", "Clerigo Family", "Cabusao Family", "Pearson Family",
            "He Family", "Chen Family", "Chan Family", "Lee Family", "Burns Family"
        ];



        const raffle = [
            "Velarde ", "Del Rosario ", "Crespo ", "Llorico ",
            "Costelo ", "Gibson ", "Naraja ", "Macaraig ",
            "Gutierrez ", "Pangilinan ", "Stopka ", "Zbigniew ",
            "Bowers ", "Depluet ", "Baquiano ", "Okamura ",
            "Castañeda ", "Thompson ", "Girotti ", "Damaso ",
            "Hoganson ", "Villarda ", "Jesion ", "Islao ",
            "Komorowska ", "Martinez ", "Arroyo ", "Chia ",
            "Wong ", "Krakowska ", "Ignacio ", "Smith ",
            "Kim ", "Seo ", "Gilbert ", "Huang ",
            "Kopelchak ", "Alinio ", "Halai ", "Kazantseva ",
            "Franklin ", "Cha ", "Huston ", "Acera ",
            "Jo ", "Villanueva ", "Laut ", "Palaypayon ",
            "Orgela ", "Clerigo ", "Cabusao ", "Pearson ",
            "He ", "Chen ", "Chan ", "Lee ", "Burns "
        ];

        function openRaffle() {
            raffleModal.style.display = 'flex';
            let shuffleCount = 0;
            const shuffleInterval = setInterval(() => {
                winnerName.innerText = raffle[Math.floor(Math.random() * raffle.length)];
                shuffleCount++;
                if (shuffleCount > 30) {
                    clearInterval(shuffleInterval);
                    const finalWinner = raffle[Math.floor(Math.random() * raffle.length)];
                    winnerName.innerText = finalWinner.toUpperCase();
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
            raffleModal.style.display = 'none';
        }

        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('start-overlay').style.display = 'none';
                document.getElementById('bg-music').play();
                startScheduleCycle();
            }, 800);
        });

        function startScheduleCycle() {
            setInterval(() => {
                if (!isLastMinute && !document.body.classList.contains('celebrating')) {
                    schedBox.classList.add('show');
                    namesBox.style.opacity = '0';
                    setTimeout(() => {
                        schedBox.classList.remove('show');
                        if (!isLastMinute) namesBox.style.opacity = '1';
                    }, 20000); // Shows for 20 seconds
                }
            }, 60000); // Occurs every 60 seconds
        }

        let familyIndex = 0;
        setInterval(() => {
            const familyEl = document.getElementById("family-names");
            familyEl.style.opacity = 0;
            setTimeout(() => {
                familyIndex = (familyIndex + 1) % families.length;
                familyEl.innerText = families[familyIndex];
                if (!schedBox.classList.contains('show')) familyEl.style.opacity = 1;
            }, 500);
        }, 3000);

        const targetDate = new Date("Dec 31, 2025 00:00:00").getTime();

        setInterval(() => {
            const now = new Date().getTime();
            const distance = targetDate - now;

            const d = Math.floor(distance / (1000 * 60 * 60 * 24));
            const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((distance % (1000 * 60)) / 1000);

            if (distance > 0 && distance < 60000) {
                isLastMinute = true;
                document.body.classList.add('last-minute');
                schedBox.classList.remove('show');
            } else {
                isLastMinute = false;
                document.body.classList.remove('last-minute');
            }

            document.getElementById("days").innerText = d.toString().padStart(2, '0');
            document.getElementById("hours").innerText = h.toString().padStart(2, '0');
            document.getElementById("minutes").innerText = m.toString().padStart(2, '0');
            document.getElementById("seconds").innerText = s.toString().padStart(2, '0');

            if (distance < 0) {
                isLastMinute = false;
                document.body.classList.remove('last-minute');
                if (!document.body.classList.contains('celebrating')) {
                    document.body.classList.add('celebrating');
                    triggerCelebration();
                }
            }
        }, 1000);

        function triggerCelebration() {
            document.getElementById("countdown-wrap").classList.add("hidden");
            document.getElementById("logo-parallax").classList.add("hidden");
            schedBox.classList.remove('show');
            const celeb = document.getElementById("celebration-text");
            celeb.classList.remove("hidden");
            document.getElementById("main-content").appendChild(namesBox);
            namesBox.style.opacity = '1';
            document.getElementById('bg-music').pause();
            document.getElementById('fireworks-sound').play();
            const duration = 20 * 1000;
            const animationEnd = Date.now() + duration;
            const randomFireworks = setInterval(function () {
                const timeLeft = animationEnd - Date.now();
                if (timeLeft <= 0) return clearInterval(randomFireworks);
                confetti({
                    particleCount: 80,
                    startVelocity: 30,
                    spread: 360,
                    origin: {
                        x: Math.random(),
                        y: Math.random() - 0.2
                    },
                    colors: ['#ffffff', '#ff0000', '#ffd700', '#00ff00'],
                    zIndex: -1
                });
            }, 400);
        }

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
                this.speed = Math.random() * 0.5 + 0.2;
                this.wind = Math.random() * 0.2 - 0.1;
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
        for (let i = 0; i < 100; i++) particles.push(new Particle());

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