<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
   <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
       <!-- Modal content -->
       <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
           <!-- Modal header -->
           <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
               <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                   Request Pick Up
               </h3>
               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                   <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                   <span class="sr-only">Close modal</span>
               </button>
           </div>
           <!-- Modal body -->
           <form action="#">
               <div class="grid gap-4 mb-4 sm:grid-cols-2">
                   <div>
                       <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                       <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5" placeholder="Bonnie Green" required="">
                   </div>
                   <div>
                       <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor NIK</label>
                       <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5" placeholder="3510000000000001" required="">
                   </div>
                   <div>
                       <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor HP</label>
                       <input type="text"  name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5" placeholder="087123456789" required="">
                   </div>
                   <div>
                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perkiraan Berat (kg)</label>
                    <input type="number"  name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5" placeholder="kg" required="">
                </div>
                   <div class="sm:col-span-2">
                       <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                       <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-design-primary focus:border-design-primary" placeholder="Write product description here">Jalan Kapas No 7, Desa Mawar, Kec Coklat, Kab Kucingan</textarea>                    
                   </div>
               </div>
               <button type="submit" class="text-white inline-flex items-center bg-design-primary hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                   <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                   Request
               </button>
           </form>
       </div>
   </div>
</div>