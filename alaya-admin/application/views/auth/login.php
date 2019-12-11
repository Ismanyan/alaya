<link rel="stylesheet" href="<?= asset_url() . 'css/login/login.css' ?>">
</head>

<body onload="splash(1000)">
    <div id="splashscreen" class="splashscreen">
        <br><br><br><br><br><br><br><br><br><br>
        <img class="w-75 mx-auto d-block " src="<?= asset_url() . 'img/alaya.png' ?>" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>'); ">
    </div>

    <div class="container mt-5 login">
        <div class="row ">
            <div class="col-lg-6 mx-auto">
                <form action="<?= base_url('auth/index') ?>" method="post" autocomplete="off">
                    <h3 class="text-center my-5 animated fadeIn">Login</h3>
                    <div class="card shadow-sm border-0 animated fadeInUp">
                        <div class="card-body">
                            <!-- Username -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0" id="username">
                                        <img src="<?= asset_url() . 'img/login/profile.png' ?>" alt="profile">
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="ID User" aria-label="username" aria-describedby="username" name="username" required value="<?= set_value('username') ?>">
                            </div>
                            <!-- Email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0" id="email">
                                        <img src="<?= asset_url() . 'img/login/email.png' ?>" alt="profile">
                                    </span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email" name="email" required value="<?= set_value('email') ?>">
                            </div>
                            <!-- Password -->
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-0" id="password">
                                        <img src="<?= asset_url() . 'img/login/password.png' ?>" alt="password">
                                    </span>
                                </div>
                                <input type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <button type="sumbit" class="btn btn-primary mt-5 w-100 bg-pink text-cente animated fadeInUp slowr">LOG IN <img class="float-right" src="<?= asset_url() . 'img/login/btnlogin2.png' ?>" alt="next"></button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function splash(param) {
            var time = param;
            $('.login').hide();
            $('body').css('background-color', '#e9eef1');
            setTimeout(function() {
                $('#splashscreen').hide();
                $('.login').show();
                $('body').css('background-color', '#fff');
            }, time);
        }
    </script>