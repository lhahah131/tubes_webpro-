<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Guru - Absensi Sekolah</title>
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
        /* Custom Scrollbar for multi-select */
        select[multiple]::-webkit-scrollbar {
            width: 8px;
        }
        select[multiple]::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05); 
            border-radius: 4px;
        }
        select[multiple]::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2); 
            border-radius: 4px;
        }
        select[multiple]::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3); 
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
                    <h1 class="text-2xl font-bold text-white">Registrasi Guru Baru</h1>
                    <p class="text-gray-400 text-sm mt-1">Lengkapi data diri Anda untuk akses sistem akademik.</p>
                </div>
                <!-- Logo small -->
                <img src="https://tse4.mm.bing.net/th/id/OIP.Gj3qbpRWY_PYgfbfvHNQegHaHi?w=176&h=180&c=7&r=0&o=7&cb=ucfimg2&dpr=1.3&pid=1.7&rm=3&ucfimg=1" 
                     class="h-12 w-auto drop-shadow-lg" alt="Logo">
            </div>

            <form action="#" method="POST" enctype="multipart/form-data" class="p-8" x-data="{ noNip: false }">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    
                    <!-- Left Column: Identitas Pribadi & Mata Pelajaran -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-2 text-indigo-400 mb-2 border-b border-white/10 pb-2">
                            <h3 class="font-semibold text-lg">Identitas Pribadi</h3>
                        </div>

                        <div class="space-y-4">
                            <!-- NIP -->
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider">NIP / Nomor Induk</label>
                                    <label class="flex items-center space-x-2 cursor-pointer touch-manipulation">
                                        <input type="checkbox" x-model="noNip" class="form-checkbox h-3 w-3 text-indigo-500 rounded border-gray-600 bg-gray-800 focus:ring-0">
                                        <span class="text-xs text-gray-500">Tidak memiliki NIP</span>
                                    </label>
                                </div>
                                <input type="number" name="nip" :disabled="noNip" :required="!noNip" :class="noNip ? 'opacity-50 cursor-not-allowed' : ''" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" placeholder="Nomor Induk Pegawai">
                            </div>

                            <!-- Nama -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                <input type="text" name="name" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" placeholder="Nama Lengkap dengan Gelar" required>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <!-- Tanggal Lahir -->
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all [color-scheme:dark]" required>
                                </div>
                                
                                <!-- Jenis Kelamin (Custom Dropdown) -->
                                <div x-data="{ 
                                    open: false, 
                                    selectedLabel: '', 
                                    selectedValue: '', 
                                    options: [
                                        {label: 'Laki-laki', value: 'L'}, 
                                        {label: 'Perempuan', value: 'P'}
                                    ] 
                                }" class="relative">
                                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Jenis Kelamin</label>
                                    <input type="hidden" name="gender" :value="selectedValue" required>
                                    <div @click="open = !open" @click.outside="open = false" 
                                         class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 cursor-pointer flex justify-between items-center transition-all"
                                         :class="open ? 'ring-2 ring-indigo-500/50 border-indigo-500' : ''">
                                        <span x-text="selectedLabel === '' ? 'Pilih...' : selectedLabel" :class="selectedLabel === '' ? 'text-gray-500' : 'text-white'"></span>
                                        <svg class="w-4 h-4 text-gray-400 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </div>

                                    <div x-show="open" 
                                         x-transition:enter="transition ease-out duration-100"
                                         x-transition:enter-start="opacity-0 scale-95"
                                         x-transition:enter-end="opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-75"
                                         x-transition:leave-start="opacity-100 scale-100"
                                         x-transition:leave-end="opacity-0 scale-95"
                                         class="absolute z-50 w-full mt-2 bg-slate-900 border border-white/10 rounded-xl shadow-xl overflow-hidden">
                                        <template x-for="option in options" :key="option.value">
                                            <div @click="selectedLabel = option.label; selectedValue = option.value; open = false" 
                                                 class="px-4 py-3 text-sm text-gray-300 hover:bg-white/10 hover:text-white cursor-pointer transition-colors border-b border-white/5 last:border-0">
                                                <span x-text="option.label"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <!-- Posisi (Custom Dropdown) -->
                            <div x-data="{ 
                                open: false, 
                                selected: '', 
                                options: ['Guru Mapel', 'Wali Kelas', 'BK', 'Wakasek', 'Kepala Sekolah'] 
                            }" class="relative">
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Posisi / Jabatan</label>
                                <input type="hidden" name="position" :value="selected" required>
                                <div @click="open = !open" @click.outside="open = false" 
                                     class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 cursor-pointer flex justify-between items-center transition-all"
                                     :class="open ? 'ring-2 ring-indigo-500/50 border-indigo-500' : ''">
                                    <span x-text="selected === '' ? 'Pilih Posisi...' : selected" :class="selected === '' ? 'text-gray-500' : 'text-white'"></span>
                                    <svg class="w-4 h-4 text-gray-400 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </div>

                                <div x-show="open" 
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute z-50 w-full mt-2 bg-slate-900 border border-white/10 rounded-xl shadow-xl overflow-hidden">
                                    <template x-for="item in options" :key="item">
                                        <div @click="selected = item; open = false" 
                                             class="px-4 py-3 text-sm text-gray-300 hover:bg-white/10 hover:text-white cursor-pointer transition-colors border-b border-white/5 last:border-0">
                                            <span x-text="item"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>

                             <!-- Mata Pelajaran (Alpine moved here) -->
                            <div x-data="{
                                search: '',
                                open: false,
                                items: [
                                    'Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'PPKN', 
                                    'Pendidikan Agama', 'Fisika', 'Kimia', 'Biologi', 
                                    'Sejarah', 'Ekonomi', 'Sosiologi', 'Geografi', 
                                    'Seni Budaya', 'PJOK', 'Informatika', 
                                    'Produktif TKJ', 'Produktif RPL', 'Produktif Akuntansi'
                                ],
                                get filteredItems() {
                                    return this.search === '' 
                                        ? this.items 
                                        : this.items.filter(i => i.toLowerCase().includes(this.search.toLowerCase()))
                                }
                            }" class="relative">
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Mata Pelajaran</label>
                                <input 
                                    type="text" 
                                    name="subjects" 
                                    x-model="search"
                                    @focus="open = true; search = ''"
                                    @click.outside="open = false"
                                    class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" 
                                    placeholder="Pilih atau ketik mata pelajaran..."
                                    autocomplete="off"
                                >
                                <div x-show="open && filteredItems.length > 0" 
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute z-50 w-full mt-2 bg-slate-900 border border-white/10 rounded-xl shadow-xl max-h-60 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-transparent">
                                    <template x-for="item in filteredItems" :key="item">
                                        <div @click="search = item; open = false" 
                                             class="px-4 py-3 text-sm text-gray-300 hover:bg-white/10 hover:text-white cursor-pointer transition-colors border-b border-white/5 last:border-0">
                                            <span x-text="item"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Informasi Akun -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-2 text-indigo-400 mb-2 border-b border-white/10 pb-2">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            <h3 class="font-semibold text-lg">Informasi Akun</h3>
                        </div>

                        <div class="space-y-4">
                            <!-- No. HP -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">No. HP / WhatsApp</label>
                                <input type="tel" name="phone" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" placeholder="08..." required>
                            </div>

                            <!-- Password -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Password</label>
                                <input type="password" name="password" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" required placeholder="minimal 8 karakter">
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 focus:bg-white/10 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 outline-none text-white transition-all placeholder-gray-600" required placeholder="Ulangi password">
                            </div>
                        </div>
                    </div>

                     <!-- 5. Foto Profil -->
                     <div class="md:col-span-2 space-y-6">
                        <div class="flex items-center space-x-2 text-indigo-400 mb-2 border-b border-white/10 pb-2">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" /></svg>
                             <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            <h3 class="font-semibold text-lg">Foto Profil Guru</h3>
                        </div>

                         <div class="grid grid-cols-1 gap-8">
                             <!-- Foto Guru -->
                            <div class="relative group">
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Foto Resmi (Formal)</label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-600 rounded-xl cursor-pointer hover:border-indigo-500 hover:bg-white/5 transition-all">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
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
                        Daftar Guru
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
