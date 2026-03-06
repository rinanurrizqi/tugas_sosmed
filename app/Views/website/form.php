<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2><?= isset($website) ? 'Edit Akun Website' : 'Tambah Akun Website' ?></h2>
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
<div class="form-container" style="max-width: 500px; margin: 20px auto; background: white; border-radius: 30px; padding: 35px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
    
    <form method="post" action="<?= isset($website) ? base_url('website/update/'.$website['id_website']) : base_url('website/store') ?>">
        
        <!-- CSRF Protection -->
        <?= csrf_field() ?>
        
        <!-- Input ID Website -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                ID Website <span style="color: #ef4444;">*</span>
            </label>
            <input type="text" 
                   name="id_website"
                   style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
                   value="<?= old('id_website', $website['id_website'] ?? '') ?>"
                   placeholder="Contoh: WEB001"
                   <?= isset($website) ? 'readonly' : '' ?>
                   onmouseover="this.style.borderColor='#60a5fa'; this.style.transform='translateY(-2px)'"
                   onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'"
                   onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'; this.style.transform='translateY(-2px)'"
                   onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'; this.style.transform='translateY(0)'"
                   required>
            <?php if (!isset($website)): ?>
                <div style="font-size: 12px; color: #64748b; margin-top: 5px; margin-left: 5px;">
                    <i class="fas fa-info-circle" style="color: #3b82f6;"></i>
                    ID bersifat unik dan tidak bisa diubah setelah dibuat
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Input Link Website -->
        <div style="margin-bottom: 30px;">
            <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                Link Website <span style="color: #ef4444;">*</span>
            </label>
            <div style="position: relative;">
                <i class="fas fa-globe" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: #2563eb; font-size: 18px; z-index: 1;"></i>
                <input type="url" 
                       name="link_website"
                       style="width: 100%; padding: 16px 20px 16px 50px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
                       value="<?= old('link_website', $website['link_website'] ?? '') ?>"
                       placeholder="https://example.com"
                       onmouseover="this.style.borderColor='#60a5fa'; this.style.transform='translateY(-2px)'"
                       onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'"
                       onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59,130,246,0.15)'; this.style.transform='translateY(-2px)'"
                       onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'; this.style.transform='translateY(0)'"
                       required>
            </div>
            <div style="font-size: 12px; color: #64748b; margin-top: 5px; margin-left: 5px;">
                <i class="fas fa-info-circle" style="color: #3b82f6;"></i>
                Masukkan URL lengkap website
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-action-buttons" style="display: flex; gap: 30px; margin-top: 35px; justify-content: center;">
            <!-- Tombol Simpan -->
            <button type="submit" class="btn-simpan" style="padding: 16px 40px; border: none; border-radius: 60px; font-weight: 600; font-size: 16px; cursor: pointer; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5); min-width: 150px; transition: all 0.3s ease; position: relative; overflow: hidden;">
                <i class="fas fa-save"></i>
                <span style="position: relative; z-index: 2;">Simpan</span>
            </button>
            
            <!-- Tombol Kembali -->
            <a href="<?= base_url('website') ?>" class="btn-kembali" style="padding: 16px 40px; border: 2px solid #e2e8f0; border-radius: 60px; font-weight: 600; font-size: 16px; cursor: pointer; background: white; color: #64748b; text-decoration: none; display: inline-block; text-align: center; min-width: 150px; transition: all 0.3s ease; position: relative; overflow: hidden;">
                <i class="fas fa-arrow-left"></i>
                <span style="position: relative; z-index: 2;">Kembali</span>
            </a>
        </div>
    </form>
</div>

<style>
/* Hover effects untuk input */
input:hover {
    border-color: #60a5fa !important;
    transform: translateY(-2px);
}

input:focus {
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
    transform: translateX(-3px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .form-container {
        padding: 25px !important;
        margin: 15px !important;
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
    
    input {
        padding: 14px 18px !important;
    }
    
    input[type="url"] {
        padding-left: 45px !important;
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