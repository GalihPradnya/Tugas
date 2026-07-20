<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <form method="post">

                <div class="row">

                    <div class="col-md-10">
                        <input type="text"
                               name="nama_kategori"
                               class="form-control"
                               placeholder="Nama Kategori">
                    </div>

                    <div class="col-md-2">
                        <button type="submit"
                                class="btn btn-primary btn-block">

                            Tambah

                        </button>
                    </div>

                </div>

            </form>

            <hr>

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $no=1; ?>

                    <?php foreach($kategori as $k): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td>
                            <?= $k['nama_kategori']; ?>
                        </td>

                        <td>
                            <?= $k['status']; ?>
                        </td>

                        <td>

                            <button
                                class="btn btn-warning btn-sm"
                                data-toggle="modal"
                                data-target="#edit<?= $k['id']; ?>">

                                Edit

                            </button>

                            <a href="<?= base_url('pengaduan/kategori_pengaduan/hapus/'.$k['id']); ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin?')">

                                Hapus

                            </a>

                        </td>

                    </tr>

                    <!-- Modal Edit -->

                    <div class="modal fade"
                         id="edit<?= $k['id']; ?>">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <form action="<?= base_url('pengaduan/kategori_pengaduan/edit'); ?>"
                                      method="post">

                                    <div class="modal-header">

                                        <h5>Edit Kategori</h5>

                                    </div>

                                    <div class="modal-body">

                                        <input type="hidden"
                                               name="id"
                                               value="<?= $k['id']; ?>">

                                        <input type="text"
                                               name="nama_kategori"
                                               class="form-control"
                                               value="<?= $k['nama_kategori']; ?>">

                                    </div>

                                    <div class="modal-footer">

                                        <button class="btn btn-primary">

                                            Simpan

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>