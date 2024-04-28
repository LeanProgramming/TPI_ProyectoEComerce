<div class="container-fluid my-4">
    <div class="row">
        <div class="col-1 d-flex justify-content-center align-items-start">
            <a class="btn borde-2" href="<?= base_url('/tienda') ?>">
                <span id="btn_sidebar_icon"><i class="fa-solid fa-chevron-left"></i></span>
            </a>
        </div>
        <div class="prod-img col-12 col-md-4 p-3">
            <img class="img-fluid rounded" src="<?= base_url("assets/img/productos/{$producto['imagen']}") ?>" alt="<?= $producto['nombre'] ?>">
        </div>
        <div class="prod-descp col-12 col-md-7 px-5 mt-4 d-flex flex-column justify-content-around">
            <div class="prod-head">
                <h3><?= $producto['nombre'] ?></h3>
                <h4>Precio: $ <?= number_format($producto['precio'], 2, ',', '.') ?></h4>
                <p>Stock disponible: <?= $producto['stock'] ?></p>
            </div>

            <div class="prod-body">
                <p><?= $producto['descripcion'] ?></p>
            </div>
            <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {?>
            <div class="prod-footer d-flex justify-content-center">
                <a class="btn border fondo-2 borde-2" href="<?= base_url('agregar_carrito/tienda/'.$producto['id_producto']) ?>">
                    <i class="fa-solid fa-cart-shopping"></i> Agregar al carrito
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>