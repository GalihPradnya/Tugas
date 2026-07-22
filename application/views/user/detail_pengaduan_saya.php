<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Detail Pengaduan
    </h1>


    <?= $this->session->flashdata('message'); ?>


    <div class="card shadow mb-4">


        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Informasi Pengaduan
            </h6>

        </div>




        <div class="card-body">



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
                        Judul
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







                <!-- STATUS -->

                <tr>

                    <th>
                        Status
                    </th>


                    <td>


                    <?php if($pengaduan['status']=="Masuk"): ?>


                        <span class="badge badge-warning">

                            Masuk

                        </span>




                    <?php elseif($pengaduan['status']=="Diproses"): ?>


                        <span class="badge badge-primary">

                            Diproses

                        </span>





                    <?php elseif($pengaduan['status']=="Selesai"): ?>


                        <span class="badge badge-success">

                            Selesai

                        </span>





                    <?php else: ?>


                        <span class="badge badge-danger">

                            Ditolak

                        </span>



                    <?php endif; ?>


                    </td>


                </tr>







                <!-- TANGGAPAN ADMIN -->

                <tr>

                    <th>
                        Tanggapan Admin
                    </th>


                    <td>


                    <?php if(!empty($pengaduan['tanggapan'])): ?>


                        <?= nl2br($pengaduan['tanggapan']); ?>


                    <?php else: ?>


                        <span class="text-muted">

                            Belum ada tanggapan.

                        </span>


                    <?php endif; ?>


                    </td>


                </tr>









                <!-- BUKTI USER -->

                <?php if(!empty($pengaduan['bukti'])): ?>


                <tr>


                    <th>
                        Bukti Pengaduan
                    </th>


                    <td>


                        <a href="<?= base_url(
                        'uploads/pengaduan/'.$pengaduan['bukti']
                        ); ?>"
                        target="_blank"
                        class="btn btn-info btn-sm">


                            <i class="fas fa-file"></i>

                            Lihat Bukti


                        </a>


                    </td>


                </tr>


                <?php endif; ?>









                <!-- BUKTI ADMIN -->

                <?php if(!empty($pengaduan['bukti_admin'])): ?>


                <tr>


                    <th>
                        Bukti Penyelesaian
                    </th>


                    <td>


                        <div class="alert alert-success">


                            <strong>
                                Pengaduan telah diselesaikan
                            </strong>


                            <br><br>



                            <a href="<?= base_url(
                            'uploads/pengaduan_admin/'
                            .$pengaduan['bukti_admin']
                            ); ?>"
                            target="_blank"
                            class="btn btn-success btn-sm">


                                <i class="fas fa-download"></i>

                                Lihat Bukti Penyelesaian


                            </a>



                        </div>


                    </td>


                </tr>


                <?php endif; ?>





            </table>






            <a href="<?= base_url(
                'user/pengaduan_saya'
            ); ?>"
            class="btn btn-secondary">


                <i class="fas fa-arrow-left"></i>

                Kembali


            </a>



        </div>


    </div>


</div>