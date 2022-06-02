<?= $this->include('template/_header'); ?>

<h1 class="fw-light"><?= $title ?></h1>
<img src="<?= base_url('img/me-square.png') ?>" alt="" class="rounded-circle border border-5 border-primary mb-2" width="150px">
<p><?= $content ?></p>
<a href="#" class="btn" style="background-color: purple; color: white;">Learn More</a>

<?= $this->include('template/_footer'); ?>