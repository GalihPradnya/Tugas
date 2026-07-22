<div class="container-fluid">


    <h1 class="h3 mb-4 text-gray-800">
        Data Penduduk Pendatang
    </h1>



    <?= $this->session->flashdata('message'); ?>



    <div class="card shadow mb-4">


        <div class="card-header py-3 d-flex justify-content-between">


            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Pendatang
            </h6>


            <a href="<?= base_url('pendatang/pendatang/tambah'); ?>"
               class="btn btn-primary btn-sm">

                <i class="fas fa-plus"></i>
                Tambah Pendatang

            </a>


        </div>





        <div class="card-body">


            <div class="table-responsive">


                <table class="table table-bordered"
                       width="100%"
                       cellspacing="0">


                    <thead>

                        <tr>

                            <th>No</th>

                            <th>NIK</th>

                            <th>Nama Lengkap</th>

                            <th>Jenis Kelamin</th>

                            <th>Nomor HP</th>

                            <th>Alamat Tinggal</th>

                            <th>Status</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>



                    <tbody>


                    <?php $no=1; ?>


                    <?php foreach($pendatang as $p): ?>


                        <tr>


                            <td>
                                <?= $no++; ?>
                            </td>


                            <td>
                                <?= $p['nik']; ?>
                            </td>


                            <td>
                                <?= $p['nama_lengkap']; ?>
                            </td>


                            <td>
                                <?= $p['jenis_kelamin']; ?>
                            </td>


                            <td>
                                <?= $p['nomor_hp']; ?>
                            </td>


                            <td>
                                <?= $p['alamat_tinggal']; ?>
                            </td>


                            <td>


                                <?php if($p['status']=='Aktif'): ?>


                                    <span class="badge badge-success">
                                        Aktif
                                    </span>


                                <?php else: ?>


                                    <span class="badge badge-secondary">
                                        Selesai
                                    </span>


                                <?php endif; ?>


                            </td>



                            <td>


                                <a href="<?= base_url('pendatang/edit/'.$p['id']); ?>"
                                   class="btn btn-warning btn-sm">


                                    <i class="fas fa-edit"></i>

                                </a>



                                <a href="<?= base_url('pendatang/hapus/'.$p['id']); ?>"
                                   onclick="return confirm('Hapus data pendatang?')"
                                   class="btn btn-danger btn-sm">


                                    <i class="fas fa-trash"></i>


                                </a>


                            </td>


                        </tr>


                    <?php endforeach; ?>



                    </tbody>


                </table>


            </div>


        </div>


    </div>


</div>