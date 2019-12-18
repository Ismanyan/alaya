<link rel="stylesheet" href="<?= asset_url() . 'css/home/absent.css' ?>">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a href="<?= base_url() ?>">
            <img src="<?= asset_url() . 'img/absent/btnback.png' ?>" alt="back" width="12">
        </a>
        <a class="navbar-brand mx-auto" href="#" disabled>Home</a>
    </nav>
    <ul class="nav justify-content-center bg-primary">
        <li class="nav-item tex-center">
            <p class="nav-link active m-0 animated fadeIn slow" href="#">Latitude : <span class="lati"></span> Longitude: <span class="long"></span></p>
            <p class="nav-link text-center animated fadeIn slow">Time : <span id="time"></span></p>
        </li>
    </ul>

    <div id="map">
        <div class="map-overlay"></div>
        <div class="map-container"></div>
    </div>

    <form action="<?= base_url('absent/check/') . $this->session->userdata('user_id') ?>" method="post">
        <input type="hidden" name="latitude" class="latitude">
        <input type="hidden" name="longitude" class="longitude">
        <input type="hidden" name="location" value="<?= $geo['city'] . ',' . $geo['regionName'] . ',' . $geo['country'] ?>">
        <button type="submit" class="btn btn-primary absent py-3 animated fadeInUp slow">Cek Absen</button>
        <button type="button" class="btn btn-primary area py-3 animated fadeInUp slow">Cek Absen</button>
    </form>

    <script>
        (function() {
            function checkTime(i) {
                return (i < 10) ? "0" + i : i;
            }

            function startTime() {
                var today = new Date(),
                    h = checkTime(today.getHours()),
                    m = checkTime(today.getMinutes()),
                    s = checkTime(today.getSeconds());
                document.getElementById('time').innerHTML = h + ":" + m + ":" + s;

                var time = h + m;
                if (time >= '0800' && time <= '0900') {
                    // console.log('oke');
                    console.log(time);
                } else {
                    $('.absent').html('Absent Telah Ditutup').attr("disabled", true);
                }

                t = setTimeout(function() {
                    startTime()
                }, 500);
            }
            startTime();
        })();

        $('.nav').hide();
        $('.absent').hide();
        $('.area').hide();
        // Animated marker via http://bl.ocks.org/4284949
        L.Marker.prototype.animateDragging = function() {

            var iconMargin, shadowMargin;

            this.on('dragstart', function() {
                if (!iconMargin) {
                    iconMargin = parseInt(L.DomUtil.getStyle(this._icon, 'marginTop'));
                    shadowMargin = parseInt(L.DomUtil.getStyle(this._shadow, 'marginLeft'));
                }

                this._icon.style.marginTop = (iconMargin - 15) + 'px';
                this._shadow.style.marginLeft = (shadowMargin + 8) + 'px';
            });

            return this.on('dragend', function() {
                this._icon.style.marginTop = iconMargin + 'px';
                this._shadow.style.marginLeft = shadowMargin + 'px';
            });
        };

        var Map = function(elem, lat, lng) {
            this.$el = $(elem);
            this.$overlay = this.$el.find('.map-overlay');
            this.$map = this.$el.find('.map-container');
            this.init(lat, lng);
        };

        Map.prototype.init = function(lat, lng) {

            this.lat = lat;
            this.lng = lng;

            this.map = L.map(this.$map[0]).setView([lat, lng], 15);

            var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
            var mapTiles = new L.TileLayer(osmUrl, {
                attribution: 'Map data &copy; ' +
                    '<a href="https://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
                maxZoom: 18
            });

            this.map.addLayer(mapTiles);
        };

        Map.prototype.setCircle = function(latLng, meters) {
            if (!this.circle) {
                this.circle = L.circle(latLng, meters, {
                    color: 'green',
                    fillColor: '#6bff8d',
                    fillOpacity: 0.3,
                }).addTo(this.map);

                var d = this.map.distance(['<?= $this->session->userdata('lat') ?>', '<?= $this->session->userdata('long') ?>'], this.circle.getLatLng());
                var isInside = d < this.circle.getRadius();
                if (isInside == false) {
                    $('.absent').hide();
                    $('.area').show();
                    $('.area').html('Absent Diluar Area Lokasi').attr("disabled", true);
                }
            } else {
                this.circle.setLatLng(latLng);
                this.circle.setRadius(meters);
                this.circle.redraw();
            }
            this.map.fitBounds(this.circle.getBounds());
        };

        Map.prototype.setLatLng = function(latLng) {
            this.lat = latLng.lat;
            this.lng = latLng.lng;

            if (this.circle) {
                this.circle.setLatLng(latLng);
            }
        };

        Map.prototype.centerOnLocation = function(lat, lng) {

            var self = this;

            this.lat = lat;
            this.lng = lng;

            if (!this.marker) {
                this.marker = L.marker([this.lat, this.lng], {
                    draggable: false
                });

                this.marker.on('drag', function(event) {
                    self.setLatLng(event.target.getLatLng());
                });

                this.marker
                    .animateDragging()
                    .addTo(this.map);
            }

            console.log(this.lat);
            console.log(this.lng);
            this.map.setView([this.lat, this.lng], 20);

            // TODO :: GANTI DENGAN LOKASI BRANCH USER
            this.setCircle(['-6.2601199', '106.7178253'], this.milesToMeters(4));
        };

        // Conversion Helpers
        Map.prototype.milesToMeters = function(miles) {
            return miles * 10;
        };

        jQuery(function($) {

            var map = new Map('#map', '<?= $this->session->userdata('lat') ?>', '<?= $this->session->userdata('long') ?>', 10);

            $('.nav').show();
            $('.lati').html('<?= $this->session->userdata('lat') ?>');
            $('.long').html('<?= $this->session->userdata('long') ?>');
            map.centerOnLocation('<?= $this->session->userdata('lat') ?>', '<?= $this->session->userdata('long') ?>');
            $('.latitude').val('<?= $this->session->userdata('lat') ?>');
            $('.longitude').val('<?= $this->session->userdata('long') ?>');
            $('.absent').show();

        });
    </script>