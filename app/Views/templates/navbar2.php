<!-- Segunda barra -->
<div class="container-flex py-1 my-1 <?php if ($titulo != "Server101" && $titulo != "Quiénes somos" && $titulo != "Comercialización" && $titulo != "Contacto" && $titulo != "Consulta" && $titulo != "Términos y usos") {
                                            echo ' mb-3 sombra-abajo';
                                        } ?>">
    <div class="row justify-content-evenly align-items-center g-2 ">
        <div class="col-6 col-md-3 order-1 d-flex justify-content-center align-items-center">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
                <img class="img-fluid logo-img" src="<?= base_url('assets/img/logo/Server101_Logo.png') ?>" alt="">
            </a>
        </div>
        <div class="col-12 col-md-5 order-3 order-md-2 d-flex align-items-center">
            <?php if ($titulo != 'Tienda') { ?>
                <button class="btn rounded-circle mx-2 borde-2 fondo-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu_categorias" aria-controls="menu_categorias">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="offcanvas offcanvas-start fondo-1" data-bs-scroll="true" tabindex="1" id="menu_categorias" aria-labelledby="etiqueta_menu_categorias">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="etiqueta_menu_categorias">Categorías</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
                    </div>
                    <hr>
                    <div class="offcanvas-body">
                        <ul>
                            <?php foreach ($clasificaciones as $clasif) { ?>

                                <li><a href="<?= base_url('tienda/' . $clasif['clasif']) ?>"><?= $clasif['clasif'] ?></a>
                                    <ul>
                                        <?php foreach ($subclasificaciones as $subclasif) {
                                            if ($subclasif['clasif_id'] == $clasif['id_clasificacion']) {
                                        ?>
                                                <li><a href="<?= base_url('tienda/' . $clasif['clasif'] . '/' . $subclasif['subclasif']) ?>"><?= $subclasif['subclasif'] ?></a></li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </li>

                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <form class="d-flex w-100 justify-content-center align-items-center" action="<?= base_url('/buscar') ?>" method="post" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar producto" name="buscar" aria-label="Buscar">
                <button class="btn borde-2 fondo-2" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-6 col-md-3 order-2 order-md-3 d-flex justify-content-center justify-content-md-end">
            <?php if (isset($_SESSION['usuario'])) { ?>
                <div class="dropdown">
                    <button class="btn dropdown-toggle rounded mx-2 borde-2 fondo-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i> <?= $_SESSION['usuario'] ?>
                    </button>
                    <ul class="dropdown-menu fondo-2">
                        <li><a class="dropdown-item" href="<?= base_url('/perfil') ?>">Perfil</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('/salir') ?>">Salir</a></li>
                    </ul>
                </div>
            <?php } else { ?>
                <a class="btn rounded-circle mx-2 borde-2 fondo-2" href="<?= base_url('/ingresar') ?>"><i class="fa-solid fa-user"></i></a>
            <?php } ?>
            <button id="modal_carrito_btn" class="btn rounded-circle mx-2 borde-2 fondo-2 position-relative" type="button" data-bs-toggle="modal" data-bs-target="#modal_carrito">
                <i class="fa-solid fa-cart-shopping"></i>
                <?php if (isset($_SESSION['carrito'])) {
                    $cantidad = 0;
                    foreach ($_SESSION['carrito'] as $prod) {
                        $cantidad += $prod['cantidad'];
                    }
                ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-info border borde-3"><?= $cantidad ?></span>
                <?php } ?>
            </button>
        </div>
    </div>
</div>

<?php if ($titulo == "Server101" || $titulo == "Quiénes somos" || $titulo == "Comercialización" || $titulo == "Contacto" || $titulo == "Consulta" || $titulo == "Términos y usos") { ?>
    <hr class="m-0">
<?php } ?>

<!-- Modal de carrito -->

<div class="modal modal-lg fade" id="modal_carrito" tabindex="-1" aria-labelledby="carrito" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content fondo">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="carrito">Carrito de compras</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] != 2) { ?>
                    <p> Debe iniciar sesión para ver el carrito de compras. </p>
                <?php } else { ?>
                    <?php if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) { ?>
                        <p>Presione "Agregar al carrito" de algún producto para comenzar con su compra</p>
                    <?php } else { ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $_SESSION['monto_total'] = 0;
                                    foreach ($_SESSION['carrito'] as $prod) {
                                        $subtotal = $prod['precio'] * $prod['cantidad'];
                                        $_SESSION['monto_total'] += $subtotal;
                                    ?>
                                        <tr>
                                            <td><?= $prod['nombre'] ?></td>
                                            <td class="text-center"><?= $prod['cantidad'] ?></td>
                                            <td>$<?= number_format($prod['precio'], 2, ',', '.')?></td>
                                            <td>$<?= number_format($subtotal, 2, ',', '.') ?></td>
                                            <td><a class="btn btn-outline-danger" href="<?= base_url('quitar_carrito/' . $link[sizeof($link) - 1] . '/' . $prod['id']) ?>"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>
                                        <?php if (isset($prod['error'])) { ?>
                                            <tr>
                                                <td class="text-danger" colspan="5">* <?= $prod['error'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total:</td>
                                        <td>$<?= number_format($_SESSION['monto_total'], 2, ',', '.') ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="modal-footer d-flex justify-content-around">
                <?php if (isset($_SESSION['usuario']) && $_SESSION['tipo'] == 2) { ?>
                    <?php if (!empty($_SESSION['carrito'])) { ?>
                        <a class="btn btn-outline-warning" href="<?= base_url('vaciar_carrito/' . $link[sizeof($link) - 1]) ?>">Vaciar carrito</a>
                        <?php if(isset($_SESSION['faltaStock']) && $_SESSION['faltaStock']) { ?>
                            <button type="button" class="btn btn-outline-success" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-custom-class="falta-stock" data-bs-content="Stock insuficiente">Terminar Compra</button>
                        <?php } else {?>
                            <a class="btn btn-outline-success" href="<?= base_url('comprar') ?>">Terminar Compra</a>
                        <?php } ?>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>