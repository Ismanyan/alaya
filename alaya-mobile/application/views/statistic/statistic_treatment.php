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
            <form class="form-inline px-3">
                <input class="form-control mr-sm-2" name="date" id="datepicker" data-provide="datepicker" autocomplete="off">
                <button class="btn btn-outline-success my-2 my-sm-0 search" type="button">Search</button>
            </form>
        </div>
    </div>

    <div class="container my-4 animated fadeIn slow">
        <div class="loader">
            <div class="d-flex align-items-center mb-3" style="color:#ff6fa4 !important;">
                <h4 class="navbar-brand spinner-text">Loading...</h4>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>
        </div>
        <div class="alert alert-warning" role="alert">
            Tidak ada treatment
        </div>
        <div class="datas"></div>
    </div>

    <a class="scroll-to-top rounded" href="#search" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <img class="mb-2" src="<?= asset_url() . 'img/absent/search.png' ?>" alt="search" width="20">
    </a>

    <input type="hidden" class="base_url" value="<?= getenv('BASE_URL') ?>">
    <input type="hidden" class="next" value="<?= base_url('treatment/history/') . $this->session->userdata('user_id') . '/' ?>">

    <script>
        var base_url = $('.base_url').val();
        var next = $('.next').val();
        $('.alert-warning').hide();

        $('.desc').ellipsis({
            row: 5
        });

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd/mm/yyyy',
        });

        $.ajax({
            url: base_url + "statistic/getTreatment",
            type: 'get',
            success: function(response) {
                let x = JSON.parse(response);
                if (x.length < 1) {
                    $('.alert-warning').show();
                } else {
                    $.each(x, function(key, value) {
                        $('.loader').hide();
                        $('.datas').append(`
                            <div class="data-` + key + `"></div>
                        `);

                        $('.data-' + key).append(`
                            <a class="text-decoration-none" href="` + next + value.id + `">
                                <div class="row my-4 border-bottom animated fadeIn slow">
                                    <div class="col-5">
                                        <img class=" rounded w-100" src="` + value.photo + `" style="#">
                                        <p class="m-0 text-center">Start at ` + value.time_entry + `</p>
                                        <p class="m-0 text-center">Done at ` + value.time_out + `</p>
                                    </div>
                                    <div class="col-7">
                                        <h5 class="head-title text-truncate">` + value.name + `</h5>
                                        <p class="desc">` + value.desc + `</p>
                                    </div>
                                </div>
                            </a>
                        `);
                    });
                }
            }
        });

        $('.search').click(function() {
            $('.alert-warning').hide();
            $('.loader').show();
            $('.datas').html(' ');
            var date = $('#datepicker').val();
            $.ajax({
                url: base_url + "statistic/getTreatment",
                type: 'post',
                data: {
                    date: date
                },
                success: function(response) {
                    let x = JSON.parse(response);
                    $('.loader').hide();
                    if (x.length < 1) {
                        $('.alert-warning').show();
                    } else {
                        $.each(x, function(key, value) {
                            $('.loader').hide();
                            $('.datas').append(`
                                <div class="data-` + key + `"></div>
                            `);

                            $('.data-' + key).append(`
                                <a class="text-decoration-none" href="` + next + value.id + `">
                                    <div class="row my-4 border-bottom animated fadeIn slow">
                                        <div class="col-5">
                                            <img class=" rounded w-100" src="` + value.photo + `" style="#">
                                            <p class="m-0 text-center">Start at ` + value.time_entry + `</p>
                                            <p class="m-0 text-center">Done at ` + value.time_out + `</p>
                                        </div>
                                        <div class="col-7">
                                            <h5 class="head-title text-truncate">` + value.name + `</h5>
                                            <p class="desc">` + value.desc + `</p>
                                        </div>
                                    </div>
                                </a>
                            `);
                        });
                    }
                }
            });
        });
    </script>