<?php require "config/config.php"; ?>
<?php require "libs/app.php"; ?><?php include "layouts/url.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Armani Duque</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        }
    </style>
</head>

<body class="text-white h-screen flex items-center justify-center font-sans">

    <div
        class="text-center p-8 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10 shadow-2xl max-w-lg mx-4">
        <h1 class="text-4xl font-extrabold mb-2 tracking-tight">
            Welcome to My Project
        </h1>
        <p class="text-blue-400 font-medium mb-6 uppercase tracking-widest text-sm">
            Systems & Solutions
        </p>

        <div class="mb-8">
            <p class="text-gray-300 text-lg">
                Hello! I am <span class="text-white font-bold underline decoration-blue-500">Armani Duque</span>,
                your IT Specialist Officer.
            </p>
            <p class="text-gray-400 mt-2 italic text-sm">
                Need assistance? Feel free to contact me for any technical support.
            </p>
        </div>

        <div class="flex flex-col gap-4">
            <a href="<?php echo APPURL; ?>auth/login.php"
                class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-8 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                Access Login Page
            </a>

            <a href="mailto:it@felizhotelboracay.com" class="text-gray-400 hover:text-white text-sm transition">
                Contact Armani Duque →
            </a>
        </div>
    </div>

</body>

</html>