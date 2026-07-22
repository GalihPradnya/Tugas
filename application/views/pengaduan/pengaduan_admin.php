<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>


    <?= $this->session->flashdata('message'); ?>



    <div class="card shadow">


        <div class="card-body">


            <div class="table-responsive">


                <table class="table table-bordered table-hover"
                       id="tablePengaduan">


                    <thead class="thead-light">

                        <tr>

                            <th width="50">
                                No
                            </th>


                            <th>
                                Tanggal
                            </th>


                            <th>
                                NIK
                            </th>


                            <th>
                                Nama Pelapor
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


                            <th width="100">
                                Aksi
                            </th>


                        </tr>

                    </thead>



                    <tbody>


                    <?php 
                    $no = 1;

                    foreach($pengaduan as $p):
                    ?>


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

                            <?= $p['nik']; ?>

                        </td>





                        <td>


                            <?= $p['nama_lengkap']; ?>


                            <?php if(!empty($p['email'])): ?>

                                <br>

                                <small class="text-muted">

                                    <?= $p['email']; ?>

                                </small>

                            <?php endif; ?>


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
                                'pengaduan/pengaduan_admin/detail/'.$p['id']
                            ); ?>"
                            class="btn btn-info btn-sm">


                                <i class="fas fa-eye"></i>

                                Detail


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



<script>

$(document).ready(function(){

    $('#tablePengaduan').DataTable({

        pageLength:10,

        order:[
            [1,'desc']
        ]

    });

});

</script>