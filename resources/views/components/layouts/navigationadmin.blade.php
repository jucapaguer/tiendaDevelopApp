<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 positionfixed">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

            <li>
                <a href="{{ route('admin') }}" data-bs-toggle="collapse"
                    class="nav-link px-0 align-middle {{ request()->routeIs('admin') ? 'navActive' : '' }}">
                    <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>

            </li>
            <li>
                <a href="#orders" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Ordenes</span></a>
                <ul class="collapse nav flex-column ms-4" id="orders" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{ route('admin.page', ['orders', 'dashboard']) }}" class="nav-link px-0 {{ request()->routeIs('admin.page.orders.dashboard') ? 'navActive' : 'noactive' }}"> <span class="d-none d-sm-inline">Escritorio</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.shipping') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Métodos de envió</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#products" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                    <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Productos</span></a>
                <ul class="collapse nav flex-column ms-4" id="products" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="{{ route('admin.categorie') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Categorias</span></a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Producto</span></a>
                    </li>
                </ul>
            </li>
            
            {{-- <li>
                <a href="#" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Usuarios</span> </a>
            </li> --}}
        </ul>
        <hr>
        {{-- <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                    class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">Nombre</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Salir</a></li>
            </ul>
        </div> --}}
    </div>
</div>
