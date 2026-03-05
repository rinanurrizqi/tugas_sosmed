<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="topbar">
    <?= isset($facebook) ? 'Edit Akun Facebook' : 'Tambah Akun Facebook' ?>
</div>

<div class="card">
    <form method="post"
          action="<?= isset($facebook)
                ? base_url('facebook/update/'.$facebook['id_facebook'])
                : base_url('facebook/store') ?>">

        <label>Link Facebook</label>
        <input type="text"
               name="link_facebook"
               value="<?= $facebook['link_facebook'] ?? '' ?>"
               required>

        <br><br>
        <button type="submit" class="btn-primary">Simpan</button>
        <a href="<?= base_url('facebook') ?>">Kembali</a>

    </form>
</div>

<?= $this->endSection() ?>