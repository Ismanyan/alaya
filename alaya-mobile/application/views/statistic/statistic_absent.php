<link rel="stylesheet" href="<?= asset_url() . 'css/statistic/absent_statistic.css' ?>">
<link rel="stylesheet" href="<?= asset_url() . 'css/statistic/search_absent.css' ?>">
<script src="<?= asset_url() . 'js/absent/search.js' ?>"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="pos-f-t">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a href="<?= base_url('statistic') ?>">
                <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
            </a>
            <a class="navbar-brand mx-auto" href="#" disabled>My Absent</a>
        </nav>
        <div class="collapse" id="navbarToggleExternalContent">
            <form class="form-inline px-3" method="post" action="<?= base_url('statistic/absent/') . $this->session->userdata('user_id') ?>">
                <input class="form-control mr-sm-2" name="date" id="datepicker" data-provide="datepicker" autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div class="container my-4 animated fadeIn slow">
        <?php if (count($absent) < 1) : ?>
            <div class="alert alert-warning" role="alert">
                Tidak ada absent
            </div>
        <?php else : ?>
            <?php foreach ($absent as $row) : ?>
                <a href="<?= base_url('absent/detail/') . $this->session->userdata('user_id') . '/' . $row['id'] ?>">
                    <div class="row mb-5">
                        <div class="col-4">
                            <img class="rounded" src="<?= $row['photo'] ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>');" width="100" height="100">
                        </div>
                        <div class="col-8">
                            <h5 class="text-truncate"><?= $this->session->userdata('name') ?></h5>
                            <p class="m-0">Time : <?= $row['time_entry'] ?></p>
                            <p class="mt-0">Date : <?= $row['date'] ?></p>
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
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy',
        });
    </script>