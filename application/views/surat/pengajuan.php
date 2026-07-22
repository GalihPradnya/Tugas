<main class="container mx-auto py-12 px-4">

<div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-8 md:p-10">


<h2 class="text-3xl font-bold text-center text-green-700 mb-2">
    Form Pengajuan Surat
</h2>

<p class="text-center text-gray-500 mb-8">
    Silakan isi formulir berikut dengan benar.
</p>


<?php if($this->session->flashdata('success')): ?>

<div class="bg-green-100 text-green-700 p-3 rounded mb-5">

<?= $this->session->flashdata('success'); ?>

</div>

<?php endif; ?>


<?php if($this->session->flashdata('error')): ?>

<div class="bg-red-100 text-red-700 p-3 rounded mb-5">

<?= $this->session->flashdata('error'); ?>

</div>

<?php endif; ?>



<form action="<?= base_url('surat/pengajuan/simpan'); ?>"
      method="post"
      enctype="multipart/form-data">


<!-- DATA PEMOHON -->

<h3 class="text-xl font-semibold mb-6 text-gray-700 border-b pb-3">
    Data Pemohon
</h3>


<div class="grid md:grid-cols-2 gap-5">


<div>

<label class="font-semibold">
NIK
</label>

<input
type="text"
class="w-full border rounded p-2 mt-1 bg-gray-100"
value="<?= $penduduk['nik']; ?>"
readonly>

</div>



<div>

<label class="font-semibold">
Nama Lengkap
</label>

<input
type="text"
class="w-full border rounded p-2 mt-1 bg-gray-100"
value="<?= $penduduk['nama_lengkap']; ?>"
readonly>

</div>



<div>

<label class="font-semibold">
Tempat Lahir
</label>

<input
type="text"
class="w-full border rounded p-2 mt-1 bg-gray-100"
value="<?= $penduduk['tempat_lahir']; ?>"
readonly>

</div>




<div>

<label class="font-semibold">
Tanggal Lahir
</label>

<input
type="text"
class="w-full border rounded p-2 mt-1 bg-gray-100"
value="<?= $penduduk['tanggal_lahir']; ?>"
readonly>

</div>



<div>

<label class="font-semibold">
Jenis Kelamin
</label>

<input
type="text"
class="w-full border rounded p-2 mt-1 bg-gray-100"
value="<?= $penduduk['jenis_kelamin']; ?>"
readonly>

</div>



<div>

<label class="font-semibold">
No HP
</label>

<input
type="text"
name="hp"
class="w-full border rounded p-2 mt-1"
placeholder="Nomor HP">

</div>


</div>



<div class="mt-5">

<label class="font-semibold">
Alamat
</label>


<textarea
class="w-full border rounded p-2 mt-1 bg-gray-100"
rows="3"
readonly><?= 
$penduduk['alamat']; 

?>
</textarea>

</div>



<div class="grid md:grid-cols-2 gap-5 mt-5">


<div>

<label class="font-semibold">
RT
</label>

<input
type="text"
class="w-full border rounded p-2 mt-1 bg-gray-100"
value="<?= $penduduk['rt']; ?>"
readonly>

</div>



<div>

<label class="font-semibold">
RW
</label>

<input
type="text"
class="w-full border rounded p-2 mt-1 bg-gray-100"
value="<?= $penduduk['rw']; ?>"
readonly>

</div>


</div>




<!-- JENIS SURAT -->

<h3 class="text-xl font-semibold mt-10 mb-6 text-gray-700 border-b pb-3">
    Jenis Surat
</h3>



<select
name="jenis_surat_id"
id="jenis_surat"
class="w-full border rounded p-2"
required>


<option value="">
-- Pilih Surat --
</option>



<?php foreach($jenis_surat as $js): ?>


<option value="<?= $js['id']; ?>">

<?= $js['nama_surat']; ?>

</option>


<?php endforeach; ?>


</select>





<!-- PERSYARATAN -->

<div id="persyaratan_container"
class="mt-8">

</div>





<!-- KEPERLUAN -->

<div class="mt-6">


<label class="font-semibold">
Keperluan
</label>


<textarea
name="keperluan"
rows="4"
class="w-full border rounded-lg p-3 mt-2"
placeholder="Masukkan keperluan surat"
required></textarea>


</div>





<!-- CATATAN -->

<div class="mt-6">


<label class="font-semibold">
Catatan
</label>


<textarea
name="catatan"
rows="4"
class="w-full border rounded-lg p-3 mt-2"
placeholder="Catatan tambahan">

</textarea>


</div>





<!-- CHECKBOX -->

<div class="mt-6">


<label class="flex items-center">


<input
type="checkbox"
required
class="mr-2">


Saya menyatakan data yang saya isi benar.


</label>


</div>






<!-- BUTTON -->

<div class="flex justify-end gap-4 mt-10 border-t pt-6">


<a href="<?= base_url('navbar/layanan_publik'); ?>"
class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600">

Batal

</a>



<button
type="submit"
class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">

Ajukan Surat

</button>


</div>



</form>


</div>

</main>






<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script>


$('#jenis_surat').change(function(){


let id = $(this).val();



if(id == '')
{

$('#persyaratan_container').html('');

return;

}



$.ajax({


url :
"<?= base_url('surat/pengajuan/getPersyaratan/'); ?>" + id,


type :
"GET",


dataType :
"json",



success:function(data)
{


let html = '';



html += `

<h3 class="text-xl font-semibold mt-8 mb-4 text-gray-700 border-b pb-2">

Upload Persyaratan

</h3>

`;





$.each(data,function(i,row){



html += `

<div class="mb-4">


<label class="font-semibold">

${row.nama_persyaratan}

</label>



<input

type="file"

name="persyaratan_${row.id}"

class="w-full border rounded-lg p-3 mt-2"

required>


</div>


`;



});



$('#persyaratan_container').html(html);



}



});



});


</script>