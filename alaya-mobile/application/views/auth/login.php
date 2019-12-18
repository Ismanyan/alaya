<link rel="stylesheet" href="<?= asset_url() . 'css/login/login.css' ?>">
</head>

<body onload="splash(1000)">
    <div id="splashscreen" class="splashscreen">
        <br><br><br><br><br><br><br><br><br><br>
        <img class="w-75 mx-auto d-block " src="<?= asset_url() . 'img/alaya.png' ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>'); ">
        <div class="text-center check">
            <div class="spinner-grow text-login" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-login" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-login" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <div class="container mt-5 login animated fadeInUp">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form autocomplete="off">
                    <h3 class="text-center my-5 ">Login</h3>
                    <div class="alert alert-danger animated delay-1s shake" role="alert">
                        User does not exist
                    </div>
                    <div class="card shadow-sm border-0 ">
                        <div class="card-body">
                            <!-- userid -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0" id="userid">
                                        <img src="<?= asset_url() . 'img/login/profile.png' ?>" alt="profile">
                                    </span>
                                </div>
                                <input id="username" type="text" class="form-control" placeholder="ID user" aria-label="userid" aria-describedby="userid" name="username" required value="<?= set_value('username') ?>">
                            </div>
                            <!-- Email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0" id="email">
                                        <img src="<?= asset_url() . 'img/login/email.png' ?>" alt="profile">
                                    </span>
                                </div>
                                <input id="emails" type="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email" name="email" required value="<?= set_value('email') ?>">
                            </div>
                            <!-- Password -->
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0" id="password">
                                        <img src="<?= asset_url() . 'img/login/password.png' ?>" alt="password">
                                    </span>
                                </div>
                                <input id="passwords" type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-login btn btn-primary mt-5 w-100 bg-pink text-cente animated fadeInUp slowr">LOG IN <img class="float-right" src="<?= asset_url() . 'img/login/btnlogin2.png' ?>" alt="next"></button>
                </form>
            </div>
        </div>
    </div>

    <input type="hidden" class="rest_url" value="<?= getenv('REST_URL') ?>">
    <input type="hidden" class="base_url" value="<?= getenv('BASE_URL') ?>">
    <script src="<?= asset_url() . 'js/auth/login.js' ?>"></script>