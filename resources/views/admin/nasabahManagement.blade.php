<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="p-4 mt-14">
        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            
            {{-- Headline --}}
            <div class="flex items-center justify-center mb-4">
                <h5 class="text-xl pb-4 font-bold leading-none text-center text-gray-900 dark:text-white">
                    List Harga Sampah
                </h5>
            </div>

            {{-- Table --}}
            <div class="relative overflow-x-auto">  
                <table id="default-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th scope="col" class="text-sm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 px-6 py-3">
                                <span class="flex items-center uppercase">
                                    Kategori
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="text-sm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 px-6 py-3">
                                <span class="flex items-center uppercase">
                                    Jenis Sampah
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="text-sm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 px-6 py-3">
                                <span class="flex items-center uppercase">
                                    Satuan
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="text-sm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 px-6 py-3">
                                <span class="flex items-center uppercase">
                                    Price
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="text-sm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400 px-6 py-3">
                                <span class="sr-only">
                                    Action
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wastePrices as $wastePrice)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $wastePrice->waste->category->name }}</th>
                            <td class="px-6 py-4">{{ $wastePrice->waste->name }}</td>
                            <td class="px-6 py-4">{{ $wastePrice->waste->unit }}</td>
                            <td class="px-6 py-4">{{ $wastePrice->price }}</td>
                            <td class="px-6 py-4">
                                <a data-modal-target="edit{{ $wastePrice->id }}" data-modal-toggle="edit{{ $wastePrice->id }}" class="font-medium text-design-primary hover:underline cursor-pointer px-1">Edit</a>
                                <form action="#">
                                    <button type="submit"class="font-medium text-red-700 hover:underline cursor-pointer px-1">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-10 text-center" colspan="4">Tidak ada data yang tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- button Plus --}}
    <div class="fixed end-6 bottom-6">
        <!-- Button modal -->
        <button type="button" data-modal-target="add" data-modal-toggle="add" class="flex items-center justify-center text-white bg-design-primary rounded-lg w-14 h-14 hover:bg-green-200 focus:ring-4 focus:ring-green-200 focus:outline-none">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
            <span class="sr-only">Buat Baru</span>
        </button>
    </div>
    @include("admin.addWastePrice")

    @foreach ($wastePrices as $wastePrice)
         @include('admin.editWastePrice')
    @endforeach

    {{-- Script Datatables --}}
    <script>
        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {
                paging: false,
                searchable: true,
                perPageSelect: false
            });
        }

        // Mendapatkan elemen input search
        const searchInput = document.querySelector('.datatable-input');

        // Menambahkan class Tailwind CSS ketika input mendapatkan fokus
        searchInput.classList.add('border', 'border-gray-300', 'rounded-lg', 'px-4', 'py-2', 'mb-4');
        searchInput.setAttribute('autocomplete', 'off');
        
    </script>
</x-layout-admin>