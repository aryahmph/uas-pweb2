<?php $this->extend('templates/dashboard') ?>
<?php $this->section('content') ?>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">AryaHmph</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- End of Nav -->

    <div class="container mx-auto">
        <div class="row my-5">
            <div class="col-6 mx-auto">
                <h2 class="mt-5 mb-4">Update Data</h2>
                <form action="/update" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username : </label>
                        <input required type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name : </label>
                        <input required type="text" class="form-control" id="name" name="name" value="<?= $name ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description : </label>
                        <input required type="text" class="form-control" id="description" name="description" value="<?= $description ?>">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Email : </label>
                        <input required type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender : </label>
                        <select class="form-select" id="gender" name="gender">
                            <?php if ($gender === "male") { ?>
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>

                            <?php } elseif ($gender === "female") { ?>
                                <option value="Male">Male</option>
                                <option selected value="Female">Female</option>
                            <?php } else { ?>
                                <option selected>Choose your gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3 mt-5">
                        <label for="university" class="form-label">University : </label>
                        <input required type="text" class="form-control" id="university" name="university" value="<?= $university ?>">
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Major : </label>
                        <input required type="text" class="form-control" id="major" name="major" value="<?= $major ?>">
                    </div>


                    <div class="mb-3 mt-5">
                        <label for="linkedinAccount" class="form-label">LinkedIn Name : </label>
                        <input required type="text" class="form-control" id="linkedinAccount" name="linkedin_account" value="<?= $linkedin_account ?>">
                    </div>
                    <div class="mb-3">
                        <label for="linkedinURL" class="form-label">LinkedIn URL : </label>
                        <input required type="text" class="form-control" id="linkedinURL" name="linkedin_url" value="<?= $linkedin_url ?>">
                    </div>
                    <div class="mb-3">
                        <label for="githubAccount" class="form-label">GitHub Name : </label>
                        <input required type="text" class="form-control" id="githubAccount" name="github_account" value="<?= $github_account ?>">
                    </div>
                    <div class="mb-3">
                        <label for="whatsappAccount" class="form-label">Whatsapp : </label>
                        <input required type="text" class="form-control" id="whatsappAccount" name="whatsapp_account" value="<?= $whatsapp_account ?>">
                    </div>

                    <div class="mb-3 mt-5">
                        <label for="image" class="form-label">Profile image :</label>
                        <input class="form-control" type="file" id="image" name="image_url">
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                        </div>
                        <div class="col-2">
                            <a href="/" class="w-100">
                                <p class="btn btn-secondary mt-4">Cancel</p>
                            </a>
                        </div>
                    </div>




                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to change the data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Modal -->
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
<?php $this->endSection() ?>