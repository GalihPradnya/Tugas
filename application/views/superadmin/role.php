<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <a href=""
               class="btn btn-primary mb-3"
               data-toggle="modal"
               data-target="#newRoleModal">
                Add New Role
            </a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th>Role</th>
                        <th width="25%">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>

                        <td><?= $r['role']; ?></td>

                        <td>

                            <a href=""
                               class="badge badge-success"
                               data-toggle="modal"
                               data-target="#editRole<?= $r['id']; ?>">
                                Edit
                            </a>
                            <a href="<?= base_url('superadmin/roleaccess/') . $r['id']; ?>"
                               class="badge badge-warning">
                                Access
                            </a>

                            <?php if($r['id'] > 3) : ?>

                            <a href=""
                               class="badge badge-danger"
                               data-toggle="modal"
                               data-target="#deleteRole<?= $r['id']; ?>">
                                Delete
                            </a>

                            <?php else : ?>

                            <span class="badge badge-secondary">
                                Protected
                            </span>

                            <?php endif; ?>

                        </td>
                    </tr>

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<!-- =======================
     MODAL ADD ROLE
======================= -->
<div class="modal fade" id="newRoleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?= base_url('superadmin/role'); ?>" method="post">

                <div class="modal-header">
                    <h5 class="modal-title">Add New Role</h5>

                    <button type="button"
                            class="close"
                            data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Role</label>

                        <input type="text"
                               class="form-control"
                               name="role"
                               placeholder="Masukkan nama role"
                               value="<?= set_value('role'); ?>">

                        <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Close
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        Add
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<!-- =======================
     MODAL EDIT ROLE
======================= -->
<?php foreach ($role as $r) : ?>

<div class="modal fade"
     id="editRole<?= $r['id']; ?>"
     tabindex="-1">

    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?= base_url('superadmin/updateRole'); ?>" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Role
                    </h5>

                    <button type="button"
                            class="close"
                            data-dismiss="modal">
                        <span>&times;</span>
                    </button>

                </div>

                <div class="modal-body">

                    <input type="hidden"
                           name="id"
                           value="<?= $r['id']; ?>">

                    <div class="form-group">

                        <label>Nama Role</label>

                        <input type="text"
                               name="role"
                               class="form-control"
                               value="<?= $r['role']; ?>"
                               required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Close
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

<?php endforeach; ?>

<!-- =======================
     MODAL DELETE ROLE
======================= -->
<?php foreach ($role as $r) : ?>

<?php if($r['id'] > 3) : ?>

<div class="modal fade"
     id="deleteRole<?= $r['id']; ?>"
     tabindex="-1">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Konfirmasi Hapus
                </h5>

                <button type="button"
                        class="close"
                        data-dismiss="modal">
                    <span>&times;</span>
                </button>

            </div>

            <div class="modal-body">

                Apakah Anda yakin ingin menghapus role

                <strong>
                    <?= $r['role']; ?>
                </strong> ?

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                    Batal
                </button>

                <a href="<?= base_url('superadmin/deleteRole/'.$r['id']); ?>"
                   class="btn btn-danger">
                    Hapus
                </a>

            </div>

        </div>
    </div>

</div>

<?php endif; ?>
<?php endforeach; ?>