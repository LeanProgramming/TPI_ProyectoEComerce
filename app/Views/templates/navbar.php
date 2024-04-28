<body class="fondo">

    <!--Primera barra-->
    <section class="container-flex fondo-1 p-0">
        <nav class="navbar navbar-expand-md m-0 p-0 fuente-s">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mi_navbar" aria-controls="mi_navbar" aria-expanded="false" aria-label="Cambiar navegación">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mi_navbar">
                    <ul class="navbar-nav w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/') ?>">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/tienda') ?>">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/quienes-somos') ?>">¿Quiénes somos?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/comercializacion') ?>">Comercialización</a>
                        </li>
                        <?php if (isset($_SESSION['usuario']) && $_SESSION['tipo'] == 2) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/consulta') ?>">Consulta</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/contacto') ?>">Contacto</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/terminos-y-usos') ?>">Términos y Usos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <hr class="m-0">