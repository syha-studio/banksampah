<div>
    <div class="bg-white dark:bg-gray-800 px-2 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                        placeholder="Cari Jenis Sampah" autocomplete="off">
                </div>
            </div>
            <div class="flex items-center w-full sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-8 w-8 mr-2 text-gray-400"
                    viewbox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                        clip-rule="evenodd" />
                </svg>
                <select wire:model.defer="activeCategory"
                    class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full text-sm font-medium"
                    required="" autofocus>
                    <option value="">Pilih Cabang</option>
                    @foreach ($categories as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                </select>
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
        <div class="py-6 px-6">
            {{ $wastePrices->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
