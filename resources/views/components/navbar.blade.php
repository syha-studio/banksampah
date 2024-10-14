<nav class="bg-design-secondary fixed top-0 z-50 w-full  py-2 px-2 xl:px-20 border-b border-gray-200">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
        <a href="/" class="flex ms-2">
            <img src="/img/banksbimalogo.png" class="h-10 me-3" alt="BIMAPRAYA" />
            <span
                class="self-center pt-2 text-xl font-semibold sm:text-2xl whitespace-nowrap text-design-white">BIMAPRAYA</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="hidden md:flex flex-row items-center justify-center w-full">
            <div class="flex flex-row justify-center gap-4">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                <x-nav-link href="/how-to-join-banksbima" :active="request()->is('how-to-join-banksbima')">How To Join</x-nav-link>
                <x-nav-link href="/harga-sampah" :active="request()->is('harga-sampah')">Pricelist</x-nav-link>
            </div>
        </div>
        @auth
            <div class="hidden md:block">
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    type="button">
                    <span class="sr-only">Open user menu</span>
                    @if (auth()->user()->role_id == 2)
                        <img class="w-8 h-8 rounded-full" src="/img/avatar-bank.png" alt="user photo">
                    @else
                        <img class="w-8 h-8 rounded-full" src="/img/avatar-default.png" alt="user photo">
                    @endif
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAvatar"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-56 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                    </div>
                    <div class="py-2">
                        @if (auth()->user()->role_id == 2)
                            <a href="/admin/dashboard"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        @else
                            <a href="/dashboard"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        @endif
                    </div>
                    <div class="py-2 w-full">
                        <form action="/logout" method="post">
                            @csrf
                            <div
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <button type="submit">Log Out</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="hidden md:block">
                <a href="/login" class="flex items-center">
                    <button
                        class="flex items-center bg-design-primary hover:bg-green-200 text-design-secondary font-bold py-2 px-4 rounded-md">
                        Login
                        <svg class="ml-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                        </svg>
                    </button>
                </a>
            </div>
        @endauth
    </div>
    <div class="hidden md:hidden w-full gap-4" id="navbar-sticky">
        <div  class="flex flex-col justify-center gap-2 px-2 pb-2">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/how-to-join-banksbima" :active="request()->is('how-to-join-banksbima')">How To Join</x-nav-link>
            <x-nav-link href="/harga-sampah" :active="request()->is('harga-sampah')">Pricelist</x-nav-link>
            @auth
                <div class="block">
                    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        type="button">
                        <span class="sr-only">Open user menu</span>
                        @if (auth()->user()->role_id == 2)
                            <img class="w-8 h-8 rounded-full" src="/img/avatar-bank.png" alt="user photo">
                        @else
                            <img class="w-8 h-8 rounded-full" src="/img/avatar-default.png" alt="user photo">
                        @endif
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAvatar"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-56 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ auth()->user()->name }}</div>
                            <div class="font-medium truncate">{{ auth()->user()->email }}</div>
                        </div>
                        <div class="py-2">
                            @if (auth()->user()->role_id == 2)
                                <a href="/admin/dashboard"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            @else
                                <a href="/dashboard"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            @endif
                        </div>
                        <div class="py-2 w-full">
                            <form action="/logout" method="post">
                                @csrf
                                <div
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <button type="submit">Log Out</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="block">
                    <a href="/login" class="flex items-center">
                        <button
                            class="flex items-center w-full bg-design-primary hover:bg-green-200 text-design-secondary font-bold py-2 px-4 rounded-md">
                            Login
                            <svg class="ml-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                            </svg>
                        </button>
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
