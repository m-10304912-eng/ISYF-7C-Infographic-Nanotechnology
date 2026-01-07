
<?php
// Core PHP settings for XAMPP
header('X-Content-Type-Options: nosniff');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Nanotechnology Frontier | ISYF 7C</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cosmic-dark': '#000428',
                        'cosmic-light': '#004e92',
                        'neon-cyan': '#00f3ff',
                        'electric-violet': '#bf00ff',
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: radial-gradient(circle at center, #001a33 0%, #000428 100%);
            color: white;
            overflow-x: hidden;
        }
        .bg-stars {
            background-image: 
                radial-gradient(1px 1px at 20px 30px, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 40px 70px, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 50px 160px, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 90px 40px, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 130px 80px, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 160px 120px, #ffffff, rgba(0,0,0,0));
            background-repeat: repeat;
            background-size: 200px 200px;
            opacity: 0.3;
            animation: stars 100s linear infinite;
        }
        .DNA-overlay {
            background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(0, 243, 255, 0.05) 10px, rgba(0, 243, 255, 0.05) 11px);
        }
        @keyframes stars {
            from { background-position: 0 0; }
            to { background-position: 1000px 500px; }
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="min-h-screen relative font-sans selection:bg-neon-cyan selection:text-cosmic-dark">

    <!-- Background Elements -->
    <div class="fixed inset-0 bg-stars pointer-events-none z-0"></div>
    <div class="fixed inset-0 DNA-overlay pointer-events-none z-0"></div>

    <!-- Main Content -->
    <main class="relative z-10 flex flex-col items-center justify-center min-h-screen p-4 text-center">
        
        <!-- Hero Section -->
        <div class="mb-12 animate-float">
            <div class="inline-block px-4 py-1 mb-4 text-xs font-bold tracking-widest text-neon-cyan uppercase border border-neon-cyan rounded-full bg-neon-cyan/10">
                ISYF 7C Project
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-neon-cyan via-white to-electric-violet drop-shadow-[0_0_15px_rgba(0,243,255,0.5)]">
                The Nanotechnology<br>Frontier
            </h1>
            <p class="mt-4 text-lg text-gray-300 max-w-2xl mx-auto">
                Discovering the molecular future.
            </p>
        </div>

        <!-- Interactive Buttons -->
        <div class="flex flex-col md:flex-row gap-6 w-full max-w-md md:max-w-2xl justify-center z-20">
            <!-- Button 1: Infographic -->
            <button onclick="openGallery()" class="group relative px-8 py-4 bg-transparent border-2 border-neon-cyan rounded-lg overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-[0_0_20px_rgba(0,243,255,0.4)]">
                <div class="absolute inset-0 bg-neon-cyan/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                <span class="relative text-xl font-bold text-white group-hover:text-neon-cyan transition-colors">
                    View Infographic
                </span>
            </button>

            <!-- Button 2: The Lab -->
            <a href="https://phyweb.physics.nus.edu.sg/~physowch/NanoLab/" target="_blank" class="group relative px-8 py-4 bg-transparent border-2 border-electric-violet rounded-lg overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-[0_0_20px_rgba(191,0,255,0.4)]">
                <div class="absolute inset-0 bg-electric-violet/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                <span class="relative text-xl font-bold text-white group-hover:text-electric-violet transition-colors">
                    Meet Prof. Sow
                </span>
            </a>
        </div>

        <!-- QR Code Footer -->
        <div class="mt-16 glass-panel p-4 rounded-xl flex items-center gap-4 hover:bg-white/10 transition-colors">
            <div class="w-16 h-16 bg-white overflow-hidden rounded-lg p-1">
                <img src="QR.png" alt="Scan for Mobile" class="w-full h-full object-cover">
            </div>
            <div class="text-left">
                <p class="text-neon-cyan font-bold text-sm tracking-wider uppercase">Mobile Access</p>
                <p class="text-xs text-gray-400">Scan to view on your device</p>
            </div>
        </div>

    </main>

    <!-- Lightbox Modal -->
    <div id="galleryModal" class="fixed inset-0 z-50 hidden bg-black/95 backdrop-blur-xl transition-opacity duration-300 opacity-0">
        <!-- Close Button -->
        <button onclick="closeGallery()" class="absolute top-4 right-4 text-white hover:text-neon-cyan z-50 p-2">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <!-- Scrollable Content -->
        <div class="absolute inset-0 overflow-y-auto p-4 md:p-10">
            <div class="max-w-4xl mx-auto space-y-10 py-10">
                <h2 class="text-3xl font-bold text-center text-neon-cyan mb-8">Infographic Gallery</h2>
                
                <!-- Image 1 -->
                <div class="glass-panel p-2 rounded-lg transform transition hover:scale-[1.01] duration-500">
                    <img src="image1.jpeg" alt="Infographic Part 1" class="w-full h-auto rounded shadow-2xl">
                </div>

                <!-- Image 2 -->
                <div class="glass-panel p-2 rounded-lg transform transition hover:scale-[1.01] duration-500">
                    <img src="image2.jpeg" alt="Infographic Part 2" class="w-full h-auto rounded shadow-2xl">
                </div>

                <!-- Image 3 -->
                <div class="glass-panel p-2 rounded-lg transform transition hover:scale-[1.01] duration-500">
                    <img src="image3.jpeg" alt="Infographic Part 3" class="w-full h-auto rounded shadow-2xl">
                </div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('galleryModal');

        function openGallery() {
            modal.classList.remove('hidden');
            // Small delay to allow display:block to apply before opacity transition
            setTimeout(() => {
                modal.classList.remove('opacity-0');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeGallery() {
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        // Close on click outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal || e.target.classList.contains('overflow-y-auto')) {
                closeGallery();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeGallery();
        });
    </script>
</body>
</html>
