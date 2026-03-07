<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2>Progress Harian</h2>
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

<?php if (session()->getFlashdata('errors')): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
        <ul style="margin-left: 20px;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Filter Section -->
<div class="filter-section" style="background: white; border-radius: 20px; padding: 20px; margin-bottom: 20px; border: 1px solid #e2e8f0; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
    <form method="post" action="<?= base_url('progress/filter') ?>" style="display: flex; gap: 15px; flex-wrap: wrap; align-items: flex-end;">
        <?= csrf_field() ?>
        
        <div style="flex: 1; min-width: 200px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600; font-size: 13px; color: #475569;">
                <i class="fas fa-calendar-alt" style="margin-right: 5px; color: #3b82f6;"></i>
                Filter Tanggal
            </label>
            <input type="date" name="tanggal" style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 14px; transition: all 0.3s ease; outline: none;">
        </div>
        
        <div style="flex: 1; min-width: 200px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600; font-size: 13px; color: #475569;">
                <i class="fas fa-user-tie" style="margin-right: 5px; color: #3b82f6;"></i>
                Filter Petugas
            </label>
            <select name="id_petugas" style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 14px; transition: all 0.3s ease; outline: none;">
                <option value="">Semua Petugas</option>
                <?php if (!empty($petugas)): ?>
                    <?php foreach ($petugas as $p): ?>
                        <option value="<?= $p['id_petugas'] ?>"><?= $p['id_petugas'] ?> - <?= $p['nama_petugas'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn-filter" style="background: #3b82f6; color: white; border: none; padding: 12px 25px; border-radius: 50px; font-weight: 600; font-size: 14px; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fas fa-filter"></i> Filter
            </button>
            
            <a href="<?= base_url('progress/create') ?>" class="btn-tambah" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 25px; border-radius: 50px; font-weight: 600; font-size: 14px; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; box-shadow: 0 8px 20px -4px rgba(59, 130, 246, 0.5);">
                <i class="fas fa-plus"></i> Tambah Progress
            </a>
        </div>
    </form>
</div>

<!-- Section Progress -->
<div class="data-akun-section" style="background: white; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
    <div class="section-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;">
        <h3 style="font-size: 20px; font-weight: 600; color: #0f172a; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-chart-line" style="color: #3b82f6; font-size: 24px;"></i>
            Daftar Progress Harian
        </h3>
        <span style="background: #e2e8f0; padding: 5px 12px; border-radius: 30px; font-size: 13px; color: #475569;">
            <i class="fas fa-tasks"></i> Total: <?= !empty($progress) ? count($progress) : 0 ?> Progress
        </span>
    </div>

    <!-- Table Container -->
    <div class="table-container" style="overflow-x: auto; border-radius: 16px; border: 1px solid #e2e8f0;">
        <table style="min-width: 1200px; width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: linear-gradient(135deg, #f8fafc, #f1f5f9);">
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">No</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">ID Progress</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">Tanggal</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">Petugas</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">Instagram</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">Facebook</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">TikTok</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">Email</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">Website</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">WhatsApp</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($progress) && is_array($progress)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($progress as $p): ?>
                    <tr style="transition: all 0.3s ease; border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 16px 12px; font-weight: 600;"><?= $no++ ?></td>
                        <td style="padding: 16px 12px;"><span style="background: #e2e8f0; padding: 4px 8px; border-radius: 8px;"><?= $p['id_progress'] ?></span></td>
                        <td style="padding: 16px 12px;"><?= date('d-m-Y', strtotime($p['tanggal_progress'])) ?></td>
                        <td style="padding: 16px 12px;">
                            <span style="background: #dbeafe; padding: 4px 10px; border-radius: 20px; color: #1d4ed8;">
                                <?= $p['nama_petugas'] ?? '-' ?>
                            </span>
                        </td>
                        <td style="padding: 16px 12px; max-width: 150px;">
                            <?= !empty($p['progress_tugas_instagram']) ? substr($p['progress_tugas_instagram'], 0, 20) . '...' : '-' ?>
                        </td>
                        <td style="padding: 16px 12px; max-width: 150px;">
                            <?= !empty($p['progress_tugas_facebook']) ? substr($p['progress_tugas_facebook'], 0, 20) . '...' : '-' ?>
                        </td>
                        <td style="padding: 16px 12px; max-width: 150px;">
                            <?= !empty($p['progress_tugas_tiktok']) ? substr($p['progress_tugas_tiktok'], 0, 20) . '...' : '-' ?>
                        </td>
                        <td style="padding: 16px 12px; max-width: 150px;">
                            <?= !empty($p['progress_tugas_email']) ? substr($p['progress_tugas_email'], 0, 20) . '...' : '-' ?>
                        </td>
                        <td style="padding: 16px 12px; max-width: 150px;">
                            <?= !empty($p['progress_tugas_website']) ? substr($p['progress_tugas_website'], 0, 20) . '...' : '-' ?>
                        </td>
                        <td style="padding: 16px 12px; max-width: 150px;">
                            <?= !empty($p['progress_tugas_wa']) ? substr($p['progress_tugas_wa'], 0, 20) . '...' : '-' ?>
                        </td>
                        <td style="padding: 16px 12px;">
                            <div class="action-buttons" style="display: flex; gap: 8px;">
                                <a href="<?= base_url('progress/edit/'.$p['id_progress']) ?>" class="btn-edit" style="padding: 8px 16px; border: none; border-radius: 30px; font-size: 12px; font-weight: 600; background: #dbeafe; color: #1d4ed8; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="<?= base_url('progress/delete/'.$p['id_progress']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus progress ini?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn-hapus" style="padding: 8px 16px; border: none; border-radius: 30px; font-size: 12px; font-weight: 600; background: #fee2e2; color: #dc2626; display: inline-flex; align-items: center; gap: 5px; cursor: pointer;">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11" style="text-align: center; padding: 60px; color: #64748b;">
                            <i class="fas fa-chart-line" style="font-size: 48px; display: block; margin-bottom: 20px; color: #cbd5e1;"></i>
                            <p style="font-size: 18px; margin-bottom: 20px;">Belum ada data progress</p>
                            <a href="<?= base_url('progress/create') ?>" class="btn-tambah" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 14px 32px; border-radius: 50px; font-weight: 600; font-size: 14px; text-decoration: none; display: inline-flex; align-items: center; gap: 10px;">
                                <i class="fas fa-plus"></i> Tambah Progress Pertama
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
/* Hover effects */
.btn-filter:hover {
    background: #2563eb !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}

.btn-tambah:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 30px -4px rgba(59, 130, 246, 0.8) !important;
}

.btn-edit:hover {
    background: #3b82f6 !important;
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}

.btn-hapus:hover {
    background: #ef4444 !important;
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 16px rgba(239, 68, 68, 0.3);
}

tbody tr:hover {
    background: #f8fafc;
}

@media (max-width: 768px) {
    .filter-section form {
        flex-direction: column;
    }
    .filter-section form > div {
        width: 100%;
    }
    .btn-filter, .btn-tambah {
        width: 100%;
        justify-content: center;
    }
}
</style>

<?= $this->endSection() ?>