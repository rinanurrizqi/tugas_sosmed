<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- Topbar -->
<div class="topbar">
    <h2>Edit Akun WhatsApp</h2>
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

<!-- Form Edit WhatsApp -->
<div class="form-container">
    <div class="form-header">
        <h3>
            <i class="fab fa-whatsapp"></i>
            Form Edit Akun WhatsApp
        </h3>
        <p>Silakan ubah data akun WhatsApp di bawah ini</p>
    </div>

    <form action="<?= base_url('whatsapp/update/'.$whatsapp['id_wa']) ?>" method="post" class="styled-form">
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
            <button type="submit" class="btn-update">
                <i class="fas fa-sync-alt"></i>
                Update
            </button>
        </div>
    </form>
</div>

<style>
/* ===== FORM CONTAINER ===== */
.form-container {
    background: white;
    border-radius: 24px;
    padding: 40px;
    box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 0 auto;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-container:hover {
    box-shadow: 0 30px 50px -10px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

.form-header {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 20px;
    border-bottom: 2px dashed #e9ecef;
}

.form-header h3 {
    color: #1e293b;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 10px;
}

.form-header h3 i {
    color: #25D366;
    margin-right: 10px;
}

.form-header p {
    color: #64748b;
    font-size: 16px;
}

/* ===== FORM GROUP ===== */
.form-group {
    margin-bottom: 30px;
}

.form-group label {
    display: block;
    margin-bottom: 12px;
    color: #1e293b;
    font-weight: 600;
    font-size: 16px;
    letter-spacing: 0.5px;
}

.form-group label i {
    color: #25D366;
    margin-right: 8px;
    font-size: 18px;
}

.form-control {
    width: 100%;
    padding: 18px 22px;
    border: 2px solid #e9ecef;
    border-radius: 18px;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #f8fafc;
    color: #1e293b;
}

.form-control:focus {
    outline: none;
    border-color: #25D366;
    background: white;
    box-shadow: 0 0 0 5px rgba(37, 211, 102, 0.1);
    transform: scale(1.01);
}

.form-control.is-invalid {
    border-color: #ef4444;
    background: #fef2f2;
}

.form-text {
    display: block;
    margin-top: 12px;
    font-size: 14px;
    color: #64748b;
    padding-left: 5px;
}

/* ===== FORM ACTIONS ===== */
.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 40px;
    justify-content: flex-end;
}

.btn-update {
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    border: none;
    padding: 16px 40px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px -4px rgba(59, 130, 246, 0.5);
    position: relative;
    overflow: hidden;
}

.btn-update:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.7s;
    z-index: 1;
}

.btn-update:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 30px -4px rgba(59, 130, 246, 0.8);
}

.btn-update:hover:before {
    left: 100%;
}

.btn-update i {
    position: relative;
    z-index: 2;
    font-size: 18px;
}

.btn-batal {
    background: #f1f5f9;
    color: #64748b;
    border: 2px solid #e9ecef;
    padding: 16px 40px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-batal:hover {
    background: #e2e8f0;
    color: #475569;
    transform: translateY(-2px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}

/* Responsive */
@media (max-width: 768px) {
    .form-container {
        padding: 25px;
        margin: 15px;
    }
    
    .form-actions {
        flex-direction: column-reverse;
    }
    
    .btn-update,
    .btn-batal {
        width: 100%;
        justify-content: center;
    }
}
</style>

<?= $this->endSection() ?>