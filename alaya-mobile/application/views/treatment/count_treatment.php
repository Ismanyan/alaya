<link rel="stylesheet" href="<?= asset_url() . 'css/treatment/treatment.css' ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a href="<?= base_url('treatment') ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Treatment Detail</a>
    </nav>

    <div class="container animated fadeIn slow">
        <div class="loader">
            <div class="d-flex align-items-center my-4">
                <h4>Loading...</h4>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>
        </div>
        <img class="img-fluid mx-auto d-block rounded shadow" src="" style="background-image:url('<?= asset_url() . 'img/default-img.png' ?>');">

        <h5 class="title-detail my-4 text-center"></h5>
        <p class="text-center mb-4 desc"></p>
        <div class="row data">
            <div class="col-6">
                <a href="<?= base_url('treatment/start/') . $this->session->userdata('user_id') . "/" . $id ?>" class="btn btn-secondary w-100 py-3">Start</a>
            </div>
            <div class="col-6">
                <p class="m-0">Time: <?= date('h:i A') ?></p>
                <p class="m-0">Date: <?= date('d/m/Y') ?></p>
            </div>
        </div>
    </div>

    <input type="hidden" class="base_url" value="<?= getenv('BASE_URL') ?>">

    <script>
        $('.data').hide();
        var url = $('.base_url').val();
        var id = '<?= $id ?>';
        $.ajax({
            url: url + 'treatment/get_count/' + id,
            type: 'get',
            success: function(response) {
                var x = JSON.parse(response);

                $('.img-fluid').attr('src', x.photo);
                $('.title-detail').text(x.name);
                $('.desc').text(x.desc);
            },
            complete: function(data) {
                $('.loader').hide();
                $('.data').show();
            }
        });
    </script>