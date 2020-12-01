<?= $this->extend('layout/template_member'); ?>

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
                            <a href="/user" type="button" class="btn btn-success">Back</a>
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
