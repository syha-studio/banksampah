<x-layout-nasabah>
   <x-slot:title>{{ $title }}</x-slot:title>
   <div class="p-4 mt-14">
      <div class="grid grid-cols-3 gap-4 mb-4">
         <div class="flex items-center col-span-1 justify-start w-full  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="/saldo" class="p-6 w-full">
               <h5 class="mb-2 text-2xl font-bold justify-start tracking-tight text-gray-900 dark:text-white">Saldo</h5>
               <div class="flex items-center justify-between">
                  <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">Rp</p>
                  <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">50.000</p>
               </div>
            </a>
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
      <div class="w-full mb-4 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
         <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
               Riwayat Tarik Tunai
            </h5>
         </div>
         <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
               <li class="py-3 sm:py-4">
                  <div class="flex items-center">
                     <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                           Tanggal 20-07-2024
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                           Pukul 22.39
                        </p>
                     </div>
                     <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        Rp 24.000
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
  @include("nasabah.transferBank")
  @include("nasabah.transferEwallet")
</x-layout-nasabah>