<x-layout-nasabah>
   <x-slot:title>{{ $title }}</x-slot:title>
   <div class="p-4 mt-14">
      <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
         <div class="flex items-center justify-center mb-4">
            <h5 class="text-xl pb-4 font-bold leading-none text-center text-gray-900 dark:text-white">
               Riwayat Setoran
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
                           Jenis Sampah
                       </th>
                       <th scope="col" class="px-6 py-3">
                           Total (Rp)
                       </th>
                       <th scope="col" class="px-6 py-3">
                           <span class="sr-only">Edit</span>
                       </th>
                   </tr>
               </thead>
               <tbody>
                   <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                       <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           27/07/2024
                       </th>
                       <td class="px-6 py-4">
                           Kaca, Botol Plastik
                       </td>
                       <td class="px-6 py-4">
                           25.000
                       </td>
                       <td class="px-6 py-4 text-right">
                           <a data-modal-target="detail-history" data-modal-toggle="detail-history" class="font-medium text-design-primary hover:underline">See Details</a>
                       </td>
                   </tr>
               </tbody>
           </table>
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
  @include("nasabah.pickUpRequest")
  @include('nasabah.detailHistory')
</x-layout-nasabah>