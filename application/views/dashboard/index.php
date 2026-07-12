<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card mb-4">
        <div class="card-body">
            Selamat datang, <?= isset($user['name']) ? $user['name'] : 'Guest'; ?>.
        </div>
    </div>

</div>
<div style="height:200px;"></div>
<!-- /.container-fluid -->
