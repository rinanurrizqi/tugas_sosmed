<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="topbar">Data Website</div>

<a href="<?= base_url('website/create') ?>" class="btn-primary">+ Tambah Website</a>

<div class="card" style="margin-top:20px;">
<table width="100%">
<thead>
<tr>
<th>No</th>
<th>ID</th>
<th>Link Website</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>

<?php if(!empty($website)): ?>
<?php foreach($website as $w): ?>
<tr>
<td><?= $w['id_website'] ?></td>
<td><?= $w['link_website'] ?></td>
<td>
<a href="<?= base_url('website/edit/'.$w['id_website']) ?>">Edit</a>
<a href="<?= base_url('website/delete/'.$w['id_website']) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
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