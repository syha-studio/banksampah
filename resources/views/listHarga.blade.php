<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-design-white dark:bg-gray-900 pt-28">
        <div class="grid max-w-screen-xl px-4 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12 justify-between">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-5xl text-design-secondary dark:text-white">BANKS BIMA</h1>
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
            <div class="bg-white dark:bg-gray-800 px-2 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form method="GET" action="{{ route('wasteprice.index') }}" class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" value="{{ request('search') }}" autocomplete="off">
                                @foreach(request('branches', []) as $branch)
                                    <input type="hidden" name="branches[]" value="{{ $branch }}">
                                @endforeach
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                                </svg>
                                Filter
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <form method="GET" action="{{ route('wasteprice.index') }}">
                                    <button type="submit" class="mb-3 w-full bg-blue-500 text-white p-2 rounded-lg">Apply Filters</button>
                                    @if(request('search'))
                                        <input type="hidden" name="search" value="{{ request('search') }}">
                                    @endif
                                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Pilih Cabang</h6>
                                    <div class=" h-24 overflow-y-auto">
                                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                            @foreach ($branches as $branch)
                                                <li class="flex items-center">
                                                    <input id="branch{{ $branch->id }}" type="checkbox" name="branches[]" value="{{ $branch->id }}" {{ in_array($branch->id, request('branches', [])) ? 'checked' : '' }} class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="branch{{ $branch->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $branch->name }} ({{ $branch->waste_prices_count }})</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-design-secondary dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-5">Cabang</th>
                                <th scope="col" class="px-4 py-5 text-start">Kategori</th>
                                <th scope="col" class="px-4 py-5 text-start">Jenis Sampah</th>
                                <th scope="col" class="px-4 py-5 text-center">Satuan</th>
                                <th scope="col" class="px-4 py-5 text-end">Harga Terkini</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($wastePrices as $wastePrice)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-4">{{ $wastePrice->branch->name }}</td>
                                    <td class="px-4 py-4 text-start">{{ $wastePrice->waste->category->name }}</td>
                                    <td class="px-4 py-4 text-start">{{ $wastePrice->waste->name }}</td>
                                    <td class="px-4 py-4 text-center">{{ $wastePrice->waste->unit }}</td>
                                    <td class="px-4 py-4 text-end">Rp {{ number_format($wastePrice->price, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-10 text-center" colspan="4">Tidak ada data yang tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $wastePrices->firstItem() }}-{{ $wastePrices->lastItem() }}</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $wastePrices->total() }}</span>
                    </span>
                    {{ $wastePrices->appends(request()->input())->links() }}
                </nav>
            </div>
        </div>
    </section>
</x-layout>