<body class="fondo">
    <!--Primera barra-->
    <section class="container-flex fondo-1 p-0 sombra-abajo rounded-bottom">
        <nav class="navbar navbar-expand-md m-0 p-0 fuente-s h-100">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mi_navbar" aria-controls="mi_navbar" aria-expanded="false" aria-label="Cambiar navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mi_navbar">
                    <ul class="navbar-nav w-100 justify-content-end fs-6">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/') ?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/tienda') ?>">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/clasificaciones') ?>">Clasificaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/subclasificaciones') ?>">Subclasificaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/usuarios') ?>">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/ventas') ?>">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/consultas') ?>">Consultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/contactos') ?>">Contactos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <hr class="m-0 p-0">

        <div class="container-fluid py-2 my-3">
            <div class="row justify-content-between align-items-center g-2">
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <a class="navbar-brand" href="<?= base_url('/') ?>">
                        <img class="img-fluid logo-img" src="<?= base_url('assets/img/logo/Server101_Logo.png') ?>" alt="Server101 Logo">
                    </a>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                    <h5 class="mx-3">Bienvenidx Admin</h5>
                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <div class="dropdown">
                            <button class="btn btn-lg dropdown-toggle rounded mx-2 borde-2 fondo-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i> <?= $_SESSION['usuario'] ?>
                            </button>
                            <ul class="dropdown-menu fondo-2">
                                <li><a class="dropdown-item" href="<?= base_url('/perfil') ?>">Perfil</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/salir') ?>">Salir</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </section>
