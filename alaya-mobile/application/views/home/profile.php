<link rel="stylesheet" href="<?= asset_url() . 'css/home/profile.css' ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Your Profile</a>
    </nav>

    <div class="container my-4 animated fadeIn slow">
        <div class="row">
            <div class="col-4">
                <div class="spinner-border ml-auto loader" role="status" aria-hidden="true"></div>
                <img class="rounded profile data" src="" width="100" height="100" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>');">
            </div>
            <div class="col-8">
                <h4 class="text-truncate"><?= $this->session->userdata('name') ?></h4>
                <p class="m-0 text-truncate id">ID : </p>
                <p class="mt-0 text-truncate email"></p>
            </div>
        </div>

        <div class="row my-5 animated fadeInUp slow">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-body loader">
                        <div class="d-flex align-items-center mb-3" style="color:#ff6fa4 !important;">
                            <h4 class="spinner-text">Loading...</h4>
                            <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                        </div>
                    </div>

                    <div class="card-body data">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/id.png' ?>" alt="id" width="23">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom id"></p>
                                </div>
                            </li>
                            <li class="media my-1">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/email.png' ?>" alt="email" width="20">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom email"></p>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/location.png' ?>" alt="location" width="20">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom location"></p>
                                </div>
                            </li>
                            <li class="media mt-2">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/cabang.png' ?>" alt="cabang" width="20">
                                <div class="media-body">
                                    <p class="pb-1 border-bottom branch"></p>
                                </div>
                            </li>
                            <li class="media mt-1">
                                <img class="mr-3" src="<?= asset_url() . 'img/profile/position.png' ?>" alt="position" width="20">
                                <div class="media-body">
                                    <p class=" border-bottom position"></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row animated fadeInUp slow">
            <div class="col-12">
                <div class="card shadow">
                    <a href="<?= base_url('home/logout') ?>" class="btn btn-primary bg-transparent border-0">
                        <div class="row">
                            <div class="col">
                                <img class="float-left" src="<?= asset_url() . 'img/profile/position-1.png' ?>" alt="logout" width="20">
                            </div>
                            <div class="col">
                                <p>Log Out</p>
                            </div>
                            <div class="col">
                                <img class="float-right" src="<?= asset_url() . 'img/profile/btnlogout.png' ?>" alt="logout" width="20">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <input type="hidden" class="rest_url" value="<?= getenv('REST_URL') ?>">
    
    <script>
        $('.loader').show();
        $('.data').hide();
        let id = '<?= $this->session->userdata('user_id') ?>';
        $.ajax({
            url: "http://localhost/GITHUB_/alaya/alaya-mobile/profile/getProfile",
            type: 'post',
            data: {
                id: id
            },
            success: function(response) {
                let x = JSON.parse(response);
                console.log(x);
                $(".profile").attr("src", x.photo);
                $('.id').append(x.username);
                $('.email').append(x.email);
                $('.location').append(x.address);
                $('.branch').append(x.branch);
                $('.position').append(x.position);
            },
            complete: function(data) {
                $('.loader').hide();
                $('.data').show();
            }
        });
    </script>