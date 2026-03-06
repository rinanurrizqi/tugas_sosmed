<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2><?= isset($jadwal) ? 'Edit Jadwal Tugas' : 'Tambah Jadwal Tugas' ?></h2>
</div>

<!-- Form Container -->
<div class="form-container" style="max-width: 800px; margin: 20px auto; background: white; border-radius: 30px; padding: 35px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
    <form method="post" action="<?= isset($jadwal) ? base_url('transaksi/jadwal/update/'.$jadwal['id_jadwal']) : base_url('transaksi/jadwal/store') ?>">
        
        <!-- Input ID Jadwal (Manual karena tidak auto increment) -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                ID Jadwal
            </label>
            <input type="text" 
                   name="id_jadwal"
                   style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
                   value="<?= $jadwal['id_jadwal'] ?? '' ?>"
                   placeholder="Contoh: J001"
                   <?= isset($jadwal) ? 'readonly' : '' ?>
                   onmouseover="this.style.borderColor='#60a5fa'; this.style.transform='translateY(-2px)'"
                   onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'"
                   onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'; this.style.transform='translateY(-2px)'"
                   onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'; this.style.transform='translateY(0)'"
                   required>
        </div>
        
        <!-- Baris 1: Hari dan Jam -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <!-- Hari -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    Hari
                </label>
                <select name="hari_jadwal" 
                        style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
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
            
            <!-- Jam -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    Jam
                </label>
                <input type="time" 
                       name="jam_jadwal"
                       style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
                       value="<?= $jadwal['jam_jadwal'] ?? '' ?>"
                       onmouseover="this.style.borderColor='#60a5fa'; this.style.transform='translateY(-2px)'"
                       onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'"
                       onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'; this.style.transform='translateY(-2px)'"
                       onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'; this.style.transform='translateY(0)'"
                       required>
            </div>
        </div>

        <!-- ID Petugas -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                ID Petugas
            </label>
            <select name="id_petugas" 
                    style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
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

        <!-- Grid untuk Detail Tugas -->
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 30px;">
            
            <!-- Instagram -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    <i class="fab fa-instagram" style="margin-right: 5px;"></i> Detail Instagram
                </label>
                <textarea name="detail_tugas_insta" 
                          style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 30px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box; min-height: 100px; resize: vertical;"
                          onmouseover="this.style.borderColor='#60a5fa'"
                          onmouseout="this.style.borderColor='#e2e8f0'"
                          onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                          onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                          placeholder="Detail tugas Instagram"><?= $jadwal['detail_tugas_insta'] ?? '' ?></textarea>
            </div>
            
            <!-- Facebook -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    <i class="fab fa-facebook" style="margin-right: 5px;"></i> Detail Facebook
                </label>
                <textarea name="detail_tugas_fb" 
                          style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 30px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box; min-height: 100px; resize: vertical;"
                          onmouseover="this.style.borderColor='#60a5fa'"
                          onmouseout="this.style.borderColor='#e2e8f0'"
                          onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                          onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                          placeholder="Detail tugas Facebook"><?= $jadwal['detail_tugas_fb'] ?? '' ?></textarea>
            </div>
            
            <!-- TikTok -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    <i class="fab fa-tiktok" style="margin-right: 5px;"></i> Detail TikTok
                </label>
                <textarea name="detail_tugas_tiktok" 
                          style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 30px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box; min-height: 100px; resize: vertical;"
                          onmouseover="this.style.borderColor='#60a5fa'"
                          onmouseout="this.style.borderColor='#e2e8f0'"
                          onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                          onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                          placeholder="Detail tugas TikTok"><?= $jadwal['detail_tugas_tiktok'] ?? '' ?></textarea>
            </div>
            
            <!-- Email -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    <i class="fas fa-envelope" style="margin-right: 5px;"></i> Detail Email
                </label>
                <textarea name="detail_tugas_email" 
                          style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 30px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box; min-height: 100px; resize: vertical;"
                          onmouseover="this.style.borderColor='#60a5fa'"
                          onmouseout="this.style.borderColor='#e2e8f0'"
                          onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                          onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                          placeholder="Detail tugas Email"><?= $jadwal['detail_tugas_email'] ?? '' ?></textarea>
            </div>
            
            <!-- Website -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    <i class="fas fa-globe" style="margin-right: 5px;"></i> Detail Website
                </label>
                <textarea name="detail_tugas_web" 
                          style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 30px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box; min-height: 100px; resize: vertical;"
                          onmouseover="this.style.borderColor='#60a5fa'"
                          onmouseout="this.style.borderColor='#e2e8f0'"
                          onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                          onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                          placeholder="Detail tugas Website"><?= $jadwal['detail_tugas_web'] ?? '' ?></textarea>
            </div>
            
            <!-- WhatsApp -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    <i class="fab fa-whatsapp" style="margin-right: 5px;"></i> Detail WhatsApp
                </label>
                <textarea name="detail_tugas_wa" 
                          style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 30px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box; min-height: 100px; resize: vertical;"
                          onmouseover="this.style.borderColor='#60a5fa'"
                          onmouseout="this.style.borderColor='#e2e8f0'"
                          onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'"
                          onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'"
                          placeholder="Detail tugas WhatsApp"><?= $jadwal['detail_tugas_wa'] ?? '' ?></textarea>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-action-buttons" style="display: flex; gap: 30px; margin-top: 35px; justify-content: center;">
            <!-- Tombol Simpan -->
            <button type="submit" class="btn-simpan" style="padding: 16px 40px; border: none; border-radius: 60px; font-weight: 600; font-size: 16px; cursor: pointer; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5); min-width: 150px; transition: all 0.3s ease; position: relative; overflow: hidden;">
                <span style="position: relative; z-index: 2;">Simpan</span>
            </button>
            
            <!-- Tombol Kembali -->
            <a href="<?= base_url('transaksi/jadwal') ?>" class="btn-kembali" style="padding: 16px 40px; border: 2px solid #e2e8f0; border-radius: 60px; font-weight: 600; font-size: 16px; cursor: pointer; background: white; color: #64748b; text-decoration: none; display: inline-block; text-align: center; min-width: 150px; transition: all 0.3s ease; position: relative; overflow: hidden;">
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

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .form-container {
        padding: 25px !important;
        margin: 15px !important;
    }
    
    div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
    
    div[style*="grid-template-columns: repeat(2, 1fr)"] {
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

@media (max-width: 480px) {
    .form-container {
        padding: 20px !important;
    }
    
    h2 {
        font-size: 18px !important;
    }
    
    label {
        font-size: 14px !important;
    }
    
    .btn-simpan,
    .btn-kembali {
        padding: 12px 25px !important;
        font-size: 14px !important;
    }
}
</style>

<?= $this->endSection() ?>