<link rel="stylesheet" href="<?= asset_url() . 'css/treatment/treatment.css' ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-5">
        <a href="<?= base_url('statistic/treatment/').$this->session->userdata('user_id') ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>My Detail Treatment </a>
    </nav>
    <div class="container animated fadeIn slow">
        <img class="img-fluid mx-auto d-block rounded shadow" src="<?= $treatment['photo'] ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>');">

        <h5 class="title-detail my-4 text-center"><?= $treatment['name'] ?></h5>
        <p class="text-center"><?= $treatment['desc'] ?></p>

        <hr>
        <p><b>Time : </b> <?= $treatment['duration'] ?> Minutes</p>
        <p><b>Price : </b><?= $treatment['price'] ?></p>
        <p><b>Therapist Date : </b><?= $treatment['date'] ?></p>
        <p><b>Start Treatment : </b><?= $treatment['time_entry'] ?></p>
        <p><b>Done Treatment : </b><?= $treatment['time_out'] ?></p>
    </div>