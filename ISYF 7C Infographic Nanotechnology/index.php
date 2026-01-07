
<?php header('X-Content-Type-Options: nosniff'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Nanotechnology Frontier | ISYF 7C</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            background-color: #000428;
            color: white;
            font-family: sans-serif;
        }

        #bg-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background: radial-gradient(circle at center, #001a33 0%, #000428 100%);
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }

        /* Tactile Button Press */
        .btn-interact:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body class="selection:bg-cyan-500">

    <canvas id="bg-canvas"></canvas>

    <main class="relative z-10 flex flex-col items-center justify-center min-h-screen p-6 text-center">
        
        <div class="mb-12 animate-float">
            <div class="inline-block px-4 py-1 mb-4 text-xs font-bold tracking-widest text-cyan-400 uppercase border border-cyan-400 rounded-full bg-cyan-400/10">
                ISYF 7C Project
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-white to-purple-500 drop-shadow-[0_0_15px_rgba(0,243,255,0.5)]">
                The Nanotechnology<br>Frontier
            </h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">
                Exploring Gold Nanoparticles & Molecular Engineering.
            </p>
        </div>

        <div class="flex flex-col md:flex-row gap-6 w-full max-w-2xl justify-center">
            <button onclick="openGallery()" class="btn-interact group relative px-10 py-5 bg-transparent border-2 border-cyan-400 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-[0_0_30px_rgba(34,211,238,0.4)]">
                <div class="absolute inset-0 bg-cyan-400/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                <span class="relative text-xl font-bold text-white group-hover:text-cyan-200">View Infographic</span>
            </button>

            <a href="https://phyweb.physics.nus.edu.sg/~physowch/NanoLab/" target="_blank" class="btn-interact group relative px-10 py-5 bg-transparent border-2 border-purple-500 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-[0_0_30px_rgba(168,85,247,0.4)]">
                <div class="absolute inset-0 bg-purple-500/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                <span class="relative text-xl font-bold text-white group-hover:text-purple-200">Meet Prof. Sow</span>
            </a>
        </div>

        <div class="mt-16 glass-panel p-4 flex items-center gap-4 hover:bg-white/10 transition-colors">
            <div class="w-14 h-14 bg-white rounded-lg p-1">
                <img src="QR.png" alt="QR" class="w-full h-full object-contain">
            </div>
            <div class="text-left">
                <p class="text-cyan-400 font-bold text-sm uppercase">Scan for Mobile</p>
                <p class="text-xs text-gray-400">View on your device</p>
            </div>
        </div>
    </main>

    <div id="galleryModal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-2xl transition-opacity duration-300 opacity-0 overflow-y-auto">
        <button onclick="closeGallery()" class="fixed top-6 right-6 text-white hover:text-cyan-400 z-[60]">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <div class="max-w-4xl mx-auto p-10 space-y-8">
            <h2 class="text-3xl font-bold text-center text-cyan-400">Infographic Gallery</h2>
            <img src="image1.jpeg" class="w-full rounded-xl border border-white/10 shadow-2xl">
            <img src="image2.jpeg" class="w-full rounded-xl border border-white/10 shadow-2xl">
            <img src="image3.jpeg" class="w-full rounded-xl border border-white/10 shadow-2xl">
        </div>
    </div>

    <script>
        // --- GALAXY DNA ANIMATION ---
        const canvas = document.getElementById('bg-canvas');
        const ctx = canvas.getContext('2d');
        let width, height, particles = [];

        function init() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }

        window.addEventListener('resize', init);
        init();

        function drawDNA() {
            ctx.clearRect(0, 0, width, height);
            const time = Date.now() * 0.001;
            const centerX = width / 2;
            const centerY = height / 2;
            
            // Draw Stars
            ctx.fillStyle = "white";
            for(let i=0; i<100; i++) {
                let x = (Math.sin(i) * 0.5 + 0.5) * width;
                let y = (Math.cos(i * 2) * 0.5 + 0.5) * height;
                ctx.globalAlpha = Math.random() * 0.5;
                ctx.fillRect(x, y, 1, 1);
            }

            // DNA Strands
            for (let i = 0; i < 40; i++) {
                const y = (i / 40) * height;
                const offset = Math.sin(time + i * 0.2) * 100;
                
                // Strand 1
                ctx.globalAlpha = 0.6;
                ctx.fillStyle = '#00f3ff';
                ctx.beginPath();
                ctx.arc(centerX + offset, y, 3, 0, Math.PI * 2);
                ctx.fill();

                // Strand 2
                ctx.fillStyle = '#bf00ff';
                ctx.beginPath();
                ctx.arc(centerX - offset, y, 3, 0, Math.PI * 2);
                ctx.fill();

                // Connecting Base Pairs
                if (i % 2 === 0) {
                    ctx.strokeStyle = 'rgba(255,255,255,0.1)';
                    ctx.beginPath();
                    ctx.moveTo(centerX + offset, y);
                    ctx.lineTo(centerX - offset, y);
                    ctx.stroke();
                }
            }
            requestAnimationFrame(drawDNA);
        }
        drawDNA();

        // --- MODAL LOGIC ---
        const modal = document.getElementById('galleryModal');
        function openGallery() {
            modal.classList.remove('hidden');
            setTimeout(() => modal.classList.remove('opacity-0'), 10);
            document.body.style.overflow = 'hidden';
        }
        function closeGallery() {
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }
    </script>
</body>
</html>
