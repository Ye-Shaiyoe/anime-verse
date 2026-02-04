<?php
require_once "config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimeVerse - Anime, Manga & Games</title>
    <link rel="icon" href="img/logo2.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
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

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .gradient-animate {
            background-size: 200% 200%;
            animation: gradient 5s ease infinite;
        }

        @keyframes blob {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            25% {
                transform: translate(20px, -50px) scale(1.1);
            }

            50% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            75% {
                transform: translate(50px, 50px) scale(1.05);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        html {
            scroll-behavior: smooth;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 10px 30px -10px rgba(6, 182, 212, 0.5);
        }

        .glass-effect {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .text-shadow {
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #0f172a;
        }

        ::-webkit-scrollbar-thumb {
            background: #0891b2;
            border-radius: 5px;
        }

        .category-tab {
            transition: all 0.3s ease;
        }

        .category-tab.active {
            background: linear-gradient(to right, #06b6d4, #2563eb);
            color: white;
        }
    </style>
</head>

<body class="bg-slate-950 text-slate-200 min-h-screen font-sans selection:bg-cyan-500 selection:text-white">

    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-cyan-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-[-20%] left-[20%] w-96 h-96 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

    <nav class="fixed w-full z-50 glass-effect border-b border-white/10">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="#" class="text-white font-bold text-2xl flex items-center space-x-2 group">
                    <div class="w-10 h-10 bg-gradient-to-tr from-gray-500 to-blue-600 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition duration-300">
                        <img src="img/logo2.png" alt="">

                        </img>
                    </div>
                    <span class="text-shadow tracking-wide">Anime<span class="text-cyan-400">Verse</span></span>
                </a>

                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-300 hover:text-cyan-400 transition font-medium relative group">
                        Home <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#anime" class="text-gray-300 hover:text-cyan-400 transition font-medium relative group">
                        Anime <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#manga" class="text-gray-300 hover:text-cyan-400 transition font-medium relative group">
                        Manga <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#game" class="text-gray-300 hover:text-cyan-400 transition font-medium relative group">
                        Game <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#community" class="text-gray-300 hover:text-cyan-400 transition font-medium relative group">
                        Community <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#contact" class="text-gray-300 hover:text-cyan-400 transition font-medium relative group">
                        Contact <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full"></span>
                    </a>
                </div>

                <div class="flex space-x-3">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- User sudah login -->
                        <div class="flex items-center space-x-3">
                            <span class="text-cyan-400">👋 <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                            <a href="auth/logout.php" class="px-5 py-2 rounded-full border border-red-500/30 text-red-400 hover:bg-red-500/10 transition">Logout</a>
                        </div>
                    <?php else: ?>
                        <!-- User belum login -->
                        <a href="auth/login_from.php" class="px-5 py-2 rounded-full border border-cyan-500/30 text-cyan-400 hover:bg-cyan-500/10 transition">Login</a>
                        <a href="auth/register.php" class="px-5 py-2 rounded-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white hover:shadow-lg hover:shadow-cyan-500/50 transition transform hover:scale-105">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <section id="home" class="pt-32 pb-20 px-6 relative overflow-hidden">
        <div class="container mx-auto relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="fade-in-up space-y-6">
                    <div class="inline-block px-4 py-2 glass-effect rounded-full border border-cyan-500/30 text-cyan-400 font-semibold text-sm mb-4">
                        🚀 Update Terbaru Anime Winter 2026
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight text-shadow">
                        Jelajahi <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-emerald-400 gradient-animate">Dunia</span><br> Per Wibuan
                    </h1>
                    <p class="text-slate-400 text-lg leading-relaxed max-w-lg">
                        Streaming anime legal, baca manga terbaru, dan mainkan game adaptasi anime terbaik. Semua dalam satu platform.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <button class="bg-gradient-to-r from-cyan-600 to-blue-600 text-white px-8 py-3 rounded-full font-bold hover:shadow-lg hover:shadow-cyan-500/40 transition transform hover:scale-105 flex items-center gap-2">
                            <span>▶</span> Mulai Menonton
                        </button>
                        <button class="glass-effect text-white px-8 py-3 rounded-full font-bold hover:bg-white/10 transition flex items-center gap-2">
                            <span>🔍</span> Cari Judul
                        </button>
                    </div>

                    <div class="flex items-center space-x-8 pt-8 border-t border-white/10 mt-8">
                        <div>
                            <div class="text-2xl font-bold text-white">10K+</div>
                            <div class="text-slate-500 text-sm">Anime List</div>
                        </div>
                        <div class="w-px h-10 bg-slate-700"></div>
                        <div>
                            <div class="text-2xl font-bold text-white">4.8/5</div>
                            <div class="text-slate-500 text-sm">App Rating</div>
                        </div>
                        <div class="w-px h-10 bg-slate-700"></div>
                        <div>
                            <div class="text-2xl font-bold text-white">50K+</div>
                            <div class="text-slate-500 text-sm">Active Users</div>
                        </div>
                    </div>
                </div>

                <div class="float-animation relative hidden md:block">
                    <div class="absolute inset-0 bg-cyan-500 rounded-full blur-[100px] opacity-20"></div>
                    <div class="relative grid grid-cols-2 gap-4">
                        <div class="space-y-4 mt-8">
                            <div class="glass-effect rounded-xl p-3 card-hover">
                                <div class="bg-gradient-to-br from-blue-600 to-indigo-900 h-48 rounded-lg mb-2 overflow-hidden relative flex items-center justify-center text-6xl">
                                    <img src="img/SL.jpg" alt="solo leveling">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-3">
                                        </img>
                                        <span class="text-white font-bold text-sm">Solo Leveling</span>
                                    </div>
                                </div>
                            </div>
                            <div class="glass-effect rounded-xl p-3 card-hover">
                                <div class="bg-gradient-to-br from-emerald-600 to-teal-900 h-40 rounded-lg mb-2 overflow-hidden relative flex items-center justify-center text-5xl">
                                    <img src="img/frieren.webp" alt="">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-3">
                                        </img>
                                        <span class="text-white font-bold text-sm">Frieren</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="glass-effect rounded-xl p-3 card-hover">
                                <div class="bg-gradient-to-br from-red-600 to-rose-900 h-40 rounded-lg mb-2 overflow-hidden relative flex items-center justify-center text-5xl">
                                    <img src="img/one.jpg" alt="one piece">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-3">
                                        </img>
                                        <span class="text-white font-bold text-sm">One Piece</span>
                                    </div>
                                </div>
                            </div>
                            <div class="glass-effect rounded-xl p-3 card-hover">
                                <div class="bg-gradient-to-br from-yellow-600 to-orange-900 h-48 rounded-lg mb-2 overflow-hidden relative flex items-center justify-center text-6xl">
                                    <img src="img/mashel.avif" alt="">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-3">
                                        </img>
                                        <span class="text-white font-bold text-sm">Mashle</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="anime" class="py-20 px-6 relative z-10">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <span class="text-cyan-400 font-bold tracking-wider text-sm uppercase">Anime Collection</span>
                <h2 class="text-4xl font-black text-white mt-2 mb-4">Koleksi <span class="text-cyan-400">Anime</span> Lengkap</h2>
                <p class="text-slate-400 max-w-2xl mx-auto">Ribuan anime dari berbagai genre dan musim. Update setiap hari dengan subtitle Indonesia.</p>
                <div class="w-20 h-1 bg-cyan-500 mx-auto rounded-full mt-4"></div>
            </div>

            <div class="flex flex-wrap justify-center gap-3 mb-10">
                <button class="category-tab active px-6 py-2 rounded-full text-sm font-semibold border border-cyan-500/30">
                    🔥 Trending
                </button>
                <button class="category-tab px-6 py-2 rounded-full text-sm font-semibold bg-slate-800/50 hover:bg-slate-700 text-slate-300 border border-slate-700">
                    ⭐ Top Rated
                </button>
                <button class="category-tab px-6 py-2 rounded-full text-sm font-semibold bg-slate-800/50 hover:bg-slate-700 text-slate-300 border border-slate-700">
                    🆕 Baru Rilis
                </button>
                <button class="category-tab px-6 py-2 rounded-full text-sm font-semibold bg-slate-800/50 hover:bg-slate-700 text-slate-300 border border-slate-700">
                    📺 Ongoing
                </button>
                <button class="category-tab px-6 py-2 rounded-full text-sm font-semibold bg-slate-800/50 hover:bg-slate-700 text-slate-300 border border-slate-700">
                    ✅ Complete
                </button>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-blue-600 to-indigo-900 flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">🗡️</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 9.8
                        </div>
                        <div class="absolute top-2 left-2 bg-red-500 px-2 py-1 rounded-md text-xs font-bold">
                            SUB INDO
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">Solo Leveling</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 12/12</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-emerald-600 to-teal-900 flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">🪄</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 9.9
                        </div>
                        <div class="absolute top-2 left-2 bg-red-500 px-2 py-1 rounded-md text-xs font-bold">
                            SUB INDO
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">Frieren</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 28/28</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-yellow-600 to-orange-900 flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">💪</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 8.5
                        </div>
                        <div class="absolute top-2 left-2 bg-green-500 px-2 py-1 rounded-md text-xs font-bold">
                            ONGOING
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">Mashle S2</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 10/12</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-red-600 to-rose-900 flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">🏴‍☠️</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 9.2
                        </div>
                        <div class="absolute top-2 left-2 bg-green-500 px-2 py-1 rounded-md text-xs font-bold">
                            ONGOING
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">One Piece</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 1090+</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-slate-600 to-black flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">🥷</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 8.8
                        </div>
                        <div class="absolute top-2 left-2 bg-green-500 px-2 py-1 rounded-md text-xs font-bold">
                            ONGOING
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">Ninja Kamui</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 5/12</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-purple-600 to-pink-900 flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">👁️</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 9.0
                        </div>
                        <div class="absolute top-2 left-2 bg-red-500 px-2 py-1 rounded-md text-xs font-bold">
                            SUB INDO
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">Jujutsu Kaisen S2</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 23/23</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-orange-600 to-red-900 flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">🔥</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 8.9
                        </div>
                        <div class="absolute top-2 left-2 bg-red-500 px-2 py-1 rounded-md text-xs font-bold">
                            SUB INDO
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">Demon Slayer S4</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 11/11</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-blue-500 to-cyan-700 flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">🌊</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 8.7
                        </div>
                        <div class="absolute top-2 left-2 bg-green-500 px-2 py-1 rounded-md text-xs font-bold">
                            ONGOING
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">Wind Breaker</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 7/13</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-green-600 to-lime-900 flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">🐉</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 8.3
                        </div>
                        <div class="absolute top-2 left-2 bg-green-500 px-2 py-1 rounded-md text-xs font-bold">
                            ONGOING
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">Kaiju No. 8</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 9/12</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover group relative cursor-pointer">
                    <div class="h-64 bg-gradient-to-br from-pink-600 to-rose-900 flex items-center justify-center text-6xl relative">
                        <span class="group-hover:scale-110 transition duration-500">🌸</span>
                        <div class="absolute top-2 right-2 bg-black/60 backdrop-blur-md px-2 py-1 rounded-md text-xs font-bold text-yellow-400">
                            ★ 8.6
                        </div>
                        <div class="absolute top-2 left-2 bg-red-500 px-2 py-1 rounded-md text-xs font-bold">
                            SUB INDO
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold truncate">Spy x Family</h3>
                        <div class="flex justify-between items-center mt-2 text-xs text-slate-400">
                            <span>Episode 25/25</span>
                            <span class="text-cyan-400 group-hover:underline">Watch →</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button class="px-8 py-3 rounded-full glass-effect border border-cyan-500/30 text-cyan-400 hover:bg-cyan-500/10 transition font-semibold">
                    Lihat Semua Anime (10,000+) →
                </button>
            </div>
        </div>
    </section>

    <section id="manga" class="py-20 px-6 bg-slate-900/30 relative">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <span class="text-cyan-400 font-bold tracking-wider text-sm uppercase">Manga Library</span>
                <h2 class="text-4xl font-black text-white mt-2 mb-4">Baca <span class="text-cyan-400">Manga</span> Online</h2>
                <div class="w-20 h-1 bg-cyan-500 mx-auto rounded-full mt-4"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                <div class="glass-effect rounded-xl overflow-hidden card-hover cursor-pointer">
                    <div class="h-72 bg-gradient-to-br from-indigo-600 to-purple-900 flex items-center justify-center text-7xl">
                        📖
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold">One Piece</h3>
                        <p class="text-slate-400 text-sm mt-1">Chapter 1098</p>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover cursor-pointer">
                    <div class="h-72 bg-gradient-to-br from-red-600 to-orange-900 flex items-center justify-center text-7xl">
                        📕
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold">Jujutsu Kaisen</h3>
                        <p class="text-slate-400 text-sm mt-1">Chapter 245</p>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover cursor-pointer">
                    <div class="h-72 bg-gradient-to-br from-blue-600 to-cyan-900 flex items-center justify-center text-7xl">
                        📘
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold">Blue Lock</h3>
                        <p class="text-slate-400 text-sm mt-1">Chapter 256</p>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover cursor-pointer">
                    <div class="h-72 bg-gradient-to-br from-green-600 to-emerald-900 flex items-center justify-center text-7xl">
                        📗
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold">My Hero Academia</h3>
                        <p class="text-slate-400 text-sm mt-1">Chapter 410</p>
                    </div>
                </div>

                <div class="glass-effect rounded-xl overflow-hidden card-hover cursor-pointer">
                    <div class="h-72 bg-gradient-to-br from-yellow-600 to-amber-900 flex items-center justify-center text-7xl">
                        📙
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-bold">Chainsaw Man</h3>
                        <p class="text-slate-400 text-sm mt-1">Chapter 152</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="game" class="py-20 px-6 relative">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <span class="text-cyan-400 font-bold tracking-wider text-sm uppercase">Play Now</span>
                <h2 class="text-4xl font-black text-white mt-2 mb-4">Anime Games Popular</h2>
                <div class="w-20 h-1 bg-cyan-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-effect rounded-2xl p-2 card-hover border border-cyan-500/20">
                    <div class="h-48 rounded-xl bg-gradient-to-r from-blue-700 to-cyan-500 relative overflow-hidden group">
                        <img src="img/genshin.avif" alt="">
                        <div class="absolute inset-0 flex items-center justify-center text-white font-black text-3xl opacity-30 group-hover:opacity-10 scale-150"></div>
                        </img>
                        <div class="absolute top-3 left-3 bg-white text-blue-800 text-xs font-bold px-3 py-1 rounded-full uppercase">RPG Open World</div>

                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white">Genshin Impact</h3>
                        <p class="text-slate-400 text-sm mt-2 mb-6">Jelajahi Teyvat dalam petualangan dunia terbuka yang memukau.</p>
                        <button class="w-full py-3 rounded-lg bg-slate-800 hover:bg-cyan-600 text-white font-semibold transition border border-slate-600 hover:border-cyan-500">
                            Download PC / Mobile
                        </button>
                    </div>
                </div>

                <div class="glass-effect rounded-2xl p-2 card-hover border border-purple-500/20">
                    <div class="h-48 rounded-xl bg-gradient-to-r from-indigo-800 to-purple-600 relative overflow-hidden group">
                        <div class="absolute inset-0 flex items-center justify-center text-white font-black text-3xl opacity-30 group-hover:opacity-10 scale-150">STAR RAIL</div>
                        <div class="absolute top-3 left-3 bg-white text-indigo-800 text-xs font-bold px-3 py-1 rounded-full uppercase">Turn Based</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white">Honkai: Star Rail</h3>
                        <p class="text-slate-400 text-sm mt-2 mb-6">Perjalanan antargalaksi dengan visual anime yang spektakuler.</p>
                        <button class="w-full py-3 rounded-lg bg-slate-800 hover:bg-indigo-600 text-white font-semibold transition border border-slate-600 hover:border-indigo-500">
                            Download PC / Mobile
                        </button>
                    </div>
                </div>

                <div class="glass-effect rounded-2xl p-2 card-hover border border-blue-500/20">
                    <div class="h-48 rounded-xl bg-gradient-to-r from-sky-600 to-blue-500 relative overflow-hidden group">
                        <img src="img/BlueAr.jpg" alt="">
                        <div class="absolute inset-0 flex items-center justify-center text-white font-black text-3xl opacity-30 group-hover:opacity-10 scale-150"></div>
                        </img>
                        <div class="absolute top-3 left-3 bg-white text-sky-800 text-xs font-bold px-3 py-1 rounded-full uppercase">Strategy RPG</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white">Blue Archive</h3>
                        <p class="text-slate-400 text-sm mt-2 mb-6">Kisah masa muda x Akademi x Militer RPG yang menyegarkan.</p>
                        <button class="w-full py-3 rounded-lg bg-slate-800 hover:bg-sky-500 text-white font-semibold transition border border-slate-600 hover:border-sky-400">
                            Download Mobile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="community" class="py-20 px-6 bg-slate-900/50 relative overflow-hidden">
        <div class="absolute left-0 top-0 w-1/2 h-full bg-gradient-to-r from-cyan-900/10 to-transparent pointer-events-none"></div>

        <div class="container mx-auto relative z-10">
            <div class="text-center mb-16">
                <span class="text-cyan-400 font-bold tracking-wider text-sm uppercase">Join Us</span>
                <h2 class="text-4xl font-black text-white mt-2 mb-4">Komunitas <span class="text-cyan-400">Otaku</span> Indonesia</h2>
                <p class="text-slate-400 max-w-2xl mx-auto">Bergabung dengan ribuan penggemar anime, diskusi, dan dapatkan update terbaru langsung dari komunitas.</p>
                <div class="w-20 h-1 bg-cyan-500 mx-auto rounded-full mt-4"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="glass-effect rounded-2xl p-8 card-hover border border-cyan-500/20 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">
                        💬
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Discord Server</h3>
                    <p class="text-slate-400 mb-6">Chat real-time dengan sesama penggemar anime. Diskusi, event, dan giveaway menarik!</p>
                    <div class="flex items-center justify-center gap-2 text-cyan-400 font-semibold mb-4">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span>12,459 Members Online</span>
                    </div>
                    <button class="w-full py-3 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-bold transition transform hover:scale-105">
                        Join Discord →
                    </button>
                </div>

                <div class="glass-effect rounded-2xl p-8 card-hover border border-blue-500/20 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">
                        📱
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Telegram Group</h3>
                    <p class="text-slate-400 mb-6">Update anime terbaru, jadwal rilis, dan notifikasi langsung di Telegram kamu.</p>
                    <div class="flex items-center justify-center gap-2 text-cyan-400 font-semibold mb-4">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <span>8,234 Members</span>
                    </div>
                    <button class="w-full py-3 rounded-lg bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-500 hover:to-blue-500 text-white font-bold transition transform hover:scale-105">
                        Join Telegram →
                    </button>
                </div>

                <div class="glass-effect rounded-2xl p-8 card-hover border border-purple-500/20 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center text-4xl mx-auto mb-6">
                        🎮
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Forum Diskusi</h3>
                    <p class="text-slate-400 mb-6">Bahas teori anime, rekomendasi, review, dan berikan rating untuk anime favorit kamu.</p>
                    <div class="flex items-center justify-center gap-2 text-cyan-400 font-semibold mb-4">
                        <span>📝</span>
                        <span>45,721 Topics</span>
                    </div>
                    <button class="w-full py-3 rounded-lg bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-500 hover:to-pink-500 text-white font-bold transition transform hover:scale-105">
                        Buka Forum →
                    </button>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-8 border border-cyan-500/20">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-3xl font-bold text-white mb-4">Ikuti Event Bulanan Kami!</h3>
                        <p class="text-slate-400 mb-6">Setiap bulan kami mengadakan berbagai event menarik untuk komunitas. Menangkan merchandise anime, game voucher, dan hadiah eksklusif lainnya!</p>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-start gap-3">
                                <span class="text-cyan-400 text-xl">✓</span>
                                <span class="text-slate-300"><strong class="text-white">Watch Party</strong> - Nonton bareng anime terbaru setiap weekend</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-cyan-400 text-xl">✓</span>
                                <span class="text-slate-300"><strong class="text-white">Fanart Contest</strong> - Kompetisi gambar karakter anime favorit</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="text-cyan-400 text-xl">✓</span>
                                <span class="text-slate-300"><strong class="text-white">Quiz Night</strong> - Adu pengetahuan anime dengan hadiah menarik</span>
                            </li>
                        </ul>
                        <button class="px-8 py-3 rounded-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold hover:shadow-lg hover:shadow-cyan-500/40 transition transform hover:scale-105">
                            Lihat Event Aktif
                        </button>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="glass-effect rounded-xl p-6 text-center border border-cyan-500/10">
                            <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">50K+</div>
                            <div class="text-slate-400 text-sm mt-2">Total Members</div>
                        </div>
                        <div class="glass-effect rounded-xl p-6 text-center border border-purple-500/10">
                            <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-500">500+</div>
                            <div class="text-slate-400 text-sm mt-2">Daily Discussions</div>
                        </div>
                        <div class="glass-effect rounded-xl p-6 text-center border border-blue-500/10">
                            <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-500">24/7</div>
                            <div class="text-slate-400 text-sm mt-2">Active Community</div>
                        </div>
                        <div class="glass-effect rounded-xl p-6 text-center border border-green-500/10">
                            <div class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-emerald-500">99%</div>
                            <div class="text-slate-400 text-sm mt-2">Satisfaction Rate</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-24 px-6 relative overflow-hidden">
        <div class="absolute right-0 top-20 w-1/2 h-full bg-gradient-to-l from-cyan-900/20 to-transparent pointer-events-none"></div>

        <div class="container mx-auto">
            <div class="glass-effect rounded-3xl overflow-hidden shadow-2xl border border-white/5">
                <div class="grid md:grid-cols-2">

                    <div class="p-10 md:p-14 bg-gradient-to-br from-cyan-900/80 to-slate-900/80 flex flex-col justify-between">
                        <div>
                            <h2 class="text-3xl font-bold text-white mb-6">Hubungi Admin</h2>
                            <p class="text-cyan-200 mb-8 leading-relaxed">
                                Punya saran anime yang kurang? Atau nemu link error?
                                Jangan ragu buat kontak aku ya! Masukan kalian sangat berharga buat perkembangan web ini.
                            </p>

                            <div class="space-y-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 rounded-full bg-cyan-500/20 flex items-center justify-center text-cyan-400 text-xl">
                                        ✉️
                                    </div>
                                    <div>
                                        <div class="text-sm text-slate-400">Email untuk Saran & Kerjasama</div>
                                        <a href="mailto:saran@animeverse.com" class="text-lg font-semibold text-white hover:text-cyan-400 transition">
                                            saran@animeverse.com
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 rounded-full bg-cyan-500/20 flex items-center justify-center text-cyan-400 text-xl">
                                        💬
                                    </div>
                                    <div>
                                        <div class="text-sm text-slate-400">Discord Community</div>
                                        <a href="#" class="text-lg font-semibold text-white hover:text-cyan-400 transition">
                                            Join Server Kami
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12">
                            <p class="text-slate-400 text-sm">Follow sosmedku juga:</p>
                            <div class="flex gap-4 mt-3">
                                <a href="#" class="w-10 h-10 rounded-full bg-white/5 hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 hover:text-white flex items-center justify-center transition text-slate-400">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full bg-white/5 hover:bg-blue-500 hover:text-white flex items-center justify-center transition text-slate-400">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full bg-white/5 hover:bg-red-600 hover:text-white flex items-center justify-center transition text-slate-400">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 rounded-full bg-white/5 hover:bg-indigo-600 hover:text-white flex items-center justify-center transition text-slate-400">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.319 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="p-10 md:p-14 bg-slate-900/50">
                        <h3 class="text-2xl font-bold text-white mb-6">Kirim Pesan Cepat</h3>
                        <?php
                        // Tambahkan di atas form
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] == 'success') {
                                echo '<div class="mb-4 p-4 bg-green-500/20 border border-green-500 rounded-lg text-green-400">
                ✅ ' . htmlspecialchars($_GET['msg']) . '
              </div>';
                            } else {
                                echo '<div class="mb-4 p-4 bg-red-500/20 border border-red-500 rounded-lg text-red-400">
                ❌ ' . htmlspecialchars($_GET['msg']) . '
              </div>';
                            }
                        }
                        ?>
                        <form action="kirim.php" method="POST" class="space-y-5">
                            <div>
                                <label class="block text-sm text-slate-400 mb-2">Nama / Username</label>
                                <input type="text" name="nama" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition" placeholder="Otaku123" required>
                            </div>
                            <div>
                                <label class="block text-sm text-slate-400 mb-2">Email Kamu</label>
                                <input type="email" name="email" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition" placeholder="contoh@email.com" required>
                            </div>
                            <div>
                                <label class="block text-sm text-slate-400 mb-2">Pesan / Saran Anime</label>
                                <textarea name="pesan" rows="4" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition" placeholder="Min, tolong tambahin anime..." required></textarea>
                            </div>
                            <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white font-bold py-3 rounded-lg hover:shadow-lg hover:shadow-cyan-500/30 transition transform hover:scale-[1.02]">
                                Kirim Masukan 🚀
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <footer class="border-t border-slate-800 bg-slate-950 pt-16 pb-8 px-6">
        <div class="container mx-auto">
            <div class="grid md:grid-cols-4 gap-10 mb-12">
                <div class="md:col-span-1">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-tr from-cyan-500 to-blue-600 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">⚡</span>
                        </div>
                        <span class="text-xl font-bold text-white">Anime<span class="text-cyan-400">Verse</span></span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        Platform streaming anime, manga, dan game terlengkap di Indonesia. Nikmati ribuan konten berkualitas dengan subtitle Indonesia.
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-cyan-500 flex items-center justify-center text-slate-400 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-blue-500 flex items-center justify-center text-slate-400 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-red-600 flex items-center justify-center text-slate-400 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                            </svg>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-indigo-600 flex items-center justify-center text-slate-400 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.319 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028a14.09 14.09 0 0 0 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4">Konten</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#anime" class="text-slate-400 hover:text-cyan-400 transition">Anime Streaming</a></li>
                        <li><a href="#manga" class="text-slate-400 hover:text-cyan-400 transition">Baca Manga</a></li>
                        <li><a href="#game" class="text-slate-400 hover:text-cyan-400 transition">Download Game</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-cyan-400 transition">Jadwal Rilis</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-cyan-400 transition">Genre</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4">Komunitas</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#community" class="text-slate-400 hover:text-cyan-400 transition">Discord Server</a></li>
                        <li><a href="#community" class="text-slate-400 hover:text-cyan-400 transition">Telegram Group</a></li>
                        <li><a href="#community" class="text-slate-400 hover:text-cyan-400 transition">Forum Diskusi</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-cyan-400 transition">Event & Giveaway</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-cyan-400 transition">Fan Art Gallery</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4">Bantuan</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-slate-400 hover:text-cyan-400 transition">FAQ</a></li>
                        <li><a href="#contact" class="text-slate-400 hover:text-cyan-400 transition">Hubungi Kami</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-cyan-400 transition">Request Anime</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-cyan-400 transition">Laporkan Error</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-cyan-400 transition">Kebijakan Privasi</a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-800">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-slate-500 text-sm text-center md:text-left">
                        &copy; 2026 AnimeVerse Indonesia. Made with <span class="text-red-500">❤️</span> for Otaku Community.
                    </p>
                    <div class="flex gap-6 text-sm">
                        <a href="#" class="text-slate-400 hover:text-cyan-400 transition">Terms of Service</a>
                        <a href="#" class="text-slate-400 hover:text-cyan-400 transition">Privacy Policy</a>
                        <a href="#" class="text-slate-400 hover:text-cyan-400 transition">DMCA</a>
                    </div>
                </div>
                <p class="text-slate-600 text-xs text-center mt-4">
                    Disclaimer: Semua konten anime dan manga di situs ini adalah milik dari pencipta, penulis, penerbit, dan studio masing-masing.
                </p>
            </div>
        </div>
    </footer>

    </script>
</body>

</html>
