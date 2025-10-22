<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fantastic Interactive Cursor</title>

    <!-- GSAP v3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <style>
        .Cursor {
            pointer-events: none;
            position: fixed;
            display: block;
            top: 0;
            left: 0;
            z-index: 1000;
            filter: url('#goo');
        }

        .Cursor span {
            position: absolute;
            display: block;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #ffffff;
            transform-origin: center;
            transform: translate(-50%, -50%);
        }

        .svg1 {
            position: absolute;
            top: 0;
            left: 0;
        }

        /* DEMO BUTTONS */
        .btn1 {
            background: transparent;
            border: 2px solid #fff;
            padding: 12px 28px;
            color: white;
            font-size: 1.1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn1:hover {
            background: white;
            color: black;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <svg class="svg1">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
                <feColorMatrix in="blur" mode="matrix"
                    values="1 0 0 0 0
                  0 1 0 0 0
                  0 0 1 0 0
                  0 0 0 35 -15"
                    result="goo" />
                <feComposite in="SourceGraphic" in2="goo" operator="atop" />
            </filter>
        </defs>
    </svg>

    <div id="cursor" class="Cursor"></div>

    <script>
        const cursor = document.getElementById("cursor");
        const amount = 20;
        const sineDots = Math.floor(amount * 0.3);
        const width = 24;
        const idleTimeout = 180;
        let lastFrame = 0;
        let mouse = {
            x: 0,
            y: 0
        };
        let dots = [];
        let idle = false;
        let timeoutID;

        class Dot {
            constructor(index = 0) {
                this.index = index;
                this.anglespeed = 0.05;
                this.x = 0;
                this.y = 0;
                this.scale = 1 - 0.05 * index;
                this.range = width / 2 - (width / 2) * this.scale + 2;
                this.limit = width * 0.75 * this.scale;
                this.element = document.createElement("span");
                gsap.set(this.element, {
                    scale: this.scale
                });
                cursor.appendChild(this.element);
            }

            lock() {
                this.lockX = this.x;
                this.lockY = this.y;
                this.angleX = Math.PI * 2 * Math.random();
                this.angleY = Math.PI * 2 * Math.random();
            }

            draw() {
                if (!idle || this.index <= sineDots) {
                    gsap.set(this.element, {
                        x: this.x,
                        y: this.y
                    });
                } else {
                    this.angleX += this.anglespeed;
                    this.angleY += this.anglespeed;
                    this.y = this.lockY + Math.sin(this.angleY) * this.range;
                    this.x = this.lockX + Math.sin(this.angleX) * this.range;
                    gsap.set(this.element, {
                        x: this.x,
                        y: this.y
                    });
                }
            }
        }

        function buildDots() {
            for (let i = 0; i < amount; i++) {
                let dot = new Dot(i);
                dots.push(dot);
            }
        }

        const startIdleTimer = () => {
            timeoutID = setTimeout(() => goInactive(), idleTimeout);
            idle = false;
        };

        const resetIdleTimer = () => {
            clearTimeout(timeoutID);
            startIdleTimer();
        };

        function goInactive() {
            idle = true;
            dots.forEach(dot => dot.lock());
            // gentle pulse when idle
            gsap.to(cursor, {
                scale: 1.1,
                duration: 1,
                yoyo: true,
                repeat: -1,
                ease: "sine.inOut"
            });
        }

        const onMouseMove = (e) => {
            mouse.x = e.clientX - width / 2;
            mouse.y = e.clientY - width / 2;
            gsap.to(cursor, {
                scale: 1,
                duration: 0.3
            }); // reset scale
            resetIdleTimer();
        };

        const render = (t) => {
            const delta = t - lastFrame;
            positionCursor(delta);
            lastFrame = t;
            requestAnimationFrame(render);
        };

        const positionCursor = (delta) => {
            let x = mouse.x;
            let y = mouse.y;
            dots.forEach((dot, i, arr) => {
                let next = arr[i + 1] || arr[0];
                dot.x = x;
                dot.y = y;
                dot.draw(delta);
                if (!idle || i <= sineDots) {
                    const dx = (next.x - dot.x) * 0.35;
                    const dy = (next.y - dot.y) * 0.35;
                    x += dx;
                    y += dy;
                }
            });
        };

        function init() {
            window.addEventListener("mousemove", onMouseMove);
            lastFrame += new Date();
            buildDots();
            render();

            // hover interaction on clickable elements
            document.querySelectorAll("button, a").forEach((el) => {
                el.addEventListener("mouseenter", () => {
                    gsap.to(".Cursor span", {
                        background: "#795c45",
                        scale: 1,
                        duration: 0.3
                    });
                });
                el.addEventListener("mouseleave", () => {
                    gsap.to(".Cursor span", {
                        background: "#ffffff",
                        scale: 0.7,
                        duration: 0.3
                    });
                });
            });
        }

        init();
    </script>
</body>

</html>
