<main class="container mx-auto py-12 px-4 flex-1">

    <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">
        Kontak <?= $logoDesa['nama_desa']; ?>
    </h2>

    <p class="text-gray-500 mb-8 text-center text-base">
        Hubungi Pemerintah Desa untuk informasi pelayanan administrasi,
        pengaduan masyarakat, dan kebutuhan lainnya.
    </p>

    <div class="grid md:grid-cols-2 gap-8">

        <!-- Informasi Kontak -->
        <div class="bg-white rounded-lg shadow p-6">

            <h3 class="text-2xl font-bold text-green-700 mb-6">
                Informasi Kontak
            </h3>

            <div class="space-y-5">

                <div>
                    <p class="font-semibold text-gray-800">
                        📍 Alamat Kantor Desa
                    </p>

                    <p class="text-gray-600">
                        <?= nl2br($kontak['alamat']); ?>
                    </p>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">
                        🕒 Jam Pelayanan
                    </p>

                    <p class="text-gray-600">
                        <?= $kontak['jam_pelayanan']; ?>
                    </p>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">
                        ☎️ Telepon
                    </p>

                    <p class="text-gray-600">
                        <?= $kontak['telepon']; ?>
                    </p>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">
                        ✉️ Email
                    </p>

                    <p class="text-gray-600">
                        <?= $kontak['email']; ?>
                    </p>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">
                        💬 WhatsApp Pelayanan
                    </p>

                    <p class="text-gray-600">
                        <?= $kontak['whatsapp']; ?>
                    </p>
                </div>

            </div>

        </div>

        <!-- Lokasi -->
        <div class="bg-white rounded-lg shadow p-6">

            <h3 class="text-2xl font-bold text-green-700 mb-6">
                Lokasi Kantor Desa
            </h3>

            <iframe
                src="<?= $kontak['maps']; ?>"
                width="100%"
                height="350"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                class="rounded-lg">
            </iframe>

        </div>

    </div>

    <!-- Informasi Pelayanan -->
    <div class="mt-8 bg-green-50 border-l-4 border-green-600 p-5 rounded-lg">

        <p class="font-semibold text-green-700 text-lg">
            Pelayanan Online Desa
        </p>

        <p class="text-gray-700 mt-2">
            Untuk pengajuan surat dan pengaduan masyarakat,
            silakan login ke sistem pelayanan
            <strong><?= $logoDesa['nama_desa']; ?></strong>.
        </p>

    </div>

</main>