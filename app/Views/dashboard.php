<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- CSS !-->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<!-- FONT !-->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Topbar -->
<div class="topbar">
    <h2>Dashboard</h2>
    <div class="topbar-user">
        <i class="fas fa-user-circle"></i>
        <span>Admin</span>
    </div>
</div>

<!-- Welcome Section - Responsive -->
<div style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 30px; padding: 30px; margin-bottom: 30px; color: white; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
    <div>
        <h3 style="font-size: 28px; font-weight: 700; margin-bottom: 10px; @media (max-width: 768px) { font-size: 22px; }">Selamat Datang, Admin!</h3>
        <p style="font-size: 16px; opacity: 0.9;">Kelola tugas harian dan pantau progress dengan mudah</p>
    </div>
    <div style="display: flex; gap: 15px;">
        <div style="background: rgba(255,255,255,0.2); padding: 15px 25px; border-radius: 20px; text-align: center;">
            <i class="fas fa-calendar-day" style="font-size: 24px; margin-bottom: 5px; display: block;"></i>
            <span style="font-size: 14px; opacity: 0.9;"><?= date('d M Y') ?></span>
        </div>
    </div>
</div>

<!-- Cards Statistik Utama - Responsive Grid -->
<div class="stats-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 25px; margin-bottom: 30px;">
    
    <!-- Card Total Petugas -->
    <div class="stat-card" style="background: white; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; transition: all 0.3s ease;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div style="width: 50px; height: 50px; background: #dbeafe; border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-users" style="color: #3b82f6; font-size: 24px;"></i>
            </div>
            <span style="font-size: 28px; font-weight: 700; color: #1e293b;"><?= $total_petugas ?? 0 ?></span>
        </div>
        <h4 style="font-size: 16px; font-weight: 500; color: #64748b; margin: 0;">Total Petugas</h4>
    </div>
    
    <!-- Card Total Jadwal -->
    <div class="stat-card" style="background: white; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; transition: all 0.3s ease;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div style="width: 50px; height: 50px; background: #dcfce7; border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-calendar-alt" style="color: #16a34a; font-size: 24px;"></i>
            </div>
            <span style="font-size: 28px; font-weight: 700; color: #1e293b;"><?= $total_jadwal ?? 0 ?></span>
        </div>
        <h4 style="font-size: 16px; font-weight: 500; color: #64748b; margin: 0;">Total Jadwal</h4>
    </div>
    
    <!-- Card Jadwal Hari Ini -->
    <div class="stat-card" style="background: white; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; transition: all 0.3s ease;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div style="width: 50px; height: 50px; background: #fff3cd; border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-clock" style="color: #f59e0b; font-size: 24px;"></i>
            </div>
            <span style="font-size: 28px; font-weight: 700; color: #1e293b;"><?= $jadwal_hari_ini ?? 0 ?></span>
        </div>
        <h4 style="font-size: 16px; font-weight: 500; color: #64748b; margin: 0;">Jadwal Hari Ini</h4>
    </div>
    
    <!-- Card Total Progress -->
    <div class="stat-card" style="background: white; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; transition: all 0.3s ease;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div style="width: 50px; height: 50px; background: #fee2e2; border-radius: 16px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-chart-line" style="color: #ef4444; font-size: 24px;"></i>
            </div>
            <span style="font-size: 28px; font-weight: 700; color: #1e293b;"><?= $total_progress ?? 0 ?></span>
        </div>
        <h4 style="font-size: 16px; font-weight: 500; color: #64748b; margin: 0;">Total Progress</h4>
    </div>
</div>

<!-- Cards Statistik Media Sosial - Responsive -->
<h4 style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 20px;">
    <i class="fas fa-chart-pie" style="margin-right: 10px; color: #3b82f6;"></i>
    Statistik Akun Media Sosial
</h4>

