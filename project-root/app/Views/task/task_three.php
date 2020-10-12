<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="text-center">
        <h1>Tabel Mahasiswa</h1>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $m) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $m['nama']; ?></td>
                <td><?= $m['nim']; ?></td>
                <td><?= $m['kelas']; ?></td>
                <td><?= $m['alamat']; ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection('content'); ?>