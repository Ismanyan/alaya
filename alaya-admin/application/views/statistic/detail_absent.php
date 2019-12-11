<link rel="stylesheet" href="<?= asset_url() . 'css/statistic/absent_statistic.css' ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url('statistic/absent/') . $this->session->userdata('user_id') ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>My Absent Detail</a>
    </nav>

    <h5 class="text-truncate text-center my-3"><b><?= $users['name'] ?></b></h5>

    <div class="container">
        <img class="img-fluid mx-auto d-block rounded shadow" src="<?= $users['photo'] ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>'); ">

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <p><b>ID </b></p>
                        <p><b>Email </b></p>
                        <p><b>Lokasi </b></p>
                        <p><b>Waktu Masuk </b></p>
                        <p><b>Tanggal Masuk </b></p>
                    </div>
                    <div class="col-7">
                        <!-- TODO: CHANGE THIS TO USER ID -->
                        <p class="text-truncate"><b>:</b> <?= $users['users_id'] ?></p>
                        <p class="text-truncate"><b>:</b> <?= $users['email'] ?></p>
                        <p class="text-truncate"><b>:</b> <?= $users['location'] ?></p>
                        <p><b>:</b> <?= $users['time_entry'] ?></p>
                        <p><b>:</b> <?= $users['date'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>