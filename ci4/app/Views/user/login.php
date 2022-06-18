<?= $this->include('template/admin_header.php'); ?>
<div class="row m-0">
    <div class="col-md-4 mx-auto">
        <div class="card mt-5">
            <div class="card-header">
                <h4>Login</h4>
            </div>

            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->include('template/admin_footer.php'); ?>