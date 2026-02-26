<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- CSS !-->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<div class="topbar">Data Akun Email</div>

<a href="<?= base_url('email/create') ?>" class="btn-primary">+ Tambah Email</a>

<div class="card" style="margin-top:20px;">
<table width="100%">
<thead>
<tr>
<th>ID</th>
<th>Email</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>

<?php if(!empty($email)): ?>
<?php foreach($email as $e): ?>
<tr>
<td><?= $e['id_email'] ?></td>
<td><?= $e['alamat_email'] ?></td>
<td>
<a href="<?= base_url('email/edit/'.$e['id_email']) ?>">Edit</a>
<a href="<?= base_url('email/delete/'.$e['id_email']) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
</td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td colspan="3" align="center">Belum ada data</td></tr>
<?php endif; ?>

</tbody>
</table>
</div>

<?= $this->endSection() ?>