<div class="sosmed-grid" style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 20px; margin-bottom: 30px;">
    
    <!-- Instagram -->
    <div class="sosmed-card" style="background: white; border-radius: 20px; padding: 20px; border: 1px solid #e2e8f0; text-align: center; transition: all 0.3s ease;">
        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #f09433, #d62976, #962fbf); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
            <i class="fab fa-instagram" style="color: white; font-size: 24px;"></i>
        </div>
        <h5 style="font-size: 14px; font-weight: 500; color: #64748b; margin-bottom: 5px;">Instagram</h5>
        <span style="font-size: 24px; font-weight: 700; color: #1e293b;"><?= $total_instagram ?? 0 ?></span>
    </div>
    
    <!-- Facebook -->
    <div class="sosmed-card" style="background: white; border-radius: 20px; padding: 20px; border: 1px solid #e2e8f0; text-align: center; transition: all 0.3s ease;">
        <div style="width: 50px; height: 50px; background: #1877f2; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
            <i class="fab fa-facebook-f" style="color: white; font-size: 24px;"></i>
        </div>
        <h5 style="font-size: 14px; font-weight: 500; color: #64748b; margin-bottom: 5px;">Facebook</h5>
        <span style="font-size: 24px; font-weight: 700; color: #1e293b;"><?= $total_facebook ?? 0 ?></span>
    </div>
    
    <!-- TikTok -->
    <div class="sosmed-card" style="background: white; border-radius: 20px; padding: 20px; border: 1px solid #e2e8f0; text-align: center; transition: all 0.3s ease;">
        <div style="width: 50px; height: 50px; background: #000000; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
            <i class="fab fa-tiktok" style="color: white; font-size: 24px;"></i>
        </div>
        <h5 style="font-size: 14px; font-weight: 500; color: #64748b; margin-bottom: 5px;">TikTok</h5>
        <span style="font-size: 24px; font-weight: 700; color: #1e293b;"><?= $total_tiktok ?? 0 ?></span>
    </div>
    
    <!-- Email -->
    <div class="sosmed-card" style="background: white; border-radius: 20px; padding: 20px; border: 1px solid #e2e8f0; text-align: center; transition: all 0.3s ease;">
        <div style="width: 50px; height: 50px; background: #ea4335; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
            <i class="fas fa-envelope" style="color: white; font-size: 24px;"></i>
        </div>
        <h5 style="font-size: 14px; font-weight: 500; color: #64748b; margin-bottom: 5px;">Email</h5>
        <span style="font-size: 24px; font-weight: 700; color: #1e293b;"><?= $total_email ?? 0 ?></span>
    </div>
    
    <!-- Website -->
    <div class="sosmed-card" style="background: white; border-radius: 20px; padding: 20px; border: 1px solid #e2e8f0; text-align: center; transition: all 0.3s ease;">
        <div style="width: 50px; height: 50px; background: #2563eb; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
            <i class="fas fa-globe" style="color: white; font-size: 24px;"></i>
        </div>
        <h5 style="font-size: 14px; font-weight: 500; color: #64748b; margin-bottom: 5px;">Website</h5>
        <span style="font-size: 24px; font-weight: 700; color: #1e293b;"><?= $total_website ?? 0 ?></span>
    </div>
    
    <!-- WhatsApp -->
    <div class="sosmed-card" style="background: white; border-radius: 20px; padding: 20px; border: 1px solid #e2e8f0; text-align: center; transition: all 0.3s ease;">
        <div style="width: 50px; height: 50px; background: #25d366; border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
            <i class="fab fa-whatsapp" style="color: white; font-size: 24px;"></i>
        </div>
        <h5 style="font-size: 14px; font-weight: 500; color: #64748b; margin-bottom: 5px;">WhatsApp</h5>
        <span style="font-size: 24px; font-weight: 700; color: #1e293b;"><?= $total_wa ?? 0 ?></span>
    </div>
</div>

