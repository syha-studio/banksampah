<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="bg-design-white dark:bg-design-secondary pt-20">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto">
            <div class="mb-6 px-6 py-8 w-full flex items-center justify-center bg-design-secondary rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <a href="#" class="flex items-center my-5 text-2xl font-semibold text-design-white dark:text-white">
                    <img class="h-16 mr-5" src="/img/banksbimalogo.png" alt="logo">
                    BANK SAMPAH <br> BINTANG MANGROVE  
                </a>
            </div>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-design-secondary md:text-2xl dark:text-white">
                        Daftar Menjadi Nasabah
                    </h1>
                    <form class="space-y-4 md:space-y-4" action="/register-2" method="post">
                        @csrf
                        <div class="pt-6 text-center">
                            <h4 class="font-semibold ">Data Diri</h4>
                        </div>
                        <input type="hidden" name="role_id" id="role_id" value="1">
                        <input type="hidden" name="branch_id" id="branch_id" value="1">
                        <input type="hidden" name="saldo" id="saldo" value="0">
                        <x-form-input type="email" name="email" id="email" label="Email" placeholder="Masukkan Email"/>
                        <x-form-input type="text" name="id_number" id="id_number" label="Nomor KTP" placeholder="Masukkan Nomor KTP"/>
                        <x-form-input type="text" name="name" id="name" label="Nama Lengkap" placeholder="Masukkan Nama Lengkap"/>
                        <x-form-input type="text" name="whatsapp" id="whatsapp" label="Nomor WhatsApp" placeholder="Masukkan Nomor WhatsApp"/>
                        <div class="pt-6 text-center">
                            <h4 class="font-semibold ">Alamat Nasabah</h4>
                        </div>
                        <x-form-select name="district_id" id="district_id" label="Kecamatan" placeholder="Pilih Kecamatan" :options="$districts"/>
                        <x-form-input type="text" name="address" id="address" label="Alamat" placeholder="Masukkan Jalan, No Rumah, Desa"/>
                        <div class="pt-6 text-center">
                            <h4 class="font-semibold ">Buat Password</h4>
                        </div>
                        <x-form-input type="password" name="password" id="password" label="Password" placeholder="••••••••"/>
                        <x-form-input type="password" name="password_confirmation" id="password_confirmation" label="Konfirmasi Password" placeholder="••••••••"/>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-design-primary dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-design-primary dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Saya menyetujui <a class="font-medium text-design-primary hover:underline dark:text-primary-500" href="#">Syarat dan Ketentuan</a></label>
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-design-primary hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-design-primary dark:hover:bg-primary-700 dark:focus:ring-primary-800">Daftar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </x-layout>