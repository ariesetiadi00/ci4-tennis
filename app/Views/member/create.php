<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-4">TAMBAH MEMBER</h2>
            <hr>
            <form action="/member/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row my-5">
                    <div class="col-4 d-flex align-content-md-center">
                        <img class="foto-preview img-thumbnail img-fluid" src="/img/default.png">
                    </div>
                    <div class="col-1"></div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="custom-file">

                            <input type="file" id="foto" name="foto" class="custom-file-input<?= ($validation->hasError('foto')) ? ' is-invalid' : ''; ?>" value="<?= old('foto'); ?>" onchange="preview()">

                            <div class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>

                            <label class="custom-file-label foto-label" for="foto">Upload foto ..</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" autofocus required autocomplete="off" value="<?= old('nama'); ?>">
                </div>
                <div class="form-group">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" required autocomplete="off" value="<?= old('tmp_lahir'); ?>">
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required autocomplete="off" value="<?= old('tgl_lahir'); ?>">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>