<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="topbar">
    <h2><?= isset($tiktok) ? 'Edit Akun TikTok' : 'Tambah Akun TikTok' ?></h2>
</div>

<?php if (session()->getFlashdata('errors')): ?>
    <div style="background: #f8d7da; color: #721c24; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px;">
        <ul style="margin-left: 20px;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="form-container" style="max-width: 500px; margin: 20px auto; background: white; border-radius: 30px; padding: 35px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
    
    <form method="post" action="<?= isset($tiktok) ? base_url('tiktok/update/'.$tiktok['id_tiktok']) : base_url('tiktok/store') ?>">
        
        <?= csrf_field() ?>
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                ID TikTok <span style="color: #ef4444;">*</span>
            </label>
            <input type="text" 
                   name="id_tiktok"
                   style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
                   value="<?= old('id_tiktok', $tiktok['id_tiktok'] ?? '') ?>"
                   placeholder="Contoh: TT001"
                   <?= isset($tiktok) ? 'readonly' : '' ?>
                   required>
        </div>
        
        <div style="margin-bottom: 30px;">
            <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #0f172a;">
                Link TikTok <span style="color: #ef4444;">*</span>
            </label>
            <input type="url" 
                   name="link_tiktok"
                   style="width: 100%; padding: 16px 20px; border: 2px solid #e2e8f0; border-radius: 50px; font-size: 15px; transition: all 0.3s ease; outline: none; box-sizing: border-box;"
                   value="<?= old('link_tiktok', $tiktok['link_tiktok'] ?? '') ?>"
                   placeholder="https://tiktok.com/@username"
                   required>
        </div>

        <div class="form-action-buttons" style="display: flex; gap: 30px; margin-top: 35px; justify-content: center;">
            <button type="submit" class="btn-simpan" style="padding: 16px 40px; border: none; border-radius: 60px; font-weight: 600; font-size: 16px; cursor: pointer; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; box-shadow: 0 8px 20px rgba(59, 130, 246, 0.5); min-width: 150px; transition: all 0.3s ease;">
                <i class="fas fa-save"></i> <span>Simpan</span>
            </button>
            
            <a href="<?= base_url('tiktok') ?>" class="btn-kembali" style="padding: 16px 40px; border: 2px solid #e2e8f0; border-radius: 60px; font-weight: 600; font-size: 16px; cursor: pointer; background: white; color: #64748b; text-decoration: none; display: inline-block; text-align: center; min-width: 150px; transition: all 0.3s ease;">
                <i class="fas fa-arrow-left"></i> <span>Kembali</span>
            </a>
        </div>
    </form>
</div>

<style>
    /* ... Copy paste saja bagian <style> dari Instagram form.php kamu ke sini ... */
</style>

<?= $this->endSection() ?>