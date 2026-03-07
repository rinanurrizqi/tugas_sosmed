<!DOCTYPE html>
<html>
<head>
    <title>Sistem Tugas Harian</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <!-- Font  -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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