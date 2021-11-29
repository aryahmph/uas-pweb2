<?php $this->extend('templates/login_register') ?>
<?php $this->section('content') ?>
    <body class="text-center">
    <main class="form-signin">
        <form action="/login" method="POST">
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>
            <h1 class="h3 mb-4 fw-normal">Login</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="aryahmph" name="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                       name="password">
                <label for="floatingPassword">Password</label>
            </div>

            <button type="submit" class="w-100 btn btn-primary mt-2">Submit</button>
            <a href="register.php" class="w-100">
                <p class="mt-2 text-secondary">Register</p>
            </a>
            <p class="mt-5 mb-3 text-muted">&copy; Achmad Arta Arya | Triple A</p>
        </form>
    </main>
    </body>
<?php $this->endSection() ?>