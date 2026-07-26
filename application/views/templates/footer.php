<!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;TA</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

   <!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>

<script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages -->
<script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>

<!-- DataTables -->



<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function(){

    // DataTables
    if($('#tableAdmin').length){
        $('#tableAdmin').DataTable({
            pageLength: 10,
            language: {
                search: "Cari :",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    previous: "Sebelumnya",
                    next: "Berikutnya"
                }
            }
        });
    }

    // Select2
    if($('.select2').length){
        $('.select2').select2({
            placeholder: 'Cari NIK atau Nama Penduduk',
            width: '100%'
        });
    }

});
</script>

<script>
$('.form-check-input').on('click', function() {

    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({

        url: "<?= base_url('superadmin/changeaccess'); ?>",

        type: 'post',

        data: {
            menuId: menuId,
            roleId: roleId
        },

        success: function() {

            document.location.href =
                "<?= base_url('superadmin/roleaccess/'); ?>" + roleId;

        }

    });

});
</script>

<script>
window.addEventListener('load', function () {

    const sidebar =
        document.getElementById('accordionSidebar');

    const active =
        sidebar
        ? sidebar.querySelector('.nav-item.active')
        : null;

    if(active){

        active.scrollIntoView({

            behavior: 'smooth',
            block: 'center'

        });

    }

});
</script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function () {

    // Pastikan tabel ada
    if ($('#tablePenduduk').length) {

        // Inisialisasi DataTable
        var table = $('#tablePenduduk').DataTable({

            pageLength: 25,

            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],

            ordering: true,
            searching: true,
            responsive: true,

            language: {
                search: "Cari :",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                zeroRecords: "Data tidak ditemukan",
                infoFiltered: "(difilter dari _MAX_ data)",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    previous: "←",
                    next: "→"
                }
            }

        });

        // =============================
        // FILTER UMUR
        // =============================
        $.fn.dataTable.ext.search.push(function (settings, data) {

            // Hanya berlaku untuk tabel penduduk
            if (settings.nTable.id !== 'tablePenduduk') {
                return true;
            }

            var filter = $('#filterUmur').val();

            if (filter === "") {
                return true;
            }

            var umur = parseInt(data[5]);

            if (isNaN(umur)) {
                return false;
            }

            var batas = filter.split('-');

            var min = parseInt(batas[0]);
            var max = parseInt(batas[1]);

            return umur >= min && umur <= max;

        });

        // Saat dropdown berubah
        $('#filterUmur').on('change', function () {
            table.draw();
        });

        // =============================
        // CETAK BERDASARKAN FILTER
        // =============================
        $('#btnCetakUmur').on('click', function () {

            var umur = $('#filterUmur').val();

            if (umur == "") {

                window.open(
                    "<?= base_url('penduduk/penduduk/cetak'); ?>",
                    "_blank"
                );

            } else {

                window.open(
                    "<?= base_url('penduduk/penduduk/cetakUmur/'); ?>" + umur,
                    "_blank"
                );

            }

        });

    }

});
</script>
<script>
$(document).ready(function () {

    if ($('#tablePendatang').length) {

        // Inisialisasi DataTable
        var table = $('#tablePendatang').DataTable({

            pageLength: 25,

            responsive: true,

            language: {

                search: "Cari :",

                lengthMenu: "Tampilkan _MENU_ data",

                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

                infoEmpty: "Tidak ada data",

                zeroRecords: "Data tidak ditemukan",

                paginate: {
                    previous: "←",
                    next: "→"
                }

            }

        });

        // Filter berdasarkan alamat tinggal
        $.fn.dataTable.ext.search.push(function (settings, data) {

            // Hanya untuk tabel pendatang
            if (settings.nTable.id !== 'tablePendatang') {
                return true;
            }

            var alamat = $('#filterAlamat').val();

            if (alamat === "") {
                return true;
            }

            // Kolom Alamat Tinggal (sesuaikan jika posisi kolom berubah)
            return data[10] === alamat;

        });

        // Jalankan filter
        $('#filterAlamat').on('change', function () {
            table.draw();
        });

        // Tombol Cetak
        $('#btnCetakAlamat').on('click', function () {

            var alamat = $('#filterAlamat').val();

            if (alamat === "") {

                window.open(
                    "<?= base_url('pendatang/pendatang/cetak'); ?>",
                    "_blank"
                );

            } else {

                window.open(
                    "<?= base_url('pendatang/pendatang/cetakAlamat/'); ?>" +
                    encodeURIComponent(alamat),
                    "_blank"
                );

            }

        });

    }

});
</script>
</body>
</html>