<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2><?= isset($jadwal) ? 'Edit Jadwal Tugas' : 'Tambah Jadwal Tugas' ?></h2>
    <div class="topbar-user">
        <i class="fas fa-user-circle"></i>
        <span>Admin</span>
    </div>
</div>

<!-- Tampilkan Error Validation -->
<?php if (session()->getFlashdata('errors')): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
        <ul style="margin-left: 20px;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Form Container -->
<div class="form-container" style="max-width: 1000px; margin: 20px auto; background: white; border-radius: 30px; padding: 35px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
    
    <form method="post" action="<?= isset($jadwal) ? base_url('jadwal/update/'.$jadwal['id_jadwal']) : base_url('jadwal/store') ?>">
        
        <!-- CSRF Protection -->
        <?= csrf_field() ?>
        
        <!-- Header Form -->
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fas fa-calendar-alt" style="font-size: 48px; color: #3b82f6; margin-bottom: 10px;"></i>
            <h3 style="color: #0f172a; font-size: 24px; font-weight: 600;"><?= isset($jadwal) ? 'Edit Jadwal Tugas' : 'Tambah Jadwal Tugas' ?></h3>
            <p style="color: #64748b; font-size: 14px;">Isi form berikut untuk <?= isset($jadwal) ? 'mengubah' : 'menambahkan' ?> jadwal tugas</p>
        </div>
        
        <!-- Baris 1: ID Jadwal (Full Width) -->
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a; font-size: 15px;">
                <i class="fas fa-hashtag" style="color: #3b82f6; margin-right: 5px;"></i>
                ID Jadwal <span style="color: #ef4444;">*</span>
            </label>
            <input type="text" 
                   name="id_jadwal"
                   style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box; background: <?= isset($jadwal) ? '#f8fafc' : 'white' ?>;"
                   value="<?= old('id_jadwal', $jadwal['id_jadwal'] ?? '') ?>"
                   placeholder="Contoh: J001"
                   <?= isset($jadwal) ? 'readonly' : '' ?>
                   onmouseover="this.style.borderColor='#60a5fa'"
                   onmouseout="this.style.borderColor='#e2e8f0'"
                   onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                   onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                   required>
            <?php if (!isset($jadwal)): ?>
                <div style="font-size: 12px; color: #64748b; margin-top: 5px; margin-left: 5px;">
                    <i class="fas fa-info-circle" style="color: #3b82f6;"></i> ID bersifat unik dan tidak bisa diubah setelah dibuat
                </div>
            <?php endif; ?>
        </div>

        <!-- Baris 2: Hari, Jam, dan Petugas (3 Kolom) - WAJIB DIISI -->
        <div style="display: grid; grid-template-columns: 1fr 1fr 1.5fr; gap: 20px; margin-bottom: 30px;">
            
            <!-- Hari - WAJIB -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a; font-size: 14px;">
                    <i class="fas fa-calendar-day" style="color: #3b82f6; margin-right: 5px;"></i>
                    Hari <span style="color: #ef4444;">*</span>
                </label>
                <select name="hari_jadwal" 
                        style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; cursor: pointer;"
                        onmouseover="this.style.borderColor='#60a5fa'"
                        onmouseout="this.style.borderColor='#e2e8f0'"
                        onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                        onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                        required>
                    <option value="">Pilih Hari</option>
                    <option value="Senin" <?= (isset($jadwal) && $jadwal['hari_jadwal'] == 'Senin') ? 'selected' : '' ?>>Senin</option>
                    <option value="Selasa" <?= (isset($jadwal) && $jadwal['hari_jadwal'] == 'Selasa') ? 'selected' : '' ?>>Selasa</option>
                    <option value="Rabu" <?= (isset($jadwal) && $jadwal['hari_jadwal'] == 'Rabu') ? 'selected' : '' ?>>Rabu</option>
                    <option value="Kamis" <?= (isset($jadwal) && $jadwal['hari_jadwal'] == 'Kamis') ? 'selected' : '' ?>>Kamis</option>
                    <option value="Jumat" <?= (isset($jadwal) && $jadwal['hari_jadwal'] == 'Jumat') ? 'selected' : '' ?>>Jumat</option>
                    <option value="Sabtu" <?= (isset($jadwal) && $jadwal['hari_jadwal'] == 'Sabtu') ? 'selected' : '' ?>>Sabtu</option>
                    <option value="Minggu" <?= (isset($jadwal) && $jadwal['hari_jadwal'] == 'Minggu') ? 'selected' : '' ?>>Minggu</option>
                </select>
            </div>
            
            <!-- Jam - WAJIB -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a; font-size: 14px;">
                    <i class="fas fa-clock" style="color: #3b82f6; margin-right: 5px;"></i>
                    Jam <span style="color: #ef4444;">*</span>
                </label>
                <input type="time" 
                       name="jam_jadwal"
                       style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
                       value="<?= old('jam_jadwal', $jadwal['jam_jadwal'] ?? '') ?>"
                       onmouseover="this.style.borderColor='#60a5fa'"
                       onmouseout="this.style.borderColor='#e2e8f0'"
                       onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                       onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                       required>
            </div>
            
            <!-- Petugas - WAJIB -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a; font-size: 14px;">
                    <i class="fas fa-user-tie" style="color: #3b82f6; margin-right: 5px;"></i>
                    Petugas <span style="color: #ef4444;">*</span>
                </label>
                <select name="id_petugas" 
                        style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; cursor: pointer;"
                        onmouseover="this.style.borderColor='#60a5fa'"
                        onmouseout="this.style.borderColor='#e2e8f0'"
                        onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                        onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                        required>
                    <option value="">Pilih Petugas</option>
                    <?php if (!empty($petugas)): ?>
                        <?php foreach ($petugas as $p): ?>
                        <option value="<?= $p['id_petugas'] ?>" <?= (isset($jadwal) && $jadwal['id_petugas'] == $p['id_petugas']) ? 'selected' : '' ?>>
                            <?= $p['id_petugas'] ?> - <?= $p['nama_petugas'] ?>
                        </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <!-- Grid Detail Tugas 6 Platform - SEMUA OPSIONAL -->
        <h4 style="margin: 30px 0 20px; color: #0f172a; font-weight: 600; border-left: 5px solid #3b82f6; padding-left: 15px;">
            <i class="fas fa-tasks" style="margin-right: 10px; color: #3b82f6;"></i>
            Detail Tugas per Platform <span style="font-size: 13px; font-weight: normal; color: #64748b; margin-left: 10px;">(opsional, kosongkan jika tidak ada)</span>
        </h4>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; margin-bottom: 30px;">
            
            <!-- Instagram -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #f09433, #d62976, #962fbf); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fab fa-instagram" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Instagram</h5>
                    <span style="font-size: 11px; color: #64748b; margin-left: auto;">(opsional)</span>
                </div>
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">ID Instagram</label>
                <input type="text" name="id_instagram" value="<?= old('id_instagram', $jadwal['id_instagram'] ?? '') ?>" 
                       placeholder="Contoh: IG001" 
                       style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 14px; margin-bottom: 15px; box-sizing: border-box;">
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">Detail Tugas</label>
                <textarea name="detail_tugas_instagram" rows="3" placeholder="Detail tugas Instagram" 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('detail_tugas_instagram', $jadwal['detail_tugas_instagram'] ?? '') ?></textarea>
            </div>
            
            <!-- Facebook -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #1877f2; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fab fa-facebook-f" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Facebook</h5>
                    <span style="font-size: 11px; color: #64748b; margin-left: auto;">(opsional)</span>
                </div>
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">ID Facebook</label>
                <input type="text" name="id_facebook" value="<?= old('id_facebook', $jadwal['id_facebook'] ?? '') ?>" 
                       placeholder="Contoh: FB001" 
                       style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 14px; margin-bottom: 15px; box-sizing: border-box;">
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">Detail Tugas</label>
                <textarea name="detail_tugas_facebook" rows="3" placeholder="Detail tugas Facebook" 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('detail_tugas_facebook', $jadwal['detail_tugas_facebook'] ?? '') ?></textarea>
            </div>
            
            <!-- TikTok -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #000000; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fab fa-tiktok" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">TikTok</h5>
                    <span style="font-size: 11px; color: #64748b; margin-left: auto;">(opsional)</span>
                </div>
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">ID TikTok</label>
                <input type="text" name="id_tiktok" value="<?= old('id_tiktok', $jadwal['id_tiktok'] ?? '') ?>" 
                       placeholder="Contoh: TT001" 
                       style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 14px; margin-bottom: 15px; box-sizing: border-box;">
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">Detail Tugas</label>
                <textarea name="detail_tugas_tiktok" rows="3" placeholder="Detail tugas TikTok" 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('detail_tugas_tiktok', $jadwal['detail_tugas_tiktok'] ?? '') ?></textarea>
            </div>
            
            <!-- Email -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #ea4335; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-envelope" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Email</h5>
                    <span style="font-size: 11px; color: #64748b; margin-left: auto;">(opsional)</span>
                </div>
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">ID Email</label>
                <input type="text" name="id_email" value="<?= old('id_email', $jadwal['id_email'] ?? '') ?>" 
                       placeholder="Contoh: EM001" 
                       style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 14px; margin-bottom: 15px; box-sizing: border-box;">
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">Detail Tugas</label>
                <textarea name="detail_tugas_email" rows="3" placeholder="Detail tugas Email" 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('detail_tugas_email', $jadwal['detail_tugas_email'] ?? '') ?></textarea>
            </div>
            
            <!-- Website -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #2563eb; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-globe" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Website</h5>
                    <span style="font-size: 11px; color: #64748b; margin-left: auto;">(opsional)</span>
                </div>
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">ID Website</label>
                <input type="text" name="id_website" value="<?= old('id_website', $jadwal['id_website'] ?? '') ?>" 
                       placeholder="Contoh: WEB001" 
                       style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 14px; margin-bottom: 15px; box-sizing: border-box;">
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">Detail Tugas</label>
                <textarea name="detail_tugas_website" rows="3" placeholder="Detail tugas Website" 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('detail_tugas_website', $jadwal['detail_tugas_website'] ?? '') ?></textarea>
            </div>
            
            <!-- WhatsApp -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #25d366; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fab fa-whatsapp" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">WhatsApp</h5>
                    <span style="font-size: 11px; color: #64748b; margin-left: auto;">(opsional)</span>
                </div>
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">ID WhatsApp</label>
                <input type="text" name="id_wa" value="<?= old('id_wa', $jadwal['id_wa'] ?? '') ?>" 
                       placeholder="Contoh: WA001" 
                       style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 14px; margin-bottom: 15px; box-sizing: border-box;">
                
                <label style="display: block; margin-bottom: 8px; font-weight: 500; color: #475569; font-size: 13px;">Detail Tugas</label>
                <textarea name="detail_tugas_wa" rows="3" placeholder="Detail tugas WhatsApp" 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('detail_tugas_wa', $jadwal['detail_tugas_wa'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-action-buttons" style="display: flex; gap: 30px; margin-top: 40px; justify-content: center; border-top: 2px solid #e2e8f0; padding-top: 30px;">
            <!-- Tombol Simpan -->
            <button type="submit" class="btn-simpan" style="padding: 16px 45px; border: none; border-radius: 60px; font-weight: 600; font-size: 16px; cursor: pointer; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5); min-width: 180px; transition: all 0.3s ease; position: relative; overflow: hidden; display: inline-flex; align-items: center; justify-content: center; gap: 10px;">
                <i class="fas fa-save" style="position: relative; z-index: 2;"></i>
                <span style="position: relative; z-index: 2;">Simpan Jadwal</span>
            </button>
            
            <!-- Tombol Kembali -->
            <a href="<?= base_url('jadwal') ?>" class="btn-kembali" style="padding: 16px 45px; border: 2px solid #e2e8f0; border-radius: 60px; font-weight: 600; font-size: 16px; cursor: pointer; background: white; color: #64748b; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; min-width: 180px; transition: all 0.3s ease; position: relative; overflow: hidden; gap: 10px;">
                <i class="fas fa-arrow-left" style="position: relative; z-index: 2;"></i>
                <span style="position: relative; z-index: 2;">Kembali</span>
            </a>
        </div>
    </form>
</div>

<style>
/* Hover effects untuk input dan select */
input:hover, select:hover, textarea:hover {
    border-color: #60a5fa !important;
    transform: translateY(-2px);
}

input:focus, select:focus, textarea:focus {
    outline: none !important;
    border-color: #3b82f6 !important;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15) !important;
    transform: translateY(-2px);
}

/* Tombol Simpan dengan efek */
.btn-simpan {
    position: relative;
    overflow: hidden;
}

.btn-simpan:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
    z-index: 1;
}

.btn-simpan:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(59, 130, 246, 0.8) !important;
    background: linear-gradient(135deg, #1d4ed8, #1e3a8a) !important;
}

.btn-simpan:hover:before {
    width: 400px;
    height: 400px;
}

/* Tombol Kembali dengan efek */
.btn-kembali {
    position: relative;
    overflow: hidden;
}

.btn-kembali:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(59, 130, 246, 0.1);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
    z-index: 0;
}

.btn-kembali:hover {
    border-color: #3b82f6 !important;
    color: #3b82f6 !important;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(59, 130, 246, 0.2);
    background: white !important;
}

.btn-kembali:hover:before {
    width: 400px;
    height: 400px;
}

.btn-kembali:hover i {
    transform: translateX(-5px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
    div[style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

@media (max-width: 768px) {
    .form-container {
        padding: 25px !important;
        margin: 15px !important;
    }
    
    div[style*="grid-template-columns: 1fr 1fr 1.5fr"] {
        grid-template-columns: 1fr !important;
    }
    
    div[style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: 1fr !important;
    }
    
    .form-action-buttons {
        flex-direction: column !important;
        gap: 15px !important;
    }
    
    .btn-simpan,
    .btn-kembali {
        width: 100% !important;
        min-width: 100% !important;
        padding: 14px 30px !important;
        font-size: 15px !important;
    }
}
</style>

<?= $this->endSection() ?>