<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="p-4 mt-14">
      <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
         <div class="flex items-center justify-center mb-4">
            <h5 class="text-xl pb-4 font-bold leading-none text-center text-gray-900 dark:text-white">
               Nasabah
            </h5>
         </div>
         <div class="flow-root">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                   <tr>
                       <th scope="col" class="px-6 py-3">
                           Nama
                       </th>
                       <th scope="col" class="px-6 py-3">
                           NIK
                       </th>
                       <th scope="col" class="px-6 py-3">
                           Alamat
                       </th>
                       <th scope="col" class="px-6 py-3">
                           No HP
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Cabang
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Saldo
                        </th>
                       <th scope="col" class="px-6 py-3">
                           <span class="sr-only">Action</span>
                       </th>
                   </tr>
               </thead>
               <tbody>
                   <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                       <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Bonnie Green
                       </th>
                       <td class="px-6 py-4">
                           3510000000000001
                       </td>
                       <td class="px-6 py-4">
                           Jalan Kapas No 7, Desa Mawar, Kec Coklat, Kab Kucingan
                       </td>
                       <td class="px-6 py-4">
                           087123456789
                        </td>
                        <td class="px-6 py-4">
                           Rungkut Mega
                        </td>
                        <td class="px-6 py-4">
                           50.000
                        </td>
                       <td class="px-6 py-4 text-right">
                           <a data-modal-target="detail-history" data-modal-toggle="detail-history" class="font-medium text-design-primary hover:underline">See Details</a>
                           <a data-modal-target="detail-history" data-modal-toggle="detail-history" class="font-medium text-design-primary hover:underline">Delete</a>
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
</x-layout-admin>