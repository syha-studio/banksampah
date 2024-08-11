<x-layout-admin>
   <x-slot:title>{{ $title }}</x-slot:title>
   <div class="p-4 mt-14">

      {{-- Alert Process --}}
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

      {{-- Alert if there is Pickup Today --}}
      @if ($hasPickupToday)
         <div id="alert-2" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
         <div class="ms-3 text-sm font-medium">
         Ada Jadwal Pengambilan Hari Ini!
         </div>
         <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
         </button>
         </div>
      @endif

      {{-- Alert Error Isi Tanggal --}}
      @error('pickup_date')
         <div id="alert-1" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <div class="ms-3 text-sm font-medium">
               Isi Tanggal Pengambilan dulu!
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
               <span class="sr-only">Close</span>
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
               </svg>
            </button>
         </div>
      @enderror

      <div class="grid grid-cols-8 gap-4 mb-4">

         {{-- Profile Card --}}
         <div class="w-full col-span-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between p-6">
               <div class="flex flex-row items-center">
                  <img class="w-28 h-28 mx-4 shadow-lg rounded-full" src="/img/avatar-bank.png" alt="Foto Avatar"/>
                  <div>
                     <h6 class="mb-1 text-base font-medium text-gray-900 dark:text-white">{{ auth()->user()->district->name}}</h6>
                     <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">BS {{ auth()->user()->name }}</h5>
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

        {{-- Saldo Nasabah Bank Sampah BIMA --}}
         <div class="flex items-center col-span-3 justify-start w-full  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <a href="/admin/saldo" class="p-6 w-full">
               <h5 class="mb-2 text-2xl font-bold justify-start tracking-tight text-gray-900 dark:text-white">Total Saldo Nasabah</h5>
               <div class="flex items-center justify-between">
                  <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">Rp</p>
                  <p class="font-normal text-4xl text-gray-700 dark:text-gray-400">{{ number_format($saldo, 0, ',', '.') }}</p>
               </div>
            </a>
         </div>

      </div>

      {{-- Permintaan Setoran Aktif --}}
      <div class="w-full mb-4 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
         <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
               Permintaan Setoran Aktif
            </h5>
         </div>
         <div class="flow-root">

            {{-- List Permintaan --}}
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
               @if ($pickups->isNotEmpty())
                  @foreach ($pickups as $pickup)
                     <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                           <div class="flex-1 min-w-0 ms-4">
                                 <div class="flex items-center justify-start">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                       @if ($pickup->status->id == 1)
                                          Menunggu Konfirmasi
                                       @else
                                          Pick Up Tanggal {{ $pickup->pickup_date }}
                                       @endif
                                    </p>
                                    <span class="ml-2">
                                       <form action="{{ route('pickup.cancel2', $pickup->id) }}" method="POST" class="inline">
                                             @csrf
                                             <button type="submit" class="text-red-500">Batal</button>
                                       </form>
                                    </span>
                                 </div>
                                 <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Terakhir diupdate {{ $pickup->updated_at }}
                                 </p>
                           </div>
                           <div class="px-4 inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                              {{ $pickup->status->name }}
                           </div>
                           <div class="px-4 inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                              
                              {{-- Jika Status Menunggu Konfirmasi --}}
                              @if ($pickup->status->id == 1)
                                 <form action="{{ route('pickup.update', $pickup->id) }}" method="POST" class="inline">
                                    @csrf
                                    <div class="relative inline-flex w-36">
                                       <input datepicker-min-date="{{ date('Y-m-d') }}" type="text" id="datepicker-input" name="pickup_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" readonly>
                                       <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                             <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                          </svg>
                                       </div>
                                 </div>
                                    <div class="inline-flex relative max-w-sm">
                                       <button type="submit" class="ml-2 text-design-primary hover:text-green-600">Update</button>
                                    </div>
                                 </form>

                              {{-- Jika Status Sudah distujui --}}
                              @elseif ($pickup->status->id == 2)
                                 <form action="{{ route('pickup.take', $pickup->id) }}" method="POST" class="inline">
                                    @csrf
                                    <div class="inline-flex relative max-w-sm">
                                       <button type="submit" class="ml-2 text-design-primary hover:text-green-600">Ambil Sekarang</button>
                                    </div>
                                 </form>

                              {{-- Jika Status Dalam Perjalanan --}}
                              @else
                                 <div class="inline-flex relative max-w-sm">
                                    <a data-modal-target="detail-pickup{{ $pickup->id }}" data-modal-toggle="detail-pickup{{ $pickup->id }}" class="font-medium text-design-primary hover:underline cursor-pointer">Isi Detail</a>
                                 </div>
                              @endif

                           </div>
                        </div>
                     </li>
                  @endforeach
               @else
                  <li>
                     <div class="flex justify-center items-center h-full w-full text-center text-base font-semibold text-gray-900 dark:text-white">
                        Tidak ada Permintaan Aktif
                    </div>
                  </li>  
               @endif
            </ul>
         </div>
      </div>

      {{-- Permintaan Penarikan Aktif --}}
      <div class="w-full mb-4 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
         <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
               Permintaan Penarikan Aktif
            </h5>
         </div>
         <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
               <li class="py-3 sm:py-4">
                  <div class="flex items-center">
                     @if ($withdrawActives->isNotEmpty())
                        @foreach ($withdrawActives as $withdrawActive)
                         <div class="flex-1 min-w-0 ms-4">
                              <div class="flex items-center justify-start">
                                 <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Rp {{ $withdrawActive->total }}
                                 </p>
                                 @if ($withdrawActive->status->id == 1)
                                    <span class="ml-2">
                                       <form action="{{ route('transfer.cancel', $withdrawActive->id) }}" method="POST" class="inline">
                                             @csrf
                                             <button type="submit" class="text-red-500">Batal</button>
                                       </form>
                                    </span>
                                 @endif
                              </div>
                              <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                 Terakhir diupdate {{ $withdrawActive->updated_at }}
                              </p>
                         </div>
                         <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                           {{ $withdrawActive->status->name }}
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

      {{-- Riwayat Setoran dan Penarikan--}}
      <div class="grid grid-cols-2 gap-4 mb-4">
         <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
               <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">
                  Riwayat Setoran
               </h5>
               <a href="/admin/pickup" class="text-sm font-medium text-design-primary hover:underline dark:text-blue-500">
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
                  Riwayat Penarikan
               </h5>
               <a href="/admin/saldo" class="text-sm font-medium text-design-primary hover:underline dark:text-blue-500">
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
                        Tidak ada Riwayat Penarikan
                     </div>
                  @endforelse
               </ul>
            </div>
         </div>
      </div>
      
   </div>

   @include("nasabah.profileEdit")

   {{-- Modal Pickup Detail --}}
   @foreach ($pickups as $pickup)
      @if ($pickup->status->id == 3)
         @include('admin.pickupDetailForm')
      @endif
   @endforeach

   {{-- Script Datepicker --}}
   <script>
      document.addEventListener('DOMContentLoaded', function () {
         const datepickerInput = document.getElementById('datepicker-input');
         
         // Initialize the datepicker using the Flowbite plugin
         new Datepicker(datepickerInput, {
            // You can add custom options here if needed
            format: 'yyyy-mm-dd'
         });

         // Open the datepicker when clicking on the icon
         document.querySelector('.pl-3').addEventListener('click', function () {
            datepickerInput.focus();
         });
      });
   </script>
</x-layout-admin>