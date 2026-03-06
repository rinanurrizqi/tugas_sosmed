<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="topbar">
    <?= isset($tiktok) ? 'Edit Akun TikTok' : 'Tambah Akun TikTok' ?>
</div>

<div class="card">
    <form method="post"
          action="<?= isset($tiktok)
                ? base_url('tiktok/update/'.$tiktok['id_tiktok'])
                : base_url('tiktok/store') ?>">

        <label>Link TikTok</label>
        <input type="text"
               name="link_tiktok"
               value="<?= $tiktok['link_tiktok'] ?? '' ?>"
               required>

        <br><br>
        <button type="submit" class="btn-primary">Simpan</button>
        <a href="<?= base_url('tiktok') ?>">Kembali</a>

    </form>
</div>

<?= $this->endSection() ?>