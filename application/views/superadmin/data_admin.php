<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <a href="<?= base_url('superadmin/tambahAdmin'); ?>"
       class="btn btn-primary mb-3">

        <i class="fas fa-plus"></i>
        Tambah Admin

    </a>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $no=1; ?>

                    <?php foreach($admin as $a): ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td width="100">

                            <img
                                src="<?= base_url('assets/img/profile/'.$a['image']); ?>"
                                width="50">

                        </td>

                        <td><?= $a['name']; ?></td>

                        <td><?= $a['email']; ?></td>

                        <td>

                            <?php if($a['is_active']==1): ?>

                                <span class="badge badge-success">
                                    Aktif
                                </span>

                            <?php else: ?>

                                <span class="badge badge-danger">
                                    Nonaktif
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <a href="<?= base_url('superadmin/editAdmin/'.$a['id']); ?>"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <a href="<?= base_url('superadmin/hapusAdmin/'.$a['id']); ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin?')">

                                Hapus

                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>