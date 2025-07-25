<!-- Main modal -->
<div id="add" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Harga Sampah
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="add">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('profile.update') }}" method="POST">
                 @csrf
                 <div class="grid gap-4 mb-4 sm:grid-cols-2">
                     <div>
                         <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                         <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5" required="">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categoriesOptions as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach
                         </select>
                     </div>
                     <div>
                         <label for="waste_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Sampah</label>
                         <input type="text" name="waste_name" id="waste_name" placeholder="Masukkan Nama Sampah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5" required="">
                     </div>
                     <div>
                         <label for=unit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                         <input type="text" name=unit" id=unit" placeholder="Masukkan Satuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5" required="">
                     </div>
                     <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                        <input type="text" name="price" id="price" placeholder="Masukkan Harga Sampah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5" required="">
                    </div>
                 </div>
                 <button type="submit" class="text-white inline-flex items-center bg-design-primary hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                     Tambah
                 </button>
             </form>
        </div>
    </div>
 </div>