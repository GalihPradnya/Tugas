

<!-- Pemerintahan Desa -->
<main class="container mx-auto py-12 px-4 flex-1">
    <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Struktur Pemerintahan Desa Kelating</h2>
    <p class="text-gray-500 mb-6 text-base text-center">Informasi tentang perangkat desa, BPD, dan lembaga desa lainnya.
    </p>
    <div class="bg-white rounded-lg shadow p-6 mb-8">

        <!-- <h3 class="text-2xl font-semibold mb-6 text-center">
        Kepala Desa
    </h3> -->

        <?php if($kepala_desa){ ?>

        <div class="flex flex-col items-center text-center">

            <img src="<?= base_url('uploads/kepala_desa/'.$kepala_desa->foto); ?>"
                alt="<?= $kepala_desa->nama_kepala_desa; ?>" class="w-40 h-50 object-cover rounded-lg shadow-md border">

            <div class="mt-4">

                <p class="text-2xl font-bold">
                    <?= $kepala_desa->nama_kepala_desa; ?>
                </p>

                <p class="text-gray-500 text-lg">
                    Kepala Desa
                </p>

            </div>

        </div>

        <?php } else { ?>

        <div class="bg-yellow-100 text-yellow-700 p-4 rounded text-center">
            Data Kepala Desa belum tersedia.
        </div>

        <?php } ?>

    </div>
    <h4 class="text-xl font-semibold mb-2 mt-6">Perangkat Desa</h4>

    <div class="overflow-x-auto">

        <table class="min-w-full text-sm border border-gray-200">

            <thead>
                <tr class="bg-green-100">
                    <th class="py-2 px-4 text-center">Foto</th>
                    <th class="py-2 px-4 text-left">Jabatan</th>
                    <th class="py-2 px-4 text-left">Nama</th>
                </tr>
            </thead>

            <tbody>

                <?php if(!empty($perangkat_desa)) : ?>

                <?php foreach($perangkat_desa as $row) : ?>

                <tr>
                    <td class="py-2 px-4 text-center align-middle">
                        <img src="<?= base_url('uploads/perangkat_desa/'.$row->foto); ?>" alt="<?= $row->nama; ?>"
                            class="w-20 h-30 object-cover rounded-none border mx-auto">
                    </td>

                    <td class="py-2 px-4 text-left">
                        <?= $row->jabatan; ?>
                    </td>

                    <td class="py-2 px-4 text-left">
                        <?= $row->nama; ?>
                    </td>

                </tr>

                <?php endforeach; ?>

                <?php else : ?>

                <tr>
                    <td colspan="3" class="text-center py-4">
                        Data perangkat desa belum tersedia.
                    </td>
                </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>
    </div>
    <?php foreach($lembaga_desa as $lembaga) : ?>

<div class="bg-white rounded-lg shadow p-6 mb-8">

    <h3 class="text-2xl font-semibold mb-4">
        <?= $lembaga->nama_lembaga; ?>
    </h3>

    <?php if(!empty($lembaga->anggota)) : ?>

    <ul class="list-disc list-inside space-y-1">

        <?php foreach($lembaga->anggota as $anggota) : ?>

        <li>
            <span class="font-medium">
                <?= $anggota->jabatan; ?> :
            </span>

            <?= $anggota->nama; ?>
        </li>

        <?php endforeach; ?>

    </ul>

    <?php else : ?>

        <p class="text-gray-500">
            Belum ada anggota.
        </p>

    <?php endif; ?>

</div>

<?php endforeach; ?>
</main>