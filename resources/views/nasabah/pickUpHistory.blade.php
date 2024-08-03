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
                           Status
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
                   @forelse ($pickupHistories as $pickupHistory)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($pickupHistory->pickup_date)
                                    {{ $pickupHistory->pickup_date }}
                                @else
                                    {{ $pickupHistory->created_at->format('Y-m-d') }}
                                @endif
                            </th>
                            <td class="px-6 py-4">
                                {{ $pickupHistory->status->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pickupHistory->total }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if ($pickupHistory->status->id == 5)
                                    <a data-modal-target="detail-history{{ $pickupHistory->id }}" data-modal-toggle="detail-history{{ $pickupHistory->id }}" class="font-medium text-design-primary hover:underline cursor-pointer">See Details</a>
                                @else
                                <a class="font-medium text-gray-400">See Details</a>
                                @endif
                            </td>
                        </tr>
                   @empty
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-10 text-center" colspan="6">Tidak Ada Riwayat Setoran</td>
                        </tr>
                   @endforelse
               </tbody>
           </table>
         </div>
      </div>
   </div>
   @foreach ($pickupHistories as $pickupHistory)
    @if ($pickupHistory->status->id == 5)
        @include('nasabah.detailHistory')
    @endif
   @endforeach
   
</x-layout-nasabah>