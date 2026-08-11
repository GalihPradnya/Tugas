<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Manajemen Admin
    </h1>


    <?= $this->session->flashdata('message'); ?>


    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Data Admin, Masyarakat & Kawil
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

                            <th width="5%">
                                No
                            </th>

                            <th>
                                NIK
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Email
                            </th>

                            <th width="15%">
                                Role
                            </th>

                            <th width="35%">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php $no = 1; ?>

                        <?php if (!empty($user)): ?>

                            <?php foreach ($user as $u): ?>

                                <tr>

                                    <!-- NO -->
                                    <td>
                                        <?= $no++; ?>
                                    </td>


                                    <!-- NIK -->
                                    <td>
                                        <?= !empty($u['nik'])
                                            ? htmlspecialchars($u['nik'])
                                            : '-';
                                        ?>
                                    </td>


                                    <!-- NAMA -->
                                    <td>
                                        <?= !empty($u['nama_lengkap'])
                                            ? htmlspecialchars($u['nama_lengkap'])
                                            : '-';
                                        ?>
                                    </td>


                                    <!-- EMAIL -->
                                    <td>

                                        <?php if (!empty($u['email'])): ?>

                                            <?= htmlspecialchars($u['email']); ?>

                                        <?php else: ?>

                                            <span class="text-muted">
                                                -
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- ROLE -->
                                    <td>

                                        <?php if ($u['role_id'] == 2): ?>

                                            <span class="badge badge-success">
                                                Admin
                                            </span>


                                        <?php elseif ($u['role_id'] == 3): ?>

                                            <span class="badge badge-secondary">
                                                Masyarakat
                                            </span>


                                        <?php elseif ($u['role_id'] == 4): ?>

                                            <span class="badge badge-info">
                                                Kawil
                                            </span>


                                        <?php else: ?>

                                            <span class="badge badge-dark">
                                                Tidak Diketahui
                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <!-- AKSI -->
                                    <td>


                                        <!-- ========================= -->
                                        <!-- JADIKAN ADMIN -->
                                        <!-- ========================= -->

                                        <?php if ($u['role_id'] != 2): ?>

                                            <a href="<?= base_url('superadmin/jadikanAdmin/' . $u['id']); ?>"
                                               class="btn btn-success btn-sm mb-1"
                                               onclick="return confirm('Apakah Anda yakin ingin menjadikan <?= htmlspecialchars($u['nama_lengkap']); ?> sebagai Admin?')">

                                                <i class="fas fa-user-shield"></i>

                                                Jadikan Admin

                                            </a>

                                        <?php endif; ?>



                                        <!-- ========================= -->
                                        <!-- JADIKAN MASYARAKAT -->
                                        <!-- ========================= -->

                                        <?php if ($u['role_id'] != 3): ?>

                                            <a href="<?= base_url('superadmin/jadikanMasyarakat/' . $u['id']); ?>"
                                               class="btn btn-warning btn-sm mb-1"
                                               onclick="return confirm('Apakah Anda yakin ingin menjadikan <?= htmlspecialchars($u['nama_lengkap']); ?> sebagai Masyarakat?')">

                                                <i class="fas fa-user"></i>

                                                Jadikan Masyarakat

                                            </a>

                                        <?php endif; ?>



                                        <!-- ========================= -->
                                        <!-- JADIKAN KAWIL -->
                                        <!-- ========================= -->

                                        <?php if ($u['role_id'] != 4): ?>

                                            <a href="<?= base_url('superadmin/jadikanKawil/' . $u['id']); ?>"
                                               class="btn btn-info btn-sm mb-1"
                                               onclick="return confirm('Apakah Anda yakin ingin menjadikan <?= htmlspecialchars($u['nama_lengkap']); ?> sebagai Kawil?')">

                                                <i class="fas fa-user-tie"></i>

                                                Jadikan Kawil

                                            </a>

                                        <?php endif; ?>


                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        <?php else: ?>

                            <tr>

                                <td colspan="6"
                                    class="text-center">

                                    <span class="text-muted">
                                        Belum ada data user.
                                    </span>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>