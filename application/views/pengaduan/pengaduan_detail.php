<div class="container-fluid">


    <h1 class="h3 mb-4 text-gray-800">
        Detail Pengaduan
    </h1>



    <?= $this->session->flashdata('message'); ?>



    <div class="card shadow mb-4">


        <div class="card-body">



            <!-- DATA PELAPOR -->

            <h5 class="font-weight-bold text-primary">
                Data Pelapor
            </h5>

            <hr>



            <table class="table table-bordered">


                <tr>

                    <th width="250">
                        NIK
                    </th>

                    <td>
                        <?= $pengaduan['nik']; ?>
                    </td>

                </tr>




                <tr>

                    <th>
                        Nama Lengkap
                    </th>

                    <td>
                        <?= $pengaduan['nama_lengkap']; ?>
                    </td>

                </tr>




                <tr>

                    <th>
                        Email
                    </th>

                    <td>
                        <?= !empty($pengaduan['email']) 
                        ? $pengaduan['email'] 
                        : '-'; ?>
                    </td>

                </tr>




                <tr>

                    <th>
                        Nomor HP
                    </th>

                    <td>
                        <?= $pengaduan['kontak']; ?>
                    </td>

                </tr>




                <tr>

                    <th>
                        Alamat
                    </th>

                    <td>
                        <?= $pengaduan['alamat']; ?>
                    </td>

                </tr>


            </table>








            <!-- DETAIL PENGADUAN -->


            <h5 class="font-weight-bold text-primary mt-4">

                Detail Pengaduan

            </h5>


            <hr>



            <table class="table table-bordered">


                <tr>

                    <th width="250">
                        Kategori
                    </th>

                    <td>
                        <?= $pengaduan['nama_kategori']; ?>
                    </td>

                </tr>





                <tr>

                    <th>
                        Judul Pengaduan
                    </th>


                    <td>
                        <?= $pengaduan['judul']; ?>
                    </td>


                </tr>





                <tr>

                    <th>
                        Lokasi
                    </th>


                    <td>
                        <?= $pengaduan['lokasi']; ?>
                    </td>


                </tr>






                <tr>

                    <th>
                        Isi Pengaduan
                    </th>


                    <td>
                        <?= nl2br($pengaduan['isi_pengaduan']); ?>
                    </td>


                </tr>







                <tr>

                    <th>
                        Bukti Masyarakat
                    </th>


                    <td>


                    <?php if(!empty($pengaduan['bukti'])): ?>


                        <a target="_blank"
                        href="<?= base_url(
                        'uploads/pengaduan/'.$pengaduan['bukti']
                        ); ?>"
                        class="btn btn-info btn-sm">


                            <i class="fas fa-file"></i>

                            Lihat Bukti


                        </a>


                    <?php else: ?>


                        <span class="text-muted">

                            Tidak ada bukti

                        </span>


                    <?php endif; ?>


                    </td>


                </tr>



            </table>









            <!-- STATUS ADMIN -->


            <h5 class="font-weight-bold text-primary mt-4">

                Proses Pengaduan

            </h5>


            <hr>






            <form action="<?= base_url(
                'pengaduan/pengaduan_admin/updateStatus'
            ); ?>"
            method="post"
            enctype="multipart/form-data">





                <input type="hidden"
                name="id"
                value="<?= $pengaduan['id']; ?>">







                <!-- STATUS -->


                <div class="form-group">


                    <label>
                        Status Pengaduan
                    </label>



                    <select name="status"
                    class="form-control">



                        <option value="Masuk"

                        <?= ($pengaduan['status']=="Masuk")
                        ? "selected"
                        : ""; ?>>

                            Masuk

                        </option>





                        <option value="Diproses"

                        <?= ($pengaduan['status']=="Diproses")
                        ? "selected"
                        : ""; ?>>

                            Diproses

                        </option>





                        <option value="Selesai"

                        <?= ($pengaduan['status']=="Selesai")
                        ? "selected"
                        : ""; ?>>

                            Selesai

                        </option>





                        <option value="Ditolak"

                        <?= ($pengaduan['status']=="Ditolak")
                        ? "selected"
                        : ""; ?>>

                            Ditolak

                        </option>



                    </select>


                </div>









                <!-- TANGGAPAN -->


                <div class="form-group">


                    <label>
                        Tanggapan Admin
                    </label>



                    <textarea
                    name="tanggapan"
                    rows="5"
                    class="form-control"><?= $pengaduan['tanggapan']; ?></textarea>



                </div>









                <!-- UPLOAD BUKTI ADMIN -->


                <div class="form-group">


                    <label>
                        Upload Bukti Penyelesaian
                    </label>



                    <input type="file"
                    name="bukti_admin"
                    class="form-control"
                    accept=".jpg,.jpeg,.png,.pdf">



                    <small class="text-muted">

                        Upload surat hasil, foto,
                        atau dokumen penyelesaian.

                    </small>


                </div>










                <!-- FILE ADMIN LAMA -->


                <?php if(!empty($pengaduan['bukti_admin'])): ?>


                <div class="alert alert-success">


                    <strong>
                        Bukti Penyelesaian Tersedia
                    </strong>


                    <br><br>


                    File:

                    <?= $pengaduan['bukti_admin']; ?>


                    <br><br>



                    <a target="_blank"

                    href="<?= base_url(
                    'uploads/pengaduan_admin/'
                    .$pengaduan['bukti_admin']
                    ); ?>"

                    class="btn btn-success btn-sm">


                        <i class="fas fa-file"></i>

                        Lihat Bukti Admin


                    </a>



                </div>


                <?php endif; ?>









                <button type="submit"
                class="btn btn-success">


                    <i class="fas fa-save"></i>

                    Simpan Perubahan


                </button>





                <a href="<?= base_url(
                    'pengaduan/pengaduan_admin'
                ); ?>"
                class="btn btn-secondary">


                    Kembali


                </a>



            </form>




        </div>


    </div>


</div>