<main class="container mx-auto py-12 px-4">

    <div class="max-w-7xl mx-auto bg-white shadow-xl rounded-2xl p-8">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h2 class="text-3xl font-bold text-green-700">
                    Riwayat Laporan Pendatang
                </h2>

                <p class="text-gray-500 mt-2">
                    Daftar laporan pendatang yang telah Anda kirim.
                </p>
            </div>

            <a href="<?= base_url('pendatang/laporan_pendatang/tambah'); ?>"
               class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow">

                + Lapor Pendatang

            </a>

        </div>


        <?php if($this->session->flashdata('success')): ?>

            <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-5">

                <?= $this->session->flashdata('success'); ?>

            </div>

        <?php endif; ?>


        <?php if($this->session->flashdata('error')): ?>

            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-5">

                <?= $this->session->flashdata('error'); ?>

            </div>

        <?php endif; ?>


        <div class="overflow-x-auto">

            <table class="min-w-full border border-gray-200">

                <thead class="bg-green-600 text-white">

                    <tr>

                        <th class="px-4 py-3 text-center">No</th>

                        <th class="px-4 py-3">Nama Pendatang</th>

                        <th>Email</th>

                        <th class="px-4 py-3">Asal Daerah</th>

                        <th class="px-4 py-3">Tanggal Lapor</th>

                        <th class="px-4 py-3 text-center">Status</th>

                        <th class="px-4 py-3 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php if(empty($laporan)): ?>

                    <tr>

                        <td colspan="6" class="text-center py-6 text-gray-500">

                            Belum ada laporan pendatang.

                        </td>

                    </tr>

                <?php else: ?>

                    <?php
                    $no = 1;
                    foreach($laporan as $l):
                    ?>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="px-4 py-3 text-center">
                            <?= $no++; ?>
                        </td>

                        <td class="px-4 py-3">
                            <?= $l['nama_lengkap']; ?>
                        </td>
                        
                        <td><?= !empty($l['email']) ? $l['email'] : '-'; ?></td>

                        <td class="px-4 py-3">
                            <?= $l['alamat_asal']; ?>
                        </td>

                        <td class="px-4 py-3">
                            <?= date('d-m-Y', strtotime($l['created_at'])); ?>
                        </td>

                        <td class="px-4 py-3 text-center">

                            <?php if($l['status']=='Menunggu'): ?>

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                    Menunggu
                                </span>

                            <?php elseif($l['status']=='Disetujui'): ?>

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Disetujui
                                </span>

                            <?php else: ?>

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                    Ditolak
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="px-4 py-3 text-center">

                            <a href="<?= base_url('pendatang/laporan_pendatang/detail/'.$l['id']); ?>"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

                                Detail

                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</main>