<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pengaduan
    </h1>

    <div class="card shadow">

        <div class="card-body">

            <table class="table">

                <tr>
                    <th width="250">Nama</th>
                    <td><?= $pengaduan['nama']; ?></td>
                </tr>

                <tr>
                    <th>Kontak</th>
                    <td><?= $pengaduan['kontak']; ?></td>
                </tr>

                <tr>
                    <th>Alamat</th>
                    <td><?= $pengaduan['alamat']; ?></td>
                </tr>

                <tr>
                    <th>Kategori</th>
                    <td><?= $pengaduan['nama_kategori']; ?></td>
                </tr>

                <tr>
                    <th>Judul</th>
                    <td><?= $pengaduan['judul']; ?></td>
                </tr>

                <tr>
                    <th>Lokasi</th>
                    <td><?= $pengaduan['lokasi']; ?></td>
                </tr>

                <tr>
                    <th>Isi Pengaduan</th>
                    <td><?= $pengaduan['isi_pengaduan']; ?></td>
                </tr>

                <tr>
                    <th>Bukti</th>
                    <td>

                        <?php if($pengaduan['bukti']) : ?>

                            <a target="_blank"
                               href="<?= base_url('uploads/pengaduan/'.$pengaduan['bukti']); ?>">

                                Lihat Bukti

                            </a>

                        <?php endif; ?>

                    </td>
                </tr>

            </table>

            <hr>

            <form action="<?= base_url('pengaduan/pengaduan_admin/updateStatus'); ?>"
                  method="post">

                <input type="hidden"
                       name="id"
                       value="<?= $pengaduan['id']; ?>">

                <div class="form-group">

                    <label>Status</label>

                    <select name="status"
                            class="form-control">

                        <option value="Masuk">Masuk</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Ditolak">Ditolak</option>

                    </select>

                </div>

                <div class="form-group">

                    <label>Tanggapan</label>

                    <textarea
                        name="tanggapan"
                        rows="5"
                        class="form-control"><?= $pengaduan['tanggapan']; ?></textarea>

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Simpan Perubahan

                </button>

                <a href="<?= base_url('pengaduan/pengaduan_admin'); ?>"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </form>

        </div>

    </div>

</div>