<nav  x-data="{ isOpen: false }" class="fixed top-0 z-50 w-full bg-design-secondary py-2 px-20 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        {{ $slot }}
        <a href="/" class="flex ms-2 md:me-24">
          <img src="/img/banksbimalogo.png" class="h-10 me-3" alt="BANKS BIMA" />
          <span class="self-center pt-2 text-xl font-semibold sm:text-2xl whitespace-nowrap text-design-white">BANKS BIMA</span>
        </a>
      </div>
      <div class="flex items-center">
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
              <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
              <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
              <x-nav-link href="/how-to-join-banksbima" :active="request()->is('how-to-join-banksbima')">How To Join</x-nav-link>
              <x-nav-link href="/harga-sampah" :active="request()->is('harga-sampah')">Pricelist</x-nav-link>
          </div>
        </div>
      </div>
      @auth
        <div class="hidden md:block">
          <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
            <span class="sr-only">Open user menu</span>
            @if (auth()->user()->role_id == 2)
              <img class="w-8 h-8 rounded-full" src="/img/avatar-bank.png" alt="user photo">
            @else
              <img class="w-8 h-8 rounded-full" src="/img/avatar-default.png" alt="user photo">
            @endif
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-56 dark:bg-gray-700 dark:divide-gray-600">
              <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <div>{{ auth()->user()->name }}</div>
                <div class="font-medium truncate">{{ auth()->user()->email }}</div>
              </div>
              <div class="py-2">
                @if (auth()->user()->role_id == 2)
                <a href="/admin/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                @else
                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                @endif
              </div>
              <div class="py-2 w-full">
                <form action="/logout" method="post">
                  @csrf
                  <div class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    <button type="submit" >Log Out</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
      @else
        <div class="hidden md:block">
          <a href="/login" class="flex items-center">
            <button class="flex items-center bg-design-primary hover:bg-green-200 text-design-secondary font-bold py-2 px-4 rounded-md">
              Login
              <svg class="ml-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
              </svg>
            </button>
          </a>
        </div>
      @endauth
      <div class="-mr-2 flex md:hidden">
        <!-- Mobile menu button -->
        <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!-- Menu open: "hidden", Menu closed: "block" -->
          <svg :class="{'hidden': isOpen, 'block': !isOpen}" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!-- Menu open: "block", Menu closed: "hidden" -->
          <svg :class="{'block': isOpen, 'hidden': !isOpen}" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>
  
  <!-- Mobile menu, show/hide based on menu state. -->
  <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="md:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
      <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
      <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
      <x-nav-link href="/how-to-join-banksbima" :active="request()->is('how-to-join-banksbima')">How To Join</x-nav-link>
      <x-nav-link href="/harga-sampah" :active="request()->is('harga-sampah')">Pricelist</x-nav-link>
      @auth
      <div>
        <div class="text-design-white bg-gray-700 hover:text-design-white block rounded-md px-3 py-2 text-sm font-medium">
          <div>{{ auth()->user()->name }}</div>
          <div class="font-medium truncate">{{ auth()->user()->email }}</div>
        </div>
        <div class="my-2 text-design-white hover:bg-gray-500 hover:text-design-white block rounded-md px-3 py-2 text-sm font-medium">
          @if (auth()->user()->role_id == 2)
            <a href="/admin/dashboard">Dashboard</a>
          @else
            <a href="/dashboard">Dashboard</a>
          @endif
        </div>
        <div class="mb-2 w-full">
          <form action="/logout" method="post">
            @csrf
            <div class="text-design-white hover:bg-gray-500 hover:text-design-white block rounded-md px-3 py-2 text-sm font-medium">
              <button type="submit" class="w-full text-start">Log Out</button>
            </div>
          </form>
        </div>
      </div>
    @else
      <a href="/login" class="flex items-center">
        <button class="w-full flex items-center bg-design-primary hover:bg-green-200 text-design-secondary font-bold py-2 px-4 rounded-md">
          Login
          <svg class="ml-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
          </svg>
        </button>
      </a>
    @endauth
    </div>
    
  </div>
</nav>
