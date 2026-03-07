<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2><?= isset($progress) ? 'Edit Progress' : 'Tambah Progress' ?></h2>
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
    
    <form method="post" action="<?= isset($progress) ? base_url('progress/update/'.$progress['id_progress']) : base_url('progress/store') ?>">
        
        <?= csrf_field() ?>
        
        <!-- Header Form -->
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fas fa-chart-line" style="font-size: 48px; color: #3b82f6; margin-bottom: 10px;"></i>
            <h3 style="color: #0f172a; font-size: 24px; font-weight: 600;"><?= isset($progress) ? 'Edit Progress Harian' : 'Tambah Progress Harian' ?></h3>
            <p style="color: #64748b; font-size: 14px;">Isi form berikut untuk <?= isset($progress) ? 'mengubah' : 'menambahkan' ?> progress tugas</p>
        </div>
        
        <!-- Baris 1: ID Progress, Tanggal, Pilih Jadwal -->
        <div style="display: grid; grid-template-columns: 1fr 1fr 2fr; gap: 20px; margin-bottom: 30px;">
            
            <!-- ID Progress -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    <i class="fas fa-hashtag" style="color: #3b82f6; margin-right: 5px;"></i>
                    ID Progress <span style="color: #ef4444;">*</span>
                </label>
                <input type="text" name="id_progress" value="<?= old('id_progress', $progress['id_progress'] ?? '') ?>" 
                       placeholder="Contoh: PRG001" 
                       style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; box-sizing: border-box;"
                       <?= isset($progress) ? 'readonly' : '' ?> required>
                <?php if (!isset($progress)): ?>
                    <div style="font-size: 12px; color: #64748b; margin-top: 5px;">
                        <i class="fas fa-info-circle" style="color: #3b82f6;"></i> ID unik, tidak bisa diubah
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Tanggal Progress -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    <i class="fas fa-calendar-alt" style="color: #3b82f6; margin-right: 5px;"></i>
                    Tanggal <span style="color: #ef4444;">*</span>
                </label>
                <input type="date" name="tanggal_progress" value="<?= old('tanggal_progress', $progress['tanggal_progress'] ?? date('Y-m-d')) ?>" 
                       style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; box-sizing: border-box;" required>
            </div>
            
            <!-- Pilih Jadwal -->
            <div>
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                    <i class="fas fa-calendar-check" style="color: #3b82f6; margin-right: 5px;"></i>
                    Pilih Jadwal <span style="color: #ef4444;">*</span>
                </label>
                <select name="id_jadwal" style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px;" required>
                    <option value="">-- Pilih Jadwal --</option>
                    <?php if (!empty($jadwal)): ?>
                        <?php foreach ($jadwal as $j): ?>
                        <option value="<?= $j['id_jadwal'] ?>" <?= (isset($progress) && $progress['id_jadwal'] == $j['id_jadwal']) ? 'selected' : '' ?>>
                            <?= $j['hari_jadwal'] ?> - <?= $j['jam_jadwal'] ?> (<?= $j['nama_petugas'] ?>)
                        </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <!-- Grid Progress 6 Platform dengan Icon -->
        <h4 style="margin: 30px 0 20px; color: #0f172a; font-weight: 600; border-left: 5px solid #3b82f6; padding-left: 15px;">
            <i class="fas fa-tasks" style="margin-right: 10px; color: #3b82f6;"></i>
            Progress Tugas per Platform
        </h4>
        
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 25px; margin-bottom: 30px;">
            
            <!-- Instagram -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #f09433, #d62976, #962fbf); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fab fa-instagram" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Progress Instagram</h5>
                </div>
                <textarea name="progress_tugas_instagram" rows="4" placeholder="Tulis progress tugas Instagram..." 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('progress_tugas_instagram', $progress['progress_tugas_instagram'] ?? '') ?></textarea>
            </div>
            
            <!-- Facebook -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #1877f2; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fab fa-facebook-f" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Progress Facebook</h5>
                </div>
                <textarea name="progress_tugas_facebook" rows="4" placeholder="Tulis progress tugas Facebook..." 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('progress_tugas_facebook', $progress['progress_tugas_facebook'] ?? '') ?></textarea>
            </div>
            
            <!-- TikTok -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #000000; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fab fa-tiktok" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Progress TikTok</h5>
                </div>
                <textarea name="progress_tugas_tiktok" rows="4" placeholder="Tulis progress tugas TikTok..." 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('progress_tugas_tiktok', $progress['progress_tugas_tiktok'] ?? '') ?></textarea>
            </div>
            
            <!-- Email -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #ea4335; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-envelope" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Progress Email</h5>
                </div>
                <textarea name="progress_tugas_email" rows="4" placeholder="Tulis progress tugas Email..." 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('progress_tugas_email', $progress['progress_tugas_email'] ?? '') ?></textarea>
            </div>
            
            <!-- Website -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #2563eb; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-globe" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Progress Website</h5>
                </div>
                <textarea name="progress_tugas_website" rows="4" placeholder="Tulis progress tugas Website..." 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('progress_tugas_website', $progress['progress_tugas_website'] ?? '') ?></textarea>
            </div>
            
            <!-- WhatsApp -->
            <div style="background: #f8fafc; padding: 20px; border-radius: 20px; border: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                    <div style="width: 40px; height: 40px; background: #25d366; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fab fa-whatsapp" style="color: white; font-size: 20px;"></i>
                    </div>
                    <h5 style="font-weight: 600; color: #0f172a; margin: 0;">Progress WhatsApp</h5>
                </div>
                <textarea name="progress_tugas_wa" rows="4" placeholder="Tulis progress tugas WhatsApp..." 
                          style="width: 100%; padding: 12px 15px; border: 2px solid #e2e8f0; border-radius: 20px; font-size: 14px; resize: vertical; box-sizing: border-box;"><?= old('progress_tugas_wa', $progress['progress_tugas_wa'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-action-buttons" style="display: flex; gap: 30px; margin-top: 40px; justify-content: center; border-top: 2px solid #e2e8f0; padding-top: 30px;">
            <!-- Tombol Simpan dengan warna biru gradient seperti halaman lain -->
            <button type="submit" class="btn-simpan" style="padding: 16px 45px; border: none; border-radius: 60px; font-weight: 600; font-size: 16px; cursor: pointer; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5); min-width: 180px; transition: all 0.3s ease; position: relative; overflow: hidden; display: inline-flex; align-items: center; justify-content: center; gap: 10px;">
                <i class="fas fa-save" style="position: relative; z-index: 2;"></i>
                <span style="position: relative; z-index: 2;">Simpan Progress</span>
            </button>
            
            <!-- Tombol Kembali -->
            <a href="<?= base_url('progress') ?>" class="btn-kembali" style="padding: 16px 45px; border: 2px solid #e2e8f0; border-radius: 60px; font-weight: 600; font-size: 16px; background: white; color: #64748b; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; min-width: 180px; transition: all 0.3s ease; position: relative; overflow: hidden; gap: 10px;">
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

/* Responsive */
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
    
    div[style*="grid-template-columns: 1fr 1fr 2fr"] {
        grid-template-columns: 1fr !important;
    }
    
    div[style*="grid-template-columns: repeat(3, 1fr)"] {
        grid-template-columns: 1fr !important;
    }
    
    .form-action-buttons {
        flex-direction: column !important;
        gap: 15px !important;
    }
    
    .btn-simpan, .btn-kembali {
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
    
    .btn-simpan, .btn-kembali {
        padding: 12px 25px !important;
        font-size: 14px !important;
    }
}
</style>

<?= $this->endSection() ?>