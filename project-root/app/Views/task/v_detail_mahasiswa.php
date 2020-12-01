<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card my-3 ml-5" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <?php foreach ($berita as $b) : ?>
                        <div class="col-md-4">
                            <img src="/img/<?= $b->gambar; ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $b->judul; ?></h5>
                                <p class="card-text">ID : <?= $b->id; ?></p>
                                <p class="card-text">Isi : <?= $b->isi; ?></p>
                                <p class="card-text">Author : <?= $b->author; ?></p>
                                <div">
                                    <a href="/berita/update/<?= $b->id; ?>" type="button" class="btn btn-primary">Edit</a>
                                <form action="/berita/delete/<?= $b->id; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                    <a href="/berita" type="button" class="btn btn-success">Back</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection('content'); ?>
