<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="topbar">
    <h2>Data Akun TikTok</h2>
    <div class="topbar-user">
        <i class="fas fa-user-circle"></i>
        <span>Admin</span>
    </div>
</div>

<div class="data-akun-section">
    <div class="section-header">
        <h3>
            <i class="fab fa-tiktok"></i> Daftar Akun TikTok
        </h3>
        <a href="<?= base_url('tiktok/create') ?>" class="btn-tambah">
            <i class="fas fa-plus"></i> Tambah Akun
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Link TikTok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($tiktok) && is_array($tiktok)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($tiktok as $tt): ?>
                    <tr>
                        <td><strong><?= $no++ ?></strong></td>
                        <td><?= $tt['id_tiktok'] ?></td>
                        <td>
                            <a href="<?= $tt['link_tiktok'] ?>" target="_blank" style="color: #3b82f6; text-decoration: none;">
                                <i class="fab fa-tiktok" style="margin-right: 5px;"></i>
                                <?= $tt['link_tiktok'] ?>
                            </a>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="<?= base_url('tiktok/edit/'.$tt['id_tiktok']) ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <form action="<?= base_url('tiktok/delete/'.$tt['id_tiktok']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn-hapus">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 40px; color: #64748b;">
                            Belum ada data akun TikTok
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    /* ... Copy paste saja bagian <style> dari Instagram index.php kamu ke sini ... */
</style>

<?= $this->endSection() ?>