<div class="container-fluid px-5">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>


    <div class="row">


        <!-- Pengajuan Surat -->
        <div class="col-xl-4 col-md-6 mb-4 px-3">

            <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengajuan Surat
                            </div>


                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlahPengajuan; ?>
                            </div>

                        </div>


                        <div class="col-auto">

                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- Pengaduan Masyarakat -->
        <div class="col-xl-4 col-md-6 mb-4 px-3">

            <div class="card border-left-success shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pengaduan Masyarakat
                            </div>


                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlahPengaduan; ?>
                            </div>

                        </div>


                        <div class="col-auto">

                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- Warga Pendatang -->
        <div class="col-xl-4 col-md-6 mb-4 px-3">

            <div class="card border-left-warning shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">

                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Warga Pendatang
                            </div>


                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlahPendatang; ?>
                            </div>

                        </div>


                        <div class="col-auto">

                            <i class="fas fa-users fa-2x text-gray-300"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>


</div>