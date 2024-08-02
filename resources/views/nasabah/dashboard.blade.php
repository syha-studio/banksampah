<x-layout-nasabah>
   <x-slot:title>{{ $title }}</x-slot:title>
   <div class="p-4 mt-14">
      <div class="grid grid-cols-8 gap-4 mb-4">
         <div class="w-full col-span-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between p-6">
               <div class="flex flex-row items-center">
                  <img class="w-28 h-28 mx-4 shadow-lg rounded-full" src="/img/avatar-default.png" alt="Foto Avatar"/>
                  <div>
                     <h6 class="mb-1 text-base font-medium text-gray-900 dark:text-white">Cabang Rungkut Mega</h6>
                     <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                     <p class="text-sm text-gray-500 dark:text-gray-400">3510000000000001</p>
                     <p class="text-sm text-gray-500 dark:text-gray-400">Jalan Kapas No 7, Desa Mawar, Kec Coklat, Kab Kucingan</p>
                     <p class="text-sm text-gray-500 dark:text-gray-400">087123456789</p>
                  </div>
               </div>
               <div>
                  <button data-modal-target="profile-edit" data-modal-toggle="profile-edit" type="button">
                     <p class="text-sm font-medium">
                        <svg class="w-6 h-6 text-design-primary dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                         </svg>
                     </p>
                  </button>
               </div>
            </div>
        </div>
         <div class="flex items-center col-span-3 justify-start w-full  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="/saldo" class="p-6 w-full">
               <h5 class="mb-2 text-2xl font-bold justify-start tracking-tight text-gray-900 dark:text-white">Saldo</h5>
               <div class="flex items-center justify-between">
                  <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">Rp</p>
                  <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">50.000</p>
               </div>
            </a>
         </div>
      </div>
      <div class="w-full mb-4 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
         <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
               Permintaan Aktif
            </h5>
         </div>
         <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
               <li class="py-3 sm:py-4">
                  <div class="flex items-center">
                     <div class="flex-1 min-w-0 ms-4">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                           Pick Up Tanggal 26-07-2024 <span><a href="#" class="text-red-500">Batal</a></span>
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                           Pukul 09.00
                        </p>
                     </div>
                     <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        Menunggu Konfirmasi
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
      <div class="grid grid-cols-2 gap-4 mb-4">
         <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
               <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                  Riwayat Setoran
               </h5>
               <a href="/history" class="text-sm font-medium text-design-primary hover:underline dark:text-blue-500">
                  View all
               </a>
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
                              Kaca, Plastik, Besi
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
         <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
               <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                  Riwayat Tarik Tunai
               </h5>
               <a href="/saldo" class="text-sm font-medium text-design-primary hover:underline dark:text-blue-500">
                  View all
               </a>
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
   </div>
   <div class="fixed end-6 bottom-6">
      <!-- Button modal -->
      <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="flex items-center justify-center text-white bg-design-primary rounded-lg w-14 h-14 hover:bg-green-200 focus:ring-4 focus:ring-green-200 focus:outline-none">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
          </svg>
          <span class="sr-only">Request Pickup</span>
      </button>
  </div>
  @include("nasabah.profileEdit")
  @include("nasabah.pickUpRequest")
</x-layout-nasabah>