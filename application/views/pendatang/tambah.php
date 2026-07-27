<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Tambah Penduduk Pendatang
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <?= validation_errors('<div class="alert alert-danger">','</div>'); ?>

            <form action="<?= base_url('pendatang/pendatang/tambah'); ?>" method="post">

                <div class="row">

                    <!-- Kolom Kiri -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text"
                                   name="nik"
                                   class="form-control"
                                   maxlength="16">
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="nama_lengkap"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text"
                                   name="tempat_lahir"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date"
                                   name="tanggal_lahir"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>

                            <select name="jenis_kelamin"
                                    class="form-control">

                                <option value="L">
                                    Laki-laki
                                </option>

                                <option value="P">
                                    Perempuan
                                </option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alamat Asal</label>

                            <textarea
                                name="alamat_asal"
                                class="form-control"
                                rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Alamat Tinggal di Desa</label>

                            <textarea
                                name="alamat_tinggal"
                                class="form-control"
                                rows="3"
                                required></textarea>
                        </div>

                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Nomor HP</label>

                            <input type="text"
                                   name="nomor_hp"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Email</label>
                            <input type="email"
                                name="email"
                                class="form-control"
                                value="<?= set_value('email'); ?>">
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan</label>

                            <input type="text"
                                   name="pekerjaan"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Datang</label>

                            <input type="date"
                                   name="tanggal_datang"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tempat Tinggal</label>

                            <select name="tempat_tinggal"
                                    class="form-control">

                                <option value="">-- Pilih --</option>
                                <option value="Rumah">Rumah</option>
                                <option value="Kos">Kos</option>
                                <option value="Kontrakan">Kontrakan</option>
                                <option value="Saudara">Saudara</option>
                                <option value="Lainnya">Lainnya</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Lama Tinggal</label>

                            <input type="text"
                                   name="lama_tinggal"
                                   class="form-control"
                                   placeholder="Contoh: 3 Bulan">
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>

                            <textarea
                                name="keterangan"
                                class="form-control"
                                rows="4"
                                placeholder="Keterangan tambahan"></textarea>
                        </div>

                    </div>

                </div>

                <hr>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

                <a href="<?= base_url('pendatang/pendatang'); ?>"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>