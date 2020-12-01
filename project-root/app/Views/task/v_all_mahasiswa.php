<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="text-center mt-5 ml-5">
        <h1>List Berita</h1>
    </div>
    <div class="container">
        <div class="float-left">
            <form method="get" action="" class="form-group form-inline">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="keywords" placeholder="Nama...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="Submit">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="float-right">
            <a href="/berita/add" type="button" class="btn btn-primary my-3">Add Data</a>
        </div>
        <table class="table table-striped table-info">
            <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Author</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = $mulai + 1; ?>
            <?php foreach ($berita as $b) : ?>
                <tr>
                    <th scope="row" class="text-center"><?= $i++; ?>.</th>
                    <td class="text-center"><img src="/img/<?= $b['gambar']; ?>" alt="" class="cover"></td>
                    <td><?= $b['judul']; ?></td>
                    <td><?= $b['isi']; ?></td>
                    <td><?= $b['author']; ?></td>
                    <td>
                        <div class="text-center">
                            <a href="/berita/detail/<?= $b['id']; ?>" type="button" class="btn btn-success">Detail</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <?php
            for ($i=1; $i<=$pager ; $i++){
                ?>
                <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php
            }
            ?>
        </div>
    </div>
<?= $this->endSection('content'); ?>
