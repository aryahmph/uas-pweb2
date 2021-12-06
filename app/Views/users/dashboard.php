<?php $this->extend('templates/dashboard') ?>
<?php $this->section('content') ?>
    <body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">AryaHmph</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
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
        <div class="row mx-auto">
            <div class="col-12 text-center mt-5">
                <img src="<?= base_url("/uploads") . "/" . $image_url ?>" class="profile-img" alt="profile-image">
            </div>
            <div class="col-12 text-center mt-4">
                <h2><?= $name ?></h2>
                <p><?= $description ?></p>
                <div class="icon mt-4">
                    <a href="<?= "https://github.com/" . $github_account ?>" target="_blank">
                        <img src="<?= base_url("resources/logos_github-icon.png") ?>" alt="github">
                    </a>
                    <a href="<?= $linkedin_url ?>" target="_blank">
                        <img src="<?= base_url("resources/logos_linkedin-icon.png") ?>" alt="linkedin">
                    </a>
                    <a href="#" target="_blank">
                        <img src="<?= base_url("resources/logos_whatsapp.png") ?>" alt="whatsapp">
                    </a>
                </div>
                <a href="update.php" class="btn btn-outline-secondary btn-sm mt-5 rounded btn-edit icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-gear-fill" viewBox="0 0 16 16">
                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                    </svg>
                    Edit Profile</a>
            </div>
        </div>

        <div class="row mx-auto mt-5">
            <div class="col-8 mx-auto">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Introduction
                        </button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile
                        </button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php if (is_null($university) || is_null($major)) { ?>
                            <p class="p-3">Please complete your profile in update profile</p>
                        <?php } else { ?>
                            <p class="p-3">
                                Hello, my name is <b><?= $name ?></b>, studying at
                                <b><?= $university ?></b>, majoring in <b><?= $major ?></b>.
                                <br> Nice to meet yaa !
                            </p>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <h6 class="mt-4">Profile about me :</h6>

                        <ul>
                            <?php if (is_null($university) || is_null($major)) { ?>
                                <li>Please complete your profile in update profile</li>
                            <?php } else { ?>
                                <li>Name : <?= $name ?></li>
                                <li>University : <?= $university ?></li>
                                <li>Major : <?= $major ?></li>
                                <li>Gender : <?= $gender ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <h6 class="mt-4">Find me on :</h6>
                        <ul>
                            <?php if (is_null($university) || is_null($major)) { ?>
                                <li>Please complete your profile in update profile</li>
                            <?php } else { ?>
                                <li>Email : <?= $email ?></li>
                                <li>LinkedIn : <?= $linkedin_account ?></li>
                                <li>GitHub : <?= $github_account ?></li>
                                <li>Whatsapp : <?= $whatsapp_account ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
            crossorigin="anonymous"></script>
    </body>
<?php $this->endSection() ?>