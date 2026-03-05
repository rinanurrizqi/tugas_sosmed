<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2><?= isset($tiktok) ? 'Edit Akun TikTok' : 'Tambah Akun TikTok' ?></h2>
    <div class="topbar-user">
        <i class="fas fa-user-circle"></i>
        <span>Admin</span>
    </div>
</div>

<div class="data-akun-section">
    <div class="section-header">
        <h3>
            <i class="fab fa-tiktok"></i>
            <?= isset($tiktok) ? 'Form Edit TikTok' : 'Form Tambah TikTok' ?>
        </h3>
    </div>

    <div class="card" style="padding:30px;">
        <form method="post"
              action="<?= isset($tiktok)
                    ? base_url('tiktok/update/'.$tiktok['id_tiktok'])
                    : base_url('tiktok/store') ?>">

            <label style="font-weight:600;">Link TikTok</label>
            <input type="text"
                   name="link_tiktok"
                   value="<?= $tiktok['link_tiktok'] ?? '' ?>"
                   required
                   style="width:100%; padding:12px; border-radius:8px; border:1px solid #ddd; margin-top:8px;">

            <br><br>

            <div class="action-buttons">
                <button type="submit" class="btn-tambah">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>

                <a href="<?= base_url('tiktok') ?>" class="btn-edit">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection() ?>