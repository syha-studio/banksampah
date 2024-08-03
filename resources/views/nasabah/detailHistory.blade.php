<!-- Main modal -->
<div id="detail-history{{ $pickupHistory->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
   <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
       <!-- Modal content -->
       <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
           <!-- Modal header -->
           <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
               <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                   Detail Pick Up Tanggal {{ $pickupHistory->pickup_date }}
               </h3>
               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="detail-history{{ $pickupHistory->id }}">
                   <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                   <span class="sr-only">Close modal</span>
               </button>
           </div>
           <!-- Modal body -->
           <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Bahan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Satuan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga Jual (Rp)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total (Rp)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pickupHistory->pickupDetail as $pickupDetail)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pickupDetail->wastePrice->waste->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pickupDetail->wastePrice->waste->category->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pickupDetail->wastePrice->waste->unit }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pickupDetail->qty }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pickupDetail->wastePrice->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pickupDetail->total }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
       </div>
   </div>
</div>