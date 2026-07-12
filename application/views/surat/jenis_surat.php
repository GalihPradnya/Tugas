<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <button
        class="btn btn-primary mb-3"
        data-toggle="modal"
        data-target="#tambahModal">

        Tambah Jenis Surat

    </button>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>No</th>

                <th>Nama Surat</th>

                <th>Status</th>

                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        <?php $no = 1; ?>

        <?php foreach($jenis_surat as $js) : ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $js['nama_surat']; ?></td>

                <td><?= $js['status']; ?></td>

                <td>

                    <a
                        href="<?= base_url('JenisSurat/hapus/'.$js['id']); ?>"
                        class="btn btn-danger btn-sm">

                        Hapus

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>
<div
    class="modal fade"
    id="tambahModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <form
                action="<?= base_url('surat/JenisSurat/tambah'); ?>"
                method="post">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Tambah Jenis Surat

                    </h5>

                </div>

                <div class="modal-body">

                    <input
                        type="text"
                        name="nama_surat"
                        class="form-control"
                        placeholder="Nama Surat"
                        required>

                    <br>

                    <select
                        name="status"
                        class="form-control">

                        <option value="aktif">

                            Aktif

                        </option>

                        <option value="nonaktif">

                            Non Aktif

                        </option>

                    </select>

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