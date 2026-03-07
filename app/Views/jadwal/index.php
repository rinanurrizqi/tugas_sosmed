<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2>Penjadwalan Tugas Harian</h2>
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

<!-- Filter Section dengan style yang sama seperti halaman lain -->
<div class="filter-section" style="background: white; border-radius: 20px; padding: 20px; margin-bottom: 20px; border: 1px solid #e2e8f0; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
    <form method="post" action="<?= base_url('jadwal/filter') ?>" style="display: flex; gap: 15px; flex-wrap: wrap; align-items: flex-end;">
        <?= csrf_field() ?>
        
        <div style="flex: 1; min-width: 200px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600; font-size: 13px; color: #475569;">
                <i class="fas fa-calendar-day" style="margin-right: 5px; color: #3b82f6;"></i>
                Filter Hari
            </label>
            <select name="hari" style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 14px; transition: all 0.3s ease; outline: none;">
                <option value="">Semua Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>
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
            <!-- Tombol Filter dengan bentuk bulat -->
            <button type="submit" class="btn-filter" style="background: #3b82f6; color: white; border: none; padding: 12px 25px; border-radius: 50px; font-weight: 600; font-size: 14px; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fas fa-filter"></i> Filter
            </button>
            
            <!-- Tombol Tambah Jadwal dengan bentuk bulat -->
            <a href="<?= base_url('jadwal/create') ?>" class="btn-tambah" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 25px; border-radius: 50px; font-weight: 600; font-size: 14px; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; box-shadow: 0 8px 20px -4px rgba(59, 130, 246, 0.5); position: relative; overflow: hidden;">
                <i class="fas fa-plus"></i> Tambah Jadwal
            </a>
        </div>
    </form>
</div>

<!-- Section Jadwal Tugas -->
<div class="data-akun-section" style="background: white; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
    <div class="section-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 15px;">
        <h3 style="font-size: 20px; font-weight: 600; color: #0f172a; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-calendar-alt" style="color: #3b82f6; font-size: 24px;"></i>
            Daftar Jadwal Tugas
        </h3>
        <span style="background: #e2e8f0; padding: 5px 12px; border-radius: 30px; font-size: 13px; color: #475569;">
            <i class="fas fa-clock"></i> Total: <?= !empty($jadwal) ? count($jadwal) : 0 ?> Jadwal
        </span>
    </div>

    <!-- Table Container dengan scroll horizontal -->
    <div class="table-container" style="overflow-x: auto; border-radius: 16px; border: 1px solid #e2e8f0;">
        <table style="min-width: 1300px; width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: linear-gradient(135deg, #f8fafc, #f1f5f9);">
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">No</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">ID Jadwal</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">Hari</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">Jam</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">Petugas</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">Instagram</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">Facebook</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">TikTok</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">Email</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">Website</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">WhatsApp</th>
                    <th style="padding: 16px 12px; text-align: left; font-weight: 600; color: #475569; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 2px solid #e2e8f0;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jadwal) && is_array($jadwal)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($jadwal as $j): ?>
                    <tr style="transition: all 0.3s ease; border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 16px 12px; font-weight: 600;"><?= $no++ ?></td>
                        <td style="padding: 16px 12px;"><span style="background: #e2e8f0; padding: 4px 8px; border-radius: 8px; font-weight: 600;"><?= $j['id_jadwal'] ?></span></td>
                        <td style="padding: 16px 12px;"><?= $j['hari_jadwal'] ?></td>
                        <td style="padding: 16px 12px;"><?= date('H:i', strtotime($j['jam_jadwal'])) ?></td>
                        <td style="padding: 16px 12px;">
                            <span style="background: #dbeafe; padding: 4px 10px; border-radius: 20px; font-weight: 500; color: #1d4ed8;">
                                <?= $j['nama_petugas'] ?? '-' ?>
                            </span>
                        </td>
                        <td style="padding: 16px 12px;"><?= !empty($j['detail_tugas_instagram']) ? substr($j['detail_tugas_instagram'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 16px 12px;"><?= !empty($j['detail_tugas_facebook']) ? substr($j['detail_tugas_facebook'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 16px 12px;"><?= !empty($j['detail_tugas_tiktok']) ? substr($j['detail_tugas_tiktok'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 16px 12px;"><?= !empty($j['detail_tugas_email']) ? substr($j['detail_tugas_email'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 16px 12px;"><?= !empty($j['detail_tugas_website']) ? substr($j['detail_tugas_website'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 16px 12px;"><?= !empty($j['detail_tugas_wa']) ? substr($j['detail_tugas_wa'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 16px 12px;">
                            <div class="action-buttons" style="display: flex; gap: 8px;">
                                <!-- Tombol Edit -->
                                <a href="<?= base_url('jadwal/edit/'.$j['id_jadwal']) ?>" class="btn-edit" style="padding: 8px 16px; border: none; border-radius: 30px; font-size: 12px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 5px; background: #dbeafe; color: #1d4ed8; text-decoration: none; transition: all 0.3s ease;">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <!-- Tombol Hapus -->
                                <form action="<?= base_url('jadwal/delete/'.$j['id_jadwal']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn-hapus" style="padding: 8px 16px; border: none; border-radius: 30px; font-size: 12px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 5px; background: #fee2e2; color: #dc2626; transition: all 0.3s ease;">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12" style="text-align: center; padding: 60px; color: #64748b;">
                            <i class="fas fa-calendar-times" style="font-size: 48px; display: block; margin-bottom: 20px; color: #cbd5e1;"></i>
                            <p style="font-size: 18px; margin-bottom: 20px;">Belum ada data jadwal</p>
                            <a href="<?= base_url('jadwal/create') ?>" class="btn-tambah" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 14px 32px; border-radius: 50px; font-weight: 600; font-size: 14px; cursor: pointer; display: inline-flex; align-items: center; gap: 10px; text-decoration: none; box-shadow: 0 8px 20px -4px rgba(59, 130, 246, 0.5);">
                                <i class="fas fa-plus"></i> Buat Jadwal Pertama
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
/* Hover effects untuk button */
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

/* Hover efek untuk baris tabel */
tbody tr:hover {
    background: #f8fafc;
}

/* Responsive */
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