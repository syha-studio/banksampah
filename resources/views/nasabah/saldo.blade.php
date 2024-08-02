<x-layout-nasabah>
   <x-slot:title>{{ $title }}</x-slot:title>
   <div class="p-4 mt-14">
      <div class="grid grid-cols-3 gap-4 mb-4">
         <div class="flex items-center col-span-1 justify-start w-full  bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="p-6 w-full">
               <h5 class="mb-2 text-2xl font-bold justify-start tracking-tight text-gray-900 dark:text-white">Saldo</h5>
               <div class="flex items-center justify-between">
                  <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">Rp</p>
                  <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">{{ auth()->user()->saldo}}</p>
               </div>
            </div>
         </div>
         <div class="w-full col-span-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between p-6">
               <div class="flex flex-row items-center">
                  <div>
                     <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Opsi Penarikan</h5>
                     <p class="text-sm text-gray-500 dark:text-gray-400">1. Transfer BCA</p>
                     <p class="text-sm text-gray-500 dark:text-gray-400">2. E-Wallet</p>
                     <p class="text-sm text-gray-500 dark:text-gray-400">3. Tunai (Silahkan Datang Langsung Ke Cabang)</p>
                  </div>
               </div>
            </div>
        </div>
        <div class="w-full col-span-1 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
         <div class="flex flex-col justify-between p-6">
            <div class="text-center pb-4">
               <h5 class="font-semibold text-2xl">Transfer</h5>
            </div>
            <div class="flex flex-row justify-center items-center gap-4">
               <button data-modal-target="transferBank" data-modal-toggle="transferBank" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-design-secondary rounded-lg bg-design-primary hover:bg-green-200 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 relative">
                  Transfer Bank
               </button>
               <button data-modal-target="transferEwallet" data-modal-toggle="transferEwallet" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-design-secondary rounded-lg bg-design-primary hover:bg-green-200 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 relative">
                  Transfer E-Wallet
               </button>
            </div>
         </div>
     </div>
      </div>
      <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
         <div class="flex items-center justify-center mb-4">
            <h5 class="text-xl pb-4 font-bold leading-none text-center text-gray-900 dark:text-white">
               Riwayat Penarikan
            </h5>
         </div>
         <div class="flow-root">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                   <tr>
                       <th scope="col" class="px-6 py-3">
                           Tanggal
                       </th>
                       <th scope="col" class="px-6 py-3">
                           Metode
                       </th>
                       <th scope="col" class="px-6 py-3">
                           Bank/E-wallet
                       </th>
                       <th scope="col" class="px-6 py-3">
                           Total (Rp)
                       </th>
                       <th scope="col" class="px-6 py-3">
                        Status
                        </th>
                       <th scope="col" class="px-6 py-3 text-right">
                           Detail
                       </th>
                   </tr>
               </thead>
               <tbody>
                  @forelse ($withdraws as $withdraw)
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{ $withdraw->updated_at->format('d-m-Y') }}
                        </th>
                        <td class="px-6 py-4">
                           {{ $withdraw->method->methodCategory->name }}
                        </td>
                        <td class="px-6 py-4">
                           {{ $withdraw->method->name }}
                        </td>
                        <td class="px-6 py-4">
                           {{ $withdraw->total }}
                        </td>
                        <td class="px-6 py-4">
                           {{ $withdraw->status->name }}
                        </td>
                        <td class="px-6 py-4 text-right">
                           <a data-modal-target="detail-withdraw" data-modal-toggle="detail-withdraw" class="font-medium text-design-primary hover:underline">See Details</a>
                        </td>
                  </tr>
                  @empty
                     <div class="flex justify-center items-center h-full w-full text-center text-base font-semibold text-gray-900 dark:text-white">
                        Tidak ada Riwayat Penarikan
                     </div>
                  @endforelse
               </tbody>
           </table>
         </div>
      </div>
   </div>
  @include("nasabah.transferBank")
  @include("nasabah.transferEwallet")
  @include("nasabah.detailWithdraw")
</x-layout-nasabah>