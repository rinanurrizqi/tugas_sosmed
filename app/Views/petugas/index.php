<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2>Data Petugas</h2>
    <div class="topbar-user">
        <i class="fas fa-user-circle"></i>
        <span>Admin</span>
    </div>
</div>

<!-- Section Data Petugas -->
<div class="data-akun-section">
    <!-- Header dengan Tombol Tambah -->
    <div class="section-header">
        <h3>
            <i class="fas fa-users"></i>
            Daftar Petugas
        </h3>
        
        <!-- TOMBOL TAMBAH DENGAN HOVER -->
        <a href="<?= base_url('petugas/create') ?>" class="btn-tambah">
            <i class="fas fa-plus"></i>
            Tambah Petugas
        </a>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Petugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($petugas) && is_array($petugas)): ?>
                    <?php foreach ($petugas as $p): ?>
                    <tr>
                        <td><strong><?= $p['id_petugas'] ?></strong></td>
                        <td><?= $p['nama_petugas'] ?></td>
                        <td>
                            <div class="action-buttons">
                                <!-- TOMBOL EDIT DENGAN HOVER -->
                                <a href="<?= base_url('petugas/edit/'.$p['id_petugas']) ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                
                                <!-- TOMBOL HAPUS DENGAN HOVER -->
                                <a href="<?= base_url('petugas/delete/'.$p['id_petugas']) ?>" 
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
                            <i class="fas fa-users-slash" style="font-size: 32px; display: block; margin-bottom: 10px;"></i>
                            Belum ada data petugas
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