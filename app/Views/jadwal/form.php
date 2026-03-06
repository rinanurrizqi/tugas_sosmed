<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2><?= isset($jadwal) ? 'Edit Jadwal' : 'Tambah Jadwal' ?></h2>
</div>

<!-- Error Messages -->
<?php if (session()->getFlashdata('errors')): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Form -->
<div style="max-width: 800px; margin: 0 auto; background: white; border-radius: 20px; padding: 30px; border: 1px solid #e2e8f0;">
    
    <form method="post" action="<?= isset($jadwal) ? base_url('jadwal/update/'.$jadwal['id_jadwal']) : base_url('jadwal/store') ?>">
        
        <?= csrf_field() ?>
        
        <!-- ID Jadwal -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">ID Jadwal</label>
            <input type="text" name="id_jadwal" value="<?= old('id_jadwal', $jadwal['id_jadwal'] ?? '') ?>" placeholder="Contoh: J001" style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px;" <?= isset($jadwal) ? 'readonly' : '' ?> required>
        </div>

        <!-- Hari, Jam, Petugas -->
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; margin-bottom: 20px;">
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Hari</label>
                <select name="hari_jadwal" style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px;" required>
                    <option value="">Pilih</option>
                    <?php
                    $hari_list = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
                    $selected = old('hari_jadwal', $jadwal['hari_jadwal'] ?? '');
                    foreach($hari_list as $h): ?>
                        <option value="<?= $h ?>" <?= $selected == $h ? 'selected' : '' ?>><?= $h ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Jam</label>
                <input type="time" name="jam_jadwal" value="<?= old('jam_jadwal', $jadwal['jam_jadwal'] ?? '') ?>" style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px;" required>
            </div>
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Petugas</label>
                <select name="id_petugas" style="width: 100%; padding: 12px; border: 2px solid #e2e8f0; border-radius: 10px;" required>
                    <option value="">Pilih</option>
                    <?php $selected_petugas = old('id_petugas', $jadwal['id_petugas'] ?? ''); ?>
                    <?php foreach ($petugas as $p): ?>
                        <option value="<?= $p['id_petugas'] ?>" <?= $selected_petugas == $p['id_petugas'] ? 'selected' : '' ?>>
                            <?= $p['nama_petugas'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- 6 Platform -->
        <?php
        $platforms = [
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'tiktok' => 'TikTok',
            'email' => 'Email',
            'website' => 'Website',
            'wa' => 'WhatsApp'
        ];
        
        foreach ($platforms as $key => $label):
            $id_field = 'id_' . $key;
            $detail_field = 'detail_tugas_' . $key;
        ?>
        <div style="margin-bottom: 20px; padding: 15px; background: #f8fafc; border-radius: 10px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;"><?= $label ?></label>
            <input type="text" name="<?= $id_field ?>" value="<?= old($id_field, $jadwal[$id_field] ?? '') ?>" placeholder="ID <?= $label ?>" style="width: 100%; padding: 10px; border: 2px solid #e2e8f0; border-radius: 10px; margin-bottom: 10px;">
            <textarea name="<?= $detail_field ?>" rows="2" placeholder="Detail tugas <?= $label ?>" style="width: 100%; padding: 10px; border: 2px solid #e2e8f0; border-radius: 10px;"><?= old($detail_field, $jadwal[$detail_field] ?? '') ?></textarea>
        </div>
        <?php endforeach; ?>

        <!-- Tombol -->
        <div style="display: flex; gap: 15px; justify-content: center; margin-top: 30px;">
            <button type="submit" style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 40px; border-radius: 50px; font-weight: 600; cursor: pointer;">Simpan</button>
            <a href="<?= base_url('jadwal') ?>" style="background: white; color: #64748b; border: 2px solid #e2e8f0; padding: 12px 40px; border-radius: 50px; font-weight: 600; text-decoration: none;">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>