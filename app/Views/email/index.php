<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2>Data Akun Email</h2>
    <div class="topbar-user">
        <i class="fas fa-user-circle"></i>
        <span>Admin</span>
    </div>
</div>

<!-- Tampilkan Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
    <div style="background: #d4edda; color: #155724; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
        <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Section Data Email -->
<div class="data-akun-section">
    <div class="section-header">
        <h3>
            <i class="fas fa-envelope"></i>
            Daftar Akun Email
        </h3>
        <a href="<?= base_url('email/create') ?>" class="btn-tambah">
            <i class="fas fa-plus"></i> Tambah Akun
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Alamat Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($email) && is_array($email)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($email as $em): ?>
                    <tr>
                        <td><strong><?= $no++ ?></strong></td>
                        <td><?= $em['id_email'] ?></td>
                        <td><?= $em['alamat_email'] ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="<?= base_url('email/edit/'.$em['id_email']) ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="<?= base_url('email/delete/'.$em['id_email']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                        <td colspan="4" style="text-align: center; padding: 40px;">
                            <i class="fas fa-envelope" style="font-size: 32px; display: block; margin-bottom: 10px;"></i>
                            Belum ada data akun Email
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
.btn-tambah {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    border: none;
    padding: 14px 32px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px -4px rgba(59, 130, 246, 0.5);
    text-decoration: none;
}
.btn-tambah:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 30px -4px rgba(59, 130, 246, 0.8);
}
.action-buttons {
    display: flex;
    gap: 10px;
}
.btn-edit {
    padding: 8px 16px;
    background: #dbeafe;
    color: #1d4ed8;
    border-radius: 30px;
    text-decoration: none;
    font-size: 12px;
}
.btn-edit:hover {
    background: #3b82f6;
    color: white;
}
.btn-hapus {
    padding: 8px 16px;
    background: #fee2e2;
    color: #dc2626;
    border: none;
    border-radius: 30px;
    font-size: 12px;
    cursor: pointer;
}
.btn-hapus:hover {
    background: #ef4444;
    color: white;
}
</style>

<?= $this->endSection() ?>