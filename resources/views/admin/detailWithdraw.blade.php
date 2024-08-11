<!-- Main modal -->
<div id="detail-withdraw{{ $withdrawActive->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-screen md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Detail Penarikan Tanggal {{ $withdrawActive->updated_at->format('d-m-Y') }} | {{ $withdrawActive->status->name }}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="detail-withdraw{{ $withdrawActive->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            @if ($withdrawActive->image->id != 1)
                <a data-modal-target="view-image{{ $withdrawActive->id }}" data-modal-toggle="view-image{{ $withdrawActive->id }}" class="hover:opacity-80 cursor-pointer">
                    <img class="h-24 w-full rounded-lg object-cover" src="{{ Storage::url($withdrawActive->image->file_name) }}" alt="Receipt">
                </a>
                <div id="view-image{{ $withdrawActive->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-xl h-screen md:h-auto">
                        <!-- Modal content -->
                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <!-- Modal header -->
                            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Bukti Transfer
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="view-image{{ $withdrawActive->id }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <img class="h-full rounded-lg object-=fit" src="{{ Storage::url($withdrawActive->image->file_name) }}" alt="Receipt">
                        </div>
                    </div>
                </div>
            @endif
             <dl class="mt-5 p-5 w-full h-96 overflow-y-auto text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">User ID</dt>
                    <dd class="text-lg font-semibold">{{ $withdrawActive->user_id }}</dd>
                </div>
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Name</dt>
                    <dd class="text-lg font-semibold">{{ $withdrawActive->user->name }}</dd>
                </div>
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Metode Transfer</dt>
                    <dd class="text-lg font-semibold">{{ $withdrawActive->method->methodCategory->name }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Bank/E-Wallet</dt>
                    <dd class="text-lg font-semibold">{{ $withdrawActive->method->name }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nomor Rekening</dt>
                    <dd class="text-lg font-semibold">{{ $withdrawActive->account_number }}</dd>
                </div>
                <div class="flex flex-col pt-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Total</dt>
                    <dd class="text-lg font-semibold">Rp {{ number_format($withdrawActive->total, 0, ',', '.') }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Pesan</dt>
                    <dd class="text-lg font-semibold">{{ $withdrawActive->message }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Status</dt>
                    <dd class="text-lg font-semibold">{{ $withdrawActive->status->name }}</dd>
                </div>
            </dl>
        </div>
    </div>
 </div>