<!-- Carrusel -->
    <div id="mi_carrusel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators bg-transparent">
            <button type="button" data-bs-target="#mi_carrusel" data-bs-slide-to="0" class="active border border-3 rounded-pill fondo-2" aria-current="true" aria-label="Diapositiva 1"></button>
            <button type="button" data-bs-target="#mi_carrusel" data-bs-slide-to="1" class="border border-3 rounded-pill fondo-2" aria-label="Diapositiva 2"></button>
            <button type="button" data-bs-target="#mi_carrusel" data-bs-slide-to="2" class="border border-3 rounded-pill fondo-2" aria-label="Diapositiva 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/setup1.jpg" class="d-block img-fluid mx-auto rounded carrusel-img sombra-y" alt="Setup 1">
            </div>
            <div class="carousel-item">
                <img src="assets/img/setup3.jpg" class="d-block img-fluid mx-auto rounded carrusel-img sombra-y" alt="Setup 2">
            </div>
            <div class="carousel-item">
                <img src="assets/img/setup5.jpg" class="d-block img-fluid mx-auto rounded carrusel-img sombra-y" alt="Setup 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mi_carrusel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon rounded-circle fondo-2 borde-2" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mi_carrusel" data-bs-slide="next">
            <span class="carousel-control-next-icon rounded-circle fondo-2 borde-2" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</section>

<!-- Presentación -->
<section class="container border borde-1 rounded my-3 p-3 sombra-x d-flex flex-column justify-content-center align-items-center gap-2" style="text-align: justify;">
    <h1 class="text-center fw-bold fst-italic">
        Server101 tu tienda servidor que te ofrece los mejores componentes tecnológicos del mercado al mejor precio.
    </h1>
    <h4 class="w-75">
        ¡Bienvenidos a Server101, su tienda de confianza para todas sus necesidades de computación! Nos enorgullece ofrecer una amplia variedad de productos de alta calidad para satisfacer sus necesidades de tecnología.
    </h4>
</section>

<!-- Productos destacados -->
<?php
$prods = array_filter($productos, function ($prod) {
    if (intval($prod['stock']) < 10) {
        return $prod;
    }
});
$ultimos = $productos;

if (sizeof($prods) > 9) {
    array_splice($prods, 9);
}
if (sizeof($ultimos) > 9) {
    array_splice($ultimos, 9);
}

$prod_dest = [[], [], []];
$i = 0;
$j = 0;
foreach ($prods as $prod) {
    array_push($prod_dest[$i], $prod);
    $j++;
    if ($j % 3 == 0) {
        $i++;
    }
}

$prod_ult = [[], [], []];
$i = 0;
$j = 0;
foreach ($ultimos as $prod) {
    array_push($prod_ult[$i], $prod);
    $j++;
    if ($j % 3 == 0) {
        $i++;
    }
}

?>
<section class="container my-4">
    <h3 class="text-center my-3">Productos destacados</h3>
    <hr>
    <div id="prod_destacados" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner text-justify prod-dest">
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo '<div class="carousel-item';
                if ($i == 0) echo ' active ';
                echo '">';
                echo '<div class="d-flex flex-wrap justify-content-around align-items-stretch gap-2 m-2">';
                $j = 0;
                foreach ($prod_dest[$i] as $prod) {
            ?>
                    <div class="card tarj-prod sombra-der p-2">
                        <img src="assets/img/productos/<?= $prod['imagen'] ?>" class="card-img-top img-thumbnail" alt="<?= $prod['nombre'] ?>">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title my-auto"><?= $prod['nombre'] ?> </h5>
                            <p class="card-text fs-3 text-info">$<?= number_format($prod['precio'], 2, ',', '.') ?></p>
                        </div>
                        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) { ?>
                            <div class="card-footer d-flex justify-content-center">
                                <a class="btn border fondo-2 borde-2" href="<?= base_url('agregar_carrito/principal/'.$prod['id_producto']) ?>">
                                    <i class="fa-solid fa-cart-shopping"></i> Agregar al carrito
                                </a>

                            </div>
                        <?php } ?>
                    </div>

                <?php $j++;
                } ?>
        </div>
    </div>
<?php } ?>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#prod_destacados" data-bs-slide="prev">
    <span class="carousel-control-prev-icon rounded-circle fondo-2 borde-2" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#prod_destacados" data-bs-slide="next">
    <span class="carousel-control-next-icon rounded-circle fondo-2 borde-2" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
</button>
</div>
</section>

<!-- Ultimos ingresos -->

<section class="container my-4">
    <h3 class="text-center my-3">Últimos ingresos</h3>
    <hr>
    <div id="ultimos_ingresos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner text-justify prod-dest">
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo '<div class="carousel-item';
                if ($i == 0) echo ' active ';
                echo '">';
                echo '<div class="d-flex flex-wrap justify-content-around align-items-stretch gap-2 m-2">';
                $j = 0;
                foreach ($prod_ult[$i] as $prod) {
            ?>
                    <div class="card tarj-prod sombra-der p-2">
                        <img src="assets/img/productos/<?= $prod['imagen'] ?>" class="card-img-top img-thumbnail" alt="<?= $prod['nombre'] ?>">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title my-auto"><?= $prod['nombre'] ?> </h5>
                            <p class="card-text fs-3 text-info">$<?= number_format($prod['precio'], 2, ',', '.') ?></p>
                        </div>
                        <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) { ?>
                            <div class="card-footer d-flex justify-content-center">
                                <a class="btn border fondo-2 borde-2" href="<?= base_url('agregar_carrito/principal/'.$prod['id_producto']) ?>">
                                    <i class="fa-solid fa-cart-shopping"></i> Agregar al carrito
                                </a>

                            </div>
                        <?php } ?>
                    </div>

                <?php $j++;
                } ?>
        </div>
    </div>
<?php } ?>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#ultimos_ingresos" data-bs-slide="prev">
    <span class="carousel-control-prev-icon rounded-circle fondo-2 borde-2" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#ultimos_ingresos" data-bs-slide="next">
    <span class="carousel-control-next-icon rounded-circle fondo-2 borde-2" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
</button>
</div>
</section>