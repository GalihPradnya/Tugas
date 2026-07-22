<main class="container mx-auto py-10 px-4">
     <?= $this->session->flashdata('message'); ?>

    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
       

        <h2 class="text-3xl font-bold text-center text-green-700 mb-2">
            Layanan Pengaduan Masyarakat
        </h2>

        <p class="text-center text-gray-500 mb-8">
            Sampaikan keluhan, pengaduan, kritik, maupun saran kepada Pemerintah Desa Kelating.
        </p>
        


        <form action="<?= base_url('pengaduan/pengaduan/simpan'); ?>" 
              method="post" 
              enctype="multipart/form-data">


            <!-- DATA PELAPOR -->
            <h3 class="text-xl font-semibold border-b pb-2 mb-5">
                Data Pelapor
            </h3>


            <div class="grid md:grid-cols-2 gap-5">


                <!-- NIK -->
                <div>
                    <label class="font-semibold">
                        NIK
                    </label>

                    <input type="text"
                        class="w-full border rounded-lg p-3 mt-1 bg-gray-100"
                        value="<?= $penduduk['nik']; ?>"
                        readonly>
                </div>



                <!-- Nama -->
                <div>
                    <label class="font-semibold">
                        Nama Lengkap
                    </label>

                    <input type="text"
                        class="w-full border rounded-lg p-3 mt-1 bg-gray-100"
                        value="<?= $penduduk['nama_lengkap']; ?>"
                        readonly>
                </div>




                <!-- Jenis Kelamin -->
                <div>
                    <label class="font-semibold">
                        Jenis Kelamin
                    </label>

                    <input type="text"
                        class="w-full border rounded-lg p-3 mt-1 bg-gray-100"
                        value="<?= $penduduk['jenis_kelamin']; ?>"
                        readonly>
                </div>




                <!-- Email -->
                <div>
                    <label class="font-semibold">
                        Email
                    </label>

                    <input type="text"
                        class="w-full border rounded-lg p-3 mt-1 bg-gray-100"
                        value="<?= $user['email']; ?>"
                        readonly>
                </div>


            </div>




            <!-- HP -->
            <div class="mt-5">

                <label class="font-semibold">
                    Nomor HP *
                </label>

                <input type="text"
                    name="kontak"
                    class="w-full border rounded-lg p-3 mt-1"
                    placeholder="08xxxxxxxxxx"
                    required>

            </div>





            <!-- ALAMAT -->
            <div class="mt-5">

                <label class="font-semibold">
                    Alamat
                </label>


                <textarea
                    class="w-full border rounded-lg p-3 mt-1 bg-gray-100"
                    rows="3"
                    readonly><?= $penduduk['alamat']; ?></textarea>


            </div>







            <!-- DETAIL PENGADUAN -->

            <h3 class="text-xl font-semibold border-b pb-2 mt-8 mb-5">
                Detail Pengaduan
            </h3>



            <!-- Kategori -->

            <div class="mb-5">

                <label class="font-semibold">
                    Kategori Pengaduan *
                </label>


                <select
                    name="kategori_id"
                    class="w-full border rounded-lg p-3 mt-1"
                    required>


                    <option value="">
                        -- Pilih Kategori --
                    </option>


                    <?php foreach($kategori as $k): ?>


                        <option value="<?= $k['id']; ?>">

                            <?= $k['nama_kategori']; ?>

                        </option>


                    <?php endforeach; ?>


                </select>


            </div>






            <!-- Judul -->

            <div class="mb-5">

                <label class="font-semibold">
                    Judul Pengaduan *
                </label>


                <input type="text"
                    name="judul"
                    class="w-full border rounded-lg p-3 mt-1"
                    required>


            </div>







            <!-- Lokasi -->

            <div class="mb-5">

                <label class="font-semibold">
                    Lokasi Kejadian *
                </label>


                <input type="text"
                    name="lokasi"
                    class="w-full border rounded-lg p-3 mt-1"
                    required>


            </div>







            <!-- Isi -->

            <div class="mb-5">


                <label class="font-semibold">
                    Isi Pengaduan *
                </label>


                <textarea
                    name="isi_pengaduan"
                    rows="6"
                    class="w-full border rounded-lg p-3 mt-1"
                    required></textarea>


            </div>






            <!-- Bukti -->

            <div class="mb-5">

                <label class="font-semibold">
                    Upload Bukti (Opsional)
                </label>


                <input type="file"
                    name="bukti"
                    accept=".jpg,.jpeg,.png,.pdf"
                    class="w-full border rounded-lg p-3 mt-1">


            </div>







            <div class="flex justify-end gap-3 mt-8">


                <a href="<?= base_url('navbar/layanan_publik'); ?>"
                   class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600">

                    Kembali

                </a>



                <button type="submit"
                        class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">

                    Kirim Pengaduan

                </button>


            </div>


        </form>


    </div>


</main>