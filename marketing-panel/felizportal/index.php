<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel Home</title>
    <style>
        /* 1. Background Image Setup */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('bg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dashboard-container {
            text-align: center;
            /* width: 90%;
        max-width: 500px; */
        }

        /* 2. Pulsing Logo Style */
        .company-logo {
            width: 800px;
            max-width: 90vw;
            margin-bottom: -40px;
            /* Only the logo flashes */
            animation: logoPulse 2.5s infinite ease-in-out;
        }

        @keyframes logoPulse {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(0.95);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .welcome-msg {
            color: #ffffff;
            font-size: 1.4rem;
            font-weight: 300;
            margin-bottom: 40px;
            letter-spacing: 1px;
        }

        /* 3. Dark Transparent Button Grid */
        .button-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .flat-btn {
            background: rgba(0, 0, 0, 0.4);
            /* Dark Transparent */
            backdrop-filter: blur(10px);
            /* Glass effect */
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* Thin white border */
            border-radius: 12px;
            padding: 25px 15px;
            color: #ffffff;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 400;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .flat-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.6);
            transform: translateY(-2px);
        }

        .icon {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        /* Special highlight for NYE button */
        .btn-nye {
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
        }

        /* Mobile Responsive */
        @media (max-width: 480px) {
            .button-grid {
                grid-template-columns: 1fr;
            }

            .flat-btn {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard-container">
        <img src="FelizLogo.png" alt="Feliz Hotel Logo" class="company-logo">

        <div class="welcome-msg">Feliz Hotel Boracay Portal</div>

        <div class="button-grid">
            <a href="promoandevents/index.php" class="flat-btn">
                <span class="icon">🎁</span>
                Promos & Upcoming
            </a>
            <a href="todayevents/index.php" class="flat-btn">
                <span class="icon">📅</span>
                Today's Events
            </a>
            <a href="countdownnye.php" class="flat-btn btn-nye">
                <span class="icon">🎆</span>
                NYE Countdown
            </a>
            <a href="countdownnyewithnames.php" class="flat-btn btn-nye">
                <span class="icon">🎆</span>
                NYE Countdown with Names
            </a>
            <a href="countdownnyewithnames2.php" class="flat-btn btn-nye">
                <span class="icon">🎆</span>
                NYE Countdown with Names Test 1
            </a>
            <a href="welcome.php" class="flat-btn">
                <span class="icon">👤</span>
                Welcome Guest
            </a>
            <a href="menutoday.php" class="flat-btn">
                <span class="icon">👤</span>
                Menu Today
            </a>
        </div>
    </div>

</body>

</html>