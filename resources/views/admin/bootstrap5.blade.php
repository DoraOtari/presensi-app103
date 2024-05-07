<!doctype html>
<html lang="en">

<head>
    <title>Setiawan App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="https://img.icons8.com/3d-fluency/94/netflix-desktop-app.png" type="image/x-icon">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @livewireStyles
    @livewireScripts
</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-light bg-light navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <i class="bi bi-webcam"></i> Presensi App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            Offcanvas
                        </h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav nav-underline  justify-content-start flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a 
                                    class="nav-link {{ Request::is('dashboard') ? 'active text-primary' : '' }}" 
                                    href="{{ url('dashboard') }}"><i class="bi bi-house-heart"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a 
                                    class="nav-link {{ Request::is('profil') ? 'active text-primary' : '' }}" 
                                    href="{{ url('profil') }}"><i class="bi bi-person-bounding-box"></i> Profil
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ Request::is(['jabatan','karyawan']) ? 'active text-primary' : '' }}" href="#" id="dropdownId"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-badge"></i> Data</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                    <a class="dropdown-item {{ Request::is('jabatan') ? 'active' : ''}}" href="{{ url('jabatan') }}"><i class="bi bi-diagram-2"></i> Jabatan</a>
                                    <a class="dropdown-item {{ Request::is('karyawan') ? 'active' : ''}}" href="{{ url('karyawan') }}"><i class="bi bi-people"></i> Karyawan</a>
                                </div>
                            </li>
                        </ul>
                        <form method="POST" action="{{ Route('logout') }}" class="d-flex">
                            @csrf
                            @if (Auth::user()->avatar)
                                <img src="{{ asset('storage/'.Auth::user()->avatar) }}" 
                                    width="45" 
                                    class="rounded-circle shadow border border-3 border-primary"
                                    style="aspect-ratio:1/1"
                                >
                            @else
                                <img src="https://placehold.co/300?text=A" width="45" class="rounded-circle img-thumbnail">
                            @endif
                            <h5 style="font-family: Impact;color: steelblue"
                                class="text-capitalize mt-2 mx-2">
                                {{ Auth::user()->name }}
                            </h5>
                            
                            <button class="btn btn-danger rounded-2" type="submit">
                                <i class="bi bi-power"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

    </header>
    <main>
        @yield('konten')
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
