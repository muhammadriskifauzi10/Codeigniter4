<?= $this->extend('layouts/main'); ?>

<?= $this->section('contents'); ?>

<div class="container">
    <h1 class="mt-2">Semua blog</h1>
    <div class="mt-3">
        <a href="/add" class="btn btn-primary">Tambah blog</a>
    </div>

    <div class="row mt-3">
        <div class="col-lg-6">
            <?php if (count($blog) > 0) : ?>
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success" rol="alert">
                        <?= session()->getFlashdata('message'); ?>
                    </div>
                <?php endif; ?>

                <form action="/" method="get" class="input-group">
                    <input type="search" name="keyword" class="form-control" placeholder="Cari blog..." value="<?= $keyword; ?>" autofocus>
                    <button class="btn btn-dark" type="submit" id="button-addon2">Cari</button>
                </form>

                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Sampul</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Author</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 + (10 * ($current_page - 1)); ?>
                        <?php foreach ($blog as $row) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td>
                                    <img src="/img/<?= $row['sampul']; ?>" class="sampul">
                                </td>
                                <td class="text-truncate" style="max-width: 50px;"><?= $row['judul']; ?></td>
                                <td class="text-truncate" style="max-width: 50px;"><?= $row['author']; ?></td>
                                <td>
                                    <a href="/edit/<?= $row['slug']; ?>" class="d-inline btn btn-warning" style="width: 80px;">Edit</a>
                                    |
                                    <a href="/detail/<?= $row['slug']; ?>" class="d-inline btn btn-success" style="width: 80px;">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div>
                    <?= $pager->links('blog', 'blog_pagi') ?>
                </div>
            <?php else : ?>
                <p>Data masih kosong!</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>