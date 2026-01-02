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
            filter: brightness(40%);
            /* Darkened for TV readability */
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
        }

        /* Start Overlay for TV Browsers */
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

        /* LOGO PULSE (FELIZ) */
        .company-logo {
            width: 350px;
            /* Adjusted for TV */
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

        /* FLASHING EVENT NAME (SUNLIFE) */
        .event-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 9rem;
            /* Large for TV */
            font-weight: 900;
            color: #ffd700;
            /* Sunlife Gold */
            text-shadow: 0 0 40px rgba(255, 215, 0, 0.5);
            text-transform: uppercase;
            /* margin: 20px 0; */
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

        /* CLIENT LOGO */
        .client-logo {
            height: 300px;
            margin-top: -75px;
            filter: drop-shadow(0 0 10px white);
        }

        .hotel-note {
            font-family: 'Great Vibes', cursive;
            font-size: 4rem;
            font-weight: 300;
            /* margin-top: 20px; */
            opacity: 0.9;
        }

        /* EVENT DETAILS BOX */
        .event-details {
            margin-top: -75px;
            padding: 20px 40px;
            /*  background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2); */
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
    </style>
</head>