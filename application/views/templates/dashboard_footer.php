<!-- Footer -->
    <footer class="bg-green-700 text-white py-6 mt-8">
        <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4">
            <div class="flex items-center space-x-2 mb-2 md:mb-0">
                <img src="https://images.unsplash.com/photo-1558005530-a7958896ec60?auto=format&fit=crop&w=32&q=80"
                    alt="Logo Pemda" class="h-8 w-8 rounded-full">
                <span class="font-semibold">Pemerintah Kabupaten Tabanan</span>
            </div>
            <div class="flex space-x-4 mb-2 md:mb-0">
                <a href="<?php echo base_url(''); ?>instagram" class="hover:underline">Instagram</a>
                <a href="<?php echo base_url(''); ?>facebook" class="hover:underline">Facebook</a>
                <a href="<?php echo base_url(''); ?>youtube" class="hover:underline">YouTube</a>
            </div>
            <div class="text-sm">&copy; 2026 Desa Kelating. All rights reserved.</div>
        </div>
    </footer>
    <script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
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