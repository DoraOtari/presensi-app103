<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- map --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>
    <main class="col-lg-3 mx-auto">
        @if (session('notif'))
            <div class="alert alert-success" role="alert">
                <strong><i class="bi-bell"></i></strong> {{ session('notif') }}
            </div>
        @endif

        <form action="{{ url('/absen') }}" method="post">
            @csrf
            <div id="my_camera" style="width:340px; height:240px;"></div>
            <input id="tangkap" type="hidden" name="foto">
            <div class="d-flex justify-content-between mt-4">
                <button type="button" onclick="reset()" class="btn btn-success"><i
                        class="bi-arrow-counterclockwise"></i></button>
                <button type="button" onclick="rekam()" class="btn btn-primary"><i class="bi-camera"></i></button>
            </div>
            <div class="mt-2">
                <label class="form-label">Keterangan</label> <br>
                <div class="form-check  form-check-inline">
                    <input checked class="form-check-input" type="radio" name="keterangan" value="masuk">
                    <label for="" class="form-check-label">Masuk</label>
                </div>
                <div class="form-check  form-check-inline">
                    <input class="form-check-input" type="radio" name="keterangan" value="pulang">
                    <label for="" class="form-check-label">Pulang</label>
                </div>
            </div>
            <div id="map" style="height: 180px"></div>
            <input type="hidden" id="lokasiUser" name="lokasi">
            
            <div class="d-flex justify-content-between">
                <div class="mt-3">
                    <a href="{{ url('/dashboard') }}" class="btn btn-warning">Dashboard</a>
                </div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </div>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('webcam.js') }}"></script>
    <script language="JavaScript">
        Webcam.set({
            flip_horiz: true
        })
        Webcam.attach('#my_camera');

        function reset() {
            Webcam.unfreeze()
        }

        function rekam() {
            Webcam.snap(function(data_uri) {
                let tangkap = document.getElementById("tangkap");
                tangkap.value = data_uri;
            });
            Webcam.freeze()
        }
    </script>

    {{-- mapping --}}
    <script>
        var map = L.map('map').setView([-2.966970, 104.748322], 18);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // lokasi
        var circle = L.circle([-2.966970, 104.748322], {
            color: 'green',
            fillColor: 'cyan',
            fillOpacity: 0.5,
            radius: 15
        }).addTo(map);


        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }

        function showPosition(position) {
            // posisi
            var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            let lokasiUser = document.getElementById('lokasiUser');
            lokasiUser.value = position.coords.latitude + ',' + position.coords.longitude;
        }
    </script>
</body>

</html>
