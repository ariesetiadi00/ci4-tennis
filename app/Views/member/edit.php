<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-4">EDIT MEMBER</h2>
            <hr>
            <form action="/member/update/<?= $member['id']; ?>" method="POST" enctype="multipart/form-data">
                <!-- CSRF -->
                <?= csrf_field(); ?>
                <!-- Foto Lama -->
                <input type="hidden" name="fotoLama" id="fotoLama" value="<?= $member['foto'] ?>">
                <!-- Foto Baru Upload -->
                <div class="form-group row my-5">
                    <div class="col-4 d-flex align-content-md-center">
                        <img class="foto-preview img-thumbnail img-fluid" src="/img/<?= $member['foto'] ?>">
                    </div>
                    <div class="col-1"></div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="custom-file">
                            <input type="file" id="foto" name="foto" class="custom-file-input<?= ($validation->hasError('foto')) ? ' is-invalid' : ''; ?>" value="<?= old('foto'); ?>" onchange="preview()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                            <label class="custom-file-label foto-label" for="foto"><?= $member['foto'] ?></label>
                        </div>
                    </div>
                </div>
                <!-- Nama -->
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input value="<?= $member['nama']; ?>" type="text" class="form-control" name="nama" id="nama" autofocus required autocomplete="off">
                </div>
                <!-- Foto -->
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input value="<?= $member['foto']; ?>" type="text" class="form-control" name="foto" id="foto" required autocomplete="off">
                </div>
                <!-- Tempat Lahir -->
                <div class="form-group">
                    <label for="tmp_lahir">Tempat Lahir</label>
                    <input value="<?= $member['tmp_lahir']; ?>" type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" required autocomplete="off">
                </div>
                <!-- Tanggal Lahir -->
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input value="<?= $member['tgl_lahir']; ?>" type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-describedby="nameHelp" required autocomplete="off">
                </div>
                <!-- Submit -->
                <button type="submit" class="btn btn-primary mt-3">Ubah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>