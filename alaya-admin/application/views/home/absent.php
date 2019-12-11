<link rel="stylesheet" href="<?= asset_url() . 'css/home/absent.css' ?>">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/absent/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Home</a>
    </nav>
    <ul class="nav justify-content-center bg-primary">
        <li class="nav-item tex-center">
            <p class="nav-link active m-0 animated fadeIn slow" href="#">Latitude : <?= $geo['lat'] ?> Longitude: <?= $geo['lon'] ?></p>
            <p class="nav-link text-center animated fadeIn slow">Time : <?= date("H:i:s"); ?></p>
        </li>
    </ul>

    <div class="mapouter animated fadeIn slow">
        <div class="gmap_canvas">
            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=@<?= $geo['lat'] ?>,<?= $geo['lon'] ?>&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" ></iframe>
        </div>
        <script>
            var height = $(window).height() - 145;
            console.log(height);
            $('#gmap_canvas').css('height', height + 'px');
        </script>
    </div>

    <form action="<?= base_url('absent/check/') . $this->session->userdata('user_id') ?>" method="post">
        <input type="hidden" name="latitude" value="<?= $geo['lat'] ?>">
        <input type="hidden" name="longitude" value="<?= $geo['lon'] ?>">
        <input type="hidden" name="location" value="<?= $geo['city'] . ',' . $geo['regionName'] . ',' . $geo['country'] ?>">
        <button type="submit" class="btn btn-primary absent py-3 animated fadeInUp slow">Cek Absen</button>
    </form>