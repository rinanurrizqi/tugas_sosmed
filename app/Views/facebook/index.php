<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- CSS !-->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<div class="topbar">Data Akun Facebook</div>

<a href="<?= base_url('facebook/create') ?>" class="btn-primary">+ Tambah Akun</a>

<div class="card" style="margin-top:20px;">
    <table width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Link Facebook</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php if(!empty($facebook)): ?>
            <?php foreach($facebook as $fb): ?>
            <tr>
                <td><?= $fb['id_facebook'] ?></td>
                <td><?= $fb['link_facebook'] ?></td>
                <td>
                    <a href="<?= base_url('facebook/edit/'.$fb['id_facebook']) ?>">Edit</a>
                    <a href="<?= base_url('facebook/delete/'.$fb['id_facebook']) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
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