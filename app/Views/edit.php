<?= $this->extend('layouts/main'); ?>

<?= $this->section('contents'); ?>

<div class="container">
    <h1 class="mt-2">Edit blog</h1>
    <div class="row mt-3">
        <div class="col-lg-6">
            <form action="/edit/update/<?= $blog['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="card mb-3" style="width: 18rem;">
                    <img src="/img/<?= $blog['sampul']; ?>" class="card-img-top" alt="sampul">
                </div>
                <input type="hidden" name="judul_lama" value="<?= $blog['judul']; ?>">
                <input type="hidden" name="slug" value="<?= $blog['slug']; ?>">
                <input type="hidden" name="sampul_lama" value="<?= $blog['sampul']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul blog</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul') ? 'is-invalid' : '') ?>" id="judul" name="judul" placeholder="Judul blog..." value="<?= (old('judul')) ? old('judul') : $blog['judul'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author blog</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="author blog..." value="<?= (old('author')) ? old('author') : $blog['author'] ?>">
                </div>
                <div class="mb-3">
                    <label for="sampul" class="form-label">Pilih gambar</label>
                    <input class="form-control <?= ($validation->hasError('sampul') ? 'is-invalid' : '') ?>" type="file" name="sampul" id="sampul" value="<?= (old('sampul')) ? old('sampul') : $blog['sampul'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">Edit blog</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>