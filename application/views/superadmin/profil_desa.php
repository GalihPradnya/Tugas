<h1 class="h3 mb-4 text-gray-800">
    <?= $title; ?>
</h1>


<?= $this->session->flashdata('message'); ?>


<div class="card shadow">

    <div class="card-body">

        <form
            method="post"
            enctype="multipart/form-data"
        >


            <!-- ==========================================
                 NAMA DESA
            =========================================== -->

            <div class="form-group">

                <label>
                    Nama Desa
                </label>

                <input
                    type="text"
                    name="nama_desa"
                    class="form-control"
                    value="<?= html_escape(
                        $logoDesa['nama_desa']
                    ); ?>"
                    required
                >

            </div>



            <!-- ==========================================
                 LOGO DESA
            =========================================== -->

            <div class="form-group">

                <label>
                    Logo Saat Ini
                </label>

                <br>

                <?php if (
                    !empty($logoDesa['logo'])
                ): ?>

                    <img
                        src="<?= base_url(
                            'uploads/logo/'
                            . $logoDesa['logo']
                        ); ?>"
                        width="120"
                        class="img-thumbnail mb-3"
                    >

                <?php else: ?>

                    <p class="text-muted">
                        Logo belum tersedia.
                    </p>

                <?php endif; ?>

            </div>



            <!-- ==========================================
                 GANTI LOGO
            =========================================== -->

            <div class="form-group">

                <label>
                    Ganti Logo
                </label>

                <input
                    type="file"
                    name="logo"
                    class="form-control-file"
                    accept=".jpg,.jpeg,.png"
                >

                <small class="text-muted">
                    Format: JPG, JPEG, PNG
                    (Maksimal 2 MB)
                </small>

            </div>



            <hr>



            <!-- ==========================================
                 KOP SURAT SAAT INI
            =========================================== -->

            <div class="form-group">

                <label class="font-weight-bold">
                    Kop Surat Saat Ini
                </label>

                <br>

                <?php if (
                    !empty($logoDesa['kop_surat'])
                ): ?>

                    <div
                        class="border rounded p-2 mb-3"
                        style="background: #f8f9fa;"
                    >

                        <img
                            src="<?= base_url(
                                $logoDesa['kop_surat']
                            ); ?>"
                            style="
                                width: 100%;
                                max-width: 100%;
                                height: auto;
                                display: block;
                            "
                            alt="Kop Surat"
                        >

                    </div>

                <?php else: ?>

                    <div class="alert alert-warning">

                        <i class="fas fa-exclamation-triangle"></i>

                        Kop surat belum tersedia.

                    </div>

                <?php endif; ?>

            </div>



            <!-- ==========================================
                 GANTI KOP SURAT
            =========================================== -->

            <div class="form-group">

                <label class="font-weight-bold">
                    Ganti Kop Surat
                </label>

                <input
                    type="file"
                    name="kop_surat"
                    class="form-control-file"
                    accept=".jpg,.jpeg,.png"
                >

                <small class="text-muted">

                    Format: JPG, JPEG, PNG.
                    Maksimal 4 MB.

                    <br>

                    Pilih file hanya jika ingin
                    mengganti kop surat.

                </small>

            </div>



            <!-- ==========================================
                 SIMPAN
            =========================================== -->

            <button
                type="submit"
                class="btn btn-success"
            >

                <i class="fas fa-save"></i>

                Simpan Perubahan

            </button>


        </form>

    </div>

</div>