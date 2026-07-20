<main class="container mx-auto py-10 px-4">

    <h2 class="text-3xl font-bold text-center text-green-700 mb-2">
        Data Kependudukan Desa Kelating
    </h2>

    <p class="text-center text-gray-500 mb-10">
        Informasi statistik kependudukan Desa Kelating.
    </p>

    <!-- Statistik -->

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500">Jumlah Penduduk</h3>
            <p class="text-4xl font-bold text-green-600">4.258</p>
            <p class="text-sm text-gray-500">Jiwa</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500">Jumlah KK</h3>
            <p class="text-4xl font-bold text-blue-600">1.342</p>
            <p class="text-sm text-gray-500">KK</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500">Laki-laki</h3>
            <p class="text-4xl font-bold text-indigo-600">2.130</p>
            <p class="text-sm text-gray-500">Jiwa</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6 text-center">
            <h3 class="text-gray-500">Perempuan</h3>
            <p class="text-4xl font-bold text-pink-600">2.128</p>
            <p class="text-sm text-gray-500">Jiwa</p>
        </div>

    </div>

    <!-- Tabel -->

    <div class="bg-white rounded-lg shadow">

        <div class="p-5 border-b">
            <h3 class="text-xl font-semibold">
                Statistik Penduduk Berdasarkan Banjar
            </h3>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-green-600 text-white">

                    <tr>

                        <th class="py-3">No</th>

                        <th>Banjar</th>

                        <th>Laki-laki</th>

                        <th>Perempuan</th>

                        <th>Total</th>

                        <th>Jumlah KK</th>

                    </tr>

                </thead>

                <tbody>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="text-center py-3">1</td>

                        <td>Banjar Kelating Kaja</td>

                        <td class="text-center">560</td>

                        <td class="text-center">548</td>

                        <td class="text-center font-semibold">1108</td>

                        <td class="text-center">340</td>

                    </tr>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="text-center py-3">2</td>

                        <td>Banjar Kelating Kelod</td>

                        <td class="text-center">610</td>

                        <td class="text-center">598</td>

                        <td class="text-center font-semibold">1208</td>

                        <td class="text-center">381</td>

                    </tr>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="text-center py-3">3</td>

                        <td>Banjar Tengah</td>

                        <td class="text-center">480</td>

                        <td class="text-center">501</td>

                        <td class="text-center font-semibold">981</td>

                        <td class="text-center">306</td>

                    </tr>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="text-center py-3">4</td>

                        <td>Banjar Dauh Peken</td>

                        <td class="text-center">480</td>

                        <td class="text-center">481</td>

                        <td class="text-center font-semibold">961</td>

                        <td class="text-center">315</td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <!-- Tombol -->

    <div class="text-center mt-8">

        <a href="<?= base_url('navbar/layanan_publik') ?>"
           class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700">

            Kembali

        </a>

    </div>

</main>