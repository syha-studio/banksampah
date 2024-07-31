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
                    <form class="space-y-4 md:space-y-4" action="#">
                        <div class="pt-6 text-center">
                            <h4 class="font-semibold ">Data Diri</h4>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-design-secondary dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-design-secondary text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Email" required="">
                        </div>
                        <div>
                            <label for="no-ktp" class="block mb-2 text-sm font-medium text-design-secondary dark:text-white">Nomor KTP</label>
                            <input type="text" id="no-ktp" placeholder="Masukkan Nomor KTP" class="bg-gray-50 border border-gray-300 text-design-secondary text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="nama-lengkap" class="block mb-2 text-sm font-medium text-design-secondary dark:text-white">Nama Lengkap</label>
                            <input type="text" id="nama-lengkap" placeholder="Masukkan Nama Lengkap" class="bg-gray-50 border border-gray-300 text-design-secondary text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="no-wa" class="block mb-2 text-sm font-medium text-design-secondary dark:text-white">Nomor WhatsApp</label>
                            <input type="text" id="no-wa" placeholder="Masukkan Nomor WhatsApp" class="bg-gray-50 border border-gray-300 text-design-secondary text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="pt-6 text-center">
                            <h4 class="font-semibold ">Alamat Nasabah</h4>
                        </div>
                        <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                        <select id="kota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-design-primary dark:focus:border-design-primary">
                            <option>Pilih Kota</option>
                            <option>Surabaya</option>
                            <option>Sidoarjo</option>
                            <option>Gresik</option>
                        </select>
                        <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                        <select id="kecamatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-design-primary dark:focus:border-design-primary">
                            <option>Pilih Kecamatan</option>
                            <option>Rungkut</option>
                            <option>Driyorejo</option>
                        </select>
                        <div>
                            <label for="alamat" class="block mb-2 text-sm font-medium text-design-secondary dark:text-white">Alamat Lengkap</label>
                            <input type="text" id="alamat" placeholder="Jalan, Nomor Rumah, Desa" class="bg-gray-50 border border-gray-300 text-design-secondary text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="pt-6 text-center">
                            <h4 class="font-semibold ">Buat Password</h4>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-design-secondary dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-design-secondary text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-design-secondary dark:text-white">Confirm password</label>
                            <input type="confirm-password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-design-secondary text-sm rounded-lg focus:ring-design-primary focus:border-design-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-design-primary dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-design-primary dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Saya menyetujui <a class="font-medium text-design-primary hover:underline dark:text-primary-500" href="#">Syarat dan Ketentuan</a></label>
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-design-primary hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-design-primary dark:hover:bg-primary-700 dark:focus:ring-primary-800">Daftar Sekarang</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Sudah Punya Akun? <a href="/login" class="font-medium text-design-primary hover:underline dark:text-primary-500">Masuk</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </x-layout>