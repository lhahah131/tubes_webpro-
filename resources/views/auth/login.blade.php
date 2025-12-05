<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Absensi Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        .glass {
            background: rgba(15, 23, 42, 0.85); /* Dark slate background */
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 overflow-hidden antialiased selection:bg-indigo-500 selection:text-white">
    
    <!-- Background Decor -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('https://i.ytimg.com/vi/yKokniTxE5k/maxresdefault.jpg');"></div>
        <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center p-4">
        
        <div class="max-w-md w-full glass rounded-3xl shadow-2xl overflow-hidden relative" x-data="{ tab: 'siswa' }">
            
            <!-- Header -->
            <div class="text-center pt-10 pb-6 px-8">
                <div class="mx-auto mb-6">
                    <img src="https://tse4.mm.bing.net/th/id/OIP.Gj3qbpRWY_PYgfbfvHNQegHaHi?w=176&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" 
                         alt="Logo Sekolah" 
                         class="h-24 w-auto mx-auto drop-shadow-lg hover:scale-105 transition-transform duration-300">
                </div>
                <h2 class="text-3xl font-bold tracking-tight text-white">Selamat Datang</h2>
                <div class="text-gray-300 mt-4 text-xs leading-relaxed opacity-90">
                </div>
            </div>

            <!-- Custom Tabs -->
            <div class="px-8 flex space-x-2 mb-8">
                <button 
                    @click="tab = 'siswa'"
                    :class="tab === 'siswa' ? 'bg-white/10 text-white shadow-md ring-1 ring-white/20 backdrop-blur-md' : 'bg-transparent text-gray-400 hover:text-white hover:bg-white/5'"
                    class="flex-1 py-3 rounded-xl font-medium text-sm transition-all duration-300 ease-out focus:outline-none focus:ring-2 focus:ring-indigo-500/50">
                    Siswa
                </button>
                <button 
                    @click="tab = 'guru'"
                    :class="tab === 'guru' ? 'bg-white/10 text-white shadow-md ring-1 ring-blue-900 backdrop-blur-md' : 'bg-transparent text-gray-400 hover:text-white hover:bg-white/5'"
                    class="flex-1 py-3 rounded-xl font-medium text-sm transition-all duration-300 ease-out focus:outline-none focus:ring-2 focus:ring-blue-900">
                    Guru
                </button>
            </div>

            <!-- Forms Container -->
            <div class="px-8 pb-10">
                
                <!-- Siswa Form -->
                <form action="{{ route('login.store') }}" method="POST" x-show="tab === 'siswa'" 
                      x-transition:enter="transition ease-out duration-300 transform"
                      x-transition:enter-start="opacity-0 translate-x-8"
                      x-transition:enter-end="opacity-100 translate-x-0"
                      class="space-y-5">
                    @csrf
                    <input type="hidden" name="role" value="siswa">
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">NISN</label>
                        <div class="relative">
                            <input type="text" name="nisn" placeholder="Masukkan NISN" class="w-full px-5 py-3.5 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-white/30 focus:ring-4 focus:ring-white/5 transition-all outline-none text-gray-100 placeholder-gray-500" required>
                            <span class="absolute right-4 top-3.5 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-8.785 3c.093.601.568 1.054 1.176 1.054h2.806c.608 0 1.083-.453 1.176-1.054A2.999 2.999 0 009 14z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Password</label>
                        <div class="relative">
                            <input type="password" name="password" placeholder="••••••••" class="w-full px-5 py-3.5 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-white/30 focus:ring-4 focus:ring-white/5 transition-all outline-none text-gray-100 placeholder-gray-500" required>
                        </div>
                        <div class="text-right mt-2">
                            <a href="#" class="text-xs font-medium text-gray-400 hover:text-white transition-colors">Lupa Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold shadow-lg border border-white/20 backdrop-blur-md transition-all duration-300">
                        Masuk sebagai Siswa
                    </button>
                    
                </form>

                <!-- Guru Form -->
                <form action="{{ route('login.store') }}" method="POST" x-show="tab === 'guru'" 
                      x-transition:enter="transition ease-out duration-300 transform"
                      x-transition:enter-start="opacity-0 -translate-x-8"
                      x-transition:enter-end="opacity-100 translate-x-0"
                      style="display: none;"
                      class="space-y-5">
                    @csrf
                    <input type="hidden" name="role" value="guru">
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">NIP</label>
                        <div class="relative">
                            <input type="text" name="nip" placeholder="Masukkan NIP" class="w-full px-5 py-3.5 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-white/30 focus:ring-4 focus:ring-white/5 transition-all outline-none text-gray-100 placeholder-gray-500" required>
                            <span class="absolute right-4 top-3.5 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Password</label>
                        <div class="relative">
                            <input type="password" name="password" placeholder="••••••••" class="w-full px-5 py-3.5 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-white/30 focus:ring-4 focus:ring-white/5 transition-all outline-none text-gray-100 placeholder-gray-500" required>
                        </div>
                        <div class="text-right mt-2">
                            <a href="#" class="text-xs font-medium text-gray-400 hover:text-white transition-colors">Lupa Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold shadow-lg border border-white/20 backdrop-blur-md transition-all duration-300">
                        Masuk sebagai Guru
                    </button>
                    
                </form>

            </div>

             <div class="px-8 py-6 bg-transparent border-t border-white/10 flex justify-center text-sm text-gray-400">
                <p>Belum punya akun? <a href="{{ route('register.siswa') }}" class="font-semibold text-white hover:text-gray-200 hover:underline">Daftar Siswa</a> atau <a href="{{ route('register.guru') }}" class="font-semibold text-white hover:text-gray-200 hover:underline">Daftar Guru</a></p>
            </div>

        </div>
    </div>
    
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
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
    </style>
</body>
</html>
