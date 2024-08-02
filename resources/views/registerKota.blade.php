<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-design-white dark:bg-design-secondary pb-auto pt-24 h-screen items-center">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
            <div class="mb-6 px-6 py-8 w-full flex items-center justify-center bg-design-secondary rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <a href="#" class="flex items-center my-5 text-2xl font-semibold text-design-white dark:text-white">
                    <img class="h-16 mr-5" src="/img/banksbimalogo.png" alt="logo">
                    BANK SAMPAH <br> BINTANG MANGROVE  
                </a>
            </div>
            <div class="w-full h-max bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-10 space-y-4 md:space-y-6 sm:p-8">
                    <form class="space-y-10 md:space-y-4" action="/register-2" method="get">
                        <x-form-select name="kota" id="kota" label="Kota" placeholder="Pilih Kota" :options="$cities"/>
                        <button type="submit" class="justify-center inline-flex w-full text-white bg-design-primary hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-design-primary dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Selanjutnya
                            <svg class="w-6 h-6 text-design-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                            </svg>
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Sudah Punya Akun? <a href="/login" class="font-medium text-design-primary hover:underline dark:text-primary-500">Masuk</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('city').addEventListener('change', function() {
            var cityId = this.value;
            var districtSelect = document.getElementById('district');
            districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>'; // Reset options

            if (cityId) {
                fetch(`/api/districts/${cityId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(district => {
                            var option = document.createElement('option');
                            option.value = district.id;
                            option.text = district.name;
                            districtSelect.add(option);
                        });
                    })
                    .catch(error => console.error('Error fetching districts:', error));
            }
        });
    </script>
  </x-layout>