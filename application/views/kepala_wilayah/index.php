<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Dashboard Kepala Wilayah
    </h1>

    <div class="row">

        <!-- Pengajuan Menunggu Verifikasi -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Menunggu Verifikasi
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= isset($jumlahMenunggu) ? $jumlahMenunggu : 0; ?>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Disetujui -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Disetujui
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= isset($jumlahDisetujui) ? $jumlahDisetujui : 0; ?>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Ditolak -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Ditolak
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= isset($jumlahDitolak) ? $jumlahDitolak : 0; ?>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Card Selamat Datang -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Selamat Datang
            </h6>

        </div>

        <div class="card-body">

            <h5>
                Selamat datang,
                <strong><?= $this->session->userdata('nama_lengkap'); ?></strong>
            </h5>

            <p class="mb-0">
                Anda login sebagai <strong>Kepala Wilayah</strong>.
                Silakan melakukan verifikasi terhadap pengajuan surat dari masyarakat.
            </p>

        </div>
    </div>

</div>