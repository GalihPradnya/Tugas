

    <!-- Layanan Publik -->
    <main class="container mx-auto py-12 px-4 flex-1">
        <h2 class="text-3xl font-bold mb-2 text-green-700 text-center">Layanan Publik Desa Kelating</h2>
        <p class="text-gray-500 mb-6 text-base text-center">Informasi dan kemudahan layanan publik yang tersedia untuk masyarakat desa.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-2xl font-semibold mb-4">Pengajuan Surat Online</h3>
                <p class="mb-4">Ajukan permohonan surat keterangan, domisili, usaha, dan lainnya secara online tanpa harus datang ke kantor desa.</p>
                <a href="<?php echo base_url('surat/pengajuan'); ?>" class="bg-green-600 text-white px-5 py-2 rounded font-semibold shadow hover:bg-green-700">Ajukan Surat</a>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-2xl font-semibold mb-4">lapor Warga Pendatang</h3>
                <p class="mb-4">Lapor warga pendatang yang tinggal di desa untuk keperluan administrasi atau informasi.</p>
                <a href="<?php echo base_url('pendatang/pendatang'); ?>" class="bg-green-600 text-white px-5 py-2 rounded font-semibold shadow hover:bg-green-700">Lapor</a>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-2xl font-semibold mb-4">Pengaduan Masyarakat</h3>
                <p class="mb-4">Sampaikan keluhan, aspirasi, atau laporan terkait pelayanan, fasilitas umum, lingkungan, dan permasalahan lainnya di Desa Kelating.</p>
                <a href="<?php echo base_url('pengaduan/pengaduan'); ?>" class="bg-green-600 text-white px-5 py-2 rounded font-semibold shadow hover:bg-green-700">Buat Pengaduan</a>
            </div>
            <!-- <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-2xl font-semibold mb-4">Arsip Perdes</h3>
                <p class="mb-4">Akses dokumen dan arsip peraturan desa secara digital untuk transparansi dan kemudahan informasi.</p>
                <a href="<?php echo base_url(''); ?>" class="bg-green-600 text-white px-5 py-2 rounded font-semibold shadow hover:bg-green-700">Lihat Arsip</a>
            </div> -->
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-2xl font-semibold mb-4">FAQ Layanan Publik</h3>
            <ul class="list-disc list-inside space-y-2">
                <li><span class="font-medium">Bagaimana cara mengajukan surat online?</span> Isi formulir pengajuan pada menu "Ajukan Surat" dan lengkapi data yang dibutuhkan.</li>
                <li><span class="font-medium">Apakah layanan ini gratis?</span> Sebagian besar layanan desa tidak dipungut biaya, kecuali yang diatur dalam peraturan desa.</li>
                <li><span class="font-medium">Kapan jadwal posyandu diadakan?</span> Jadwal posyandu dapat dilihat pada menu "Lihat Jadwal" atau papan pengumuman desa.</li>
            </ul>
        </div>
    </main>

    