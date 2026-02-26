<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="topbar">
<?= isset($email) ? 'Edit Email' : 'Tambah Email' ?>
</div>

<div class="card">
<form method="post"
action="<?= isset($email)
? base_url('email/update/'.$email['id_email'])
: base_url('email/store') ?>">

<label>Alamat Email</label>
<input type="text" name="alamat_email"
value="<?= $email['alamat_email'] ?? '' ?>" required>

<br><br>
<button type="submit" class="btn-primary">Simpan</button>
<a href="<?= base_url('email') ?>">Kembali</a>

</form>
</div>

<?= $this->endSection() ?>