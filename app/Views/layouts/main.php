<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <style>
        * {
            box-sizing: border-box;
        }

        .sampul {
            width: 70px;
        }

        table * {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <?= $this->include('layouts/navbar'); ?>
    <main>
        <?= $this->renderSection('contents'); ?>
    </main>

    <script src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="<?= base_url('js/index.js'); ?>"></script>
</body>

</html>