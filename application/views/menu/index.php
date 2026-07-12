<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    

    <div class="row">
        <div class="col-lg-6">
             <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
             <?= $this->session->flashdata('message'); ?>
         <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a href=""
                                class="badge badge-success"
                                data-toggle="modal"
                                data-target="#editMenu<?= $m['id']; ?>">
                                Edit
                                </a>
                                <a href=""
                                    class="badge badge-danger"
                                    data-toggle="modal"
                                    data-target="#deleteMenu<?= $m['id']; ?>">
                                    Delete
                                </a>

                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
<!--Modal EDIT Menu -->
<?php foreach ($menu as $m) : ?>
<div class="modal fade" id="editMenu<?= $m['id']; ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?= base_url('menu/update'); ?>" method="post">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Menu</h5>

                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id" value="<?= $m['id']; ?>">

                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text"
                               name="menu"
                               class="form-control"
                               value="<?= $m['menu']; ?>">
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
        </div>
</div>
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Menu</h5>

                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form action="<?= base_url('menu'); ?>" method="post">

                <div class="modal-body">

                    <div class="form-group">
                        <input type="text"
                               class="form-control"
                               id="menu"
                               name="menu"
                               placeholder="Menu name"
                               value="<?= set_value('menu'); ?>">

                        <?= form_error('menu', '<small class="text-danger">', '</small>'); ?>
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
<!-- Modal Delete Menu -->
<?php foreach ($menu as $m) : ?>
<div class="modal fade" id="deleteMenu<?= $m['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>

                <button type="button"
                        class="close"
                        data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body">
                Apakah Anda yakin ingin menghapus menu <strong><?= $m['menu']; ?></strong> ?
                

                
            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                    Batal
                </button>

                <a href="<?= base_url('menu/delete/'.$m['id']); ?>"
                   class="btn btn-danger">
                    Hapus
                </a>

            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>