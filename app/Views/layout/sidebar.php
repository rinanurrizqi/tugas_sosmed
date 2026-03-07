<aside class="sidebar" id="mainSidebar">
    <div class="sidebar-logo">
        <i class="fas fa-tasks" style="margin-right: 10px;"></i>
        Sistem Tugas Harian
    </div>

    <!-- Dashboard -->
    <a href="<?= base_url('/') ?>" class="sidebar-link <?= uri_string() == '' ? 'active' : '' ?>">
        <i class="fas fa-home"></i>
        <span>Dashboard</span>
    </a>

    <div class="sidebar-section">MASTER</div>
    
    <a href="<?= base_url('petugas') ?>" class="sidebar-link <?= uri_string() == 'petugas' ? 'active' : '' ?>">
        <i class="fas fa-users"></i>
        <span>Data Petugas</span>
    </a>
    
    <a href="<?= base_url('instagram') ?>" class="sidebar-link <?= uri_string() == 'instagram' ? 'active' : '' ?>">
        <i class="fab fa-instagram"></i>
        <span>Instagram</span>
    </a>
    
    <a href="<?= base_url('facebook') ?>" class="sidebar-link <?= uri_string() == 'facebook' ? 'active' : '' ?>">
        <i class="fab fa-facebook-f"></i>
        <span>Facebook</span>
    </a>
    
    <a href="<?= base_url('tiktok') ?>" class="sidebar-link <?= uri_string() == 'tiktok' ? 'active' : '' ?>">
        <i class="fab fa-tiktok"></i>
        <span>TikTok</span>
    </a>
    
    <a href="<?= base_url('email') ?>" class="sidebar-link <?= uri_string() == 'email' ? 'active' : '' ?>">
        <i class="fas fa-envelope"></i>
        <span>Email</span>
    </a>
    
    <a href="<?= base_url('website') ?>" class="sidebar-link <?= uri_string() == 'website' ? 'active' : '' ?>">
        <i class="fas fa-globe"></i>
        <span>Website</span>
    </a>
    
    <a href="<?= base_url('whatsapp') ?>" class="sidebar-link <?= uri_string() == 'whatsapp' ? 'active' : '' ?>">
        <i class="fab fa-whatsapp"></i>
        <span>WhatsApp</span>
    </a>

    <div class="sidebar-section">TRANSAKSI</div>
    
    <a href="<?= base_url('jadwal') ?>" class="sidebar-link <?= uri_string() == 'jadwal' ? 'active' : '' ?>">
        <i class="fas fa-calendar-alt"></i>
        <span>Penjadwalan Tugas</span>
    </a>
    
    <a href="<?= base_url('progress') ?>" class="sidebar-link <?= uri_string() == 'progress' ? 'active' : '' ?>">
        <i class="fas fa-chart-line"></i>
        <span>Progress Harian</span>
    </a>

</aside>

<!-- Menu toggle untuk mobile -->
<button class="menu-toggle" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<!-- Overlay untuk mobile -->
<div class="sidebar-overlay" onclick="toggleSidebar()"></div>

<style>
/* ===== SIDEBAR STYLING ===== */
.sidebar {
    width: 280px;
    min-width: 280px;
    max-width: 280px;
    height: 100vh;
    background: linear-gradient(195deg, #1e293b, #0f172a);
    color: #e2e8f0;
    padding: 28px 16px;
    position: sticky;
    top: 0;
    overflow-y: auto;
    overflow-x: hidden;
    box-shadow: 4px 0 20px rgba(0, 0, 0, 0.2);
    z-index: 100;
    scrollbar-width: thin;
    scrollbar-color: #475569 #1e293b;
    will-change: scroll-position; /* Optimasi scroll */
}

/* Custom Scrollbar */
.sidebar::-webkit-scrollbar {
    width: 5px;
}

.sidebar::-webkit-scrollbar-track {
    background: #1e293b;
}

.sidebar::-webkit-scrollbar-thumb {
    background: #475569;
    border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: #64748b;
}

/* Logo */
.sidebar-logo {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 35px;
    padding: 0 10px;
    color: white;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.sidebar-logo i {
    color: #3b82f6;
    font-size: 24px;
}

/* Section Header */
.sidebar-section {
    margin: 25px 0 8px 10px;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #94a3b8;
    font-weight: 600;
}

/* Sidebar Links */
.sidebar-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    border-radius: 12px;
    color: #cbd5e1;
    text-decoration: none;
    margin: 4px 0;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    font-weight: 500;
    font-size: 14px;
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

/* Icon styling */
.sidebar-link i {
    width: 24px;
    font-size: 18px;
    text-align: center;
    transition: all 0.3s ease;
}

/* Hover effect */
.sidebar-link:hover {
    background: rgba(59, 130, 246, 0.15);
    color: white;
    transform: translateX(5px);
}

.sidebar-link:hover i {
    color: #3b82f6;
    transform: scale(1.1);
}

/* Active link */
.sidebar-link.active {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    box-shadow: 0 8px 16px -4px rgba(59, 130, 246, 0.4);
}

.sidebar-link.active i {
    color: white;
}

/* Ripple effect */
.sidebar-link::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    transform: translate(-50%, -50%);
    transition: width 0.6s, height 0.6s;
    opacity: 0;
}

.sidebar-link:active::after {
    width: 200px;
    height: 200px;
    opacity: 1;
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        position: fixed;
        left: -280px;
        transition: left 0.3s ease;
        z-index: 1000;
    }
    
    .sidebar.active {
        left: 0;
    }
    
    /* Overlay for mobile */
    .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 99;
    }
    
    .sidebar-overlay.active {
        display: block;
    }
}

/* Menu toggle untuk mobile */
.menu-toggle {
    display: none;
    position: fixed;
    top: 20px;
    left: 20px;
    z-index: 101;
    background: #3b82f6;
    color: white;
    border: none;
    border-radius: 8px;
    padding: 10px 15px;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
}

@media (max-width: 768px) {
    .menu-toggle {
        display: block;
    }
}
</style>

<script>
// Fungsi toggle sidebar untuk mobile
function toggleSidebar() {
    document.querySelector('.sidebar').classList.toggle('active');
    document.querySelector('.sidebar-overlay').classList.toggle('active');
}

// ===== PENYIMPANAN POSISI SCROLL SIDEBAR =====
// Simpan posisi scroll saat link diklik
document.addEventListener('click', function(e) {
    // Cari elemen sidebar link yang diklik
    const link = e.target.closest('.sidebar-link');
    if (link) {
        let sidebar = document.querySelector('.sidebar');
        if (sidebar) {
            // Simpan posisi scroll ke sessionStorage
            sessionStorage.setItem('sidebarScrollPosition', sidebar.scrollTop);
        }
    }
});

// Kembalikan posisi scroll setelah halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    let sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        let savedPosition = sessionStorage.getItem('sidebarScrollPosition');
        if (savedPosition) {
            // Gunakan setTimeout untuk memastikan DOM sudah siap
            setTimeout(function() {
                sidebar.scrollTop = parseInt(savedPosition);
            }, 100);
        }
    }
});

// Tambahan: Simpan posisi saat sebelum unload (untuk jaga-jaga)
window.addEventListener('beforeunload', function() {
    let sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sessionStorage.setItem('sidebarScrollPosition', sidebar.scrollTop);
    }
});
</script>