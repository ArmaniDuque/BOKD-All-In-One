<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Scan System</title>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #f4f4f9;
        }

        #reader {
            width: 350px;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        #notification {
            display: none;
            padding: 15px;
            background: #4CAF50;
            color: white;
            border-radius: 8px;
            margin-top: 20px;
            animation: slideIn 0.5s;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="card">
        <h2>Scan Meal QR Code</h2>
        <div id="reader"></div>
        <div id="notification">✅ Scan Successful! Enjoy your meal.</div>
        <a href="meals.php">Meals Test</a>
    </div>

    <script>
        // Mock user data (In a real app, get this from PHP $_SESSION)
        const currentUser = {
            id: "EMP101",
            name: "John Doe"
        };

        function onScanSuccess(decodedText, decodedResult) {
            // decodedText would be the value inside the QR code (e.g., "CANTEEN_STATION_1")

            fetch('save_meal.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    emp_id: currentUser.id,
                    emp_name: currentUser.name,
                    qr_code: decodedText
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        showSuccess();
                    }
                });
        }

        function showSuccess() {
            const notify = document.getElementById('notification');
            notify.style.display = 'block';

            // Haptic Feedback (Vibration)
            if (navigator.vibrate) navigator.vibrate([100, 50, 100]);

            // Sound Feedback
            let audio = new Audio('https://assets.mixkit.co/active_storage/sfx/2354/2354-preview.mp3');
            audio.play();

            setTimeout(() => {
                notify.style.display = 'none';
            }, 4000);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", {
            fps: 10,
            qrbox: 250
        });
        html5QrcodeScanner.render(onScanSuccess);
    </script>

</body>

</html>