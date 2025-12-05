<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa - Absensi Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 antialiased selection:bg-indigo-500 selection:text-white">

    <!-- Background -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('https://i.ytimg.com/vi/yKokniTxE5k/maxresdefault.jpg');"></div>
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>
    </div>

    <div class="min-h-screen py-10 px-4 flex items-center justify-center">
        <div class="max-w-4xl w-full glass rounded-3xl shadow-2xl overflow-hidden relative">
            
            <!-- Header -->
            <div class="bg-white/5 border-b border-white/10 px-8 py-6 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-white">Registrasi Siswa Baru</h1>
                    <p class="text-gray-400 text-sm mt-1">Lengkapi data diri Anda untuk membuat akun absensi.</p>
                </div>
                <!-- Logo small -->
                <img src="https://tse4.mm.bing.net/th/id/OIP.Gj3qbpRWY_PYgfbfvHNQegHaHi?w=176&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" 
                     class="h-12 w-auto drop-shadow-lg" alt="Logo">
            </div>

            <form action="#" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <!-- 1. Identitas Siswa -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-2 text-indigo-400 mb-2 border-b border-white/10 pb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            <h3 class="font-semibold text-lg">Identitas Siswa</h3>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">NISN</label>
                                <input type="text" name="nisn" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" placeholder="10 Digit NISN" minlength="10" maxlength="10" pattern="\d{10}" title="Harap masukkan 10 digit angka" required>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                <input type="text" name="name" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" placeholder="Nama Sesuai Di Rapot" required>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all [color-scheme:dark]" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Jenis Kelamin</label>
                                    <select name="gender" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all appearance-none cursor-pointer">
                                        <option value="" class="bg-gray-800 text-gray-500">Pilih...</option>
                                        <option value="L" class="bg-gray-800">Laki-laki</option>
                                        <option value="P" class="bg-gray-800">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Akademik -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-2 text-indigo-400 mb-2 border-b border-white/10 pb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                            <h3 class="font-semibold text-lg">Data Akademik</h3>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Jurusan</label>
                                <select name="jurusan" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all appearance-none cursor-pointer">
                                    <option value="" class="bg-gray-800">Pilih Jurusan</option>
                                    <option value="IPA" class="bg-gray-800">MIPA (Matematika & IPA)</option>
                                    <option value="IPS" class="bg-gray-800">IPS (Ilmu Pengetahuan Sosial)</option>
                                    <option value="TKJ" class="bg-gray-800">Teknik Komputer & Jaringan</option>
                                    <option value="RPL" class="bg-gray-800">Rekayasa Perangkat Lunak</option>
                                    <option value="OTKP" class="bg-gray-800">Otomatisasi Tata Kelola Perkantoran</option>
                                    <option value="AK" class="bg-gray-800">Akuntansi</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Kelas</label>
                                <select name="kelas" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all appearance-none cursor-pointer">
                                    <option value="" class="bg-gray-800">Pilih Kelas</option>
                                    <optgroup label="Kelas X" class="bg-gray-800">
                                        <option value="X MIPA 1">X MIPA 1</option>
                                        <option value="X MIPA 2">X MIPA 2</option>
                                        <option value="X TKJ 1">X TKJ 1</option>
                                        <option value="X TKJ 2">X TKJ 2</option>
                                    </optgroup>
                                    <optgroup label="Kelas XI" class="bg-gray-800">
                                        <option value="XI MIPA 1">XI MIPA 1</option>
                                        <option value="XI RPL 1">XI RPL 1</option>
                                    </optgroup>
                                    <optgroup label="Kelas XII" class="bg-gray-800">
                                        <option value="XII MIPA 1">XII MIPA 1</option>
                                        <option value="XII OTKP 2">XII OTKP 2</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>



                    <!-- 3. Informasi Login & Kontak -->
                    <div class="space-y-6 md:col-span-2">
                        <div class="flex items-center space-x-2 text-indigo-400 mb-2 border-b border-white/10 pb-2">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            <h3 class="font-semibold text-lg">Informasi Login</h3>
                        </div>

                         <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">No. HP Siswa</label>
                                <input type="tel" name="phone" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" placeholder="08..." required>
                            </div>

                             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Password</label>
                                    <input type="password" name="password" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" required placeholder="minimal 8 karakter">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" required placeholder="Ulangi password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 5. Upload Dokumen -->
                     <div class="md:col-span-2 space-y-6">
                        <div class="flex items-center space-x-2 text-indigo-400 mb-2 border-b border-white/10 pb-2">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            <h3 class="font-semibold text-lg">Dokumen Pendukung</h3>
                        </div>

                         <div class="grid grid-cols-1 gap-8">
                             <!-- Foto Siswa -->
                            <div class="relative group">
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Foto Siswa (Wajib)</label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-600 rounded-xl cursor-pointer hover:border-indigo-500 hover:bg-white/5 transition-all">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                                            <p class="text-xs text-gray-400"><span class="font-semibold">Klik upload</span> atau drag & drop</p>
                                        </div>
                                        <input type="file" name="photo" class="hidden" accept="image/*" />
                                    </label>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>

                <!-- Submit Action -->
                <div class="mt-8 pt-6 border-t border-white/10 flex items-center justify-end space-x-4">
                    <a href="{{ route('login') }}" class="px-6 py-3 rounded-xl text-gray-400 hover:text-white font-medium transition-colors">Batal</a>
                    <button type="submit" class="px-8 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold shadow-lg shadow-indigo-500/30 transition-all transform hover:-translate-y-0.5">
                        Daftar Sekarang
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
