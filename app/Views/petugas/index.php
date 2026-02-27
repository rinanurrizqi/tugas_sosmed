<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="topbar">
    <h2>Data Petugas</h2>
    <div class="topbar-user"><i class="fas fa-user-circle"></i><span>Admin</span></div>
</div>

<div class="data-akun-section">
    <div class="section-header">
        <h3><i class="fas fa-users"></i> Daftar Petugas</h3>
        <a href="<?= base_url('petugas/create') ?>" class="btn-tambah">
            <i class="fas fa-plus"></i> Tambah Petugas
        </a>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Petugas</th>
                    <th>Nama Petugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($petugas)): ?>
                    <?php $no = 1; foreach ($petugas as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($p['id_petugas']) ?></td>
                        <td><?= esc($p['nama_petugas']) ?></td>
                        <td>
                            <a href="<?= base_url('petugas/edit/' . $p['id_petugas']) ?>" class="btn-edit"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?= base_url('petugas/delete/' . $p['id_petugas']) ?>" class="btn-hapus" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align:center;padding:30px;">Belum ada data petugas</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>