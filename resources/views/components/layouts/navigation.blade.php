<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('inicio') }}"><img
                src="https://naturcol.com/wp-content/uploads/2020/10/Logo-Paginav1.jpg" alt="" srcset=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('inicio') ? 'linkactive' : '' }}" aria-current="page"
                        href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('catalogue') ? 'linkactive' : '' }}"
                        href="{{ route('catalogue') }}">Catalogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'linkactive' : '' }}"
                        href="{{ route('about') }}">Nosotros</a>
                </li>

            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('cart') }}"><i class="bi bi-bag-fill shop"></i>
                        @if (Session::has('itemsCar') && count(Session::get('itemsCar')) != 0)
                            <span
                                class="position-absolute translate-middle p-1 bg-danger border border-light rounded-circle"
                                style="top: 35%;right: 6%;">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        @endif
                    </a>

                </li>
                <li class="nav-item">
                    @guest
                        <a class="nav-link" aria-current="page" href="{{ route('login') }}">Cuenta</a>
                    @else
                        <form method="POST" action="{{ route('logout') }}" class="needs-validation" novalidate=""
                            autocomplete="off">
                            @csrf
                            <button type="submit" class="logout">
                                Cerrar sesión
                            </button>
                        </form>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
