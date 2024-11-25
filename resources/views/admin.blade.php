<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-gray-900 text-white w-64 py-6 flex flex-col md:block">
            <div class="px-6 mb-8">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
            </div>
            <nav class="flex-1">
                <a href="#" class="flex items-center px-6 py-3 bg-gray-800 text-white">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    Users
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Analytics
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    Products
                </a>
                <a href="#" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Settings
                </a>
            </nav>
            <div class="px-6 py-4 border-t border-gray-800">
                <div class="flex items-center">
                    <div class="ml-3">
                        <p class="text-sm font-medium">{{ session('user') ? session('user')->name : 'Admin' }}</p>
                        <p class="text-xs text-gray-400">Admin</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
                        <div class="flex items-center">
                            <button class="p-2 text-gray-400 hover:text-gray-500 mr-4">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-gray-500">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <!-- Stats Cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-8">
                            @if(empty($blogs))
                                <p class="text-center">{{ $blogs }}</p>
                            @else
                                @foreach($blogs as $blog)
                                    <div class="bg-white shadow-lg rounded-lg p-6">
                                        <div class="relative" x-data="{ currentImage: 0 }">
                                           <div class="overflow-hidden w-full h-32">
                                                @foreach($blog['image'] as $index => $imageUrl)
                                                    <img src="{{ $imageUrl }}" alt="{{ $blog->title }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 rounded-lg" :class="{ 'opacity-0': currentImage !== {{ $index }}, 'opacity-100' : currentImage === {{ $index }}}">
                                                @endforeach
                                           </div>
                                        </div>
                                        <h2 class="text-xl font-semibold text-gray-800 mt-2">{{ $blog->title }}</h2>
                                        <p class="text-gray-500 mt-2">{{ $blog->description }}</p>
                                        <div class="mt-4 flex justify-between items-center">
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="text-purple-600 hover:underline">Edit</a>
                                            <form action="{{ route('blog.delete', $blog->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                    </div>
                </main>
            </div>
        </div>
    
        <!-- Mobile Menu Button (only visible on mobile) -->
        <div class="fixed bottom-4 right-4 md:hidden">
            <button class="bg-purple-600 text-white p-3 rounded-full shadow-lg hover:bg-purple-700">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </body>
    </html>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('carousel', () => ({
            currentImage: 0,
            init() {
                const totalImage = {{ count($blog['image']) }};
                setInterval(() => {
                    this.currentImage = (this.currentImage + 1) % totalImage;
                }, 3000);
            }
        }))
    })
</script>