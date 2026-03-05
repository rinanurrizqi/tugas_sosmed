<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2>Data Akun TikTok</h2>
    <div class="topbar-user">
        <i class="fas fa-user-circle"></i>
        <span>Admin</span>
    </div>
</div>

<!-- Section Data TikTok -->
<div class="data-akun-section">
    <div class="section-header">
        <h3>
            <i class="fab fa-tiktok"></i>
            Daftar Akun TikTok
        </h3>

        <a href="<?= base_url('tiktok/create') ?>" class="btn-tambah">
            <i class="fas fa-plus"></i>
            Tambah Akun
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
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
                        <td><?= $tt['link_tiktok'] ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="<?= base_url('tiktok/edit/'.$tt['id_tiktok']) ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                <a href="<?= base_url('tiktok/delete/'.$tt['id_tiktok']) ?>" 
                                   class="btn-hapus"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="text-align: center; padding: 40px; color: #64748b;">
                            <i class="fab fa-tiktok" style="font-size: 32px; display: block; margin-bottom: 10px;"></i>
                            Belum ada data akun TikTok
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>