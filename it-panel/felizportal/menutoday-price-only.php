<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel - Buffet & Wine Promo</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;700;900&display=swap"
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
            width: 100%;
            overflow: hidden;
            background-color: #000;
            font-family: 'Montserrat', sans-serif;
            color: white;
        }

        /* 1. BACKGROUND WITH OVERLAY */
        .bg-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            /* Update 'buffet-bg.jpg' to your food/wine photo */
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)),
                url('bg.jpg');
            background-size: cover;
            background-position: center;
        }

        /* 2. HEADER */
        .header {
            text-align: center;
            padding-top: 40px;
            height: 20vh;
        }

        .company-logo {
            height: 120px;
            animation: logoPulse 3s infinite ease-in-out;
        }

        @keyframes logoPulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
        }

        /* 3. PROMO CONTENT */
        .promo-title {
            font-family: 'Great Vibes', cursive;
            font-size: 5.5rem;
            color: #ffd700;
            text-align: center;
            margin-bottom: 10px;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.4);
        }

        .main-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 0 60px;
            height: 55vh;
            align-items: center;
        }

        /* 4. PRICING CARDS (GLASSMORPISM) */
        .price-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            padding: 50px 20px;
            text-align: center;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: 0.3s;
        }

        .label {
            font-size: 2rem;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        /* THE FLASHING PRICE */
        .price {
            font-size: 5.5rem;
            font-weight: 900;
            color: #ffd700;
            margin-bottom: 10px;
            animation: priceFlash 1.5s infinite alternate;
        }

        @keyframes priceFlash {
            from {
                opacity: 1;
                text-shadow: 0 0 10px #ffd700;
            }

            to {
                opacity: 0.5;
                text-shadow: 0 0 40px #ffd700;
                transform: scale(1.05);
            }
        }

        .sub-text {
            font-size: 1.2rem;
            opacity: 0.7;
            font-weight: 400;
        }

        /* Special style for Wine Card */
        .wine-card {
            border: 1px solid rgba(196, 30, 58, 0.5);
            background: rgba(196, 30, 58, 0.1);
        }

        .wine-card .price {
            color: #ff4d4d;
            animation: priceFlashRed 1.5s infinite alternate;
        }

        @keyframes priceFlashRed {
            from {
                opacity: 1;
                text-shadow: 0 0 10px #ff4d4d;
            }

            to {
                opacity: 0.5;
                text-shadow: 0 0 40px #ff4d4d;
            }
        }

        /* Footer */
        .footer-note {
            text-align: center;
            font-size: 1.5rem;
            margin-top: 30px;
            font-weight: 300;
            letter-spacing: 2px;
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <div class="bg-container"></div>

    <div class="header">
        <img src="FelizLogo.png" class="company-logo" alt="Feliz Hotel Logo">
    </div>

    <h1 class="promo-title">Grand Dinner Buffet</h1>

    <div class="main-grid">
        <div class="price-card">
            <p class="label">Adults</p>
            <p class="price">₱999</p>
            <p class="sub-text">Inclusive of Taxes</p>
        </div>

        <div class="price-card">
            <p class="label">Kids</p>
            <p class="price">₱499</p>
            <p class="sub-text">Ages 5-10 Years Old</p>
        </div>

        <div class="price-card wine-card">
            <p class="label">Unli Wine</p>
            <p class="price">₱599</p>
            <p class="sub-text">Premium Selection Add-on</p>
        </div>
    </div>

    <p class="footer-note">Available Daily at La Plaza | 6:00 PM - 10:00 PM</p>

</body>

</html>