<!-- Grafik Sederhana Progress - Responsive -->
<div class="progress-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
    
    <!-- Progress Status -->
    <div style="background: white; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <h4 style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-tasks" style="color: #3b82f6;"></i>
            Status Progress
        </h4>
        
        <div style="margin-bottom: 15px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                <span style="color: #475569;">Selesai</span>
                <span style="font-weight: 600; color: #16a34a;"><?= $progress_selesai ?? 0 ?></span>
            </div>
            <div style="width: 100%; height: 10px; background: #e2e8f0; border-radius: 10px; overflow: hidden;">
                <div style="width: <?= ($total_progress ?? 0) > 0 ? ($progress_selesai ?? 0) / ($total_progress ?? 1) * 100 : 0 ?>%; height: 100%; background: #16a34a; border-radius: 10px;"></div>
            </div>
        </div>
        
        <div style="margin-bottom: 15px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                <span style="color: #475569;">Proses</span>
                <span style="font-weight: 600; color: #f59e0b;"><?= $progress_proses ?? 0 ?></span>
            </div>
            <div style="width: 100%; height: 10px; background: #e2e8f0; border-radius: 10px; overflow: hidden;">
                <div style="width: <?= ($total_progress ?? 0) > 0 ? ($progress_proses ?? 0) / ($total_progress ?? 1) * 100 : 0 ?>%; height: 100%; background: #f59e0b; border-radius: 10px;"></div>
            </div>
        </div>
        
        <div style="margin-bottom: 15px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                <span style="color: #475569;">Tertunda</span>
                <span style="font-weight: 600; color: #ef4444;"><?= $progress_tertunda ?? 0 ?></span>
            </div>
            <div style="width: 100%; height: 10px; background: #e2e8f0; border-radius: 10px; overflow: hidden;">
                <div style="width: <?= ($total_progress ?? 0) > 0 ? ($progress_tertunda ?? 0) / ($total_progress ?? 1) * 100 : 0 ?>%; height: 100%; background: #ef4444; border-radius: 10px;"></div>
            </div>
        </div>
        
        <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #e2e8f0;">
            <div style="display: flex; justify-content: space-between;">
                <span style="color: #475569;">Total Progress</span>
                <span style="font-weight: 700; color: #0f172a;"><?= $total_progress ?? 0 ?></span>
            </div>
        </div>
    </div>
    
    <!-- Jadwal Terdekat -->
    <div style="background: white; border-radius: 24px; padding: 25px; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
        <h4 style="font-size: 18px; font-weight: 600; color: #0f172a; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-clock" style="color: #3b82f6;"></i>
            Jadwal Terdekat
        </h4>
        
        <?php if (!empty($jadwal_terdekat)): ?>
            <?php foreach ($jadwal_terdekat as $j): ?>
            <div style="display: flex; align-items: center; gap: 15px; padding: 15px 0; border-bottom: 1px solid #e2e8f0;">
                <div style="width: 50px; height: 50px; background: #dbeafe; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    <i class="fas fa-calendar-day" style="color: #3b82f6; font-size: 20px;"></i>
                </div>
                <div style="flex: 1; min-width: 0;">
                    <h5 style="font-weight: 600; color: #0f172a; margin-bottom: 5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $j['hari_jadwal'] ?> - <?= $j['jam_jadwal'] ?></h5>
                    <p style="color: #64748b; font-size: 13px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Petugas: <?= $j['nama_petugas'] ?></p>
                </div>
                <span style="background: #e2e8f0; padding: 5px 10px; border-radius: 20px; font-size: 12px; flex-shrink: 0;"><?= $j['id_jadwal'] ?></span>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="text-align: center; padding: 30px; color: #64748b;">
                <i class="fas fa-calendar-times" style="font-size: 40px; margin-bottom: 10px; display: block;"></i>
                <p>Belum ada jadwal terdekat</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
/* Hover effects untuk card */
.stat-card:hover,
.sosmed-card:hover,
div[style*="background: white"]:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 30px -10px rgba(0,0,0,0.1) !important;
    transition: all 0.3s ease;
}

/* Responsive Design */
@media screen and (max-width: 1200px) {
    .stats-grid {
        gap: 20px !important;
    }
}

@media screen and (max-width: 1024px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
    
    .sosmed-grid {
        grid-template-columns: repeat(3, 1fr) !important;
    }
    
    .progress-grid {
        grid-template-columns: 1fr !important;
    }
}

@media screen and (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr !important;
        gap: 15px !important;
    }
    
    .sosmed-grid {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 15px !important;
    }
    
    .stat-card {
        padding: 20px !important;
    }
    
    .sosmed-card {
        padding: 15px !important;
    }
    
    .sosmed-card div[style*="width: 50px"] {
        width: 40px !important;
        height: 40px !important;
    }
    
    .sosmed-card i {
        font-size: 20px !important;
    }
    
    .sosmed-card span {
        font-size: 20px !important;
    }
    
    div[style*="background: linear-gradient(135deg, #3b82f6, #1d4ed8)"] {
        padding: 20px !important;
    }
    
    div[style*="background: linear-gradient(135deg, #3b82f6, #1d4ed8)"] h3 {
        font-size: 22px !important;
    }
}

@media screen and (max-width: 480px) {
    .sosmed-grid {
        grid-template-columns: 1fr !important;
    }
    
    .stat-card div[style*="width: 50px"] {
        width: 40px !important;
        height: 40px !important;
    }
    
    .stat-card i {
        font-size: 20px !important;
    }
    
    .stat-card span {
        font-size: 24px !important;
    }
    
    div[style*="display: flex; align-items: center; gap: 15px;"] {
        flex-wrap: wrap;
    }
    
    div[style*="background: rgba(255,255,255,0.2); padding: 15px 25px;"] {
        padding: 10px 15px !important;
    }
}

/* Touch optimization untuk mobile */
@media (hover: none) and (pointer: coarse) {
    .stat-card:hover,
    .sosmed-card:hover {
        transform: none !important;
    }
}
</style>

<?= $this->endSection() ?>