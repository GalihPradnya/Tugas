<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <button
        class="btn btn-primary mb-3"
        data-toggle="modal"
        data-target="#tambahPersyaratanSurat">

        Tambah Relasi

    </button>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>No</th>

                <th>Jenis Surat</th>

                <th>Persyaratan</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        <?php $no = 1; ?>

        <?php foreach($persyaratan_surat as $ps) : ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $ps['nama_surat']; ?></td>

                <td><?= $ps['nama_persyaratan']; ?></td>
                <td>
                    <a href="<?= base_url('surat/PersyaratanSurat/hapus/'.$ps['id']); ?>"
                    class="btn btn-danger btn-sm">
                    Hapus
                    </a>
                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>
<div class="modal fade"
     id="tambahPersyaratanSurat"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form
                action="<?= base_url('surat/PersyaratanSurat/tambah'); ?>"
                method="post">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Tambah Persyaratan Surat

                    </h5>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>
                            Jenis Surat
                        </label>

                        <select
                            name="jenis_surat_id"
                            class="form-control">

                            <?php foreach($jenis_surat as $js) : ?>

                                <option
                                    value="<?= $js['id']; ?>">

                                    <?= $js['nama_surat']; ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label>
                            Persyaratan
                        </label>

                        <select
                            name="persyaratan_id"
                            class="form-control">

                            <?php foreach($persyaratan as $p) : ?>

                                <option
                                    value="<?= $p['id']; ?>">

                                    <?= $p['nama_persyaratan']; ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>