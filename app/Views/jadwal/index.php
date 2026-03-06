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

<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
    <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
        <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Filter & Tombol Tambah -->
<div style="background: white; border-radius: 20px; padding: 20px; margin-bottom: 20px; border: 1px solid #e2e8f0;">
    <form method="post" action="<?= base_url('jadwal/filter') ?>" style="display: flex; gap: 15px; flex-wrap: wrap; align-items: flex-end;">
        <?= csrf_field() ?>
        
        <div style="flex: 1; min-width: 200px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Filter Hari</label>
            <select name="hari" style="width: 100%; padding: 10px; border: 2px solid #e2e8f0; border-radius: 10px;">
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
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Filter Petugas</label>
            <select name="id_petugas" style="width: 100%; padding: 10px; border: 2px solid #e2e8f0; border-radius: 10px;">
                <option value="">Semua Petugas</option>
                <?php foreach ($petugas as $p): ?>
                    <option value="<?= $p['id_petugas'] ?>"><?= $p['nama_petugas'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div>
            <button type="submit" style="background: #3b82f6; color: white; border: none; padding: 10px 25px; border-radius: 10px; font-weight: 600; cursor: pointer;">
                <i class="fas fa-filter"></i> Filter
            </button>
            <a href="<?= base_url('jadwal/create') ?>" style="background: #10b981; color: white; border: none; padding: 10px 25px; border-radius: 10px; font-weight: 600; text-decoration: none; margin-left: 10px;">
                <i class="fas fa-plus"></i> Tambah Jadwal
            </a>
        </div>
    </form>
</div>

<!-- Tabel Jadwal -->
<div style="background: white; border-radius: 20px; padding: 20px; border: 1px solid #e2e8f0;">
    <h3 style="margin-bottom: 20px;">Daftar Jadwal Tugas</h3>
    
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f8fafc;">
                    <th style="padding: 12px; text-align: left;">No</th>
                    <th style="padding: 12px; text-align: left;">ID Jadwal</th>
                    <th style="padding: 12px; text-align: left;">Hari</th>
                    <th style="padding: 12px; text-align: left;">Jam</th>
                    <th style="padding: 12px; text-align: left;">Petugas</th>
                    <th style="padding: 12px; text-align: left;">Instagram</th>
                    <th style="padding: 12px; text-align: left;">Facebook</th>
                    <th style="padding: 12px; text-align: left;">TikTok</th>
                    <th style="padding: 12px; text-align: left;">Email</th>
                    <th style="padding: 12px; text-align: left;">Website</th>
                    <th style="padding: 12px; text-align: left;">WhatsApp</th>
                    <th style="padding: 12px; text-align: left;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jadwal)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($jadwal as $j): ?>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="padding: 12px;"><?= $no++ ?></td>
                        <td style="padding: 12px;"><?= $j['id_jadwal'] ?></td>
                        <td style="padding: 12px;"><?= $j['hari_jadwal'] ?></td>
                        <td style="padding: 12px;"><?= $j['jam_jadwal'] ?></td>
                        <td style="padding: 12px;"><?= $j['nama_petugas'] ?></td>
                        <td style="padding: 12px;"><?= $j['detail_tugas_instagram'] ? substr($j['detail_tugas_instagram'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 12px;"><?= $j['detail_tugas_facebook'] ? substr($j['detail_tugas_facebook'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 12px;"><?= $j['detail_tugas_tiktok'] ? substr($j['detail_tugas_tiktok'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 12px;"><?= $j['detail_tugas_email'] ? substr($j['detail_tugas_email'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 12px;"><?= $j['detail_tugas_website'] ? substr($j['detail_tugas_website'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 12px;"><?= $j['detail_tugas_wa'] ? substr($j['detail_tugas_wa'], 0, 15) . '...' : '-' ?></td>
                        <td style="padding: 12px;">
                            <a href="<?= base_url('jadwal/edit/'.$j['id_jadwal']) ?>" style="background: #dbeafe; color: #1d4ed8; padding: 5px 10px; border-radius: 5px; text-decoration: none; margin-right: 5px;">Edit</a>
                            <form action="<?= base_url('jadwal/delete/'.$j['id_jadwal']) ?>" method="post" style="display: inline;">
                                <?= csrf_field() ?>
                                <button type="submit" style="background: #fee2e2; color: #dc2626; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="12" style="text-align: center; padding: 40px;">Belum ada data jadwal</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>