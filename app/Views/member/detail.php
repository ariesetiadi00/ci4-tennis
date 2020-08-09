<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-flex align-items-center">
                <a href="/member/index"><img class="back align-middle" src="/img/prev2.png" alt="Back"></a>
                <h2 class="my-3 d-inline">DETAIL MEMBER</h2>
            </div>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters ">
                    <div class="col-md-4 d-flex align-items-center">
                        <img src="/img/<?= $member['foto']; ?>" class="card-img w-75 mx-auto" alt="Profile">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $member['nama']; ?></h5>
                            <span>Kelahiran <?= $member['tmp_lahir'], ", ", date('j F Y', strtotime($member['tgl_lahir'])); ?></span>
                            <span class="d-block mb-3">Bergabung pada <?= date('j F Y', strtotime($member['tgl_join'])); ?></span>
                            <a href="/member/edit/<?= $member['id']; ?>" class="btn btn-primary">Edit</a>
                            <form class="d-inline" action="/member/<?= $member['id']; ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Member Akan Dihapus')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>