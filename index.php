
<?php header('X-Content-Type-Options: nosniff'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Nanotech | ISYF 7C</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Deep Dark Blue Background */
        body, html { margin: 0; padding: 0; width: 100%; height: 100%; overflow: hidden; background-color: #010310; }
        canvas { position: fixed; top: 0; left: 0; z-index: 0; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .gold-glow { text-shadow: 0 0 20px rgba(255, 215, 0, 0.6); }
        .interactive { pointer-events: auto; }
        
        /* Mobile Tweaks */
        @media (max-width: 640px) {
            .gold-glow { text-shadow: 0 0 10px rgba(255, 215, 0, 0.6); }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen text-white font-sans p-4 relative">

    <canvas id="dnaCanvas"></canvas>

    <!-- Main Content centered absolutely with flexbox -->
    <main class="relative z-10 w-full max-w-4xl flex flex-col items-center justify-center text-center transition-opacity duration-500 min-h-[80vh]" id="mainContent">
        
        <!-- Badge -->
        <div class="mb-6 animate-pulse">
            <span class="px-4 py-1 border border-cyan-400/50 rounded-full text-[10px] sm:text-xs tracking-[0.2em] text-cyan-400 font-bold uppercase bg-cyan-400/10 shadow-[0_0_15px_rgba(0,243,255,0.3)]">
                ISYF 7C PROJECT
            </span>
        </div>
        
        <!-- Shorter Centered Title -->
        <h1 class="text-5xl sm:text-7xl md:text-9xl font-extrabold mb-6 tracking-tighter gold-glow uppercase italic bg-clip-text text-transparent bg-gradient-to-r from-cyan-300 via-white to-purple-400 leading-none">
            Nanotech
        </h1>

        <!-- Subtitle -->
        <p class="mb-12 text-gray-300 max-w-xs sm:max-w-lg mx-auto text-sm sm:text-lg font-light tracking-wide px-4">
            The Molecular Future of Science.
        </p>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 sm:gap-8 justify-center w-full max-w-xs sm:max-w-none mb-14">
            <button onclick="openGallery()" class="glass w-full sm:w-auto px-8 py-4 rounded-full hover:bg-yellow-500/20 transition-all font-bold border border-yellow-500/50 text-yellow-500 interactive shadow-lg hover:shadow-yellow-500/30 active:scale-95 text-sm sm:text-base tracking-wide">
                View Infographic
            </button>
            <a href="https://phyweb.physics.nus.edu.sg/~physowch/NanoLab/" target="_blank" class="glass w-full sm:w-auto px-8 py-4 rounded-full hover:bg-purple-500/20 transition-all font-bold border border-purple-500/50 text-purple-400 interactive shadow-lg hover:shadow-purple-500/30 active:scale-95 text-center flex items-center justify-center text-sm sm:text-base tracking-wide">
                Meet Prof. Sow
            </a>
        </div>

        <!-- Credits -->
        <div class="glass p-4 rounded-xl w-full max-w-md mx-auto interactive hover:bg-white/5 transition-colors border-none bg-white/5">
            <p class="text-[10px] sm:text-xs text-cyan-400 uppercase tracking-widest font-bold mb-2 opacity-80">Project Team</p>
            <p class="text-[11px] sm:text-sm text-gray-300 font-light leading-relaxed">
                Soo Po Ming Terreace &middot; Victoria Mok Hui Ting<br> 
                Shumma Shimomura &middot; Kityada Srisithiporn
            </p>
        </div>
    </main>

    <!-- Lightbox Gallery (Overlay) -->
    <div id="galleryModal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-xl opacity-0 overflow-y-auto interactive p-4">
        <button onclick="closeGallery()" class="fixed top-4 right-4 text-white hover:text-yellow-500 z-[60] bg-white/10 rounded-full p-2 backdrop-blur-sm transition-colors">
            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        
        <div class="max-w-4xl mx-auto min-h-full flex flex-col items-center justify-center space-y-8 py-10">
            <h2 class="text-2xl sm:text-3xl font-bold text-yellow-500 tracking-widest uppercase mb-2 gold-glow text-center">The Nano Era</h2>
            
            <div class="space-y-4 w-full">
                <div class="glass p-1 sm:p-2 rounded-xl">
                    <img src="image4.png" class="w-full rounded-lg" alt="Infographic Part 1">
                </div>
                <div class="glass p-1 sm:p-2 rounded-xl">
                    <img src="image5.png" class="w-full rounded-lg" alt="Infographic Part 2">
                </div>
                <div class="glass p-1 sm:p-2 rounded-xl">
                    <img src="image6.png" class="w-full rounded-lg" alt="Infographic Part 3">
                </div>
            </div>
            
            <button onclick="closeGallery()" class="px-6 py-2 sm:px-8 sm:py-3 rounded-full border border-gray-600 text-gray-400 hover:text-white hover:border-white transition-colors text-xs sm:text-sm uppercase tracking-wider mb-8">
                Close Gallery
            </button>
        </div>
    </div>

    <script>
        // --- ANIMATION LOGIC ---
        const canvas = document.getElementById('dnaCanvas');
        const ctx = canvas.getContext('2d');
        let width, height;
        let stars = [];
        let constellations = [];
        let lastConstellationTime = 0;

        function init() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
            
            stars = [];
            for(let i = 0; i < 150; i++) {
                stars.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    size: Math.random() * 1.5 + 0.5,
                    opacity: Math.random(),
                    blinkSpeed: Math.random() * 0.02 + 0.005,
                    blinkDir: 1
                });
            }
        }
        window.addEventListener('resize', init);
        init();

        // Constellation Helper
        function createConstellation() {
            const starCount = Math.floor(Math.random() * 3) + 3; // 3 to 5 stars
            const rootIndex = Math.floor(Math.random() * stars.length);
            const rootStar = stars[rootIndex];
            
            // Find N nearest stars to root
            let neighbors = stars
                .map((s, i) => ({ index: i, dist: Math.hypot(s.x - rootStar.x, s.y - rootStar.y), star: s }))
                .sort((a, b) => a.dist - b.dist)
                .slice(0, starCount); // Get closest ones (including self)
                
            const constellation = {
                stars: neighbors.map(n => n.star),
                life: 1.0, // Opacity of lines
                id: Date.now()
            };
            constellations.push(constellation);
        }

        function drawStarsAndConstellations() {
            // Draw Stars
            ctx.fillStyle = "white";
            stars.forEach(star => {
                ctx.globalAlpha = star.opacity;
                ctx.beginPath();
                ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
                ctx.fill();
                
                // Blink Logic
                star.opacity += star.blinkSpeed * star.blinkDir;
                if(star.opacity > 1) { star.opacity = 1; star.blinkDir = -1; }
                if(star.opacity < 0.2) { star.opacity = 0.2; star.blinkDir = 1; }
            });

            // Handle Constellations
            const now = Date.now();
            if (now - lastConstellationTime > 4000) { // New constellation every 4s
                createConstellation();
                lastConstellationTime = now;
            }

            constellations.forEach((c, index) => {
                ctx.lineWidth = 1;
                ctx.strokeStyle = `rgba(255, 255, 255, ${c.life * 0.3})`;
                ctx.beginPath();
                // Connect stars in sequence
                ctx.moveTo(c.stars[0].x, c.stars[0].y);
                for(let i=1; i<c.stars.length; i++) {
                    ctx.lineTo(c.stars[i].x, c.stars[i].y);
                }
                ctx.stroke();

                // Highlight stars in constellation
                c.stars.forEach(s => {
                    ctx.fillStyle = `rgba(255, 215, 0, ${c.life})`; // Gold glow
                    ctx.beginPath();
                    ctx.arc(s.x, s.y, s.size * 2, 0, Math.PI * 2);
                    ctx.fill();
                });

                c.life -= 0.005; // Fade out
            });
            // Remove dead constellations
            constellations = constellations.filter(c => c.life > 0);
            
            ctx.globalAlpha = 1;
        }

        function draw() {
            // Dark Deep Blue Background
            var gradient = ctx.createRadialGradient(width/2, height/2, 0, width/2, height/2, width);
            gradient.addColorStop(0, '#00081d'); // Deep Blue center
            gradient.addColorStop(1, '#000000'); // Black edges
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, width, height);

            drawStarsAndConstellations();

            // DNA Animation
            const time = Date.now() * 0.001; 
            const centerX = width / 2;
             // Mobile wave adjustment
             const waveAmp = width < 640 ? width * 0.35 : width * 0.15;
            
            for (let i = 0; i < 60; i++) {
                const y = (i / 60) * height;
                const wave = Math.sin(time + i * 0.12) * waveAmp;
                
                // Strand 1 - GOLD
                ctx.fillStyle = '#FFD700';
                ctx.shadowBlur = 15;
                ctx.shadowColor = '#FFD700';
                ctx.beginPath();
                ctx.arc(centerX + wave, y, 3, 0, Math.PI * 2);
                ctx.fill();

                // Strand 2 - CYAN
                ctx.fillStyle = '#00f3ff';
                ctx.shadowBlur = 10;
                ctx.shadowColor = '#00f3ff';
                ctx.beginPath();
                ctx.arc(centerX - wave, y, 3, 0, Math.PI * 2);
                ctx.fill();

                // Connectors
                if (i % 4 === 0) {
                    ctx.shadowBlur = 0;
                    ctx.strokeStyle = 'rgba(255, 255, 255, 0.08)';
                    ctx.beginPath();
                    ctx.moveTo(centerX + wave, y);
                    ctx.lineTo(centerX - wave, y);
                    ctx.stroke();
                }
            }
            requestAnimationFrame(draw);
        }
        draw();

        // --- INTERACTIVITY LOGIC ---
        const modal = document.getElementById('galleryModal');
        const mainContent = document.getElementById('mainContent');

        function openGallery() {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
            document.body.style.overflow = 'hidden';
            mainContent.classList.add('opacity-50', 'blur-[2px]');
        }

        function closeGallery() {
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                mainContent.classList.remove('opacity-50', 'blur-[2px]');
                document.body.style.overflow = '';
            }, 300);
        }
        
        document.addEventListener('keydown', (e) => {
            if(e.key === 'Escape') closeGallery();
        });
    </script>
</body>
</html>
