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
            filter: brightness(35%);
        }

        /* 2. LOGO SNOW CANVAS */
        #logo-snow-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 5;
            /* Sit between background and content */
            pointer-events: none;
        }

        /* 3. CONTENT LAYER */
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
            width: 350px;
            margin-bottom: 20px;
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

        .welcome-text {
            font-family: 'Great Vibes', cursive;
            font-size: 5rem;
            color: #fff;
            margin-bottom: 10px;
        }

        .event-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 9rem;
            font-weight: 900;
            line-height: 78%;
            color: #ffd700;
            text-shadow: 0 0 40px rgba(255, 215, 0, 0.5);
            text-transform: uppercase;
            animation: flash-gold 1.5s infinite alternate;
        }

        @keyframes flash-gold {
            0% {
                opacity: 0.3;
                transform: scale(0.98);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .client-logo {
            height: 300px;
            /* margin-top: -75px; */
            filter: drop-shadow(0 0 10px white);
        }

        .event-details {
            /* margin-top: -75px; */
            padding: 20px 40px;
        }

        .date-text {
            font-size: 2rem;
            font-weight: 400;
            color: #ffffff;
            letter-spacing: 2px;
            margin-bottom: 5px;
        }

        .venue-text {
            font-size: 1.8rem;
            font-weight: 400;
            color: #ffd700;
            text-transform: uppercase;
            letter-spacing: 6px;
        }

        .hotel-note {
            font-family: 'Great Vibes', cursive;
            font-size: 4rem;
            font-weight: 300;
            opacity: 0.9;
        }
    </style>
</head>