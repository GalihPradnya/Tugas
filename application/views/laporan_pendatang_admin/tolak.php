<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Tolak Laporan Pendatang
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <form method="post">

                <div class="form-group">

                    <label>Alasan Penolakan</label>

                    <textarea
                        name="alasan_penolakan"
                        class="form-control"
                        rows="5"
                        required></textarea>

                </div>

                <a href="<?= base_url('pendatang/laporan_pendatang_admin/detail/'.$laporan['id']); ?>"
                   class="btn btn-secondary">

                    Batal

                </a>

                <button type="submit"
                        class="btn btn-danger">

                    Simpan Penolakan

                </button>

            </form>

        </div>

    </div>

</div>