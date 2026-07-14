<div class="container-fluid">

    <h1 class="h3 mb-4">
        Detail Pengajuan
    </h1>

    <?php if($this->session->flashdata('success')): ?>

        <div class="alert alert-success">
            <?= $this->session->flashdata('success'); ?>
        </div>

    <?php endif; ?>

    <!-- DATA PEMOHON -->
    <div class="card shadow mb-4">

        <div class="card-header">
            Data Pemohon
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="200">NIK</th>
                    <td><?= $pengajuan['nik']; ?></td>
                </tr>

                <tr>
                    <th>Nama</th>
                    <td><?= $pengajuan['nama']; ?></td>
                </tr>

                <tr>
                    <th>No HP</th>
                    <td><?= $pengajuan['hp']; ?></td>
                </tr>

                <tr>
                    <th>Jenis Surat</th>
                    <td><?= $pengajuan['nama_surat']; ?></td>
                </tr>

                <tr>
                    <th>Keperluan</th>
                    <td><?= $pengajuan['keperluan']; ?></td>
                </tr>

                <tr>
                    <th>Catatan</th>
                    <td><?= $pengajuan['catatan']; ?></td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>

                        <?php if($pengajuan['status'] == 'Menunggu'): ?>

                            <span class="badge badge-warning">
                                Menunggu
                            </span>

                        <?php elseif($pengajuan['status'] == 'Diproses'): ?>

                            <span class="badge badge-primary">
                                Diproses
                            </span>

                        <?php elseif($pengajuan['status'] == 'Selesai'): ?>

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

        </div>

    </div>

    <!-- FILE PERSYARATAN -->
    <div class="card shadow mb-4">

        <div class="card-header">
            File Persyaratan
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>Persyaratan</th>
                        <th width="250">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($file as $f): ?>

                    <tr>

                        <td>
                            <?= $f['nama_persyaratan']; ?>
                        </td>

                        <td>

                            <a
                                target="_blank"
                                href="<?= base_url('uploads/persyaratan/'.$f['nama_file']); ?>"
                                class="btn btn-info btn-sm">

                                Lihat

                            </a>

                            <a
                                href="<?= base_url('surat/Pengajuan_admin/download/'.$f['id']); ?>"
                                class="btn btn-success btn-sm">

                                Download

                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- UPDATE STATUS + UPLOAD SURAT HASIL -->
    <div class="card shadow mb-4">

        <div class="card-header">
            Proses Pengajuan
        </div>

        <div class="card-body">

            <form
                action="<?= base_url('surat/Pengajuan_admin/updateStatus'); ?>"
                method="post"
                enctype="multipart/form-data">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $pengajuan['id']; ?>">

                <div class="form-group">

                    <label>Status Pengajuan</label>

                    <select
                        name="status"
                        class="form-control">

                        <option
                            value="Menunggu"
                            <?= ($pengajuan['status']=='Menunggu') ? 'selected' : ''; ?>>

                            Menunggu

                        </option>

                        <option
                            value="Diproses"
                            <?= ($pengajuan['status']=='Diproses') ? 'selected' : ''; ?>>

                            Diproses

                        </option>

                        <option
                            value="Selesai"
                            <?= ($pengajuan['status']=='Selesai') ? 'selected' : ''; ?>>

                            Selesai

                        </option>

                        <option
                            value="Ditolak"
                            <?= ($pengajuan['status']=='Ditolak') ? 'selected' : ''; ?>>

                            Ditolak

                        </option>

                    </select>

                </div>

                <div class="form-group mt-3">

                    <label>Upload Surat Hasil (PDF)</label>

                    <input
                        type="file"
                        name="file_hasil"
                        class="form-control">

                    <small class="text-muted">
                        Upload file PDF surat yang sudah selesai diproses.
                    </small>

                </div>

                <?php if(!empty($pengajuan['file_hasil'])): ?>

                    <div class="alert alert-success mt-3">

                        Surat hasil sudah tersedia :

                        <br><br>

                        <a
                            target="_blank"
                            href="<?= base_url('uploads/surat_hasil/'.$pengajuan['file_hasil']); ?>"
                            class="btn btn-success btn-sm">

                            Lihat Surat Hasil

                        </a>

                    </div>

                <?php endif; ?>

                <button
                    type="submit"
                    class="btn btn-primary mt-3">

                    Simpan Perubahan

                </button>

                <a
                    href="<?= base_url('surat/Pengajuan_admin/pengajuan_admin'); ?>"
                    class="btn btn-secondary mt-3">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>