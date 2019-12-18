
<link rel="stylesheet" href="<?= asset_url() . 'css/treatment/treatment.css' ?>">
<script src="<?= asset_url() . 'js/treatment/jquery.ellipsis.min.js' ?>"></script>
<script src="<?= asset_url() . 'js/treatment/infinite-scroll.pkgd.min.js' ?>"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Treatment</a>
    </nav>


    <div class="container">

        <div class="datas"></div>

        <div class="loader">
            <div class="d-flex align-items-center my-4">
                <h4>Loading...</h4>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>
        </div>
        <!-- <button type="button" class="btn btn-secondary shadow-sm w-100 mb-5" data-url="<?= getenv('REST_URL') . 'treatment/' . $this->session->userdata('branch_id') . '?token=' . $this->session->userdata('TOKEN') ?>" data-next='2' onclick="next()">Read More</button> -->
    </div>

    <input type="hidden" class="page" value="2">
    <input type="hidden" class="base_url" value="<?= getenv('BASE_URL') ?>">

    <script>
        $('.next').hide();
        let base = $('.base_url').val();
        $.ajax({
            url: base + "treatment/getTreatment",
            type: 'get',
            success: function(response) {
                var x = JSON.parse(response);
                if (x == false) {
                    $('.error').show();
                } else {
                    $.each(x, function(key, value) {
                        $('.datas').append(`
                            <div class="data-` + key + `"></div>
                        `);

                        $('.data-' + key).append(`
                            <div class="row my-4 border-bottom animated fadeIn slow data">
                                <div class="col-5">
                                    <img class=" rounded w-100" src="` + value.photo + `">
                                    <div class="btn-group my-2" role="group" aria-label="Basic example">
                                        <a class="detail" href="` + 'http://localhost/GITHUB_/alaya/alaya-mobile/treatment/detail/' + value.id + `">
                                            <button type="button" class="btn btn-secondary btn-sm shadow-sm">Detail</button>
                                        </a>
                                        <div class="divinder mx-1"></div>
                                        <a class="count" href="` + 'http://localhost/GITHUB_/alaya/alaya-mobile/treatment/count/' + value.id + `">
                                            <button type="button" class="btn btn-secondary btn-sm shadow-sm">Count</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <p class="head-title text-truncate">` + value.name + `</p>
                                    <p class="desc">` + value.desc + `</p>
                                </div>
                            </div>
                        `);
                    });
                }
            },
            complete: function(data) {
                $('.loader').hide();

                $('.desc').ellipsis({
                    row: 3
                });
            }
        });
    </script>