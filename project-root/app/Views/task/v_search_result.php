<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="text-center mt-5 ml-5">
        <h1>The Result</h1>
    </div>
    <div class="container">
        <div class="float-left">
            <form method="get" action="" class="form-group form-inline">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="keywords" placeholder="Nama...">
                            <div class="input-group-append">
                                <a class="btn btn-outline-danger my-2 my-sm-0" href="/mahasiswa" type="button">X</a>
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="Submit">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="float-right">
            <a href="/mahasiswa/add" type="button" class="btn btn-primary my-3">Add Data</a>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $m) : ?>
                <tr>
                    <th scope="row" class="text-center"><?= $i++; ?>.</th>
                    <td class="text-center"><img src="/img/<?= $m->foto; ?>" alt="" class="cover"></td>
                    <td><?= $m->nama; ?></td>
                    <td><?= $m->nim; ?></td>
                    <td><?= $m->kelas; ?></td>
                    <td><?= $m->alamat; ?></td>
                    <td>
                        <div class="text-center">
                            <a href="/mahasiswa/detail/<?= $m->nim; ?>" type="button" class="btn btn-success">Detail</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection('content'); ?>
