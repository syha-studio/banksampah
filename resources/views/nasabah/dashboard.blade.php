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
      <div class="grid grid-cols-8 gap-4 mb-4">
         <div class="w-full col-span-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between p-6">
               <div class="flex flex-row items-center">
                  <img class="w-28 h-28 mx-4 shadow-lg rounded-full" src="/img/avatar-default.png" alt="Foto Avatar"/>
                  <div>
                     <h6 class="mb-1 text-base font-medium text-gray-900 dark:text-white">{{ auth()->user()->branch->name}}</h6>
                     <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ auth()->user()->name }}</h5>
                     <p class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->id_number }}</p>
                     <p class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->address }}</p>
                     <p class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->whatsapp }}</p>
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
                  <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">{{ auth()->user()->saldo}}</p>
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
                     @if ($pickups->isNotEmpty())
                        @foreach ($pickups as $pickup)
                         <div class="flex-1 min-w-0 ms-4">
                              <div class="flex items-center justify-start">
                                 <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    @if ($pickup->status->id == 1)
                                       Menunggu Konfirmasi
                                    @else
                                       Pick Up Tanggal {{ $pickup->pickup_date }}
                                    @endif
                                 </p>
                                 @if ($pickup->status->id == 1)
                                    <span class="ml-2">
                                       <form action="{{ route('pickup.cancel', $pickup->id) }}" method="POST" class="inline">
                                             @csrf
                                             <button type="submit" class="text-red-500">Batal</button>
                                       </form>
                                    </span>
                                 @endif
                              </div>
                              <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                 Terakhir diupdate {{ $pickup->updated_at }}
                              </p>
                         </div>
                         <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                           {{ $pickup->status->name }}
                         </div>
                        @endforeach
                     @else
                         <div class="flex justify-center items-center h-full w-full text-center text-base font-semibold text-gray-900 dark:text-white">
                             Tidak ada Permintaan Aktif
                         </div>
                     @endif
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
                  @forelse ($pickupHistories as $pickupHistory)
                     <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                           <div class="flex-1 min-w-0 ms-4">
                              <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                 Setoran Tanggal {{ $pickupHistory->updated_at->format('d-m-Y')}}
                              </p>
                              <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                 {{ $pickupHistory->status->name }}
                              </p>
                           </div>
                           <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                              Rp {{ $pickupHistory->total }}
                           </div>
                        </div>
                     </li>
                  @empty
                     <div class="flex justify-center items-center h-full w-full text-center text-base font-semibold text-gray-900 dark:text-white">
                        Tidak ada Riwayat Setoran
                  </div>
                  @endforelse
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
                  @forelse ($withdraws as $withdraw)
                     <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                           <div class="flex-1 min-w-0 ms-4">
                              <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                 Penarikan Tanggal {{ $withdraw->updated_at->format('d-m-Y')}}
                              </p>
                              <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                 {{ $withdraw->status->name }}
                              </p>
                           </div>
                           <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                              Rp {{ $withdraw->total }}
                           </div>
                        </div>
                     </li>
                  @empty
                     <div class="flex justify-center items-center h-full w-full text-center text-base font-semibold text-gray-900 dark:text-white">
                        Tidak ada Permintaan Aktif
                  </div>
                  @endforelse
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="fixed end-6 bottom-6">
      <!-- Button modal -->
      <button @if($pickups->isNotEmpty()) disabled data-tooltip-target="tooltip-left" data-tooltip-placement="left" @endif type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="flex items-center justify-center text-white bg-design-primary rounded-lg w-14 h-14 hover:bg-green-200 focus:ring-4 focus:ring-green-200 focus:outline-none">
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
          </svg>
          <span class="sr-only">Request Pickup</span>
      </button>
      <div id="tooltip-left" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
         @foreach($pickups as $pickup)
            {{ $pickup->status->name }}
         @endforeach
         <div class="tooltip-arrow" data-popper-arrow></div>
     </div>
  </div>
  @include("nasabah.profileEdit")
  @include("nasabah.pickUpRequest")
</x-layout-nasabah>