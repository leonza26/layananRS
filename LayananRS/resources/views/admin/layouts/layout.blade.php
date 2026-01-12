<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('admin_page_title')</title>


    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>

    @livewireStyles
</head>

<body class="bg-gray-100">

    <div x-data="{ sidebarOpen: false, sidebarMinimized: false }" class="flex h-screen bg-gray-100">
        <!-- ===== Overlay for mobile ===== -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            class="fixed inset-0 z-20 bg-black bg-opacity-50 transition-opacity lg:hidden" x-cloak></div>

        <!-- ===== Sidebar ===== -->
        <aside x-cloak
            class="fixed inset-y-0 left-0 z-30 h-full overflow-y-auto bg-white border-r transform transition-all duration-300 ease-in-out lg:translate-x-0"
            :class="{
                'translate-x-0': sidebarOpen,
                '-translate-x-full': !sidebarOpen,
                'w-64 px-4 py-8': !sidebarMinimized,
                'w-20 px-2 py-8': sidebarMinimized
            }">

            <div class="flex items-center justify-between" :class="{ 'px-2': !sidebarMinimized }">
                <a href="#" class="text-2xl font-bold text-blue-600" :class="{ 'hidden': sidebarMinimized }">Admin
                    Panel</a>
                <a href="#" class="text-2xl font-bold text-blue-600" :class="{ 'hidden': !sidebarMinimized }">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </a>
                <button @click="sidebarOpen = false"
                    class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <nav class="mt-8">

                {{-- Dashboard --}}
                <a href="{{ route('admin') }}" class="flex items-center py-2 mt-4 rounded-md"
                    :class="{
                        'px-4': !sidebarMinimized,
                        'justify-center px-2': sidebarMinimized,
                        'text-gray-700 bg-gray-200 font-semibold': {{ request()->routeIs('admin') ? 'true' : 'false' }},
                        'text-gray-600 hover:bg-gray-200': {{ !request()->routeIs('admin') ? 'true' : 'false' }}
                    }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="mx-4" :class="{ 'lg:hidden': sidebarMinimized }">Dashboard</span>
                </a>

                {{-- Manajemen Dokter --}}
                <a href="{{ route('admin.manage.dokter') }}" class="flex items-center py-2 mt-4 rounded-md"
                    :class="{
                        'px-4': !sidebarMinimized,
                        'justify-center px-2': sidebarMinimized,
                        'text-gray-700 bg-gray-200 font-semibold': {{ request()->routeIs('admin.manage.dokter') ? 'true' : 'false' }},
                        'text-gray-600 hover:bg-gray-200': {{ !request()->routeIs('admin.manage.dokter') ? 'true' : 'false' }}
                    }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span class="mx-4" :class="{ 'lg:hidden': sidebarMinimized }">Manajemen Dokter</span>
                </a>

                {{-- manage pasien --}}
                <a href="{{ route('admin.manage.pasien') }}" class="flex items-center py-2 mt-4 rounded-md"
                    :class="{
                        'px-4': !sidebarMinimized,
                        'justify-center px-2': sidebarMinimized,
                        'text-gray-700 bg-gray-200 font-semibold': {{ request()->routeIs('admin.manage.pasien') ? 'true' : 'false' }},
                        'text-gray-600 hover:bg-gray-200': {{ !request()->routeIs('admin.manage.pasien') ? 'true' : 'false' }}
                    }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2">
                        </path>
                    </svg>
                    <span class="mx-4" :class="{ 'lg:hidden': sidebarMinimized }">Manajemen Pasien</span>
                </a>

                {{-- manage appointment --}}

                <a href="{{ route('admin.manage.janjitemu') }}" class="flex items-center py-2 mt-4 rounded-md"
                    :class="{
                        'px-4': !sidebarMinimized,
                        'justify-center px-2': sidebarMinimized,
                        'text-gray-700 bg-gray-200 font-semibold': {{ request()->routeIs('admin.manage.janjitemu') ? 'true' : 'false' }},
                        'text-gray-600 hover:bg-gray-200': {{ !request()->routeIs('admin.manage.janjitemu') ? 'true' : 'false' }}
                    }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="mx-4" :class="{ 'lg:hidden': sidebarMinimized }">Manajemen Janji Temu</span>
                </a>

                {{-- manage faq --}}

                <a href="{{ route('admin.manage.faq') }}" class="flex items-center py-2 mt-4 rounded-md"
                    :class="{
                        'px-4': !sidebarMinimized,
                        'justify-center px-2': sidebarMinimized,
                        'text-gray-700 bg-gray-200 font-semibold': {{ request()->routeIs('admin.manage.faq') ? 'true' : 'false' }},
                        'text-gray-600 hover:bg-gray-200': {{ !request()->routeIs('admin.manage.faq') ? 'true' : 'false' }}
                    }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="mx-4" :class="{ 'lg:hidden': sidebarMinimized }">Faq</span>
                </a>


                {{-- manage question_user from kontak kami --}}

                <a href="{{ route('admin.contact_messages.index') }}" class="flex items-center py-2 mt-4 rounded-md"
                    :class="{
                        'px-4': !sidebarMinimized,
                        'justify-center px-2': sidebarMinimized,
                        'text-gray-700 bg-gray-200 font-semibold': {{ request()->routeIs('admin.contact_messages.index') ? 'true' : 'false' }},
                        'text-gray-600 hover:bg-gray-200': {{ !request()->routeIs('admin.contact_messages.index') ? 'true' : 'false' }}
                    }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="mx-4" :class="{ 'lg:hidden': sidebarMinimized }">Pertanyaan User</span>
                </a>

                {{-- reports --}}

                <a href="{{ route('admin.laporan.analitik') }}" class="flex items-center py-2 mt-4 rounded-md"
                    :class="{
                        'px-4': !sidebarMinimized,
                        'justify-center px-2': sidebarMinimized,
                        'text-gray-700 bg-gray-200 font-semibold': {{ request()->routeIs('admin.laporan.analitik') ? 'true' : 'false' }},
                        'text-gray-600 hover:bg-gray-200': {{ !request()->routeIs('admin.laporan.analitik') ? 'true' : 'false' }}
                    }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                    <span class="mx-4" :class="{ 'lg:hidden': sidebarMinimized }">Laporan & Analitik</span>
                </a>


                {{-- settings --}}
                <a href="{{ route('admin.setting') }}"
                    class="flex items-center py-2 mt-4 text-gray-600 rounded-md hover:bg-gray-200"
                    :class="{ 'px-4': !sidebarMinimized, 'justify-center px-2': sidebarMinimized }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span class="mx-4" :class="{ 'lg:hidden': sidebarMinimized }">Pengaturan</span>
                </a>
            </nav>
        </aside>

        <!-- ===== Main Content Wrapper ===== -->
        <div class="flex-1 flex flex-col overflow-hidden transition-all duration-300 ease-in-out"
            :class="{ 'lg:ml-64': !sidebarMinimized, 'lg:ml-20': sidebarMinimized }">
            <!-- ===== Header ===== -->
            <header class="flex justify-between items-center p-6 bg-white border-b">
                <div class="flex items-center">
                    <!-- Mobile Hamburger -->
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <!-- Desktop Minimize Toggle -->
                    <button @click="sidebarMinimized = !sidebarMinimized"
                        class="hidden lg:block text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                    </button>

                    {{-- <div class="relative mx-4">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <input class="w-32 sm:w-64 form-input rounded-md pl-10 pr-4" type="text"
                            placeholder="Search">
                    </div> --}}

                </div>

                <div class="flex items-center space-x-4">
                    <!-- Profile dropdown -->
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                            <img class="h-full w-full object-cover"
                                src="https://placehold.co/100x100/E2E8F0/4A5568?text=A" alt="Your avatar">
                        </button>
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-cloak
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-600 hover:text-white">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ===== Main Content Area ===== -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <div class="container mx-auto">
                    @yield('admin_content')
                </div>
            </main>
        </div>
    </div>


    <!-- Chart.js for graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
