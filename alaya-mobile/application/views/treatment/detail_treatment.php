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
        <p class="text-center"><?= $treatment['desc'] ?></p>
    </div>