<div class="container mb-5 p-3 fondo-1 sombra-x rounded">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="container fuente-s">
                <p>
                    ¡Bienvenidos a Server101, su tienda de confianza para todas sus necesidades de computación! Nos enorgullece ofrecer una amplia variedad de productos de alta calidad para satisfacer sus necesidades de tecnología.
                </p>
                <p>
                    En Server101, creemos que la tecnología es una herramienta importante para facilitar la vida diaria, por lo que ofrecemos productos que son fáciles de usar y que se adaptan a cualquier estilo de vida. Desde computadoras portátiles y de escritorio hasta monitores, impresoras y accesorios, tenemos todo lo que necesita para mantenerse conectado y organizado.
                </p>
                <p>
                    Nos esforzamos por ofrecer un servicio excepcional a nuestros clientes y nuestro equipo está dedicado a ayudarle a encontrar los productos que necesita. Ya sea que esté buscando una computadora para uso personal o necesite equipos para su negocio, estamos aquí para ayudarle.
                </p>
                <p>
                    Además, en Server101 nos preocupamos por la seguridad de su información personal y financiera, por lo que ofrecemos opciones de pago seguras y fiables. También ofrecemos garantías de calidad en todos nuestros productos y trabajamos con los mejores proveedores para asegurarnos de que siempre recibirá lo mejor.
                </p>
                <p>
                    En resumen, en Server101 nos dedicamos a proporcionarle la mejor experiencia de compra para sus necesidades de tecnología. ¡Gracias por elegirnos y esperamos tener la oportunidad de servirle!
                </p>
            </div>

            <div class="container d-flex flex-column justify-content-center align-items-end">
                <img class="img-fluid" style="max-width:100px" src="assets/img/logo/my_sign_v2.png" alt="Firma del fundador">
                <p class="m-0">Leandro M. Muñoz</p>
                <p class="m-0">Fundador y Director de Server101</p>
            </div>
        </div>

        <div class="col-12 col-lg-6 row justify-content-between align-items-between">
            <div class="col-12">
                <hr>
                <h4 class="text-center">Nuestro local</h4>
                <hr>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center">
                <img class="img-fluid rounded" src="assets/img/tienda_v2.jpg" alt="Nuestro local">
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                <img class="img-fluid rounded" src="assets/img/tienda-2.jpg" alt="Nuestro local">
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                <img class="img-fluid rounded" src="assets/img/tienda-3.jpg" alt="Nuestro local">
            </div>
        </div>
        <!--  Staff -->

        <?php
        $staff = [
            [
                'img' => 'pexels-spencer-selover-775358.jpg',
                'nombre' => 'Leandro M. Muñoz',
                'funcion' => 'Fundador y Director'
            ],
            [
                'img' => 'pexels-daniel-xavier-1239291.jpg',
                'nombre' => 'Daniela Xavier',
                'funcion' => 'Gerente General'
            ],
            [
                'img' => 'pexels-justin-shaifer-1222271.jpg',
                'nombre' => 'Justin Shaifer',
                'funcion' => 'Especialista en ventas'
            ],
            [
                'img' => 'pexels-christina-morillo-1181686.jpg',
                'nombre' => 'Cristina Morillo',
                'funcion' => 'Técnica en soporte'
            ],
            [
                'img' => 'pexels-andrea-piacquadio-774909.jpg',
                'nombre' => 'Andrea Piacquadio',
                'funcion' => 'Encargada de marketing'
            ],
            [
                'img' => 'pexels-simon-robben-614810.jpg',
                'nombre' => 'Simon Robben',
                'funcion' => 'Encargado de logística y envíos'
            ],
        ];

        ?>
        <div>
            <hr>
            <h4 class="text-center">Nuestro Staff</h4>
            <hr>
        </div>
        <div class="col-12 d-flex justify-content-around flex-wrap gap-3 my-3">

            <?php

            foreach ($staff as $person) {
                echo '
                <div class="card p-2 fondo" style="width: 18rem;">
                    <img src="assets/img/staff/' . $person['img'] . '" class="card-img-top img-thumbnail" alt="' . $person['funcion'] . '">
                    <div class="card-body d-flex flex-column justify-content-even align-items-center">
                        <h5 class="card-title text-center my-auto">' . $person['nombre'] . '</h5>
                        <p class="card-text text-center">' . $person['funcion'] . '</p>
                    </div>
                </div>
                ';
            }

            ?>

        </div>
    </div>

</div>