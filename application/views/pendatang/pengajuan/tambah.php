<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">

Tambah Pengajuan Surat Pendatang

</h1>



<div class="card shadow">


<div class="card-body">



<form action="<?= base_url(
'pendatang/pengajuan_pendatang/simpan'
); ?>"
method="post">





<div class="form-group">


<label>
Nama Pendatang
</label>


<select name="pendatang_id"
class="form-control"
required>


<option value="">
-- Pilih Pendatang --
</option>



<?php foreach($pendatang as $p): ?>


<option value="<?= $p['id']; ?>">


<?= $p['nama_lengkap']; ?>


</option>



<?php endforeach; ?>


</select>


</div>






<div class="form-group">


<label>
Jenis Surat
</label>


<select name="jenis_surat_id"
class="form-control"
required>


<option>
-- Pilih Surat --
</option>



<?php foreach($jenis_surat as $s): ?>


<option value="<?= $s['id']; ?>">


<?= $s['nama_surat']; ?>


</option>



<?php endforeach; ?>


</select>


</div>







<div class="form-group">


<label>
Keperluan
</label>


<textarea
name="keperluan"
class="form-control"
rows="4"
required></textarea>


</div>






<div class="form-group">


<label>
Catatan
</label>


<textarea
name="catatan"
class="form-control"
rows="3"></textarea>


</div>







<button class="btn btn-success">

Simpan

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