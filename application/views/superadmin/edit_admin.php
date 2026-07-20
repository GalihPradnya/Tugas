<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Edit Admin
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <form method="post">

                <div class="form-group">

                    <label>Nama</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="<?= $admin['name']; ?>"
                           required>

                </div>

                <div class="form-group">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?= $admin['email']; ?>"
                           required>

                </div>

                <div class="form-group">

                    <label>Password Baru</label>

                    <input type="password"
                           name="password"
                           class="form-control">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti password
                    </small>

                </div>

                <div class="form-group">

                    <label>Status</label>

                    <select name="is_active"
                            class="form-control">

                        <option value="1"
                            <?= $admin['is_active']==1?'selected':''; ?>>
                            Aktif
                        </option>

                        <option value="0"
                            <?= $admin['is_active']==0?'selected':''; ?>>
                            Nonaktif
                        </option>

                    </select>

                </div>

                <button type="submit"
                        class="btn btn-success">

                    <i class="fas fa-save"></i>
                    Simpan

                </button>

                <a href="<?= base_url('superadmin/dataAdmin'); ?>"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>