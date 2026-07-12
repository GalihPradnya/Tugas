
    <!-- Profil Desa -->
    <main class="container mx-auto py-12 px-4 flex-1">
        <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Profil Desa Kelating</h2>
        <p class="text-gray-500 mb-6 text-base text-center">Informasi lengkap tentang sejarah, visi misi, dan data singkat Desa Kelating.</p>
        <div class="md:flex md:gap-8 mb-8">

    <div class="w-full md:w-75 h-50 flex-shrink-0">
        <img src="<?= base_url('uploads/profil/'.$profil->gambar); ?>"
             alt="Profil Desa"
             class="w-full h-full rounded-lg shadow object-cover">
    </div>

    <div class="flex-1">
        <h3 class="text-2xl font-semibold mb-2">Tentang Desa</h3>

        <p class="mb-2">
            <?= nl2br($profil->tentang); ?>
        </p>
    </div>

</div>
        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h4 class="text-xl font-semibold mb-2">Visi</h4>
                <p class="mb-4 italic">"<?=($profil->visi); ?>"</p>
                <h4 class="text-xl font-semibold mb-2">Misi</h4>
                <ul class="list-disc list-inside space-y-1">
                    <?php foreach($misi as $item){ ?>
                    <li><?= $item->isi_misi; ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div>
                <h4 class="text-xl font-semibold mb-2">Data Singkat Desa</h4>
                <table class="w-full text-sm">
                    <tr>
                        <td class="py-1 font-medium">Luas Wilayah</td>
                        <td>: <?= $profil->luas_wilayah; ?> Ha</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">Jumlah Penduduk</td>
                        <td>: <?= number_format($profil->jumlah_penduduk,0,',','.'); ?> Jiwa</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">Dusun</td>
                        <td>: <?= $profil->jumlah_dusun; ?> Dusun</td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">RT/RW</td>
                        <td>: <?= $profil->jumlah_rt; ?>/<?= $profil->jumlah_rw; ?></td>
                    </tr>
                    <tr>
                        <td class="py-1 font-medium">Kode Pos</td>
                        <td>: <?= $profil->kode_pos; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
