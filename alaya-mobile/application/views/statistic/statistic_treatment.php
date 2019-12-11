<link rel="stylesheet" href="<?= asset_url() . 'css/statistic/absent_statistic.css' ?>">
<link rel="stylesheet" href="<?= asset_url() . 'css/statistic/search_treatment.css' ?>">
<link rel="stylesheet" href="<?= asset_url() . 'css/statistic/search_absent.css' ?>">
<script src="<?= asset_url() . 'js/absent/search.js' ?>"></script>
<script src="<?= asset_url() . 'js/treatment/jquery.ellipsis.min.js' ?>"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="pos-f-t">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a href="<?= base_url('statistic') ?>">
                <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
            </a>
            <a class="navbar-brand mx-auto" href="#" disabled>My treatment</a>
        </nav>
        <div class="collapse" id="navbarToggleExternalContent">
            <form class="form-inline px-3" method="post" action="<?= base_url('statistic/treatment/') . $this->session->userdata('user_id') ?>">
                <input class="form-control mr-sm-2" name="date" id="datepicker" data-provide="datepicker" autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="container my-4 animated fadeIn slow">
        <?php if (count($treatment) < 1) : ?>
            <div class="alert alert-warning" role="alert">
                Tidak ada treatment
            </div>
        <?php else : ?>
            <?php foreach ($treatment as $row) : ?>
                <a class="text-decoration-none" href="<?= base_url('treatment/history/') . $row['users_id'] . '/' . $row['id'] ?>">
                    <div class="row my-4 border-bottom animated fadeIn slow">
                        <div class="col-5">
                            <img class=" rounded w-100" src="<?= $row['photo'] ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>'); ">
                            <p class="m-0 text-center">Start at <?= $row['time_entry'] ?></p>
                            <p class="m-0 text-center">Done at <?= $row['time_out'] ?></p>
                        </div>
                        <div class="col-7">
                            <h5 class="head-title text-truncate"><?= $row['name'] ?></h5>
                            <p class="desc"><?= $row['desc'] ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <a class="scroll-to-top rounded" href="#search" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <img class="mb-2" src="<?= asset_url() . 'img/absent/search.png' ?>" alt="search" width="20">
    </a>

    <script>
        $('.desc').ellipsis({
            row: 5
        });

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy',
        });
    </script>