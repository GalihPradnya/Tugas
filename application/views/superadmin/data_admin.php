<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Manajemen Admin
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Data Admin & Masyarakat
            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table id="tableAdmin"
                       class="table table-bordered table-hover"
                       width="100%"
                       cellspacing="0">

                    <thead class="thead-light">

                        <tr>

                            <th width="5%">No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th width="15%">Role</th>
                            <th width="20%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $no = 1; ?>

                        <?php foreach($user as $u): ?>

                        <tr>

                            <td><?= $no++; ?></td>

                            <td><?= $u['nik']; ?></td>

                            <td><?= $u['nama_lengkap']; ?></td>

                            <td>
                                <?= !empty($u['email']) ? $u['email'] : '-'; ?>
                            </td>

                            <td>

                                <?php if($u['role_id'] == 2): ?>

                                    <span class="badge badge-success">
                                        Admin
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-secondary">
                                        Masyarakat
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <?php if($u['role_id'] == 3): ?>

                                    <a href="<?= base_url('superadmin/jadikanAdmin/'.$u['id']); ?>"
                                       class="btn btn-success btn-sm"
                                       onclick="return confirm('Jadikan Admin?')">

                                        <i class="fas fa-user-shield"></i>
                                        Jadikan Admin

                                    </a>

                                <?php endif; ?>

                                <?php if($u['role_id'] == 2): ?>

                                    <a href="<?= base_url('superadmin/jadikanMasyarakat/'.$u['id']); ?>"
                                       class="btn btn-warning btn-sm"
                                       onclick="return confirm('Jadikan Masyarakat?')">

                                        <i class="fas fa-user"></i>
                                        Jadikan Masyarakat

                                    </a>

                                <?php endif; ?>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>