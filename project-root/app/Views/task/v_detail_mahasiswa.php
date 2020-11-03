<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card my-3 ml-5" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <?php foreach ($mahasiswa as $m) : ?>
                        <div class="col-md-4">
                            <img src="/img/<?= $m->foto; ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $m->nama; ?></h5>
                                <p class="card-text">NIM : <?= $m->nim; ?></p>
                                <p class="card-text">Kelas : <?= $m->kelas; ?></p>
                                <p class="card-text">Alamat : <?= $m->alamat; ?></p>
                                <div">
                                    <a href="/mahasiswa/update/<?= $m->nim; ?>" type="button" class="btn btn-primary">Edit</a>
                                <form action="/mahasiswa/delete/<?= $m->nim; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                    <a href="/mahasiswa" type="button" class="btn btn-success">Back</a>
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
