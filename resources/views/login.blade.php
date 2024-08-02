<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-design-white dark:bg-gray-900 pt-20">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="mb-6 px-6 py-8 w-full flex items-center justify-center bg-design-secondary rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <a href="#" class="flex items-center my-5 text-2xl font-semibold text-design-white dark:text-white">
                    <img class="h-16 mr-5" src="/img/banksbimalogo.png" alt="logo">
                    BANK SAMPAH <br> BINTANG MANGROVE  
                </a>
            </div>
            
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    @if (@session()->has('success'))
                        <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                            <div class="ms-3 text-sm font-medium">
                            {{ session('success') }}
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>
                    @endif
                    
                    <h1 class=" text-xl font-bold leading-tight tracking-tight text-design-secondary md:text-2xl dark:text-white">
                        Selamat Datang!
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/login" method="post">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="user@mail.com" required autofocus>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                  <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <div class="ml-3 text-sm">
                                  <label for="remember" class="text-gray-500 dark:text-gray-300">Ingat Saya</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-design-secondary hover:underline dark:text-primary-500">Lupa Password?</a>
                        </div>
                        <button type="submit" class="w-full text-design-white bg-design-primary hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Masuk</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Belum punya akun? Yuk, <a href="/register" class="font-medium text-design-primary hover:underline dark:text-primary-500">Daftar</a> !
                        </p>
                    </form>
                </div>
            </div>
        </div>
      </section>
  </x-layout>