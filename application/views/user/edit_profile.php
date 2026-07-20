<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">

        <!-- Edit Profil -->
        <div class="col-lg-6">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Edit Profil
                    </h6>
                </div>

                <div class="card-body">

                    <?= form_open_multipart('user/user/edit'); ?>

                        <div class="form-group text-center">

                            <img
                                src="<?= base_url('assets/img/profile/'.$user['image']); ?>"
                                class="img-profile rounded-circle mb-3"
                                width="120">

                        </div>

                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <input type="text"
                                name="name"
                                class="form-control"
                                value="<?= $user['name']; ?>">

                            <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>

                        </div>

                        <div class="form-group">

                            <label>Email</label>

                            <input type="text"
                                class="form-control"
                                value="<?= $user['email']; ?>"
                                readonly>

                        </div>

                        <div class="form-group">

                            <label>Foto Profil</label>

                            <div class="custom-file">

                                <input type="file"
                                    class="custom-file-input"
                                    name="image"
                                    id="image">

                                <label class="custom-file-label" for="image">
                                    Pilih file
                                </label>

                            </div>

                        </div>

                        <button type="submit"
                            class="btn btn-success">

                            <i class="fas fa-save"></i>
                            Simpan Perubahan

                        </button>

                    <?= form_close(); ?>

                </div>

            </div>

        </div>

        <!-- Ubah Password -->
        <div class="col-lg-6">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">
                        Ubah Password
                    </h6>
                </div>

                <div class="card-body">

                    <form action="<?= base_url('user/user/updatePassword'); ?>"
                        method="post">

                        <div class="form-group">

                            <label>Password Lama</label>

                            <input type="password"
                                name="current_password"
                                class="form-control"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Password Baru</label>

                            <input type="password"
                                name="new_password"
                                class="form-control"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Konfirmasi Password Baru</label>

                            <input type="password"
                                name="confirm_password"
                                class="form-control"
                                required>

                        </div>

                        <button type="submit"
                            class="btn btn-warning">

                            <i class="fas fa-key"></i>
                            Ubah Password

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
$('.custom-file-input').on('change', function() {

    let fileName = $(this).val().split('\\').pop();

    $(this).next('.custom-file-label').addClass("selected");

    $(this).next('.custom-file-label').html(fileName);

});
</script>