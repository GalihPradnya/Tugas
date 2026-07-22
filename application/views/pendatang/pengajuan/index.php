<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">
    Pengajuan Surat Pendatang
</h1>



<?= $this->session->flashdata('message'); ?>



<a href="<?= base_url('pendatang/pengajuan_pendatang/tambah'); ?>"
class="btn btn-primary mb-3">

<i class="fas fa-plus"></i>
Tambah Pengajuan

</a>




<div class="card shadow">


<div class="card-body">


<div class="table-responsive">


<table class="table table-bordered">


<thead>

<tr>

<th>No</th>
<th>Nama Pendatang</th>
<th>Surat</th>
<th>Tanggal</th>
<th>Status</th>
<th>Aksi</th>

</tr>

</thead>



<tbody>


<?php $no=1; ?>

<?php foreach($pengajuan as $p): ?>


<tr>


<td><?= $no++; ?></td>


<td>
<?= $p['nama_lengkap']; ?>
</td>


<td>
<?= $p['nama_surat']; ?>
</td>


<td>
<?= date(
'd-m-Y',
strtotime($p['created_at'])
); ?>
</td>


<td>


<?php if($p['status']=="Menunggu"): ?>


<span class="badge badge-warning">
Menunggu
</span>


<?php elseif($p['status']=="Diproses"): ?>


<span class="badge badge-info">
Diproses
</span>


<?php elseif($p['status']=="Selesai"): ?>


<span class="badge badge-success">
Selesai
</span>


<?php else: ?>


<span class="badge badge-danger">
Ditolak
</span>


<?php endif; ?>


</td>



<td>


<a href="<?= base_url(
'pendatang/pengajuan_pendatang/detail/'.$p['id']
); ?>"
class="btn btn-info btn-sm">

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