<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Add Berita</h2>
            <form action="/berita/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
<!--                <div class="form-group row">-->
<!--                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>-->
<!--                    <div class="col-sm-10 border-radius">-->
<!--                        <input type="text" class="form-control" id="nim" name="nim" autofocus>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="isi" name="isi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="author" name="author">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/berita" type="button" class="btn btn-success">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>
