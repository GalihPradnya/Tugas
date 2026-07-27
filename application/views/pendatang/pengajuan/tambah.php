<div class="container-fluid">


<h1 class="h3 mb-4 text-gray-800">
    Tambah Pengajuan Surat Pendatang
</h1>



<div class="card shadow">

<div class="card-body">


<?= validation_errors('<div class="alert alert-danger">','</div>'); ?>



<form id="formPengajuan"
      action="<?= base_url('pendatang/pengajuan_pendatang/simpan'); ?>"
      method="post"
      enctype="multipart/form-data">





<!-- DATA PENDATANG -->

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






<!-- JENIS SURAT -->

<div class="form-group">


<label>
Jenis Surat
</label>



<select 
name="jenis_surat_id"
id="jenis_surat"
class="form-control"
required>


<option value="">
-- Pilih Surat --
</option>



<?php foreach($jenis_surat as $s): ?>


<option value="<?= $s['id']; ?>">

<?= $s['nama_surat']; ?>

</option>


<?php endforeach; ?>


</select>


</div>







<!-- PERSYARATAN -->

<div id="persyaratan_container"
class="mt-4">

</div>








<!-- KEPERLUAN -->

<div class="form-group mt-4">


<label>
Keperluan
</label>



<textarea
name="keperluan"
class="form-control"
rows="4"
placeholder="Masukkan keperluan surat"
required></textarea>


</div>







<!-- CATATAN -->

<div class="form-group">


<label>
Catatan
</label>


<textarea
name="catatan"
class="form-control"
rows="3"
placeholder="Catatan tambahan"></textarea>


</div>







<button type="submit"
class="btn btn-success">

<i class="fas fa-save"></i>
Simpan

</button>



<a href="<?= base_url('pendatang/pengajuan_pendatang'); ?>"
class="btn btn-secondary">

Kembali

</a>




</form>


</div>

</div>

</div>








<script>

$(document).ready(function(){



$('#jenis_surat').change(function(){


let id = $(this).val();



if(id == '')
{

    $('#persyaratan_container').html('');

    return;

}






$.ajax({


url:
"<?= base_url('pendatang/pengajuan_pendatang/getPersyaratan/'); ?>" + id,


type:'GET',


dataType:'json',



success:function(data){



let html = '';



if(data.length > 0)
{


html += `

<div class="card shadow border-left-success">

<div class="card-body">


<h5 class="text-success font-weight-bold">

<i class="fas fa-upload"></i>
Upload Persyaratan

</h5>

<hr>


`;





$.each(data,function(i,row){



let accept='';



if(row.tipe_file == 'gambar')
{

    accept='.jpg,.jpeg,.png';

}

else if(row.tipe_file == 'pdf')
{

    accept='.pdf';

}

else
{

    accept='.jpg,.jpeg,.png,.pdf';

}





html += `


<div class="form-group">


<label>

${row.nama_persyaratan}

</label>


<input type="file"

name="persyaratan_${row.id}"

class="form-control"

accept="${accept}"

required>



</div>


`;



});




html += `

</div>

</div>

`;



}
else
{


html = `

<div class="alert alert-info">

Tidak ada persyaratan untuk surat ini.

</div>

`;



}




$('#persyaratan_container')
.html(html);



},



error:function(xhr){


console.log(xhr.responseText);



$('#persyaratan_container')
.html(`

<div class="alert alert-danger">

Gagal mengambil data persyaratan.

</div>

`);



}



});



});



});

</script>