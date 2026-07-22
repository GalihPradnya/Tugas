<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>


    <div class="card mb-3 shadow" style="max-width: 540px;">

        <div class="row no-gutters">


            <div class="col-md-4 text-center">

                <img 
                src="<?= base_url('assets/img/profile/'.$user['image']); ?>"
                class="card-img rounded-circle mt-4"
                style="width:150px;height:150px;object-fit:cover;">

            </div>




            <div class="col-md-8">


                <div class="card-body">


                    <h5 class="card-title">

                        <?= $user['nama_lengkap']; ?>

                    </h5>



                    <p class="card-text">

                        <strong>NIK :</strong><br>

                        <?= $user['nik']; ?>

                    </p>




                    <p class="card-text">

                        <strong>Email :</strong><br>

                        <?php if($user['email']): ?>

                            <?= $user['email']; ?>

                        <?php else: ?>

                            <span class="text-danger">
                                Belum diisi
                            </span>

                        <?php endif; ?>

                    </p>




                    <p class="card-text">

                        <small class="text-muted">

                            Akun dibuat sejak 
                            <?= date(
                                'd F Y',
                                $user['date_created']
                            ); ?>

                        </small>

                    </p>



                    <a href="<?= base_url('user/user/edit'); ?>"
                    class="btn btn-success btn-sm">

                        <i class="fas fa-edit"></i>
                        Edit Profile

                    </a>



                </div>


            </div>


        </div>

    </div>


</div>


<div style="height:200px;"></div>