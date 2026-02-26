<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- CSS !-->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<!-- FONT !-->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<h2 style="margin-bottom:20px">Dashboard</h2>

<div class="cards">

    <div class="card">
        <div class="card-title">Jadwal Hari Ini</div>
        <div class="card-value" style="color:#2563eb">0</div>
    </div>

    <div class="card">
        <div class="card-title">Tugas Selesai</div>
        <div class="card-value" style="color:#16a34a">0</div>
    </div>

    <div class="card">
        <div class="card-title">Belum Selesai</div>
        <div class="card-value" style="color:#dc2626">0</div>
    </div>

</div>

<?= $this->endSection() ?>