<link rel="stylesheet" href="<?= asset_url() . 'css/treatment/treatment.css' ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-5">
        <a href="<?= base_url('statistic/treatment/') . $this->session->userdata('user_id') ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>My Detail Treatment </a>
    </nav>
    <div class="loader container">
        <div class="d-flex align-items-center mb-3" style="color:#ff6fa4 !important;">
            <h4 class="spinner-text">Loading...</h4>
            <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
        </div>
    </div>
    <div class="container animated fadeIn slow data">
        <img class="img-fluid mx-auto d-block rounded shadow" src="" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>');">

        <h5 class="title-detail my-4 text-center"></h5>
        <p class="text-center desc"></p>

        <hr>
        <p><b>Time : </b> <span class="duration"></span> Minutes</p>
        <p><b>Price : </b><span class="price"></span></p>
        <p><b>Therapist Date : </b><span class="date"></span></p>
        <p><b>Start Treatment : </b><span class="start"></span> WIB</p>
        <p><b>Done Treatment : </b><span class="done"></span> WIB</p>
    </div>

    <input type="hidden" class="base_url" value="<?= getenv('BASE_URL') . 'treatment/getHistory/' . $id ?>">

    <script>
        var base_url = $('.base_url').val();
        $('.data').hide();
        $.ajax({
            url: base_url,
            type: 'get',
            success: function(response) {
                $('.loader').hide();
                let x = JSON.parse(response);
                $(".img-fluid").attr("src", x.photo);
                $('.title-detail').append(x.title);
                $('.desc').append(x.desc);
                $('.duration').append(x.duration);
                $('.price').append(x.price);
                $('.date').append(x.date);
                $('.start').append(x.time_entry);
                $('.done').append(x.time_out);
                $('.data').show();
            }
        });
    </script>