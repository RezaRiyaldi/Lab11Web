<?= $this->include('template/_header'); ?>

<h1 class="fw-light text-center"><?= $title ?></h1>

<form action="" class="text-start">
    <div class="mb-2">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control">
    </div>

    <div class="mb-2">
        <label for="" class="form-label">Subject</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-2">
        <label for="" class="form-label">Message</label>
        <textarea name="" class="form-control" id="" cols="10" rows="3"></textarea>
    </div>

    <button class="btn btn-primary">Send</button>
</form>

<?= $this->include('template/_footer'); ?>