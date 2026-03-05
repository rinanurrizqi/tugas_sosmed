<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="topbar">
<?= isset($wa) ? 'Edit Nomor WhatsApp' : 'Tambah Nomor WhatsApp' ?>
</div>

<div class="card">
<form method="post"
action="<?= isset($wa)
? base_url('wa/update/'.$wa['id_wa'])
: base_url('wa/store') ?>">

<label>Nomor WhatsApp</label>
<input type="text" name="no_wa"
value="<?= $wa['no_wa'] ?? '' ?>" required>

<br><br>
<button type="submit" class="btn-primary">Simpan</button>
<a href="<?= base_url('wa') ?>">Kembali</a>

</form>
</div>

<?= $this->endSection() ?>