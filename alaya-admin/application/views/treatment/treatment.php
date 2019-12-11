<link rel="stylesheet" href="<?= asset_url() . 'css/treatment/treatment.css' ?>">
<script src="<?= asset_url() . 'js/treatment/jquery.ellipsis.min.js' ?>"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Treatment</a>
    </nav>

    <div class="container">
        <?php foreach ($treatments as $row) : ?>
            <div class="row my-4 border-bottom animated fadeIn slow">
                <div class="col-5">
                    <img class=" rounded w-100" src="<?= $row['photo'] ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>'); ">
                    <div class="btn-group my-2" role="group" aria-label="Basic example">
                        <a href="<?= base_url('treatment/detail/') . $row['id'] ?>">
                            <button type="button" class="btn btn-secondary btn-sm shadow-sm">Detail</button>
                        </a>
                        <div class="divinder mx-1"></div>
                        <a href="<?= base_url('treatment/count/') . $row['id'] ?>">
                            <button type="button" class="btn btn-secondary btn-sm shadow-sm">Count</button>
                        </a>
                    </div>
                </div>
                <div class="col-7">
                    <p class="head-title text-truncate"><?= $row['name'] ?></p>
                    <p class="desc"><?= $row['desc'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        $('.desc').ellipsis({
            row: 4
        });
    </script>