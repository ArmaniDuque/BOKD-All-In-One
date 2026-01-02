<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel Grand Buffet Menu</title>
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

        /* LEFT SIDE: FIXED BRANDING & PRICES */
        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .company-logo {
            height: 120px;
            margin-bottom: 20px;
            animation: logoPulse 3s infinite;
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
            padding: 25px;
            border-radius: 20px;
            width: 85%;
            margin-bottom: 15px;
            backdrop-filter: blur(10px);
        }

        .price-tag h2 {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 5px;
            opacity: 0.8;
        }

        .price-tag p {
            font-size: 3.8rem;
            font-weight: 900;
            color: #ffd700;
            animation: flash 2s infinite alternate;
        }

        /* RIGHT SIDE: SCROLLING MENU */
        .menu-window {
            position: relative;
            height: 100%;
            overflow: hidden;
        }

        .scroller {
            position: absolute;
            width: 100%;
            animation: scrollMenu 60s linear infinite;
            /* Adjusted speed for long menu */
            padding-right: 40px;
        }

        .section-header {
            font-size: 2.5rem;
            color: #ffd700;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin: 50px 0 25px 0;
            border-bottom: 2px solid rgba(255, 215, 0, 0.3);
            display: inline-block;
            width: 100%;
        }

        .menu-item {
            font-size: 1.7rem;
            font-weight: 300;
            margin-bottom: 12px;
            display: block;
            text-transform: capitalize;
            border-left: 3px solid #c41e3a;
            padding-left: 15px;
        }

        .live-tag {
            color: #ff4d4d;
            font-weight: 700;
            font-size: 0.9rem;
            vertical-align: middle;
            margin-left: 10px;
            border: 1px solid #ff4d4d;
            padding: 2px 6px;
            border-radius: 4px;
        }

        /* ANIMATIONS */
        @keyframes scrollMenu {
            0% {
                transform: translateY(100vh);
            }

            100% {
                transform: translateY(-380%);
            }

            /* Adjusted for long list */
        }

        @keyframes logoPulse {

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
            <img src="FelizLogo.png" class="company-logo" alt="Feliz Hotel Logo">
            <h1 class="menu-title">Dinner Buffet</h1>

            <div class="price-tag">
                <h2>Adult Rate</h2>
                <p>₱999</p>
            </div>
            <div class="price-tag" style="border-color: #c41e3a;">
                <h2>Unli Wine</h2>
                <p>₱599</p>
            </div>
        </div>

        <div class="menu-window">
            <div class="scroller">

                <h2 class="section-header">Carving Station</h2>
                <span class="menu-item">Porchetta</span>
                <span class="menu-item">Roasted Beef w/ Herbs</span>
                <span class="menu-item">Whole Steamed Fish with Ginger Garlic Sauce</span>
                <span class="menu-item">Pata Negra</span>
                <span class="menu-item">Hamon</span>
                <span class="menu-item">Duck a l’orange</span>

                <h2 class="section-header">Main Course</h2>
                <span class="menu-item">Lengua Estofado</span>
                <span class="menu-item">Red Thai Chicken Curry</span>
                <span class="menu-item">Fish Fillet with tausi</span>
                <span class="menu-item">Braised Beef</span>
                <span class="menu-item">Plain Rice & Yang Chow</span>
                <span class="menu-item">Buttered Vegetables</span>
                <span class="menu-item">Callos</span>
                <span class="menu-item">Herb crusted lamb rack</span>
                <span class="menu-item">Roasted Beef with Red Wine Gravy</span>
                <span class="menu-item">Salmon fillet with Lemon Butter</span>
                <span class="menu-item">Honey Soy Glazed Chicken Thigh</span>

                <h2 class="section-header">Seafood Station</h2>
                <span class="menu-item">Oyster Rockefeller</span>
                <span class="menu-item">Steamed Crab with Garlic Butter</span>
                <span class="menu-item">Live Cooking Shellfish <span class="live-tag">LIVE</span></span>
                <p style="padding-left: 20px; opacity: 0.7;">(Buttered garlic, Lemon Butter, Sweet chili)</p>

                <h2 class="section-header">Appetizers & Pizza</h2>
                <span class="menu-item">Smoked Salmon</span>
                <span class="menu-item">Tuna Mango Bruschetta</span>
                <span class="menu-item">Golden Shrimp</span>
                <span class="menu-item">Mini Chicken Satay</span>
                <span class="menu-item">Asado Siopao</span>
                <span class="menu-item">Jamon Iberico & Charcuterie Board</span>
                <span class="menu-item">La Plaza & Quatro Quesso Pizza</span>

                <h2 class="section-header">Live Grilled Station <span class="live-tag">LIVE</span></h2>
                <span class="menu-item">Pork & Chicken BBQ</span>
                <span class="menu-item">Liempo & Beef Kebab</span>
                <span class="menu-item">Hungarian Sausage</span>
                <span class="menu-item">Grilled Shrimp</span>
                <span class="menu-item">Grilled Corn with Butter</span>

                <h2 class="section-header">Live Pasta Station <span class="live-tag">LIVE</span></h2>
                <span class="menu-item">Seafood Marinara</span>
                <span class="menu-item">Pesto Pasta</span>
                <span class="menu-item">Aglio Olio</span>
                <span class="menu-item">Pinoy Style Spaghetti</span>

                <h2 class="section-header">Salad Station</h2>
                <span class="menu-item">Salad Bar</span>
                <span class="menu-item">Pomelo Salad</span>
                <span class="menu-item">Ceasar Salad</span>

                <h2 class="section-header">Dessert Pinoy Kakanin</h2>
                <span class="menu-item">Biko</span>
                <span class="menu-item">Bibingka</span>
                <span class="menu-item">Kutsinta</span>

                <h2 class="section-header">Cakes & Pastries</h2>
                <span class="menu-item">Tiramisu Shot</span>
                <span class="menu-item">Burnt Basque Cheesecake</span>
                <span class="menu-item">Crema Catalana</span>
                <span class="menu-item">Chocolate Mousse</span>
                <span class="menu-item">Eclair & Brownies</span>
                <span class="menu-item">Tarta de Santiago</span>
                <span class="menu-item">Carrot Cake with Cream Cheese Frosting</span>

                <h2 class="section-header">Fresh Fruits</h2>
                <span class="menu-item">Red Watermelon & Sweet Gold</span>
                <span class="menu-item">Kiat-Kiat & Lansones</span>
                <span class="menu-item">Fresh Grapes</span>

            </div>
        </div>
    </div>

</body>

</html>