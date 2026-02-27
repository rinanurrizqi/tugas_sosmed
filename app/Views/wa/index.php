<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<!-- CSS !-->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

<div class="topbar">Data Akun WhatsApp</div>

<a href="<?= base_url('wa/create') ?>" class="btn-primary">+ Tambah Nomor WA</a>

<div class="card" style="margin-top:20px;">
<table width="100%">
<thead>
<tr>
<th>No</th>
<th>ID</th>
<th>Nomor WhatsApp</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>

<?php if(!empty($wa)): ?>
<?php foreach($wa as $w): ?>
<tr>
<td><?= $w['id_wa'] ?></td>
<td><?= $w['no_wa'] ?></td>
<td>
<a href="<?= base_url('wa/edit/'.$w['id_wa']) ?>">Edit</a>
<a href="<?= base_url('wa/delete/'.$w['id_wa']) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
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