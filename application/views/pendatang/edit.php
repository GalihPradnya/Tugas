<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Edit Penduduk Pendatang
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <?= validation_errors('<div class="alert alert-danger">','</div>'); ?>

            <form action="<?= base_url('pendatang/pendatang/edit/'.$pendatang['id']); ?>" method="post">

                <div class="row">

                    <!-- Kolom Kiri -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text"
                                   name="nik"
                                   class="form-control"
                                   maxlength="16"
                                   value="<?= $pendatang['nik']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="nama_lengkap"
                                   class="form-control"
                                   required
                                   value="<?= $pendatang['nama_lengkap']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text"
                                   name="tempat_lahir"
                                   class="form-control"
                                   value="<?= $pendatang['tempat_lahir']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date"
                                   name="tanggal_lahir"
                                   class="form-control"
                                   value="<?= $pendatang['tanggal_lahir']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>

                            <select name="jenis_kelamin" class="form-control">

                                <option value="L"
                                    <?= ($pendatang['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>
                                    Laki-laki
                                </option>

                                <option value="P"
                                    <?= ($pendatang['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>
                                    Perempuan
                                </option>

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Alamat Asal</label>

                            <textarea
                                name="alamat_asal"
                                class="form-control"
                                rows="3"><?= $pendatang['alamat_asal']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Alamat Tinggal di Desa</label>

                            <textarea
                                name="alamat_tinggal"
                                class="form-control"
                                rows="3"><?= $pendatang['alamat_tinggal']; ?></textarea>
                        </div>

                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Nomor HP</label>

                            <input type="text"
                                   name="nomor_hp"
                                   class="form-control"
                                   value="<?= $pendatang['nomor_hp']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"
                                name="email"
                                class="form-control"
                                value="<?= $pendatang['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan</label>

                            <input type="text"
                                   name="pekerjaan"
                                   class="form-control"
                                   value="<?= $pendatang['pekerjaan']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Datang</label>

                            <input type="date"
                                   name="tanggal_datang"
                                   class="form-control"
                                   value="<?= $pendatang['tanggal_datang']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Tempat Tinggal</label>

                            <select name="tempat_tinggal" class="form-control">

                                <option value="">-- Pilih --</option>

                                <option value="Rumah"
                                    <?= ($pendatang['tempat_tinggal'] == 'Rumah') ? 'selected' : ''; ?>>
                                    Rumah
                                </option>

                                <option value="Kos"
                                    <?= ($pendatang['tempat_tinggal'] == 'Kos') ? 'selected' : ''; ?>>
                                    Kos
                                </option>

                                <option value="Kontrakan"
                                    <?= ($pendatang['tempat_tinggal'] == 'Kontrakan') ? 'selected' : ''; ?>>
                                    Kontrakan
                                </option>

                                <option value="Saudara"
                                    <?= ($pendatang['tempat_tinggal'] == 'Saudara') ? 'selected' : ''; ?>>
                                    Saudara
                                </option>

                                <option value="Lainnya"
                                    <?= ($pendatang['tempat_tinggal'] == 'Lainnya') ? 'selected' : ''; ?>>
                                    Lainnya
                                </option>

                            </select>

                        </div>

                        <div class="form-group">
                            <label>Lama Tinggal</label>

                            <input type="text"
                                   name="lama_tinggal"
                                   class="form-control"
                                   value="<?= $pendatang['lama_tinggal']; ?>">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>

                            <textarea
                                name="keterangan"
                                class="form-control"
                                rows="4"><?= $pendatang['keterangan']; ?></textarea>
                        </div>

                    </div>

                </div>

                <hr>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Update
                </button>

                <a href="<?= base_url('pendatang/pendatang'); ?>"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>