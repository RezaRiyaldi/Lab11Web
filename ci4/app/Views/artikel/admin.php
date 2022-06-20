<?= $this->include('template/admin_header.php'); ?>

<div class="container py-5">
    <h1 class="display-4 d-inline" style="font-size: 36px; border-bottom: 5px solid #ddd;"><?= $title ?></h1>

    <form method="get" class="mt-4">
        <input type="text" name="cari" value="<?= $cari ?>" placeholder="Cari data" class="form-control align-middle" style="display: inline; width: auto;">
        <button class="btn btn-primary" style="display: inline" type="submit">Cari</button>
    </form> 

    <a href="<?= base_url('artikel/admin/add') ?>" class="btn btn-primary btn-sm d-block mt-4">+ Tambah Artikel</a>
    <table class="table table-hover table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            if ($artikels) {
                foreach ($artikels as $artikel) { ?>
                    <tr>
                        <td class="text-center" style="vertical-align: middle;"><?= $no++ ?></td>
                        <td>
                            <b class="d-block"><?= $artikel['judul'] ?></b>
                            <small><?= substr($artikel['isi'], 0, 50) ?></small>
                        </td>
                        <td class="text-center" style="vertical-align: middle;"><?= $artikel['status'] ?></td>
                        <td class="text-center" style="vertical-align: middle;">
                            <a href="<?= base_url() . '/artikel/edit/' . $artikel['slug'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url() . '/artikel/delete/' . $artikel['slug'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $artikel['judul'] ?>?')">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="4" class="text-center">Data masih kosong</td>
                </tr>
            <?php } ?>
        </tbody>

        <!-- <tfoot>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </tfoot> -->
    </table>
    <?= $pager->only(['cari'])->links('btcorona', 'bootstrap_pagination') ?>
</div>

<?= $this->include('template/admin_footer.php'); ?>