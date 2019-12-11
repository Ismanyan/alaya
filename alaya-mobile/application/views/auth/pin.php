<link rel="stylesheet" href="<?= asset_url() . 'css/login/pin.css' ?>">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <h3 class="text-center my-5 animated fadeIn slow">PIN</h3>
                <form action="<?= base_url('auth/check_pin') ?>" method="post">
                    <div class="card shadow-sm border-0 mb-3 animated fadeIn slow">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="password" class="form-control pin text-center" name="pin" max="6" name="pin" readonly>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?= $user_id ?>" readonly>

                    <!-- Number -->
                    <div class="number animated fadeInUp">
                        <div class="col-lg-12">
                            <div class="btn-group my-3 w-100" role="group" aria-label="First group">
                                <button type="button" class="btn btn-secondary" onclick="addNumber(1)">1</button>
                                <button type="button" class="btn btn-secondary mx-5" onclick="addNumber(2)">2</button>
                                <button type="button" class="btn btn-secondary" onclick="addNumber(3)">3</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="btn-group my-3 w-100" role="group" aria-label="First group">
                                <button type="button" class="btn btn-secondary" onclick="addNumber(4)">4</button>
                                <button type="button" class="btn btn-secondary mx-5" onclick="addNumber(5)">5</button>
                                <button type="button" class="btn btn-secondary" onclick="addNumber(6)">6</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="btn-group my-3 w-100" role="group" aria-label="First group">
                                <button type="button" class="btn btn-secondary" onclick="addNumber(7)">7</button>
                                <button type="button" class="btn btn-secondary mx-5" onclick="addNumber(8)">8</button>
                                <button type="button" class="btn btn-secondary" onclick="addNumber(9)">9</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="btn-group my-4 w-100" role="group" aria-label="First group">
                                <button type="button" class="btn btn-secondary" onclick="deleteNumber()">
                                    <</button> <button type="button" class="btn btn-secondary mx-5" onclick="addNumber(0)">0
                                </button>
                                <button type="submit" class="btn btn-secondary">></button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script src="<?= asset_url() . 'js/auth/pin.js' ?>"></script>