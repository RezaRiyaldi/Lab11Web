<?= $this->include('template/_header.php'); ?>

<h1 class="display-4" style="font-size: 36px;">Detail <?= $artikel['judul'] ?></h1>

<div class="card my-3">
    <div class="card-header">
        <h4><?= $artikel['judul'] ?></h4>
    </div>

    <div class="card-body">
        <!-- <img src="<?= base_url() . '/gambar/' . $artikel['gambar'] ?>" alt="<?= $artikel['judul'] ?>"> -->
        <p><?= $artikel['isi'] ?></p>
    </div>

    <div class="card-footer text-center">
        <?= $artikel['date_created'] ?>
    </div>
</div>

<?= $this->include('template/_footer.php'); ?>