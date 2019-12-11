<link rel="stylesheet" href="<?= asset_url() . 'css/treatment/treatment.css' ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url('treatment') ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Treatment Detail</a>
    </nav>

    <div class="container animated fadeIn slow">
        <img class="img-fluid mx-auto d-block rounded shadow" src="<?= $treatment['photo'] ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>');">

        <h5 class="title-detail my-4 text-center"><?= $treatment['name'] ?></h5>
        <p class="text-center mb-4"><?= $treatment['desc'] ?></p>
        <div class="row ">
            <div class="col-6">
                <a href="<?= base_url('treatment/start/') . $this->session->userdata('user_id') . "/" . $treatment['id'] ?>" class="btn btn-secondary w-100 py-3">Start</a>
            </div>
            <div class="col-6">
                <p class="m-0">Time: <?= date('h:i A') ?></p>
                <p class="m-0">Date: <?= date('d/m/Y') ?></p>
            </div>
        </div>
    </div>