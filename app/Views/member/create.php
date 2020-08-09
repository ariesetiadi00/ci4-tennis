<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-4">TAMBAH MEMBER</h2>
            <hr>
            <form action="/member/save" method="POST">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" autofocus required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="text" class="form-control" name="foto" id="foto" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="nameHelp" required autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>