<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel - Dinner Menu</title>
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

        /* 1. BACKGROUND */
        .bg-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.85)), url('bg.jpg');
            background-size: cover;
            background-position: center;
        }

        /* 2. LAYOUT */
        .container {
            display: grid;
            grid-template-columns: 40% 60%;
            height: 100vh;
            padding: 40px;
            gap: 40px;
        }

        /* 3. LEFT SIDE: HIGHLIGHTS & LOGO */
        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .company-logo {
            height: 100px;
            margin-bottom: 20px;
            animation: pulse 3s infinite;
        }

        .menu-title {
            font-family: 'Great Vibes', cursive;
            font-size: 5rem;
            color: #ffd700;
            margin-bottom: 30px;
        }

        .price-highlight {
            background: rgba(196, 30, 58, 0.2);
            border: 1px solid #c41e3a;
            padding: 20px;
            border-radius: 20px;
            width: 80%;
            margin-bottom: 20px;
        }

        .price-highlight h2 {
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .price-highlight p {
            font-size: 3.5rem;
            font-weight: 900;
            color: #ffd700;
            animation: flash 2s infinite alternate;
        }

        /* 4. RIGHT SIDE: SCROLLING LIST */
        .menu-window {
            position: relative;
            height: 100%;
            overflow: hidden;
            /* Hide the scrollbar */
        }

        .scroller {
            position: absolute;
            width: 100%;
            animation: scrollMenu 25s linear infinite;
            /* Adjust speed here */
        }

        .menu-section-title {
            font-size: 2.2rem;
            color: #ffd700;
            text-transform: uppercase;
            border-bottom: 2px solid rgba(255, 215, 0, 0.3);
            margin: 40px 0 20px 0;
            padding-bottom: 10px;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 15px;
        }

        .item-name {
            font-size: 1.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .item-dots {
            flex: 1;
            border-bottom: 2px dotted rgba(255, 255, 255, 0.2);
            margin: 0 15px;
        }

        .item-desc {
            font-size: 1.1rem;
            font-weight: 300;
            opacity: 0.7;
            margin-bottom: 20px;
            display: block;
        }

        /* ANIMATIONS */
        @keyframes scrollMenu {
            0% {
                top: 100%;
            }

            100% {
                top: -150%;
            }

            /* Adjust based on list length */
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes flash {
            from {
                opacity: 1;
            }

            to {
                opacity: 0.6;
            }
        }
    </style>
</head>

<body>

    <div class="bg-container"></div>

    <div class="container">
        <div class="sidebar">
            <img src="FelizLogo.png" class="company-logo" alt="Logo">
            <h1 class="menu-title">Dinner Buffet</h1>

            <div class="price-highlight">
                <h2>Adult</h2>
                <p>₱999</p>
            </div>
            <div class="price-highlight" style="border-color: #ffd700;">
                <h2>Unli Wine</h2>
                <p>₱599</p>
            </div>
        </div>

        <div class="menu-window">
            <div class="scroller">

                <h2 class="menu-section-title">Main Entrées</h2>
                <div class="menu-item">
                    <span class="item-name">Roast Beef Ribeye</span>
                    <div class="item-dots"></div>
                </div>
                <span class="item-desc">Slow-roasted with rosemary and garlic jus</span>

                <div class="menu-item">
                    <span class="item-name">Grilled Seafood Platter</span>
                    <div class="item-dots"></div>
                </div>
                <span class="item-desc">Fresh Boracay catch with lemon butter sauce</span>

                <div class="menu-item">
                    <span class="item-name">Chicken Galantina</span>
                    <div class="item-dots"></div>
                </div>
                <span class="item-desc">Traditional Filipino stuffed chicken</span>

                <h2 class="menu-section-title">Salad Bar</h2>
                <div class="menu-item">
                    <span class="item-name">Classic Caesar</span>
                    <div class="item-dots"></div>
                </div>
                <span class="item-desc">Crisp romaine, parmesan, and herb croutons</span>

                <div class="menu-item">
                    <span class="item-name">Tropical Fruit Salad</span>
                    <div class="item-dots"></div>
                </div>
                <span class="item-desc">Fresh local mangoes, pineapple, and papaya</span>

                <h2 class="menu-section-title">Desserts</h2>
                <div class="menu-item">
                    <span class="item-name">Leche Flan Especial</span>
                    <div class="item-dots"></div>
                </div>
                <span class="item-desc">Rich caramel custard topped with gold leaf</span>

                <div class="menu-item">
                    <span class="item-name">Ube Cheesecake</span>
                    <div class="item-dots"></div>
                </div>
                <span class="item-desc">Signature purple yam velvet cake</span>

                <h2 class="menu-section-title">Beverages</h2>
                <div class="menu-item">
                    <span class="item-name">Signature Iced Tea</span>
                    <div class="item-dots"></div>
                </div>
                <div class="menu-item">
                    <span class="item-name">Fresh Fruit Juices</span>
                    <div class="item-dots"></div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>