<!DOCTYPE html>
<html>
<head>
    <title>Sistem Tugas Harian</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="admin">

    <?= $this->include('layout/sidebar') ?>

    <main class="content">
        <?= $this->include('layout/topbar') ?>
        <?= $this->renderSection('content') ?>
    </main>

</div>

</body>
</html>