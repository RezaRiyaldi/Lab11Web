<?= $this->include('template/_header.php'); ?>

<h1 class="display-4">Artikel</h1>

<?php if ($artikels) : foreach ($artikels as $artikel) : ?>
        <div class="card my-3">
            <div class="card-header">
                <h4><a href="<?= base_url() . '/artikel/detail/' . $artikel['slug'] ?>"><?= $artikel['judul'] ?></a></h4>
            </div>

            <div class="card-body">
                <img src="<?= base_url() . '/img/' . $artikel['gambar'] ?>" alt="<?= $artikel['judul'] ?>" height="200px">
                <p><?= substr($artikel['isi'], 0, 200) ?></p>
            </div>

            <div class="card-footer text-center">
                <?= $artikel['date_created'] ?>
            </div>
        </div>
    <?php endforeach;
else : ?>
<div class="card">
    <div class="card-body">Belum ada data</div>
</div>
<?php endif; ?>

<?= $this->include('template/_footer.php'); ?>