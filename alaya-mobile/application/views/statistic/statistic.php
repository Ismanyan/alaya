<link rel="stylesheet" href="<?= asset_url() . 'css/home/dashboard.css' ?>">
</head>

<body>
    <div id="carouselDashboard" class="carousel slide animated fadeIn slow" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselDashboard" data-slide-to="0" class="active"></li>
            <li data-target="#carouselDashboard" data-slide-to="1"></li>
            <li data-target="#carouselDashboard" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= asset_url() . 'img/dashboard/slide1.jpg' ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= asset_url() . 'img/dashboard/slide2.jpg' ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= asset_url() . 'img/dashboard/slide3.jpg' ?>" alt="Third slide">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <p class="text-center text-secondary mt-3 animated fadeIn slow">
                    Hello, <?= $this->session->userdata('name') ?> <br>
                    Welcome to Alaya Spa
                </p>
                <div class="btn-groups animated fadeInUp">
                    <a href="<?= base_url('statistic/treatment/') . $this->session->userdata('user_id') ?>" class="btn btn-primary bg-pink w-100 text-center mb-3 shadow-sm">
                        <img class="float-left" src="<?= asset_url() . 'img/dashboard/myabsent.png' ?>" alt="myabsent" width="18"> My Treatment
                    </a>
                    <a href="<?= base_url('statistic/absent/') . $this->session->userdata('user_id') ?>" class="btn btn-primary bg-pink w-100 text-center mb-3 shadow-sm">
                        <img class="float-left" src="<?= asset_url() . 'img/dashboard/myabsent.png' ?>" alt="myabsent"> My Absent
                    </a>
                    <a href="<?= base_url() ?>" class="btn btn-primary bg-pink w-100 text-center mb-3 shadow-sm">
                        <img class="float-left" src="<?= asset_url() . 'img/dashboard/back.png' ?>" alt="back"> Back
                    </a>
                </div>
            </div>
        </div>
    </div>