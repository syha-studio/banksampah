<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-design-white dark:bg-gray-900 pt-28">
        <div class="grid max-w-screen-xl px-4 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12 justify-between">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-5xl text-design-secondary dark:text-white">BIMAPRAYA</h1>
                <p class="max-w-2xl mb-6 font-semibold text-design-secondary lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Bank Sampah Bintang Mangrove</p>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex items-center">
                <img src="/svg/vector5.svg" alt="vector 5">
            </div>                
        </div>
    </section>
    <section class="bg-design-white dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl py-8 px-4 lg:px-12">
            <h2 class="mb-4 text-center text-4xl tracking-tight font-extrabold text-design-secondary dark:text-white">DAFTAR HARGA BELI SAMPAH</h2>
            <p class="mb-8 text-center">Cari tahu harga beli sampah yang akan kamu setorkan disini</p>
            {{-- Start Coding Here --}}
            <livewire:waste-price-list/>
        </div>
    </section>
</x-layout>