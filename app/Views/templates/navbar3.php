<!-- Tercera barra -->
<div class="container-fluid my-4 py-4 sombra-abajo rounded">
    <div class="row g-4">
        
        <div class="col-6 col-md-4 col-lg-2 d-flex justify-content-center">
            <a class="nav-link catg-btn" href="<?= base_url('tienda/'.$clasificaciones[0]['clasif']) ?>">
                <img class="catg-btn-img sombra-y" src="assets/img/computer_1.png" alt="">
                <p class="catg-btn-text text-center"><?= $clasificaciones[0]['clasif'] ?></p>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2 d-flex justify-content-center">
            <a class="nav-link catg-btn" href="<?= base_url('tienda/'.$clasificaciones[1]['clasif']) ?>">
                <img class="catg-btn-img sombra-y" src="assets/img/notebook_2.jpg" alt="">
                <p class="catg-btn-text"><?= $clasificaciones[1]['clasif'] ?></p>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2 d-flex justify-content-center">
            <a class="nav-link catg-btn" href="<?= base_url('tienda/'.$clasificaciones[2]['clasif']) ?>">
                <img class="catg-btn-img sombra-y" src="assets/img/hardware_3.jpg" alt="">
                <p class="catg-btn-text"><?= $clasificaciones[2]['clasif'] ?></p>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2 d-flex justify-content-center">
            <a class="nav-link catg-btn" href="<?= base_url('tienda/'.$clasificaciones[3]['clasif']) ?>">
                <img class="catg-btn-img sombra-y" src="assets/img/perifericos_2.png" alt="">
                <p class="catg-btn-text"><?= $clasificaciones[3]['clasif'] ?></p>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2 d-flex justify-content-center">
            <a class="nav-link catg-btn" href="<?= base_url('tienda/'.$clasificaciones[5]['clasif']) ?>">
                <img class="catg-btn-img sombra-y" src="assets/img/almacenamiento.png" alt="">
                <p class="catg-btn-text"><?= $clasificaciones[5]['clasif'] ?></p>
            </a>
        </div>
        <div class="col-6 col-md-4 col-lg-2 d-flex justify-content-center">
            <a class="nav-link catg-btn" href="<?= base_url('tienda') ?>">
                <img class="catg-btn-img sombra-y" src="assets/img/setup7.jpg" alt="">
                <p class="catg-btn-text">Ver Todo</p>
            </a>
        </div>
    </div>
</div>
