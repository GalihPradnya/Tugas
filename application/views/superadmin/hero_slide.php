<div class="container-fluid">

    <h1 class="h3 mb-4">
        Hero Slide
    </h1>

    <form action="<?= base_url('hero/tambahSlide'); ?>"
          method="post"
          enctype="multipart/form-data">

        <div class="form-group">
            <input type="file"
                   name="gambar"
                   class="form-control">
        </div>

        <button class="btn btn-success">
            Upload
        </button>

    </form>

    <hr>

    <div class="row">

        <?php foreach($slides as $s): ?>

        <div class="col-md-3">

            <div class="card mb-3">

                <img src="<?= base_url('uploads/hero/'.$s['gambar']); ?>"
                     class="card-img-top">

                <div class="card-body">

                    <a href="<?= base_url('hero/hapusSlide/'.$s['id']); ?>"
                       class="btn btn-danger btn-sm">

                        Hapus

                    </a>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</div>