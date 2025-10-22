<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Scroll % (Clean Example)</title>

    <style>
        /* --- Scroll label --- */
        #scrollPercentLabel {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9999;
            background: #ffffff;
            color: #0e0e0e;
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.18);
            user-select: none;
            transition: transform .18s ease, opacity .18s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* numeric part */
        #scrollPercentLabel .value {
            color: #795c45;
            font-size: 18px;
            min-width: 36px;
            text-align: right;
        }

        /* percent sign */
        #scrollPercentLabel .sign {
            color: #777;
            font-size: 14px;
            margin-left: 2px;
        }
    </style>
</head>

<body>

    <!-- Scroll label -->
    <div id="scrollPercentLabel" aria-hidden="true">
        <div class="value">0</div>
        <div class="sign">%</div>
    </div>

    <script>
        (function() {
            const valueEl = document.querySelector('#scrollPercentLabel .value');

            // Compute and update percentage safely
            function updateScrollPercent() {
                // Use documentElement for accurate cross-browser values
                const doc = document.documentElement;
                const scrollTop = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
                const docHeight = Math.max(
                    doc.scrollHeight,
                    document.body ? document.body.scrollHeight : 0
                );
                const winHeight = window.innerHeight || doc.clientHeight;

                const scrollable = docHeight - winHeight;

                // Guard: if no scrollable area, percent = 0
                let percent = 0;
                if (scrollable > 0) {
                    percent = (scrollTop / scrollable) * 100;
                }

                // Clamp & round
                percent = Math.round(Math.max(0, Math.min(100, percent)));

                // Update DOM
                valueEl.textContent = percent;
            }

            // Run on load, scroll and resize
            window.addEventListener('scroll', updateScrollPercent, {
                passive: true
            });
            window.addEventListener('resize', updateScrollPercent);
            window.addEventListener('orientationchange', updateScrollPercent);
            window.addEventListener('DOMContentLoaded', updateScrollPercent);

            // Initial call in case script runs after DOMContentLoaded
            updateScrollPercent();
        })();
    </script>
</body>

</html>
