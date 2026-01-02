<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Hotel Grand Buffet - Infinite Loop</title>
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
            z-index: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.9)), url('bg.jpg');
            background-size: cover;
            background-position: center;
        }

        /* LAYOUT */
        .container {
            display: grid;
            grid-template-columns: 38% 62%;
            height: 100vh;
            padding: 30px;
            gap: 20px;
        }

        /* SIDEBAR: BRANDING & HEARTBEAT */
        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 10;
        }

        .company-logo {
            height: 200px;
            margin-bottom: 15px;
        }

        .menu-title {
            font-family: 'Great Vibes', cursive;
            font-size: 4.5rem;
            color: #ffd700;
            margin-bottom: 15px;
        }

        .price-tag {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 20px;
            width: 90%;
            margin-bottom: 12px;
            backdrop-filter: blur(10px);
        }

        .price-tag h2 {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 5px;
            opacity: 0.8;
        }

        .price-val {
            font-size: 3.5rem;
            font-weight: 900;
            color: #ffd700;
            display: block;
        }

        .wine-details {
            font-size: 1.3rem;
            margin-top: 10px;
            line-height: 1.4;
            color: #ffcccc;
            font-weight: 400;
        }

        /* HEARTBEAT ANIMATION */
        .hb-1 {
            animation: heartbeat 4s infinite;
            animation-delay: 0s;
        }

        .hb-2 {
            animation: heartbeat 4s infinite;
            animation-delay: 1.3s;
        }

        .hb-3 {
            animation: heartbeat 4s infinite;
            animation-delay: 2.6s;
        }

        @keyframes heartbeat {

            0%,
            20%,
            100% {
                transform: scale(1);
                text-shadow: none;
            }

            5% {
                transform: scale(1.12);
                text-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
            }

            10% {
                transform: scale(1.05);
            }

            15% {
                transform: scale(1.1);
                text-shadow: 0 0 15px rgba(255, 215, 0, 0.4);
            }
        }

        /* INFINITE SCROLLING WINDOW */
        .menu-window {
            position: relative;
            height: 100%;
            overflow: hidden;
        }

        /* This wrapper moves continuously */
        .scroll-wrapper {
            display: flex;
            flex-direction: column;
            animation: infiniteLoop 20s linear infinite;
            /* Adjust time for speed */
        }

        .menu-content {
            width: 100%;
            padding-right: 20px;
        }

        .section-header {
            font-size: 2rem;
            color: #ffd700;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin: 40px 0 15px 0;
            border-bottom: 2px solid rgba(255, 215, 0, 0.3);
            display: block;
        }

        .menu-item {
            font-size: 1.4rem;
            font-weight: 300;
            margin-bottom: 8px;
            display: block;
            border-left: 3px solid #c41e3a;
            padding-left: 12px;
        }

        .live-tag {
            color: #ff4d4d;
            font-weight: 700;
            font-size: 0.7rem;
            border: 1px solid #ff4d4d;
            padding: 1px 4px;
            margin-left: 8px;
            border-radius: 4px;
        }

        /* THE MAGIC: Moves the wrapper exactly half of its height */
        @keyframes infiniteLoop {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-50%);
            }
        }
    </style>
</head>

