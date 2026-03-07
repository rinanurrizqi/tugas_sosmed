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

<!-- Section Data TikTok -->
<div class="data-akun-section">
    <!-- Header dengan Tombol Tambah -->
    <div class="section-header">
        <h3>
            <i class="fab fa-tiktok"></i>
            Daftar Akun TikTok
        </h3>
        
        <!-- Tombol Tambah Akun (TANPA GARIS BAWAH) -->
        <a href="<?= base_url('tiktok/create') ?>" class="btn-tambah">
            <i class="fas fa-plus"></i>
            Tambah Akun
        </a>
    </div>

    <!-- Table Container -->
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
                                <!-- Tombol Edit -->
                                <a href="<?= base_url('tiktok/edit/'.$tt['id_tiktok']) ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <!-- Tombol Hapus - Gunakan POST -->
                                <form action="<?= base_url('tiktok/delete/'.$tt['id_tiktok']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                            <i class="fab fa-tiktok" style="font-size: 32px; display: block; margin-bottom: 10px;"></i>
                            Belum ada data akun TikTok
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
/* ===== TOMBOL TAMBAH ===== */
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
    position: relative;
    overflow: hidden;
}

.btn-tambah:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.7s;
    z-index: 1;
}

.btn-tambah:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 30px -4px rgba(59, 130, 246, 0.8);
}

.btn-tambah:hover:before {
    left: 100%;
}

.btn-tambah i {
    font-size: 16px;
    transition: transform 0.3s ease;
    position: relative;
    z-index: 2;
}

.btn-tambah:hover i {
    transform: rotate(90deg);
}

/* ===== ACTION BUTTONS (EDIT & HAPUS) ===== */
.action-buttons {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

/* TOMBOL EDIT */
.btn-edit {
    padding: 10px 22px;
    border: none;
    border-radius: 40px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #dbeafe;
    color: #1d4ed8;
    border: 1px solid rgba(59, 130, 246, 0.2);
    box-shadow: 0 4px 10px rgba(59, 130, 246, 0.1);
    text-decoration: none;
    position: relative;
    overflow: hidden;
}

.btn-edit:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
    z-index: 0;
}

.btn-edit:hover:before {
    width: 300px;
    height: 300px;
}

.btn-edit:hover {
    background: #3b82f6;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(59, 130, 246, 0.4);
}

.btn-edit i,
.btn-edit span {
    position: relative;
    z-index: 1;
}

.btn-edit:hover i {
    animation: spin 0.5s ease;
}

/* TOMBOL HAPUS */
.btn-hapus {
    padding: 10px 22px;
    border: none;
    border-radius: 40px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fee2e2;
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.2);
    box-shadow: 0 4px 10px rgba(239, 68, 68, 0.1);
    text-decoration: none;
    position: relative;
    overflow: hidden;
}

.btn-hapus:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
    z-index: 0;
}

.btn-hapus:hover:before {
    width: 300px;
    height: 300px;
}

.btn-hapus:hover {
    background: #ef4444;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(239, 68, 68, 0.4);
}

.btn-hapus i,
.btn-hapus span {
    position: relative;
    z-index: 1;
}

.btn-hapus:hover i {
    animation: shake 0.5s ease;
}

/* Animasi */
@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-4px); }
    75% { transform: translateX(4px); }
}

/* Responsive */
@media (max-width: 768px) {
    .section-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .btn-tambah {
        width: 100%;
        justify-content: center;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .btn-edit,
    .btn-hapus {
        width: 100%;
        justify-content: center;
    }
}
</style>

<?= $this->endSection() ?>