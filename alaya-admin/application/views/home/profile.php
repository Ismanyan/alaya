<link rel="stylesheet" href="<?= asset_url() . 'css/home/profile.css' ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Your Profile</a>
    </nav>

    <div class="container my-4 animated fadeIn slow">
        <div class="row">
            <div class="col-4">
                <img class="rounded profile" src="<?= $user['photo'] ?>" width="100" height="100" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>');">
            </div>
            <div class="col-8">
                <h4 class="text-truncate"><?= $this->session->userdata('name') ?></h4>
                <p class="m-0">ID : <?= $this->session->userdata('user_id') ?></p>
                <p class="mt-0"><?= $user['email'] ?></p>
            </div>
        </div>

        <div class="row my-5 animated fadeInUp slow">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/id.png' ?>" alt="id" width="23">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom">ID : <?= $this->session->userdata('user_id') ?></p>
                                </div>
                            </li>
                            <li class="media my-1">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/email.png' ?>" alt="email" width="20">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom"><?= $user['email'] ?></p>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/location.png' ?>" alt="location" width="20">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom"><?= $user['address'] ?></p>
                                </div>
                            </li>
                            <li class="media mt-2">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/cabang.png' ?>" alt="cabang" width="20">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom"><?= $user['branch'] ?></p>
                                </div>
                            </li>
                            <li class="media mt-1">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/position.png' ?>" alt="position" width="20">
                                <div class="media-body">
                                    <p class=" border-bottom"><?= $user['position'] ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row animated fadeInUp slow">
            <div class="col-12">
                <div class="card shadow">
                    <a href="<?= base_url('home/logout') ?>" class="btn btn-primary bg-transparent border-0">
                        <div class="row">
                            <div class="col">
                                <img class="float-left" src="<?= asset_url() . 'img/profile/position-1.png' ?>" alt="logout" width="20">
                            </div>
                            <div class="col">
                                <p>Log Out</p>
                            </div>
                            <div class="col">
                                <img class="float-right" src="<?= asset_url() . 'img/profile/btnlogout.png' ?>" alt="logout" width="20">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>