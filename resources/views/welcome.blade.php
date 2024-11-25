<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page Modern</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-purple-600 to-blue-500 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-white text-xl font-bold">YourBrand</span>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#" class="text-white hover:bg-white/10 px-3 py-2 rounded-md">Beranda</a>
                        <a href="#" class="text-white hover:bg-white/10 px-3 py-2 rounded-md">Fitur</a>
                        <a href="#" class="text-white hover:bg-white/10 px-3 py-2 rounded-md">Harga</a>
                        <a href="#" class="text-white hover:bg-white/10 px-3 py-2 rounded-md">Kontak</a>
                        <button id="openModal" type="button"  class="bg-white text-purple-600 hover:bg-gray-100 px-4 py-2 rounded-md font-medium transition duration-300">
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4 transform transition-all">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Login</h2>
                <button id="closeModal" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="formLogin" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-purple-600">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                    </div>
                    <a href="#" class="text-sm text-purple-600 hover:text-purple-500">Lupa password?</a>
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-blue-500 text-white font-bold py-2 px-4 rounded-md hover:opacity-90 transition duration-300">
                    Login
                </button>
            </form>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-b from-purple-600 to-blue-500 pt-32 pb-40 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                    <span class="block">Solusi Terbaik untuk</span>
                    <span class="block text-yellow-300">Bisnis Anda</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-white sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    Tingkatkan performa bisnis Anda dengan layanan kami yang inovatif dan terpercaya.
                </p>
                <div class="mt-10 flex justify-center gap-3">
                    <a href="#" class="rounded-lg px-6 py-3 bg-yellow-400 text-black font-semibold hover:bg-yellow-300 transition duration-300">
                        Mulai Sekarang
                    </a>
                    <a href="#" class="rounded-lg px-6 py-3 bg-white/10 text-white font-semibold hover:bg-white/20 transition duration-300">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-20 fill-current text-white" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path d="M0,32L48,37.3C96,43,192,53,288,58.7C384,64,480,64,576,58.7C672,53,768,43,864,42.7C960,43,1056,53,1152,58.7C1248,64,1344,64,1392,64L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Fitur Unggulan Kami
                </h2>
                <p class="mt-4 text-lg text-gray-600">
                    Berbagai fitur yang akan membantu mengembangkan bisnis Anda
                </p>
            </div>

            <div class="mt-20 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Feature 1 -->
                <div class="flex flex-col items-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="p-3 bg-purple-100 rounded-full">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">Kecepatan Tinggi</h3>
                    <p class="mt-2 text-gray-600 text-center">
                        Performa super cepat untuk pengalaman pengguna terbaik
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="flex flex-col items-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">Keamanan Terjamin</h3>
                    <p class="mt-2 text-gray-600 text-center">
                        Dilengkapi sistem keamanan tingkat tinggi
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="flex flex-col items-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">Mudah Digunakan</h3>
                    <p class="mt-2 text-gray-600 text-center">
                        Interface yang user-friendly untuk semua pengguna
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-purple-600 to-blue-500 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                    Siap Untuk Memulai?
                </h2>
                <p class="mt-4 text-lg text-white/90">
                    Bergabunglah dengan ribuan pengguna yang telah sukses bersama kami
                </p>
                <div class="mt-8">
                    <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-purple-600 bg-white hover:bg-gray-50 md:text-lg">
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-2 md:col-span-1">
                    <span class="text-xl font-bold">YourBrand</span>
                    <p class="mt-2 text-gray-400 text-sm">
                        Solusi terbaik untuk bisnis masa depan Anda
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider">Produk</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Fitur</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Harga</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Tutorial</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider">Perusahaan</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Karir</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider">Legal</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Privasi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800">
                <p class="text-center text-gray-400 text-sm">
                    &copy; 2024 YourBrand. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <script>
        // DOM Elements
        const openModalButton = document.getElementById('openModal');
        const closeModalButton = document.getElementById('closeModal');
        const modal = document.getElementById('loginModal');

        // Open Modal
        openModalButton.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        // Close Modal
        closeModalButton.addEventListener('click', () => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        });

        // Close Modal When Clicking Outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        });
    </script>
</body>
</html>