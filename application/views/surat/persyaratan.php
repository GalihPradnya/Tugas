<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <button
        class="btn btn-primary mb-3"
        data-toggle="modal"
        data-target="#tambahPersyaratan">

        Tambah Persyaratan

    </button>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>No</th>

                <th>Nama Persyaratan</th>

                <th>Tipe File</th>

                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        <?php $no = 1; ?>

        <?php foreach($persyaratan as $p) : ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $p['nama_persyaratan']; ?></td>

                <td><?= $p['tipe_file']; ?></td>

                <td>

                    <a
                        href="<?= base_url('surat/Persyaratan/hapus/'.$p['id']); ?>"
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
     id="tambahPersyaratan"
     tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <form
                action="<?= base_url('surat/Persyaratan/tambah'); ?>"
                method="post">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Tambah Persyaratan
                    </h5>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>
                            Nama Persyaratan
                        </label>

                        <input
                            type="text"
                            name="nama_persyaratan"
                            class="form-control"
                            required>

                    </div>

                    <div class="form-group">

                        <label>
                            Tipe File
                        </label>

                        <select
                            name="tipe_file"
                            class="form-control">

                            <option value="gambar">
                                Gambar
                            </option>

                            <option value="pdf">
                                PDF
                            </option>

                            <option value="semua">
                                Semua
                            </option>

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