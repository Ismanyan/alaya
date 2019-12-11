<link rel="stylesheet" href="<?= asset_url() . 'css/treatment/treatment.css' ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-5">
        <a href="<?= base_url('treatment/count/') . $treatment['id'] ?>">
            <img src="<?= asset_url() . 'img/profile/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Start Treatment</a>
    </nav>

    <div class="container animated fadeIn slow">
        <div class="row" style="margin-top:30%;">
            <div class="col-12 mx-auto">
                <div class="stopwatch" data-autostart="false">
                    <div class="time text-center">
                        <span class="hours"></span> :
                        <span class="minutes"></span> :
                        <span class="seconds"></span>
                    </div>
                    <div class="controls">
                        <!-- Some configurability -->
                        <button class="toggle btn btn-secondary w-100 p-2 mt-5 start" data-pausetext="Pause" data-resumetext="Resume"> Start</button>
                        <button type="button" class="finish btn btn-secondary w-100 mt-2 p-2 text-center" data-toggle="modal" data-target="#staticBackdrop">Finish</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('treatment/finish/') . $this->session->userdata('user_id') . "/" . $treatment['id']  ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="time" id="time">
                        <input type="hidden" name="date" id="date" value="<?= date('d/m/Y') ?>">
                        <input type="hidden" name="start" id="start" value="<?= date('h:i A') ?>">
                        <p><b> Time :</b> <span class="timetext"><span></p>
                        <p><b> Therapist Date :</b> <?= date('d/m/Y') ?></p>
                        <p><b> Start Treatment :</b> <?= date('h:i A') ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Confirm</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="<?= asset_url() . 'js/treatment/stopwatch.js' ?>"></script>