<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="topbar">
<?= isset($website) ? 'Edit Website' : 'Tambah Website' ?>
</div>

<div class="card">
<form method="post"
action="<?= isset($website)
? base_url('website/update/'.$website['id_website'])
: base_url('website/store') ?>">

<label>Link Website</label>
<input type="text" name="link_website"
value="<?= $website['link_website'] ?? '' ?>" required>

<br><br>
<button type="submit" class="btn-primary">Simpan</button>
<a href="<?= base_url('website') ?>">Kembali</a>

</form>
</div>

<?= $this->endSection() ?>