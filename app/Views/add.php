<?= $this->extend('layouts/main'); ?>

<?= $this->section('contents'); ?>

<div class="container">
    <h1 class="mt-2">Add blog</h1>

    <?php //$validation->listErrors(); 
    ?>

    <div class="row mt-3">
        <div class="col-lg-6">
            <form action="/add/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul blog</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul') ? 'is-invalid' : '') ?>" id="judul" name="judul" placeholder="Judul blog..." value="<?= old('judul') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author blog</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="author blog..." value="<?= old('author') ?>">
                </div>
                <div class="mb-3">
                    <?php foreach ($category as $c) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="choice_category<?= $c['id']; ?>" value="<?= $c['category']; ?>" onclick="radioCheck(<?= $c['id']; ?>)">
                            <label class="form-check-label" for="choice_category<?= $c['id']; ?>">
                                <?= $c['category']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mb-3" id="learning">
                </div>
                <div class="mb-3">
                    <label for="sampul" class="form-label">Pilih gambar</label>
                    <input class="form-control <?= ($validation->hasError('sampul') ? 'is-invalid' : '') ?>" type="file" name="sampul" id="sampul">
                    <div class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Tambah blog</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>