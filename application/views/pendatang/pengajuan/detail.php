<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pengajuan Surat Pendatang
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow">

        <div class="card-body">

            <h5 class="text-primary mb-3">
                Data Pendatang
            </h5>

            <table class="table table-bordered">

                <tr>
                    <th width="200">NIK</th>
                    <td><?= $pengajuan['nik']; ?></td>
                </tr>

                <tr>
                    <th>Nama</th>
                    <td><?= $pengajuan['nama_lengkap']; ?></td>
                </tr>

                <tr>
                    <th>Nomor HP</th>
                    <td><?= $pengajuan['nomor_hp']; ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?= $pengajuan['email']; ?></td>
                </tr>

                <tr>
                    <th>Pekerjaan</th>
                    <td><?= $pengajuan['pekerjaan']; ?></td>
                </tr>

                <tr>
                    <th>Alamat Asal</th>
                    <td><?= $pengajuan['alamat_asal']; ?></td>
                </tr>

                <tr>
                    <th>Alamat Tinggal</th>
                    <td><?= $pengajuan['alamat_tinggal']; ?></td>
                </tr>

            </table>

            <h5 class="text-primary mt-4 mb-3">
                Detail Surat
            </h5>

            <table class="table table-bordered">

                <tr>
                    <th width="200">Jenis Surat</th>
                    <td><?= $pengajuan['nama_surat']; ?></td>
                </tr>

                <tr>
                    <th>Keperluan</th>
                    <td><?= $pengajuan['keperluan']; ?></td>
                </tr>

                <tr>
                    <th>Status Saat Ini</th>
                    <td>
                        <?php if($pengajuan['status']=='Menunggu'): ?>

                            <span class="badge badge-warning">
                                Menunggu
                            </span>

                        <?php elseif($pengajuan['status']=='Diproses'): ?>

                            <span class="badge badge-primary">
                                Diproses
                            </span>

                        <?php elseif($pengajuan['status']=='Selesai'): ?>

                            <span class="badge badge-success">
                                Selesai
                            </span>

                        <?php else: ?>

                            <span class="badge badge-danger">
                                Ditolak
                            </span>

                        <?php endif; ?>
                    </td>
                </tr>

            </table>

            <hr>

            <form
                action="<?= base_url('pendatang/pengajuan_pendatang/updateStatus'); ?>"
                method="post"
                enctype="multipart/form-data"
                id="formUpdate">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $pengajuan['id']; ?>">

                <div class="form-group">

                    <label>Status</label>

                    <select
                        name="status"
                        class="form-control">

                        <option value="Menunggu"
                            <?= $pengajuan['status']=='Menunggu' ? 'selected' : ''; ?>>
                            Menunggu
                        </option>

                        <option value="Diproses"
                            <?= $pengajuan['status']=='Diproses' ? 'selected' : ''; ?>>
                            Diproses
                        </option>

                        <option value="Selesai"
                            <?= $pengajuan['status']=='Selesai' ? 'selected' : ''; ?>>
                            Selesai
                        </option>

                        <option value="Ditolak"
                            <?= $pengajuan['status']=='Ditolak' ? 'selected' : ''; ?>>
                            Ditolak
                        </option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Catatan Admin</label>

                    <textarea
                        name="catatan"
                        rows="4"
                        class="form-control"><?= $pengajuan['catatan']; ?></textarea>

                </div>

                <div class="form-group">

                    <label>Upload Surat Hasil</label>

                    <input
                        type="file"
                        name="file_hasil"
                        class="form-control">

                    <small class="text-muted">
                        Format: PDF, JPG, JPEG, PNG (maksimal 4 MB)
                    </small>

                </div>

                <?php if(!empty($pengajuan['file_hasil'])): ?>

                    <div class="alert alert-success">

                        <strong>Surat hasil sudah tersedia.</strong>

                        <br><br>

                        <a
                            href="<?= base_url('uploads/surat_pendatang/'.$pengajuan['file_hasil']); ?>"
                            target="_blank"
                            class="btn btn-info btn-sm">

                            <i class="fas fa-file-download"></i>

                            Lihat / Download Surat

                        </a>

                    </div>

                <?php endif; ?>

                <button
                    type="submit"
                    class="btn btn-success">

                    <i class="fas fa-save"></i>

                    Simpan Perubahan

                </button>

                <a
                    href="<?= base_url('pendatang/pengajuan_pendatang'); ?>"
                    class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('formUpdate').addEventListener('submit', function(e){

    let status = document.querySelector('[name="status"]').value;

    if(status === 'Selesai'){

        if(!confirm(
            'Status akan diubah menjadi "Selesai". Sistem akan mengirim email beserta surat hasil (jika ada) kepada pendatang. Lanjutkan?'
        )){

            e.preventDefault();

        }

    }

});

</script>