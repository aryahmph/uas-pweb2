<?php $this->extend('templates/login_register') ?>
<?php $this->section('content') ?>
    <body class="text-center">
    <p><?= $validation->listErrors() ?></p>
    <main class="form-signin">
        <form action="/register" method="post">
            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="tugas.pweb">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                       placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="text" name="name" class="form-control" id="floatingName" placeholder="name">
                <label for="name">Name</label>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingemail" placeholder="email">
                <label for="email">Email</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            <p class="mt-5 mb-3 text-muted">&copy; Achmad Arta Arya | Triple A</p>
        </form>
    </main>
    </body>
<?php $this->endSection() ?>