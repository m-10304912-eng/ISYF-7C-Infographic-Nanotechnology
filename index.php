
<?php header('X-Content-Type-Options: nosniff'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Nanotechnology Frontier | ISYF 7C</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body, html { margin: 0; padding: 0; width: 100%; height: 100%; overflow: hidden; background-color: #000428; }
        canvas { position: fixed; top: 0; left: 0; z-index: 0; }
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .gold-glow { text-shadow: 0 0 20px rgba(255, 215, 0, 0.6); }
        
        /* Modal Utilities */
        #galleryModal { transition: opacity 0.3s ease; }
        .interactive { pointer-events: auto; }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen text-white font-sans">

    <canvas id="dnaCanvas"></canvas>

    <main class="relative z-10 text-center px-6 transition-opacity duration-500" id="mainContent">
        <div class="mb-4">
            <span class="px-4 py-1 border border-yellow-500/50 rounded-full text-[10px] tracking-[0.2em] text-yellow-500 font-bold uppercase bg-yellow-500/10">
                Molecular Engineering Frontier
            </span>
        </div>
        
        <h1 class="text-6xl md:text-8xl font-black mb-6 tracking-tighter gold-glow uppercase italic">
            Nano<br><span class="text-cyan-400">Era</span>
        </h1>

        <p class="mb-10 text-gray-400 max-w-md mx-auto text-sm leading-relaxed">
            Manipulating matter at the atomic scale to revolutionize the future of medicine and materials.
        </p>

        <div class="flex flex-col md:flex-row gap-4 justify-center">
            <button onclick="openGallery()" class="glass px-10 py-4 rounded-full hover:bg-yellow-500/20 transition-all font-bold border border-yellow-500/50 text-yellow-500 interactive">
                INFOGRAPHIC
            </button>
            <a href="https://phyweb.physics.nus.edu.sg/~physowch/NanoLab/" target="_blank" class="glass px-10 py-4 rounded-full hover:bg-cyan-500/20 transition-all font-bold border border-cyan-500/50 text-cyan-400 interactive">
                LAB WEBSITE
            </a>
        </div>
        
        <!-- QR Code (Integrated Style) -->
        <div class="mt-12 flex justify-center opacity-70 hover:opacity-100 transition-opacity">
            <div class="bg-white/10 p-2 rounded-lg backdrop-blur-sm border border-white/10">
                <img src="QR.png" alt="Mobile QR" class="w-10 h-10 object-contain">
            </div>
        </div>
    </main>

    <!-- Lightbox Gallery (Overlay) -->
    <div id="galleryModal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-xl opacity-0 overflow-y-auto interactive">
        <button onclick="closeGallery()" class="fixed top-6 right-6 text-white hover:text-yellow-500 z-[60] bg-white/10 rounded-full p-2 backdrop-blur-sm">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        
        <div class="max-w-4xl mx-auto p-4 md:p-10 min-h-screen flex flex-col items-center justify-center space-y-8">
            <h2 class="text-3xl font-bold text-yellow-500 tracking-widest uppercase mb-4 gold-glow">The Nano Era</h2>
            
            <div class="space-y-4 w-full">
                <div class="glass p-2 rounded-xl">
                    <img src="image1.jpeg" class="w-full rounded-lg" alt="Infographic Part 1">
                </div>
                <div class="glass p-2 rounded-xl">
                    <img src="image2.jpeg" class="w-full rounded-lg" alt="Infographic Part 2">
                </div>
                <div class="glass p-2 rounded-xl">
                    <img src="image3.jpeg" class="w-full rounded-lg" alt="Infographic Part 3">
                </div>
            </div>
            
            <button onclick="closeGallery()" class="px-8 py-3 rounded-full border border-gray-600 text-gray-400 hover:text-white hover:border-white transition-colors text-sm uppercase tracking-wider">
                Close Gallery
            </button>
        </div>
    </div>

    <script>
        // --- ANIMATION LOGIC ---
        const canvas = document.getElementById('dnaCanvas');
        const ctx = canvas.getContext('2d');
        let width, height;

        function init() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', init);
        init();

        function draw() {
            // Dark Space Background with slight trail
            ctx.fillStyle = 'rgba(0, 4, 40, 0.15)';
            ctx.fillRect(0, 0, width, height);

            const time = Date.now() * 0.0008; // Slower, elegant speed
            const centerX = width / 2;
            
            for (let i = 0; i < 60; i++) {
                const y = (i / 60) * height;
                const wave = Math.sin(time + i * 0.12) * (width * 0.15);
                
                // Strand 1 - GOLD (Nanoparticles)
                ctx.fillStyle = '#FFD700';
                ctx.shadowBlur = 15;
                ctx.shadowColor = '#FFD700';
                ctx.beginPath();
                ctx.arc(centerX + wave, y, 3, 0, Math.PI * 2);
                ctx.fill();

                // Strand 2 - CYAN (Tech)
                ctx.fillStyle = '#00f3ff';
                ctx.shadowColor = '#00f3ff';
                ctx.beginPath();
                ctx.arc(centerX - wave, y, 3, 0, Math.PI * 2);
                ctx.fill();

                // Connectors
                if (i % 4 === 0) {
                    ctx.shadowBlur = 0;
                    ctx.strokeStyle = 'rgba(255, 255, 255, 0.05)';
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
        
        // Escape key close
        document.addEventListener('keydown', (e) => {
            if(e.key === 'Escape') closeGallery();
        });
    </script>
</body>
</html>
