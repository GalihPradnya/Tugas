<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">

Detail Pengajuan Surat Pendatang

</h1>


<?= $this->session->flashdata('message'); ?>



<div class="card shadow">


<div class="card-body">



<h5 class="text-primary">
Data Pendatang
</h5>


<table class="table table-bordered">


<tr>
<th width="200">
Nama
</th>

<td>
<?= $pengajuan['nama_lengkap']; ?>
</td>
</tr>



<tr>
<th>
Nomor HP
</th>

<td>
<?= $pengajuan['nomor_hp']; ?>
</td>
</tr>



<tr>
<th>
Alamat Asal
</th>

<td>
<?= $pengajuan['alamat_asal']; ?>
</td>
</tr>



<tr>
<th>
Alamat Tinggal
</th>

<td>
<?= $pengajuan['alamat_tinggal']; ?>
</td>
</tr>


</table>




<h5 class="text-primary mt-4">
Detail Surat
</h5>


<table class="table table-bordered">


<tr>

<th>
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
Status
</th>

<td>
<?= $pengajuan['status']; ?>
</td>

</tr>


</table>







<form action="<?= base_url(
'pendatang/pengajuan_pendatang/updateStatus'
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


<option>
Menunggu
</option>


<option>
Diproses
</option>


<option>
Selesai
</option>


<option>
Ditolak
</option>


</select>

</div>




<div class="form-group">

<label>
Catatan Admin
</label>


<textarea name="catatan"
class="form-control"></textarea>

</div>





<div class="form-group">

<label>
Upload Surat Hasil
</label>


<input type="file"
name="file_hasil"
class="form-control">


</div>




<button class="btn btn-success">

Simpan Perubahan

</button>



<a href="<?= base_url(
'pendatang/pengajuan_pendatang'
); ?>"
class="btn btn-secondary">

Kembali

</a>


</form>



</div>

</div>


</div>  