

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
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
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('auth/login'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nik"
                                                name="nik"
                                                placeholder="Masukkan NIK"
                                                value="<?= set_value('nik'); ?>">
                                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">

    <div class="input-group">

        <input type="password" 
            class="form-control form-control-user"
            id="password"
            name="password"
            placeholder="Password">


        <div class="input-group-append">

            <button 
                class="btn btn-light"
                type="button"
                onclick="showPassword()">

                <i class="fas fa-eye" id="iconPassword"></i>

            </button>

        </div>


    </div>


    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>


</div>
                                    
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>

                                    <div class="text-center">
                                       <a class="small" href="<?php echo base_url('auth/registration'); ?>">
                                            Belum Punya Akun? Daftar!
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            

                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>

function showPassword()
{

    let password = document.getElementById("password");

    let icon = document.getElementById("iconPassword");


    if(password.type === "password")
    {

        password.type = "text";

        icon.classList.remove("fa-eye");

        icon.classList.add("fa-eye-slash");

    }
    else
    {

        password.type = "password";

        icon.classList.remove("fa-eye-slash");

        icon.classList.add("fa-eye");

    }

}

</script>

   