<body>

    <div class="bg-container"></div>

    <div class="container">
        <div class="sidebar">
            <img src="FelizLogo.png" class="company-logo" alt="Logo">
            <h1 class="menu-title">Grand Buffet</h1>

            <div class="price-tag hb-1">
                <h2 style="font-size:25px;">Adult</h2>
                <span class="price-val">₱ 3,299</span>
            </div>

            <div class="price-tag hb-2">
                <h2 style="font-size:25px;">Kids</h2>
                <span class="price-val">₱ 1,650</span>
            </div>

            <div class="price-tag hb-3">
                <h2 style="font-size:25px;">Unlimited Wine Add-on</h2>
                <span class="price-val">₱ 1,299</span>
                <div class="wine-details">
                    <strong>Enjoy Free-Flowing Wine</strong><br>
                    Renmano Cabernet Sauvignon<br>
                    Renmano Chardonnay | Prosecco
                </div>
            </div>
        </div>

        <div class="menu-window">
            <div class="scroll-wrapper" id="menuWrapper">
                <div class="menu-content" id="originalMenu">
                    <h2 class="section-header">Carving Station</h2>
                    <span class="menu-item">Porchetta</span>
                    <span class="menu-item">Roasted Beef w/ Herbs</span>
                    <span class="menu-item">Whole Steamed Fish w/ Ginger Garlic Sauce</span>
                    <span class="menu-item">Pata Negra | Hamon</span>
                    <span class="menu-item">Duck a l’orange</span>

                    <h2 class="section-header">Main Course</h2>
                    <span class="menu-item">Lengua Estofado</span>
                    <span class="menu-item">Red Thai Chicken Curry</span>
                    <span class="menu-item">Herb Crusted Lamb Rack</span>
                    <span class="menu-item">Roasted Beef with Red Wine Gravy</span>
                    <span class="menu-item">Salmon Fillet with Lemon Butter</span>
                    <span class="menu-item">Honey Soy Glazed Chicken Thigh</span>
                    <span class="menu-item">Fish Fillet with Tausi | Braised Beef</span>
                    <span class="menu-item">Yang Chow & Plain Rice</span>
                    <span class="menu-item">Callos & Buttered Vegetables</span>

                    <h2 class="section-header">Seafood Station <span class="live-tag">LIVE</span></h2>
                    <span class="menu-item">Oyster Rockefeller</span>
                    <span class="menu-item">Steamed Crab with Garlic Butter</span>
                    <span class="menu-item">Live Shellfish: Garlic, Lemon, or Chili Sauce</span>

                    <h2 class="section-header">Live Grilled Station <span class="live-tag">LIVE</span></h2>
                    <span class="menu-item">Pork & Chicken BBQ</span>
                    <span class="menu-item">Liempo & Beef Kebab</span>
                    <span class="menu-item">Hungarian Sausage</span>
                    <span class="menu-item">Grilled Shrimp & Buttered Corn</span>

                    <h2 class="section-header">Appetizers & Pizza</h2>
                    <span class="menu-item">Smoked Salmon | Tuna Mango Bruschetta</span>
                    <span class="menu-item">Mini Chicken Satay | Golden Shrimp</span>
                    <span class="menu-item">Asado Siopao | Jamon Iberico</span>
                    <span class="menu-item">Quatro Quesso & La Plaza Pizza</span>

                    <h2 class="section-header">Live Pasta Station <span class="live-tag">LIVE</span></h2>
                    <span class="menu-item">Seafood Marinara | Pesto Pasta</span>
                    <span class="menu-item">Aglio Olio | Pinoy Style Spaghetti</span>

                    <h2 class="section-header">Cakes & Pastries</h2>
                    <span class="menu-item">Burnt Basque Cheesecake</span>
                    <span class="menu-item">Crema Catalana | Tiramisu Shot</span>
                    <span class="menu-item">Chocolate Mousse | Eclair</span>
                    <span class="menu-item">Carrot Cake w/ Cream Cheese Frosting</span>
                    <span class="menu-item">Red Velvet Cupcakes | Brownies</span>

                    <h2 class="section-header">Pinoy Kakanin & Fruit</h2>
                    <span class="menu-item">Biko | Bibingka | Kutsinta</span>
                    <span class="menu-item">Watermelon (Red & Gold)</span>
                    <span class="menu-item">Kiat-Kiat | Lansones | Grapes</span>
                </div>
                <div class="menu-content" id="clonedMenu"></div>
            </div>
        </div>
    </div>

    <script>
        // Clone the menu content and append it to the wrapper for the infinite effect
        const original = document.getElementById('originalMenu');
        const clone = document.getElementById('clonedMenu');
        clone.innerHTML = original.innerHTML;
    </script>
</body>

</html>