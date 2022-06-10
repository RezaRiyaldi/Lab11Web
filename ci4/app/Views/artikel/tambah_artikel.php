<?= $this->include('template/admin_header'); ?>

<div class="container py-5">
    <h1 class="display-4 d-inline" style="font-size: 36px; border-bottom: 5px solid #ddd;">Tambah Artikel</h1>

    <div class="row m-0 mt-4">
        <div class="col-md-6 p-0">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('artikel/admin/store') ?>" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" placeholder="Masukan judul yang menarik" value="<?= old('judul') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Isi</label>
                            <textarea name="isi" id="" cols="" rows="" placeholder="Buatlah artikel yang menarik" class="form-control"><?= old('isi') ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Artikel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('template/admin_footer'); ?>