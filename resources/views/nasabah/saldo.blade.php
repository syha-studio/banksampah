<x-layout-nasabah>
   <x-slot:title>{{ $title }}</x-slot:title>
   <div class="p-4 mt-14">
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
               <button @if($withdrawActives->isNotEmpty()) disabled data-tooltip-target="tooltip-left-2" data-tooltip-placement="bottom" @endif data-modal-target="transferBank" data-modal-toggle="transferBank" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-design-secondary rounded-lg bg-design-primary hover:bg-green-200 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 relative">
                  Transfer Bank
               </button>
               <button @if($withdrawActives->isNotEmpty()) disabled data-tooltip-target="tooltip-left" data-tooltip-placement="bottom" @endif data-modal-target="transferEwallet" data-modal-toggle="transferEwallet" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-design-secondary rounded-lg bg-design-primary hover:bg-green-200 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 relative">
                  Transfer E-Wallet
               </button>
               <div id="tooltip-left" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                  @foreach($withdrawActives as $withdrawActive)
                     {{ $withdrawActive->status->name }}
                  @endforeach
                  <div class="tooltip-arrow" data-popper-arrow></div>
              </div>
              <div id="tooltip-left-2" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
               @foreach($withdrawActives as $withdrawActive)
                  {{ $withdrawActive->status->name }}
               @endforeach
               <div class="tooltip-arrow" data-popper-arrow></div>
           </div>
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
                           @if ($withdraw->status->id == 6)
                              <a type="button" data-modal-target="detail-withdraw{{ $withdraw->id }}" data-modal-toggle="detail-withdraw{{ $withdraw->id }}" class="font-medium text-design-primary hover:underline">See Details</a>
                           @else
                              <a class="font-medium text-gray-400">See Details</a>
                           @endif
                        </td>
                  </tr>
                  @empty
                     <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-10 text-center" colspan="6">Tidak Ada Riwayat Penarikan</td>
                     </tr>
                  @endforelse
               </tbody>
           </table>
         </div>
      </div>
   </div>
   @foreach ($withdraws as $withdraw)
      @if ($withdraw->status->id == 6)
         @include("nasabah.detailWithdraw")
      @endif
   @endforeach
   
  @include("nasabah.transferBank")
  @include("nasabah.transferEwallet")
</x-layout-nasabah>