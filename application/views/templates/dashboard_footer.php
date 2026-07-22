<?php
$CI =& get_instance();
$CI->load->model('Kontak_model');
$kontak = $CI->Kontak_model->getKontak();

$wa = preg_replace('/[^0-9]/', '', $kontak['whatsapp']);

if (substr($wa, 0, 1) == '0') {
    $wa = '62' . substr($wa, 1);
}
?>
<footer class="bg-green-700 text-white py-8">
    <div class="container mx-auto px-4">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Logo Desa -->
            <div>
                <div class="flex items-center space-x-2 mb-3">
                    <img src="<?= base_url('uploads/logo/' . $logoDesa['logo']); ?>"
                        class="h-12 w-12 rounded-full">

                    <h1 class="font-bold text-lg">
                        <?= $logoDesa['nama_desa']; ?>
                    </h1>
                </div>

                <p class="text-sm">
                    Website resmi Desa Kelating sebagai media informasi dan pelayanan masyarakat.
                </p>
            </div>

            <!-- Kontak -->
            <div>
                <h3 class="font-semibold mb-2">Kontak Desa</h3>

                <p class="text-sm mb-1">📍 <?= $kontak['alamat']; ?></p>
                <p class="text-sm mb-1">☎ <?= $kontak['telepon']; ?></p>
                <p class="text-sm mb-1">✉ <?= $kontak['email']; ?></p>

                <a href="https://wa.me/<?= $wa; ?>"
                    target="_blank"
                    class="text-sm hover:underline block mb-1">
                    💬 <?= $kontak['whatsapp']; ?>
                </a>

                <p class="text-sm">🕒 <?= $kontak['jam_pelayanan']; ?></p>
            </div>

            <!-- Menu Cepat -->
            <div>
                <h3 class="font-semibold mb-2">Menu Cepat</h3>

                <ul class="text-sm space-y-1">
                    <li><a href="<?= base_url('beranda'); ?>" class="hover:underline">Beranda</a></li>
                    <li><a href="<?= base_url('navbar/profil_desa'); ?>" class="hover:underline">Profil</a></li>
                    <li><a href="<?= base_url('navbar/berita_pengumuman'); ?>" class="hover:underline">Berita</a></li>
                    <li><a href="<?= base_url('pengaduan/pengaduan'); ?>" class="hover:underline">Pengaduan</a></li>
                </ul>
            </div>

        </div>

        <hr class="my-6 border-green-500">

        <div class="text-center text-sm">
            &copy; <?= date('Y'); ?> <?= $logoDesa['nama_desa']; ?>. Melayani Masyarakat dengan Transparan dan Digital.
        </div>

    </div>
</footer>
<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
        <script>
        const daftarGambar = [
        <?php foreach($slides as $slide): ?>
            "<?= base_url('uploads/hero/'.$slide['gambar']); ?>",
        <?php endforeach; ?>
        ];
        </script>
    <script src="<?php echo base_url('assets/js/slide_gambar.js'); ?>"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const btn = document.getElementById('profileBtn');
        const dropdown = document.getElementById('profileDropdown');

        btn.addEventListener('click', function (e) {

            e.stopPropagation();

            dropdown.classList.toggle('hidden');

        });

        document.addEventListener('click', function () {

            dropdown.classList.add('hidden');

        });

        dropdown.addEventListener('click', function (e) {

            e.stopPropagation();

        });

    });
    </script>
    <script>
    function logoutConfirm()
    {
        Swal.fire({
            title: 'Logout?',
            text: 'Apakah Anda yakin ingin keluar?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if(result.isConfirmed)
            {
                window.location.href =
                    "<?= base_url('auth/logout'); ?>";
            }

        });
    }
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {

        const mobileProfileBtn = document.getElementById('mobileProfileBtn');
        const mobileProfileDropdown = document.getElementById('mobileProfileDropdown');

        if (mobileProfileBtn) {
            mobileProfileBtn.addEventListener('click', function() {
                mobileProfileDropdown.classList.toggle('hidden');
            });
        }

    });
    </script>
</body>

</html>