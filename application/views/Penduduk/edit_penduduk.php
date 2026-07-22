<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">
Edit Penduduk
</h1>


<div class="card shadow">

<div class="card-body">


<form method="post">


<div class="form-group">

<label>NIK</label>

<input type="text"
name="nik"
class="form-control"
value="<?= $penduduk['nik']; ?>">

</div>



<div class="form-group">

<label>Nama Lengkap</label>

<input type="text"
name="nama_lengkap"
class="form-control"
value="<?= $penduduk['nama_lengkap']; ?>">

</div>



<div class="form-group">

<label>Tempat Lahir</label>

<input type="text"
name="tempat_lahir"
class="form-control"
value="<?= $penduduk['tempat_lahir']; ?>">

</div>



<div class="form-group">

<label>Tanggal Lahir</label>

<input type="date"
name="tanggal_lahir"
class="form-control"
value="<?= $penduduk['tanggal_lahir']; ?>">

</div>



<div class="form-group">

<label>Jenis Kelamin</label>

<select name="jenis_kelamin"
class="form-control">


<option value="L"
<?= $penduduk['jenis_kelamin']=='L'?'selected':'' ?>>
Laki-laki
</option>


<option value="P"
<?= $penduduk['jenis_kelamin']=='P'?'selected':'' ?>>
Perempuan
</option>


</select>

</div>



<div class="form-group">

<label>Alamat</label>

<textarea name="alamat"
class="form-control"><?= $penduduk['alamat']; ?></textarea>

</div>



<div class="form-group">

<label>RT</label>

<input type="text"
name="rt"
class="form-control"
value="<?= $penduduk['rt']; ?>">

</div>



<div class="form-group">

<label>RW</label>

<input type="text"
name="rw"
class="form-control"
value="<?= $penduduk['rw']; ?>">

</div>



<div class="form-group">

<label>Agama</label>

<input type="text"
name="agama"
class="form-control"
value="<?= $penduduk['agama']; ?>">

</div>



<div class="form-group">

<label>Pekerjaan</label>

<input type="text"
name="pekerjaan"
class="form-control"
value="<?= $penduduk['pekerjaan']; ?>">

</div>



<div class="form-group">

<label>Status Perkawinan</label>

<input type="text"
name="status_perkawinan"
class="form-control"
value="<?= $penduduk['status_perkawinan']; ?>">

</div>



<button class="btn btn-success">
Simpan Perubahan
</button>


<a href="<?=base_url('penduduk/penduduk')?>"
class="btn btn-secondary">

Kembali

</a>


</form>


</div>

</div>


</div>