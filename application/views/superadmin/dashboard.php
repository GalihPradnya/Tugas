<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Dashboard Super Admin
    </h1>

    <div class="alert alert-success shadow-sm">
        <h5 class="mb-1">
            Selamat Datang, <?= $this->session->userdata('nama'); ?>
        </h5>

        <p class="mb-0">
            Anda login sebagai <strong>Super Admin</strong>.
        </p>
    </div>

    <!-- Card Statistik -->

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Penduduk
                            </div>

                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_penduduk ?>
                            </div>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-users fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-left-success shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Berita
                            </div>

                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_berita ?>
                            </div>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-left-warning shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pengajuan Surat
                            </div>

                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_surat ?>
                            </div>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-envelope fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6 mb-4">

            <div class="card border-left-danger shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Pengaduan
                            </div>

                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_pengaduan ?>
                            </div>

                        </div>

                        <div class="col-auto">

                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Tabel -->

    <div class="row">

        <div class="col-lg-7">

            <div class="card shadow mb-4">

                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-success">
                        Pengajuan Surat Terbaru
                    </h6>

                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <thead>

                        <tr>

                            <th>No</th>

                            <th>Nama</th>

                            <th>Jenis Surat</th>

                            <th>Status</th>

                        </tr>

                        </thead>

                        <tbody>

                        <?php if(!empty($surat_terbaru)): ?>

                            <?php $no=1; foreach($surat_terbaru as $s): ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= $s->nama ?></td>

                                <td><?= $s->jenis_surat ?></td>

                                <td><?= $s->status ?></td>

                            </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="4" class="text-center">

                                    Belum ada data

                                </td>

                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-lg-5">

            <div class="card shadow mb-4">

                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-success">

                        Aktivitas Admin

                    </h6>

                </div>

                <div class="card-body">

                    <ul class="list-group">

                        <li class="list-group-item">
                            Admin menambahkan berita baru.
                        </li>

                        <li class="list-group-item">
                            Pengaduan telah diproses.
                        </li>

                        <li class="list-group-item">
                            Surat Domisili telah disetujui.
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>