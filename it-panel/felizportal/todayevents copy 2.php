<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Event - Sunlife Company</title>
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

        /* 1. BACKGROUND */
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
            filter: brightness(35%) contrast(110%);
        }

        /* 2. CONTENT LAYER */
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
            padding-bottom: 120px;
            /* Space for the new info footer */
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
        }

        #start-btn {
            padding: 30px 80px;
            font-size: 2rem;
            font-weight: 800;
            color: white;
            background: #c41e3a;
            border: none;
            cursor: pointer;
            border-radius: 60px;
        }

        .company-logo {
            width: 320px;
            margin-bottom: 10px;
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
                transform: scale(1.03);
            }
        }

        .welcome-text {
            font-family: 'Great Vibes', cursive;
            font-size: 4.5rem;
            color: #fff;
        }

        /* FLASHING EVENT NAME */
        .event-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 9.5rem;
            font-weight: 900;
            color: #ffd700;
            text-shadow: 0 0 50px rgba(255, 215, 0, 0.6);
            text-transform: uppercase;
            margin: 10px 0;
            animation: flash-gold 1.8s infinite alternate;
        }

        @keyframes flash-gold {
            0% {
                opacity: 0.4;
                transform: scale(0.97);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .client-logo {
            height: 250px;
            filter: drop-shadow(0 0 15px white);
            margin-bottom: 20px;
        }

        /* NEW EVENT INFO FOOTER */
        .event-info-footer {
            position: absolute;
            bottom: 40px;
            width: 85%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 25px 60px;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        }

        .info-box {
            text-align: left;
        }

        .info-label {
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #ffd700;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 2.8rem;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .venue-box {
            text-align: right;
        }
    </style>
</head>

<body>

    <div id="start-overlay">
        <button id="start-btn">LAUNCH EVENT POSTING</button>
    </div>

    <div class="background-container">
        <img src="bg.jpg" class="bg-media" alt="Background">
    </div>

    <div class="content">
        <img src="FelizLogo.png" alt="Feliz Hotel Logo" class="company-logo">

        <p class="welcome-text">Warm Welcome to</p>

        <h1 class="event-title">SUN LIFE</h1>

        <img src="Sun-Life-Logo.png" alt="Sunlife Logo" class="client-logo">

        <div class="event-info-footer">
            <div class="info-box">
                <p class="info-label">Today's Date</p>
                <p class="info-value" id="current-date">Loading...</p>
            </div>

            <div class="venue-box">
                <p class="info-label">Venue</p>
                <p class="info-value">Buenavista Hall</p>
            </div>
        </div>
    </div>

    <script>
        // Update the date automatically
        function updateDate() {
            const now = new Date();
            const options = {
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            };
            document.getElementById('current-date').textContent = now.toLocaleDateString('en-US', options);
        }

        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.display = 'none';
            updateDate();
        });

        // Initialize date on load
        updateDate();
    </script>
</body>

</html>