<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">
    Detail Pengajuan Surat
</h1>



<?= $this->session->flashdata('message'); ?>



<!-- DATA PENDUDUK -->

<div class="card shadow mb-4">


<div class="card-header bg-primary text-white">

    <h6 class="m-0 font-weight-bold">
        Data Pemohon
    </h6>

</div>


<div class="card-body">


<table class="table table-bordered">


<tr>
<th width="220">
NIK
</th>

<td>
<?= $pengajuan['nik']; ?>
</td>

</tr>



<tr>
<th>
Nama Lengkap
</th>

<td>
<?= $pengajuan['nama_lengkap']; ?>
</td>

</tr>




<tr>
<th>
Tempat, Tanggal Lahir
</th>

<td>

<?= $pengajuan['tempat_lahir']; ?>,

<?= date(
'd-m-Y',
strtotime($pengajuan['tanggal_lahir'])
); ?>

</td>

</tr>





<tr>
<th>
Jenis Kelamin
</th>

<td>
<?= $pengajuan['jenis_kelamin']; ?>
</td>

</tr>




<tr>
<th>
Agama
</th>

<td>
<?= $pengajuan['agama']; ?>
</td>

</tr>




<tr>
<th>
Pekerjaan
</th>

<td>
<?= $pengajuan['pekerjaan']; ?>
</td>

</tr>




<tr>
<th>
Status Perkawinan
</th>

<td>
<?= $pengajuan['status_perkawinan']; ?>
</td>

</tr>




<tr>
<th>
Alamat
</th>

<td>

<?= $pengajuan['alamat']; ?>

<br>

RT :
<?= $pengajuan['rt']; ?>

&nbsp;

RW :
<?= $pengajuan['rw']; ?>


</td>

</tr>





<tr>
<th>
Email
</th>

<td>

<?= !empty($pengajuan['email'])
?
$pengajuan['email']
:
'-';
?>

</td>

</tr>



</table>


</div>


</div>






<!-- DATA SURAT -->

<div class="card shadow mb-4">


<div class="card-header bg-success text-white">

<h6 class="m-0 font-weight-bold">

Data Pengajuan Surat

</h6>

</div>




<div class="card-body">


<table class="table table-bordered">


<tr>

<th width="220">
Jenis Surat
</th>


<td>
<?= $pengajuan['nama_surat']; ?>
</td>

</tr>



<tr>

<th>
Keperluan
</th>


<td>
<?= $pengajuan['keperluan']; ?>
</td>

</tr>




<tr>

<th>
Catatan
</th>


<td>

<?= !empty($pengajuan['catatan'])
?
$pengajuan['catatan']
:
'-';
?>

</td>

</tr>




<tr>

<th>
Status
</th>


<td>


<?php if($pengajuan['status']=="Menunggu"): ?>

<span class="badge badge-warning">
Menunggu
</span>


<?php elseif($pengajuan['status']=="Diproses"): ?>

<span class="badge badge-primary">
Diproses
</span>


<?php elseif($pengajuan['status']=="Selesai"): ?>

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



</table>


</div>


</div>







<!-- FILE PERSYARATAN -->

<div class="card shadow mb-4">


<div class="card-header bg-info text-white">

<h6 class="m-0 font-weight-bold">

File Persyaratan

</h6>

</div>



<div class="card-body">


<table class="table table-bordered">


<thead>

<tr>

<th>
Persyaratan
</th>


<th width="250">
Aksi
</th>

</tr>


</thead>



<tbody>


<?php foreach($file as $f): ?>


<tr>


<td>

<?= $f['nama_persyaratan']; ?>

</td>



<td>


<a target="_blank"
href="<?= base_url(
'uploads/persyaratan/'.$f['nama_file']
); ?>"
class="btn btn-info btn-sm">


<i class="fas fa-eye"></i>
Lihat


</a>



<a href="<?= base_url(
'surat/Pengajuan_admin/download/'.$f['id']
); ?>"
class="btn btn-success btn-sm">


<i class="fas fa-download"></i>
Download


</a>



</td>


</tr>


<?php endforeach; ?>


</tbody>


</table>


</div>


</div>








<!-- PROSES ADMIN -->


<div class="card shadow mb-4">


<div class="card-header bg-warning">


<h6 class="m-0 font-weight-bold">

Proses Pengajuan

</h6>


</div>



<div class="card-body">



<form action="<?= base_url(
'surat/Pengajuan_admin/updateStatus'
); ?>"
method="post"
enctype="multipart/form-data">



<input type="hidden"
name="id"
value="<?= $pengajuan['id']; ?>">





<div class="form-group">


<label>
Status
</label>


<select name="status"
class="form-control">


<option value="Menunggu"
<?= $pengajuan['status']=='Menunggu'
?'selected':''; ?>>
Menunggu
</option>



<option value="Diproses"
<?= $pengajuan['status']=='Diproses'
?'selected':''; ?>>
Diproses
</option>



<option value="Selesai"
<?= $pengajuan['status']=='Selesai'
?'selected':''; ?>>
Selesai
</option>



<option value="Ditolak"
<?= $pengajuan['status']=='Ditolak'
?'selected':''; ?>>
Ditolak
</option>



</select>


</div>




<div class="form-group">


<label>
Upload Surat Hasil PDF
</label>


<input type="file"
name="file_hasil"
class="form-control">



</div>





<?php if(!empty($pengajuan['file_hasil'])): ?>


<div class="alert alert-success">


Surat hasil tersedia


<br>


<a target="_blank"
href="<?= base_url(
'uploads/hasil_surat/'.$pengajuan['file_hasil']
); ?>"
class="btn btn-success btn-sm mt-2">

Lihat Surat

</a>


</div>



<?php endif; ?>





<button class="btn btn-primary">

<i class="fas fa-save"></i>

Simpan

</button>



<a href="<?= base_url(
'surat/Pengajuan_admin/pengajuan_admin'
); ?>"
class="btn btn-secondary">

Kembali

</a>



</form>


</div>


</div>


</div>