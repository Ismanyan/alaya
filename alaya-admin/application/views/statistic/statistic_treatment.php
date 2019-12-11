<link rel="stylesheet" href="<?= asset_url() . 'css/statistic/absent_statistic.css' ?>">
<link rel="stylesheet" href="<?= asset_url() . 'css/statistic/search_treatment.css' ?>">
<link rel="stylesheet" href="<?= asset_url() . 'css/statistic/search_absent.css' ?>">
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="pos-f-t">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a href="<?= base_url() ?>">
                <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
            </a>
            <a class="navbar-brand mx-auto" href="#" disabled>Treatment By Therapist</a>
        </nav>
        <div class="collapse" id="navbarToggleExternalContent">
            <form class="form-inline px-3" method="post" action="<?= base_url('statistic/treatment/') . $this->session->userdata('user_id') ?>">
                <input class="form-control mr-sm-2" name="date" id="datepicker" data-provide="datepicker" autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="container my-4 animated fadeIn slow">
        <?php if (count($treatment) < 1 || count($treatment) == null) : ?>
            <div class="alert alert-warning" role="alert">
                Belum ada treatment
            </div>
        <?php else : ?>
            <?php foreach ($treatment as $row) : ?>
                <a class="text-decoration-none" href="<?= base_url('treatment/detail/') . $row['id'] ?>">
                    <div class="row animated fadeIn slow">
                        <div class="col-5">
                            <img class=" rounded w-100" src="<?= $row['photo'] ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>'); ">
                        </div>
                        <div class="col-7">
                            <h5 class="head-title text-truncate"><?= $row['name'] ?></h5>
                            <p class="treatment text-truncate"><b><?= $row['title'] ?></b></p>
                            <p class="treatment text-truncate">Durasi : <b><?= $row['duration'] ?> Minute</b></p>
                        </div>
                    </div>
                </a>
                <hr>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <a class="scroll-to-top rounded" href="#search" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <img class="mb-2" src="<?= asset_url() . 'img/absent/search.png' ?>" alt="search" width="20">
    </a>


    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy',
        });
    </script>