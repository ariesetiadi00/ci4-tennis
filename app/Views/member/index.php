<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-4 mb-2">MEMBER TENNIS</h2>
            <a href="/member/create" class="btn btn-primary mb-4 mt-2">Tambah Member</a>
            <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php
                if ($member == null) {
                    echo "Member Tidak Ditemukan";
                }
                ?>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($member as $m) : ?>
                        <tr>
                            <th scope="row"> <?= $i++; ?> </th>
                            <td><img class="foto" src="/img/<?= $m['foto']; ?>" alt="profile"></td>
                            <td> <?= $m['nama']; ?> </td>
                            <td><a href="/member/<?= $m['id']; ?>/<?= $m['slug']; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>