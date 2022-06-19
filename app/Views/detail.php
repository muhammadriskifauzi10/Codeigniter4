<?= $this->extend('layouts/main'); ?>

<?= $this->section('contents'); ?>

<div class="container">
    <h1 class="mt-2">Detail blog</h1>
    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card" style="width: 18rem;">
                <img src="/img/<?= $blog['sampul']; ?>" class="card-img-top" alt="sampul">
                <div class="card-body">
                    <h5 class="card-title"><?= $blog['judul']; ?></h5>
                    <p class="card-text">Author : <?= $blog['author']; ?></p>
                    <p class="card-text">Kategori : <?= $blog['category']; ?></p>
                    <a href="/">Kembali</a>
                    |
                    <form action="/detail/delete/<?= $blog['id'] ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="delete">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>