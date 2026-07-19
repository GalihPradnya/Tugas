<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach($pengaduan as $p) : ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td>
                                <?= date('d-m-Y',
                                strtotime($p['created_at'])); ?>
                            </td>

                            <td><?= $p['nama']; ?></td>

                            <td><?= $p['nama_kategori']; ?></td>

                            <td><?= $p['judul']; ?></td>

                            <td>
                                <span class="badge badge-info">
                                    <?= $p['status']; ?>
                                </span>
                            </td>

                            <td>

                                <a href="<?= base_url('pengaduan/pengaduan_admin/detail/'.$p['id']); ?>"
                                   class="btn btn-primary btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>