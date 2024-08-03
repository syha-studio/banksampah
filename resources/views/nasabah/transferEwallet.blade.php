<!-- Main modal -->
<div id="transferEwallet" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Transfer E-wallet
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="transferEwallet">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="/transfer" method="post">
                @csrf
                <div class="grid gap-4 mb-10">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <x-form-select name="method_id" id="method_id" label="Pilih E-Wallet" placeholder="Pilih E-Wallet" :options="$ewalletMethods"/>
                    <x-form-input type="text" name="account_number" id="account_number" label="Nomor Rekening" placeholder="Masukkan Nomor Rekening"/>
                    <x-form-input type="text" name="total" id="total" label="Jumlah" placeholder="Masukkan Jumlah"/>
                    <div>
                        <p class="text-xs text-end">*Biaya Transfer Rp 1.000 termasuk pada total</p>
                    </div>
                    <x-form-input type="text" name="message" id="message" label="Pesan" placeholder="Maksimal 50 Karakter" not/>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-design-primary hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="mr-1 -ml-1 w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4"/>
                      </svg>
                    Transfer
                </button>
            </form>
        </div>
    </div>
 </div>