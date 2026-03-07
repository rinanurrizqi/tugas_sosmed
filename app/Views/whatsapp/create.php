<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2>Tambah Akun WhatsApp</h2>
    <div class="topbar-user">
        <i class="fas fa-user-circle"></i>
        <span>Admin</span>
    </div>
</div>

<!-- Tampilkan Flash Messages -->
<?php if (session()->getFlashdata('error')): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
        <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Tampilkan validation errors -->
<?php if (isset($validation)): ?>
    <?php foreach ($validation->getErrors() as $error): ?>
        <div style="background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin-bottom: 10px;">
            <i class="fas fa-exclamation-circle"></i> <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Form Tambah WhatsApp -->
<div class="form-container">
    <div class="form-header">
        <p>Silakan isi form di bawah ini untuk menambahkan akun WhatsApp baru</p>
    </div>

    <form action="<?= base_url('wa/save') ?>" method="post" class="styled-form">
        <?= csrf_field() ?>
        
       <div class="form-group">
    <label for="no_wa">
        <i class="fab fa-whatsapp"></i>
        Nomor WhatsApp
    </label>

    <input type="text"
           name="no_wa"
           id="no_wa"
           class="form-control <?= ($validation && $validation->hasError('no_wa')) ? 'is-invalid' : '' ?>"
           placeholder="6281234567890"
           value="<?= old('no_wa') ?>"
           required>

    <small class="form-text text-muted">
        Masukkan nomor WhatsApp dengan kode negara tanpa spasi. Contoh: 6281234567890
    </small>
</div>

        <div class="form-actions">
            <a href="<?= base_url('whatsapp') ?>" class="btn-batal">
                <i class="fas fa-arrow-left"></i>
                Batal
            </a>
            <button type="submit" class="btn-simpan">
                <i class="fas fa-save"></i>
                Simpan
            </button>
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

/* Tombol Simpan dengan efek - KHUSUS WHATSAPP */
.btn-simpan {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #25D366, #128C7E) !important;
    box-shadow: 0 8px 20px rgba(37, 211, 102, 0.5) !important;
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
    box-shadow: 0 15px 30px rgba(37, 211, 102, 0.8) !important;
    background: linear-gradient(135deg, #128C7E, #075E54) !important;
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