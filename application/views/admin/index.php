<div class="container-fluid px-5">

<h1 class="h3 mb-4 text-gray-800">
    <?= $title; ?>
</h1>


<div class="row">


<!-- Penduduk -->
<div class="col-xl-4 col-md-6 mb-4">

<a href="<?= base_url('penduduk/penduduk'); ?>" class="text-decoration-none">

<div class="card border-left-primary shadow h-100 py-2">

<div class="card-body">

<div class="row align-items-center">

<div class="col">

<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
Penduduk
</div>

<div class="h5 mb-0 font-weight-bold text-gray-800">
<?= $jumlahPenduduk; ?>
</div>

</div>


<div class="col-auto">
<i class="fas fa-users fa-2x text-gray-300"></i>
</div>


</div>

</div>

</div>

</a>

</div>




<!-- Akun Penduduk -->
<div class="col-xl-4 col-md-6 mb-4">

<a href="<?= base_url('penduduk/penduduk/akun'); ?>" class="text-decoration-none">

<div class="card border-left-success shadow h-100 py-2">


<div class="card-body">


<div class="row align-items-center">


<div class="col">

<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
Akun Penduduk
</div>


<div class="h5 mb-0 font-weight-bold text-gray-800">
<?= $jumlahAkun; ?>
</div>


</div>


<div class="col-auto">
<i class="fas fa-user-lock fa-2x text-gray-300"></i>
</div>


</div>


</div>


</div>

</a>

</div>





<!-- Pendatang -->
<div class="col-xl-4 col-md-6 mb-4">

<a href="<?= base_url('pendatang/pendatang'); ?>" class="text-decoration-none">


<div class="card border-left-warning shadow h-100 py-2">


<div class="card-body">


<div class="row align-items-center">


<div class="col">


<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
Pendatang
</div>


<div class="h5 mb-0 font-weight-bold text-gray-800">
<?= $jumlahPendatang; ?>
</div>


</div>


<div class="col-auto">
<i class="fas fa-user-plus fa-2x text-gray-300"></i>
</div>


</div>


</div>


</div>

</a>

</div>





<!-- Laporan Pendatang -->
<div class="col-xl-4 col-md-6 mb-4">

<a href="<?= base_url('pendatang/laporan_pendatang_admin'); ?>" class="text-decoration-none">


<div class="card border-left-info shadow h-100 py-2">


<div class="card-body">


<div class="row align-items-center">


<div class="col">


<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
Laporan Pendatang
</div>


<div class="h5 mb-0 font-weight-bold text-gray-800">
<?= $jumlahLaporanPendatang; ?>
</div>


</div>


<div class="col-auto">
<i class="fas fa-address-card fa-2x text-gray-300"></i>
</div>


</div>


</div>


</div>


</a>

</div>





<!-- Pengajuan Surat -->
<div class="col-xl-4 col-md-6 mb-4">


<a href="<?= base_url('surat/Pengajuan_admin/pengajuan_admin'); ?>" class="text-decoration-none">


<div class="card border-left-danger shadow h-100 py-2">


<div class="card-body">


<div class="row align-items-center">


<div class="col">


<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
Pengajuan Surat
</div>


<div class="h5 mb-0 font-weight-bold text-gray-800">
<?= $jumlahPengajuan; ?>
</div>


</div>


<div class="col-auto">
<i class="fas fa-file-alt fa-2x text-gray-300"></i>
</div>


</div>


</div>


</div>


</a>


</div>





<!-- Pengaduan -->
<div class="col-xl-4 col-md-6 mb-4">


<a href="<?= base_url('pengaduan/pengaduan_admin'); ?>" class="text-decoration-none">


<div class="card border-left-secondary shadow h-100 py-2">


<div class="card-body">


<div class="row align-items-center">


<div class="col">


<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
Pengaduan Masyarakat
</div>


<div class="h5 mb-0 font-weight-bold text-gray-800">
<?= $jumlahPengaduan; ?>
</div>


</div>


<div class="col-auto">
<i class="fas fa-bullhorn fa-2x text-gray-300"></i>
</div>


</div>


</div>


</div>


</a>


</div>


</div>


</div>