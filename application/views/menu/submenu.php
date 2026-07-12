<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?= $this->session->flashdata('message'); ?>

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <a href="" class="btn btn-primary mb-3"
               data-toggle="modal"
               data-target="#newSubMenuModal">
                Add New SubMenu
            </a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Menu</th>
                        <th>URL</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $sm['title']; ?></td>
                        <td><?= $sm['menu']; ?></td>
                        <td><?= $sm['url']; ?></td>
                        <td><?= $sm['icon']; ?></td>
                        <td><?= $sm['is_active']; ?></td>
                        <td>

                            <a href=""
                               class="badge badge-success"
                               data-toggle="modal"
                               data-target="#editSubMenu<?= $sm['id']; ?>">
                                Edit
                            </a>

                            <a href=""
                                class="badge badge-danger"
                                data-toggle="modal"
                                data-target="#deleteSubMenu<?= $sm['id']; ?>">
                                Delete
                            </a>

                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<!-- ================= MODAL EDIT ================= -->
<?php foreach ($subMenu as $sm) : ?>
<div class="modal fade"
     id="editSubMenu<?= $sm['id']; ?>"
     tabindex="-1"
     role="dialog">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="<?= base_url('menu/editSubmenu'); ?>" method="post">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Submenu</h5>
                    <button type="button"
                            class="close"
                            data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <input type="hidden"
                           name="id"
                           value="<?= $sm['id']; ?>">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               value="<?= $sm['title']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Menu</label>
                        <select name="menu_id"
                                class="form-control">

                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"
                                    <?= ($m['id'] == $sm['menu_id']) ? 'selected' : ''; ?>>
                                    <?= $m['menu']; ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <input type="text"
                               name="url"
                               class="form-control"
                               value="<?= $sm['url']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text"
                               name="icon"
                               class="form-control"
                               value="<?= $sm['icon']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active"
                                class="form-control">

                            <option value="1"
                                <?= ($sm['is_active'] == 1) ? 'selected' : ''; ?>>
                                Active
                            </option>

                            <option value="0"
                                <?= ($sm['is_active'] == 0) ? 'selected' : ''; ?>>
                                Non Active
                            </option>

                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">
                        Close
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- ================= MODAL ADD ================= -->
<div class="modal fade"
     id="newSubMenuModal"
     tabindex="-1"
     role="dialog">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form action="<?= base_url('menu/submenu'); ?>" method="post">

                <div class="modal-header">
                    <h5 class="modal-title">
                        Add New Submenu
                    </h5>

                    <button type="button"
                            class="close"
                            data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               placeholder="Masukkan Title">
                    </div>

                    <div class="form-group">
                        <label>Menu</label>
                        <select name="menu_id"
                                class="form-control">

                            <option value="">
                                Pilih Menu
                            </option>

                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>">
                                    <?= $m['menu']; ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <input type="text"
                               name="url"
                               class="form-control"
                               placeholder="Masukkan URL">
                    </div>

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text"
                               name="icon"
                               class="form-control"
                               placeholder="Masukkan Icon">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active"
                                class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Non Active</option>
                        </select>
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
<!-- ================= MODAL DELETE ================= -->
<?php foreach ($subMenu as $sm) : ?>
<div class="modal fade"
     id="deleteSubMenu<?= $sm['id']; ?>"
     tabindex="-1"
     role="dialog">

    <div class="modal-dialog" role="document">
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
                Apakah Anda yakin ingin menghapus submenu
                <strong><?= $sm['title']; ?></strong> ?
            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                    Batal
                </button>

                <a href="<?= base_url('menu/deleteSubmenu/'.$sm['id']); ?>"
                   class="btn btn-danger">
                    Hapus
                </a>

            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>