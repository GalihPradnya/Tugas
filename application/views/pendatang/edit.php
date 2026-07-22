<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">
    Edit Penduduk Pendatang
</h1>



<div class="card shadow">


<div class="card-body">



<form action="<?= base_url('pendatang/edit/'.$pendatang['id']); ?>"
method="post">





<div class="form-group">

<label>
NIK
</label>

<input type="text"
name="nik"
class="form-control"
value="<?= $pendatang['nik']; ?>">

</div>





<div class="form-group">

<label>
Nama Lengkap
</label>

<input type="text"
name="nama_lengkap"
class="form-control"
value="<?= $pendatang['nama_lengkap']; ?>">

</div>





<div class="form-group">

<label>
Tempat Lahir
</label>


<input type="text"
name="tempat_lahir"
class="form-control"
value="<?= $pendatang['tempat_lahir']; ?>">


</div>





<div class="form-group">

<label>
Tanggal Lahir
</label>


<input type="date"
name="tanggal_lahir"
class="form-control"
value="<?= $pendatang['tanggal_lahir']; ?>">


</div>






<div class="form-group">

<label>
Jenis Kelamin
</label>


<select name="jenis_kelamin"
class="form-control">


<option value="L"
<?= $pendatang['jenis_kelamin']=='L'?'selected':'';?>>

Laki-laki

</option>


<option value="P"
<?= $pendatang['jenis_kelamin']=='P'?'selected':'';?>>

Perempuan

</option>


</select>


</div>






<div class="form-group">

<label>
Asal Daerah
</label>


<input type="text"
name="asal_daerah"
class="form-control"
value="<?= $pendatang['asal_daerah']; ?>">


</div>






<div class="form-group">

<label>
Alamat Asal
</label>


<textarea name="alamat_asal"
class="form-control"
rows="3"><?= $pendatang['alamat_asal']; ?></textarea>


</div>






<div class="form-group">

<label>
Alamat Tinggal
</label>


<textarea name="alamat_tinggal"
class="form-control"
rows="3"><?= $pendatang['alamat_tinggal']; ?></textarea>


</div>






<div class="form-group">

<label>
Nomor HP
</label>


<input type="text"
name="nomor_hp"
class="form-control"
value="<?= $pendatang['nomor_hp']; ?>">


</div>






<div class="form-group">

<label>
Pekerjaan
</label>


<input type="text"
name="pekerjaan"
class="form-control"
value="<?= $pendatang['pekerjaan']; ?>">


</div>







<button class="btn btn-success">

Update

</button>



<a href="<?= base_url('pendatang'); ?>"
class="btn btn-secondary">

Kembali

</a>




</form>


</div>


</div>


</div>