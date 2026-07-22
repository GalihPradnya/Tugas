<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Pengaduan Saya
    </h1>


    <?= $this->session->flashdata('message'); ?>


    <div class="card shadow mb-4">


        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Riwayat Pengaduan
            </h6>

        </div>



        <div class="card-body">


            <div class="table-responsive">


                <table class="table table-bordered table-hover">


                    <thead class="thead-light">

                        <tr>

                            <th width="50">
                                No
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Status
                            </th>

                            <th width="120">
                                Aksi
                            </th>

                        </tr>


                    </thead>



                    <tbody>


                    <?php if(empty($pengaduan)): ?>


                        <tr>

                            <td colspan="6" class="text-center">

                                Belum ada pengaduan.

                            </td>

                        </tr>


                    <?php else: ?>


                    <?php $no=1; ?>

                    <?php foreach($pengaduan as $p): ?>


                    <tr>


                        <td>
                            <?= $no++; ?>
                        </td>



                        <td>

                            <?= date(
                                'd-m-Y',
                                strtotime($p['created_at'])
                            ); ?>

                        </td>




                        <td>

                            <?= $p['nama_kategori']; ?>

                        </td>




                        <td>

                            <?= $p['judul']; ?>

                        </td>




                        <td>


                            <?php if($p['status']=='Masuk'): ?>


                                <span class="badge badge-warning">
                                    Masuk
                                </span>


                            <?php elseif($p['status']=='Diproses'): ?>


                                <span class="badge badge-primary">
                                    Diproses
                                </span>


                            <?php elseif($p['status']=='Selesai'): ?>


                                <span class="badge badge-success">
                                    Selesai
                                </span>


                            <?php elseif($p['status']=='Ditolak'): ?>


                                <span class="badge badge-danger">
                                    Ditolak
                                </span>


                            <?php endif; ?>


                        </td>





                        <td>


                            <a href="<?= base_url(
                                'user/pengaduan_saya/detail/'.$p['id']
                            ); ?>"
                            class="btn btn-info btn-sm">


                                <i class="fas fa-eye"></i>

                                Detail


                            </a>


                        </td>


                    </tr>



                    <?php endforeach; ?>


                    <?php endif; ?>


                    </tbody>



                </table>



            </div>



        </div>



    </div>



</div>