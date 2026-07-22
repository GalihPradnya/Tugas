<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">
Akun Penduduk
</h1>



<?= $this->session->flashdata('message'); ?>


<div class="card shadow">


<div class="card-body">


<div class="table-responsive">


<table class="table table-bordered table-striped">


<thead>

<tr>

<th>No</th>

<th>NIK</th>

<th>Nama</th>

<th>Email</th>

<th>Status</th>

<th>Aksi</th>

</tr>

</thead>



<tbody>


<?php $no=1; ?>


<?php foreach($akun as $a): ?>


<tr>


<td>
<?= $no++; ?>
</td>


<td>
<?= $a['nik']; ?>
</td>


<td>
<?= $a['nama_lengkap']; ?>
</td>


<td>

<?php if($a['email']): ?>

<?= $a['email']; ?>

<?php else: ?>

<span class="text-danger">
Belum diisi
</span>

<?php endif; ?>

</td>



<td>

<?php if($a['is_active']==1): ?>

<span class="badge badge-success">
Aktif
</span>

<?php else: ?>

<span class="badge badge-danger">
Nonaktif
</span>

<?php endif; ?>


</td>



<td>

<a href="<?= base_url(
'penduduk/penduduk/reset_password/'.$a['id']
); ?>"
class="btn btn-warning btn-sm"
onclick="return confirm('Reset password akun ini?');">

<i class="fas fa-key"></i>
Reset Password

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