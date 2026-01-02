<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel Grand Buffet - Animated Menu</title>
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

        /* BACKGROUND */
        .bg-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.9)), url('bg.jpg');
            background-size: cover;
            background-position: center;
        }

        /* LAYOUT */
        .container {
            display: grid;
            grid-template-columns: 35% 65%;
            height: 100vh;
            padding: 40px;
            gap: 20px;
        }

        /* LEFT SIDE: FIXED BRANDING & HEARTBEAT PRICES */
        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .company-logo {
            height: 110px;
            margin-bottom: 20px;
        }

        .menu-title {
            font-family: 'Great Vibes', cursive;
            font-size: 5rem;
            color: #ffd700;
            margin-bottom: 20px;
        }

        .price-tag {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 20px;
            width: 85%;
            margin-bottom: 15px;
            backdrop-filter: blur(10px);
        }

        .price-tag h2 {
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 5px;
            opacity: 0.8;
        }

        .price-val {
            font-size: 4rem;
            font-weight: 900;
            color: #ffd700;
            display: block;
        }

        /* HEARTBEAT SEQUENTIAL ANIMATION */
        .hb-1 {
            animation: heartbeat 3s infinite;
            animation-delay: 0s;
        }

        .hb-2 {
            animation: heartbeat 3s infinite;
            animation-delay: 1s;
        }

        .hb-3 {
            animation: heartbeat 3s infinite;
            animation-delay: 2s;
        }

        @keyframes heartbeat {
            0% {
                transform: scale(1);
                text-shadow: 0 0 10px rgba(255, 215, 0, 0);
            }

            10% {
                transform: scale(1.15);
                text-shadow: 0 0 30px rgba(255, 215, 0, 0.8);
            }

            20% {
                transform: scale(1);
                text-shadow: 0 0 10px rgba(255, 215, 0, 0);
            }

            30% {
                transform: scale(1.1);
                text-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
            }

            40% {
                transform: scale(1);
            }

            100% {
                transform: scale(1);
            }
        }

        /* RIGHT SIDE: CONTINUOUS SCROLLING MENU */
        .menu-window {
            position: relative;
            height: 100%;
            overflow: hidden;
        }

        .scroller {
            position: absolute;
            width: 100%;
            animation: continuousScroll 50s linear infinite;
        }

        .section-header {
            font-size: 2.2rem;
            color: #ffd700;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin: 45px 0 20px 0;
            border-bottom: 2px solid rgba(255, 215, 0, 0.3);
            display: block;
        }

        .menu-item {
            font-size: 1.6rem;
            font-weight: 300;
            margin-bottom: 10px;
            display: block;
            border-left: 3px solid #c41e3a;
            padding-left: 15px;
        }

        .live-tag {
            color: #ff4d4d;
            font-weight: 700;
            font-size: 0.8rem;
            border: 1px solid #ff4d4d;
            padding: 1px 5px;
            margin-left: 10px;
            border-radius: 4px;
        }

        @keyframes continuousScroll {
            0% {
                transform: translateY(100vh);
            }

            100% {
                transform: translateY(-450%);
            }

            /* Adjust if list is longer/shorter */
        }
    </style>
</head>

<body>

    <div class="bg-container"></div>

    <div class="container">
        <div class="sidebar">
            <img src="FelizLogo.png" class="company-logo" alt="Logo">
            <h1 class="menu-title">Grand Buffet</h1>

            <div class="price-tag">
                <h2>Adult</h2>
                <span class="price-val hb-1">₱999</span>
            </div>

            <div class="price-tag">
                <h2>Kids</h2>
                <span class="price-val hb-2">₱499</span>
            </div>

            <div class="price-tag" style="border-color: #c41e3a;">
                <h2>Unli Wine</h2>
                <span class="price-val hb-3" style="color: #ff4d4d;">₱599</span>
            </div>
        </div>

        <div class="menu-window">
            <div class="scroller">

                <h2 class="section-header">Carving Station</h2>
                <span class="menu-item">Porchetta</span>
                <span class="menu-item">Roasted Beef w/ Herbs</span>
                <span class="menu-item">Whole Steamed Fish w/ Ginger Garlic</span>
                <span class="menu-item">Pata Negra</span>
                <span class="menu-item">Hamon</span>
                <span class="menu-item">Duck a l’orange</span>

                <h2 class="section-header">Main Course</h2>
                <span class="menu-item">Lengua Estofado</span>
                <span class="menu-item">Red Thai Chicken Curry</span>
                <span class="menu-item">Herb Crusted Lamb Rack</span>
                <span class="menu-item">Roasted Beef with Red Wine Gravy</span>
                <span class="menu-item">Salmon Fillet with Lemon Butter</span>
                <span class="menu-item">Honey Soy Glazed Chicken Thigh</span>
                <span class="menu-item">Fish Fillet with Tausi</span>
                <span class="menu-item">Braised Beef</span>
                <span class="menu-item">Yang Chow & Plain Rice</span>
                <span class="menu-item">Callos & Buttered Vegetables</span>

                <h2 class="section-header">Seafood Station <span class="live-tag">LIVE</span></h2>
                <span class="menu-item">Oyster Rockefeller</span>
                <span class="menu-item">Steamed Crab with Garlic Butter</span>
                <span class="menu-item">Live Shellfish: Garlic, Lemon, or Chili</span>

                <h2 class="section-header">Live Grilled Station <span class="live-tag">LIVE</span></h2>
                <span class="menu-item">Pork & Chicken BBQ</span>
                <span class="menu-item">Liempo & Beef Kebab</span>
                <span class="menu-item">Hungarian Sausage</span>
                <span class="menu-item">Grilled Shrimp</span>
                <span class="menu-item">Grilled Corn with Butter</span>

                <h2 class="section-header">Appetizers & Pizza</h2>
                <span class="menu-item">Smoked Salmon</span>
                <span class="menu-item">Tuna Mango Bruschetta</span>
                <span class="menu-item">Mini Chicken Satay</span>
                <span class="menu-item">Golden Shrimp & Asado Siopao</span>
                <span class="menu-item">Jamon Iberico & Charcuterie Board</span>
                <span class="menu-item">Quatro Quesso & La Plaza Pizza</span>

                <h2 class="section-header">Live Pasta Station <span class="live-tag">LIVE</span></h2>
                <span class="menu-item">Seafood Marinara</span>
                <span class="menu-item">Pesto Pasta</span>
                <span class="menu-item">Aglio Olio</span>
                <span class="menu-item">Pinoy Style Spaghetti</span>

                <h2 class="section-header">Cakes & Pastries</h2>
                <span class="menu-item">Burnt Basque Cheesecake</span>
                <span class="menu-item">Crema Catalana</span>
                <span class="menu-item">Tiramisu Shot</span>
                <span class="menu-item">Chocolate Mousse</span>
                <span class="menu-item">Eclair & Brownies</span>
                <span class="menu-item">Carrot Cake w/ Cream Cheese</span>
                <span class="menu-item">Red Velvet Cupcakes</span>

                <h2 class="section-header">Pinoy Kakanin</h2>
                <span class="menu-item">Biko</span>
                <span class="menu-item">Bibingka</span>
                <span class="menu-item">Kutsinta</span>

                <h2 class="section-header">Fresh Fruits</h2>
                <span class="menu-item">Watermelon (Red & Sweet Gold)</span>
                <span class="menu-item">Kiat-Kiat & Lansones</span>
                <span class="menu-item">Fresh Grapes</span>

            </div>
        </div>
    </div>

</body>

</html>