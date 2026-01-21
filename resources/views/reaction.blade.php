<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Global Vibes - Connect Worldwide</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.15.3/dist/echo.iife.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            min-height: 100vh;
            position: relative;
        }

        /* Animated background particles */
        .bg-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            animation: float-particle 20s infinite ease-in-out;
        }

        .particle:nth-child(1) {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
            top: -200px;
            left: -200px;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.12) 0%, transparent 70%);
            top: 60%;
            right: -250px;
            animation-delay: -7s;
        }

        .particle:nth-child(3) {
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.13) 0%, transparent 70%);
            bottom: -100px;
            left: 20%;
            animation-delay: -14s;
        }

        .particle:nth-child(4) {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.14) 0%, transparent 70%);
            top: 30%;
            right: 30%;
            animation-delay: -5s;
        }

        @keyframes float-particle {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg) scale(1);
            }
            33% {
                transform: translate(50px, -50px) rotate(120deg) scale(1.1);
            }
            66% {
                transform: translate(-30px, 30px) rotate(240deg) scale(0.9);
            }
        }

        /* Main container */
        .container {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        /* Hero section */
        .hero {
            text-align: center;
            margin-bottom: 4rem;
            animation: fadeInDown 1s ease-out;
        }

        .hero h1 {
            font-size: clamp(3rem, 8vw, 7rem);
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            animation: gradient-shift 3s ease infinite;
            letter-spacing: -0.02em;
            line-height: 1.1;
        }

        @keyframes gradient-shift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .hero p {
            font-size: clamp(1.1rem, 2vw, 1.5rem);
            color: rgba(255, 255, 255, 0.7);
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        /* Grid of reaction buttons */
        .reactions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            width: 100%;
            margin-bottom: 3rem;
        }

        /* Glassmorphism card */
        .reaction-card {
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 3rem 2rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out backwards;
        }

        .reaction-card:nth-child(1) { animation-delay: 0.1s; }
        .reaction-card:nth-child(2) { animation-delay: 0.2s; }
        .reaction-card:nth-child(3) { animation-delay: 0.3s; }
        .reaction-card:nth-child(4) { animation-delay: 0.4s; }

        .reaction-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 30px;
            padding: 2px;
            background: linear-gradient(135deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .reaction-card:hover {
            transform: translateY(-10px) scale(1.02);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4), 0 0 50px var(--glow-color);
        }

        .reaction-card:hover::before {
            opacity: 1;
        }

        .reaction-card:active {
            transform: translateY(-5px) scale(0.98);
        }

        /* Glow effects for each card */
        .reaction-card[data-type="wave"] {
            --glow-color: rgba(59, 130, 246, 0.3);
        }
        .reaction-card[data-type="love"] {
            --glow-color: rgba(236, 72, 153, 0.3);
        }
        .reaction-card[data-type="energy"] {
            --glow-color: rgba(251, 191, 36, 0.3);
        }
        .reaction-card[data-type="joy"] {
            --glow-color: rgba(168, 85, 247, 0.3);
        }

        /* Icon container */
        .icon-container {
            font-size: 5rem;
            margin-bottom: 1.5rem;
            display: inline-block;
            position: relative;
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .reaction-card:hover .icon-container {
            transform: scale(1.2) rotate(10deg);
        }

        .icon-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 120%;
            height: 120%;
            background: var(--glow-color);
            border-radius: 50%;
            filter: blur(30px);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }

        .reaction-card:hover .icon-glow {
            opacity: 1;
        }

        /* Text content */
        .reaction-label {
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .reaction-subtitle {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 400;
        }

        /* Floating emojis animation */
        .floating-emoji {
            position: fixed;
            font-size: 3rem;
            pointer-events: none;
            z-index: 9999;
            animation: float-up 3s ease-out forwards;
        }

        @keyframes float-up {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(var(--drift-x)) rotate(360deg);
                opacity: 0;
            }
        }

        /* Live indicator */
        .live-indicator {
            position: fixed;
            top: 2rem;
            right: 2rem;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: fadeIn 1s ease-out 1s backwards;
        }

        .live-dot {
            width: 12px;
            height: 12px;
            background: #10b981;
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.6);
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }

        .live-text {
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Ripple effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.4);
            transform: scale(0);
            animation: ripple-animation 0.6s ease-out;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .reactions-grid {
                gap: 1.5rem;
            }

            .live-indicator {
                top: 1rem;
                right: 1rem;
                padding: 0.5rem 1rem;
            }

            .hero {
                margin-bottom: 3rem;
            }

            .icon-container {
                font-size: 3rem;
            }
        }
    </style>  
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <!-- Animated background -->
    <div class="bg-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Live indicator -->
    <div class="live-indicator">
        <div class="live-dot"></div>
        <span class="live-text">Live • Connected Worldwide</span>
    </div>

    <!-- Main container -->
    <div class="container">
        <!-- Hero section -->
        <div class="hero">
            <h1>Global Vibes</h1>
            <p>Express yourself and feel the world's emotions in real-time</p>
        </div>

        <!-- Reactions grid -->
        <div class="reactions-grid">
            <div class="reaction-card" data-type="wave" onclick="sendReaction('wave', '👋', this)">
                <div class="icon-container">
                    <div class="icon-glow"></div>
                    <span>👋</span>
                </div>
                <div class="reaction-label">Say Hello</div>
                <div class="reaction-subtitle">Wave to the world</div>
            </div>

            <div class="reaction-card" data-type="love" onclick="sendReaction('love', '❤️', this)">
                <div class="icon-container">
                    <div class="icon-glow"></div>
                    <span>❤️</span>
                </div>
                <div class="reaction-label">Send Love</div>
                <div class="reaction-subtitle">Share your heart</div>
            </div>

            <div class="reaction-card" data-type="energy" onclick="sendReaction('energy', '⚡', this)">
                <div class="icon-container">
                    <div class="icon-glow"></div>
                    <span>⚡</span>
                </div>
                <div class="reaction-label">Share Energy</div>
                <div class="reaction-subtitle">Spark the moment</div>
            </div>

            <div class="reaction-card" data-type="joy" onclick="sendReaction('joy', '😊', this)">
                <div class="icon-container">
                    <div class="icon-glow"></div>
                    <span>😊</span>
                </div>
                <div class="reaction-label">Spread Joy</div>
                <div class="reaction-subtitle">Smile together</div>
            </div>
        </div>
    </div>
    <script>
function sendReaction(type, emoji, element) {
    // Ripple effect
    const ripple = document.createElement('div');
    ripple.classList.add('ripple');
    element.appendChild(ripple);
    ripple.style.left = event.offsetX + 'px';
    ripple.style.top = event.offsetY + 'px';
    setTimeout(() => ripple.remove(), 600);

    // Send to server
    axios.post('/reaction', { type, emoji })
        .catch(err => console.error(err));
}

// Listen for real-time reactions
document.addEventListener('DOMContentLoaded', function() {
    window.Echo.channel('global-reactions')
        .listen('ReactionSent', (e) => {
            console.log('Reaction received:', e.type, e.emoji);

            // Floating emoji
            const emojiEl = document.createElement('div');
            emojiEl.className = 'floating-emoji';
            emojiEl.textContent = e.emoji;
            emojiEl.style.setProperty('--drift-x', (Math.random() * 200 - 100) + 'px');
            emojiEl.style.left = (window.innerWidth / 2) + 'px';
            emojiEl.style.top = (window.innerHeight / 2) + 'px';
            document.body.appendChild(emojiEl);

            setTimeout(() => emojiEl.remove(), 3000);
        });
});
</script>


</body>
</html>





















