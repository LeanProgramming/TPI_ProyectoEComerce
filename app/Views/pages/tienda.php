<div class="container-fluid my-4">
    <div class="row">

        <div class="col-12 col-md-5 col-lg-3 fondo-transp p-3 rounded-end collapse collapse-horizontal show sombra-x my-2 h-100" id="tienda_sidebar">
            <ul class="row">
                <?php foreach($clasificaciones as $clasif) {?>

                <li class="col-6 col-md-12"><a href="<?= base_url('tienda/'.$clasif['clasif']) ?>"><?= $clasif['clasif'] ?></a>
                    <ul>
                    <?php foreach($subclasificaciones as $subclasif) { 
                        if($subclasif['clasif_id'] == $clasif['id_clasificacion']) {
                        ?>

                        <li><a href="<?= base_url('tienda/'.$clasif['clasif'].'/'.$subclasif['subclasif']) ?>"><?= $subclasif['subclasif'] ?></a></li>
                    <?php }}?>
                    </ul>
                </li>
            
                <?php }?>
            </ul>
        </div>

        <div class="d-none d-md-block col-1 m-0">
            <button id="btn_sidebar" class="btn borde-2" type="button" data-bs-toggle="collapse" data-bs-target="#tienda_sidebar" aria-controls="tienda_sidebar" aria-expanded="true">
                <span id="btn_sidebar_icon"><i class="fa-solid fa-chevron-left"></i></span>
            </button>
        </div>

        <div id="tienda_prods" class="col-12 col-md-6 col-lg-8">
            <div class="d-flex flex-wrap justify-content-around align-items-stretch gap-1">

                <?php foreach ($productos as $prod) { ?>
                    <div class="card tarj-prod sombra-der p-2">
                        <img src="<?= base_url('assets/img/productos/'.$prod['imagen']) ?>" class="card-img-top img-thumbnail" alt="<?= $prod['nombre'] ?>">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <a href="<?= base_url("tienda/{$prod['id_producto']}" ) ?>">
                                <h5 class="card-title my-auto"><?= $prod['nombre'] ?></h5>
                            </a>
                            <p class="card-text fs-3 text-info">$ <?= number_format($prod['precio'], 2, ',', '.') ?></p>
                            
                        </div>
                        <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {?>
                        <div class="card-footer d-flex justify-content-center">
                            <a class="btn border fondo-2 borde-2" href="<?= base_url('agregar_carrito/'.$link[sizeof($link)-1].'/'.$prod['id_producto']) ?>">
                                <i class="fa-solid fa-cart-shopping"></i> Agregar al carrito
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>

        </div>
    </div>

</div>
