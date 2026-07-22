<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        Data Penduduk
    </h1>


    <!-- Flash Message -->
    <?= $this->session->flashdata('message'); ?>


    <!-- Card -->
    <div class="card shadow mb-4">


        <div class="card-header py-3 d-flex justify-content-between align-items-center">

            <h6 class="m-0 font-weight-bold text-primary">
                Daftar Penduduk
            </h6>


            <a href="<?= base_url('penduduk/penduduk/tambah'); ?>"
               class="btn btn-primary btn-sm">

                <i class="fas fa-plus"></i>
                Tambah Penduduk

            </a>


        </div>



        <div class="card-body">


            <div class="table-responsive">

                <table class="table table-bordered table-striped"
                       width="100%"
                       cellspacing="0">


                    <thead class="thead-light">

                        <tr>

                            <th>No</th>

                            <th>NIK</th>

                            <th>Nama Lengkap</th>

                            <th>Tempat Lahir</th>

                            <th>Tanggal Lahir</th>

                            <th>Jenis Kelamin</th>

                            <th>Alamat</th>

                            <th>RT</th>

                            <th>RW</th>

                            <th>Agama</th>

                            <th>Pekerjaan</th>

                            <th>Status Perkawinan</th>

                            <th>Dibuat</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>



                    <tbody>


                    <?php if(empty($penduduk)): ?>

                        <tr>

                            <td colspan="14" class="text-center">

                                Data penduduk belum tersedia

                            </td>

                        </tr>


                    <?php else: ?>


                        <?php $no = 1; ?>

                        <?php foreach($penduduk as $p): ?>


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
                                <?= $p['tempat_lahir']; ?>
                            </td>


                            <td>
                                <?= $p['tanggal_lahir']; ?>
                            </td>


                            <td>

                                <?php if($p['jenis_kelamin'] == 'L'): ?>

                                    Laki-laki

                                <?php else: ?>

                                    Perempuan

                                <?php endif; ?>

                            </td>


                            <td>
                                <?= $p['alamat']; ?>
                            </td>


                            <td>
                                <?= $p['rt']; ?>
                            </td>


                            <td>
                                <?= $p['rw']; ?>
                            </td>


                            <td>
                                <?= $p['agama']; ?>
                            </td>


                            <td>
                                <?= $p['pekerjaan']; ?>
                            </td>


                            <td>
                                <?= $p['status_perkawinan']; ?>
                            </td>


                            <td>
                                <?= date(
                                    'd-m-Y',
                                    strtotime($p['created_at'])
                                ); ?>
                            </td>



                            <td class="text-nowrap">


                                <a href="<?= base_url(
                                    'penduduk/penduduk/edit/'.$p['id']
                                ); ?>"
                                class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>

                                </a>



                                <a href="<?= base_url(
                                    'penduduk/penduduk/hapus/'.$p['id']
                                ); ?>"
                                onclick="return confirm('Yakin ingin menghapus data penduduk ini?');"
                                class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>

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


<style>

.table-responsive {

    overflow-x: auto;

}


.table {

    white-space: nowrap;

}


</style>