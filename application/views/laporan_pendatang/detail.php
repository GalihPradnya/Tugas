<div class="container mx-auto py-10 px-4">

    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-8">

        <h2 class="text-2xl font-bold text-green-700 mb-6 text-center">
            Detail Laporan Pendatang
        </h2>


        <!-- STATUS -->

        <div class="mb-6 text-center">

            <?php if($laporan['status'] == 'Menunggu'): ?>

                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg font-semibold">
                    Menunggu Verifikasi Admin
                </span>


            <?php elseif($laporan['status'] == 'Disetujui'): ?>

                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-lg font-semibold">
                    Laporan Disetujui
                </span>


            <?php else: ?>

                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-lg font-semibold">
                    Laporan Ditolak
                </span>


            <?php endif; ?>

        </div>



        <div class="grid md:grid-cols-2 gap-6">


            <!-- DATA PRIBADI -->

            <div>

                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    Data Pendatang
                </h3>


                <table class="w-full text-sm">

                    <tr>
                        <td class="py-2 font-semibold w-40">
                            NIK
                        </td>

                        <td>
                            <?= $laporan['nik']; ?>
                        </td>
                    </tr>


                    <tr>
                        <td class="py-2 font-semibold">
                            Nama Lengkap
                        </td>

                        <td>
                            <?= $laporan['nama_lengkap']; ?>
                        </td>
                    </tr>


                    <tr>
                        <td class="py-2 font-semibold">
                            Tempat Lahir
                        </td>

                        <td>
                            <?= $laporan['tempat_lahir']; ?>
                        </td>
                    </tr>


                    <tr>
                        <td class="py-2 font-semibold">
                            Tanggal Lahir
                        </td>

                        <td>
                            <?= !empty($laporan['tanggal_lahir']) 
                            ? date('d-m-Y',strtotime($laporan['tanggal_lahir'])) 
                            : '-'; ?>
                        </td>
                    </tr>


                    <tr>
                        <td class="py-2 font-semibold">
                            Jenis Kelamin
                        </td>

                        <td>
                            <?= $laporan['jenis_kelamin']=='L' 
                            ? 'Laki-laki' 
                            : 'Perempuan'; ?>
                        </td>
                    </tr>


                    <tr>
                        <td class="py-2 font-semibold">
                            Nomor HP
                        </td>

                        <td>
                            <?= $laporan['nomor_hp']; ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="py-2 font-semibold">
                            Email
                        </td>

                        <td>
                            <?= !empty($laporan['email']) ? $laporan['email'] : '-'; ?>
                        </td>
                    </tr>


                    <tr>
                        <td class="py-2 font-semibold">
                            Pekerjaan
                        </td>

                        <td>
                            <?= $laporan['pekerjaan']; ?>
                        </td>
                    </tr>


                </table>

            </div>




            <!-- TEMPAT TINGGAL -->

            <div>


                <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">
                    Informasi Tinggal
                </h3>


                <table class="w-full text-sm">


                    <tr>

                        <td class="py-2 font-semibold w-40">
                            Alamat Asal
                        </td>

                        <td>
                            <?= $laporan['alamat_asal']; ?>
                        </td>

                    </tr>



                    <tr>

                        <td class="py-2 font-semibold">
                            Alamat Tinggal
                        </td>

                        <td>
                            <?= $laporan['alamat_tinggal']; ?>
                        </td>

                    </tr>



                    <tr>

                        <td class="py-2 font-semibold">
                            Tanggal Datang
                        </td>

                        <td>

                            <?= !empty($laporan['tanggal_datang']) 
                            ? date('d-m-Y',strtotime($laporan['tanggal_datang'])) 
                            : '-'; ?>

                        </td>

                    </tr>




                    <tr>

                        <td class="py-2 font-semibold">
                            Tempat Tinggal
                        </td>

                        <td>
                            <?= $laporan['tempat_tinggal']; ?>
                        </td>

                    </tr>



                    <tr>

                        <td class="py-2 font-semibold">
                            Lama Tinggal
                        </td>

                        <td>
                            <?= $laporan['lama_tinggal']; ?>
                        </td>

                    </tr>



                    <tr>

                        <td class="py-2 font-semibold">
                            Keterangan
                        </td>

                        <td>
                            <?= nl2br($laporan['keterangan']); ?>
                        </td>

                    </tr>


                </table>


            </div>


        </div>



        <?php if($laporan['status']=='Ditolak'): ?>

        <div class="mt-6 bg-red-100 text-red-700 p-4 rounded-lg">

            <strong>Alasan Penolakan:</strong>

            <br>

            <?= nl2br($laporan['alasan_penolakan']); ?>

        </div>

        <?php endif; ?>




        <div class="mt-8 border-t pt-5 text-right">


            <a href="<?= base_url('pendatang/laporan_pendatang'); ?>"
               class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">

                Kembali

            </a>


        </div>


    </div>


</div>