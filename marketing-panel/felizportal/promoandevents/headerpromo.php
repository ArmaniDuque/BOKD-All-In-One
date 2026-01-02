<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel - Promos & Upcoming</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;600;900&display=swap"
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
            background-color: #000;
            font-family: 'Montserrat', sans-serif;
            color: white;
        }

        /* Background with Blur */
        .bg-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* z-index: -1; */
        }

        .bg-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(30%) blur(5px);
        }

        /* Top Branding */
        .header {
            text-align: center;
            padding: 40px 0;
            height: 25vh;
        }

        .company-logo {
            height: 120px;
            animation: pulse 3s infinite ease-in-out;
        }

        /* Main Grid */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            padding: 0 60px;
            height: 65vh;
        }

        /* Card Styling */
        .info-card {
            background: rgba(255, 255, 255, 0.07);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 40px;
            backdrop-filter: blur(15px);
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-family: 'Great Vibes', cursive;
            font-size: 4rem;
            color: #ffd700;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 215, 0, 0.3);
            padding-bottom: 10px;
        }

        .list-item {
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
        }

        .date-box {
            background: #c41e3a;
            padding: 10px;
            border-radius: 10px;
            min-width: 90px;
            text-align: center;
            margin-right: 20px;
            font-weight: 900;
        }

        .item-text h2 {
            font-size: 1.8rem;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .item-text p {
            font-size: 1.2rem;
            opacity: 0.8;
            font-weight: 300;
        }

        /* Flash Animation for "Limited Time" */
        .promo-flash {
            color: #ff4d4d;
            font-weight: 900;
            animation: flashText 1.5s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.05);
                opacity: 0.7;
            }
        }

        @keyframes flashText {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0.2;
            }
        }
    </style>
</head>