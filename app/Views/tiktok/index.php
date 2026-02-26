<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- CSS !-->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<div class="topbar">Data Akun TikTok</div>

<a href="<?= base_url('tiktok/create') ?>" class="btn-primary">+ Tambah Akun</a>

<div class="card" style="margin-top:20px;">
    <table width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Link TikTok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php if(!empty($tiktok)): ?>
            <?php foreach($tiktok as $tt): ?>
            <tr>
                <td><?= $tt['id_tiktok'] ?></td>
                <td><?= $tt['link_tiktok'] ?></td>
                <td>
                    <a href="<?= base_url('tiktok/edit/'.$tt['id_tiktok']) ?>">Edit</a>
                    <a href="<?= base_url('tiktok/delete/'.$tt['id_tiktok']) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" style="text-align:center;">Belum ada data</td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>
</div>

<?= $this->endSection() ?>