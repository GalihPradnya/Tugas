<div class="container-fluid">


    <div class="card shadow mb-4">


        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">

                Data Pengajuan Surat

            </h6>

        </div>



        <div class="card-body">


            <?= $this->session->flashdata('message'); ?>


            <div class="table-responsive">


                <table 
                    class="table table-bordered table-hover"
                    id="tablePengajuan">


                    <thead class="thead-light">


                        <tr>

                            <th width="50">
                                No
                            </th>


                            <th>
                                NIK
                            </th>


                            <th>
                                Nama Pemohon
                            </th>


                            <th>
                                Jenis Surat
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


                    <?php 
                    $no = 1;

                    foreach($pengajuan as $p):
                    ?>


                    <tr>


                        <td>
                            <?= $no++; ?>
                        </td>



                        <td>
                            <?= !empty($p['nik']) ? $p['nik'] : '-'; ?>
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
                            <?= $p['nama_surat']; ?>
                        </td>





                        <td>


                            <?php if($p['status']=='Menunggu'): ?>


                                <span class="badge badge-warning">

                                    Menunggu

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
                                'surat/Pengajuan_admin/detail/'.$p['id']
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


    $('#tablePengajuan').DataTable({

        pageLength:10,

        order:[
            [0,'desc']
        ]

    });


});


</script>