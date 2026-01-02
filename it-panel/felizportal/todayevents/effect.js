
        const canvas = document.getElementById('logo-snow-canvas');
        const ctx = canvas.getContext('2d');
        const logoImg = new Image();
        logoImg.src = '../Logo.png'; // Using your Feliz Logo as the snowflake

        let particles = [];
        const particleCount = 25; // How many logos falling at once

        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        window.addEventListener('resize', resize);
        resize();

        class LogoSnowflake {
            constructor() {
                this.reset();
            }

            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * -canvas.height;
                this.size = Math.random() * 40 + 20; // Random size between 20px and 60px
                this.speed = Math.random() * 1.5 + 0.5;
                this.opacity = Math.random() * 0.5 + 0.2; // Semi-transparent
                this.rotation = Math.random() * 360;
                this.spin = Math.random() * 1 - 0.5;
            }

            update() {
                this.y += this.speed;
                this.rotation += this.spin;
                if (this.y > canvas.height) {
                    this.reset();
                    this.y = -50;
                }
            }

            draw() {
                ctx.save();
                ctx.globalAlpha = this.opacity;
                ctx.translate(this.x, this.y);
                ctx.rotate(this.rotation * Math.PI / 180);
                // Draw the logo image
                ctx.drawImage(logoImg, -this.size / 2, -this.size / 2, this.size, this.size);
                ctx.restore();
            }
        }

        function init() {
            for (let i = 0; i < particleCount; i++) {
                particles.push(new LogoSnowflake());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }

        document.getElementById('start-btn').addEventListener('click', () => {
            document.getElementById('start-overlay').style.display = 'none';
            init();
            animate();
        });
