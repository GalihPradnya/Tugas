

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center mb-4">

                                <img src="<?= base_url('uploads/logo/' . $logoDesa['logo']); ?>"
                                    alt="<?= $logoDesa['nama_desa']; ?>"
                                    width="100"
                                    class="img-fluid mb-3">

                                <h4 class="h3 text-gray-900 mt-8">
                                    <?= $logoDesa['nama_desa']; ?>
                                </h4>
                                <h2 class="h6 text-gray-900 mt-3">
                                    Kecamatan Kerambitan - Kabupaten Tabanan
                                </h2>


                            </div>
                            <form class="user" method="post" action="<?php echo base_url('auth/registration'); ?>">
                               <div class="form-group">
                                    <input type="text" 
                                    class="form-control form-control-user" 
                                    id="name"
                                    name="name"
                                    placeholder="Nama" value="<?= set_value('name') ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                               
                                <div class="form-group">
                                    <input type="text" 
                                    class="form-control form-control-user" 
                                    id="email"
                                    name="email"
                                    placeholder="Masukan Email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" 
                                        class="form-control form-control-user"
                                        id="password1"
                                        name="password1"
                                        placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2"
                                            name="password2"
                                            placeholder="Ulangi Password">
                                    </div>
                                </div>
                                <button type="submit" 
                                class="btn btn-primary btn-user btn-block">
                                    Regristrasi Akun
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth/login'); ?>">
                                    Sudah Punya Akun? Login!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   