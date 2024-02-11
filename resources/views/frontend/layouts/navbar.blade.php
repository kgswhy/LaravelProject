<div class="container my-2 shadow">
    <nav class="navbar navbar-expand-lg rounded-pill" aria-label="Thirteenth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11"
                aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarsExample11">
                <a class="navbar-brand col-lg-3 mx-auto text-lg-center mb-3 mb-lg-0 big-header" href="#">Aspirasi
                    Masyarakat</a>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center mb-3 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alur Aspirasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-speedometer2"></i>
                                        Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger" href="#"><i
                                                class="bi bi-door-closed"></i> Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <a href="/login">
                            <button class="btn btn-primary me-2">Login</button>
                        </a>
                        <a href="/aspirasis">
                            <button class="btn btn-primary">Cek Aspirasi</button>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</div>
