<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">
Tambah Penduduk
</h1>



<div class="card shadow">

<div class="card-body">


<form method="post">


<div class="form-group">

<label>NIK</label>

<input type="text"
name="nik"
class="form-control"
value="<?= set_value('nik'); ?>">

<?= form_error(
'nik',
'<small class="text-danger">',
'</small>'
); ?>

</div>



<div class="form-group">

<label>Nama Lengkap</label>

<input type="text"
name="nama_lengkap"
class="form-control">

</div>



<div class="form-row">


<div class="col">

<label>Tempat Lahir</label>

<input type="text"
name="tempat_lahir"
class="form-control">

</div>



<div class="col">

<label>Tanggal Lahir</label>

<input type="date"
name="tanggal_lahir"
class="form-control">

</div>


</div>



<div class="form-group mt-3">

<label>Jenis Kelamin</label>

<select name="jenis_kelamin"
class="form-control">


<option value="L">
Laki-laki
</option>


<option value="P">
Perempuan
</option>


</select>

</div>




<div class="form-group">

<label>Alamat</label>

<textarea name="alamat"
class="form-control"></textarea>

</div>




<div class="form-row">


<div class="col">

<label>RT</label>

<input type="text"
name="rt"
class="form-control">

</div>


<div class="col">

<label>RW</label>

<input type="text"
name="rw"
class="form-control">

</div>


</div>




<div class="form-group mt-3">

<label>Agama</label>

<input type="text"
name="agama"
class="form-control">

</div>



<div class="form-group">

<label>Pekerjaan</label>

<input type="text"
name="pekerjaan"
class="form-control">

</div>




<div class="form-group">

<label>Status Perkawinan</label>

<input type="text"
name="status_perkawinan"
class="form-control">

</div>




<button class="btn btn-success">

<i class="fas fa-save"></i>
Simpan

</button>


<a href="<?=base_url('penduduk/penduduk')?>"
class="btn btn-secondary">

Kembali

</a>



</form>


</div>

</div>


</div>