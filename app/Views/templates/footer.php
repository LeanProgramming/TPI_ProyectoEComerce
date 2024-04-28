<!-- Pie de página-->

<footer class="fondo-3 py-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 order-2 order-md-1 d-flex flex-column align-items-center">
                <ul class="navbar-nav justify-content-center gap-2 fuente-s">
                    <li class="">
                        <h4>Menu</h4>
                    </li>
                    <li><a href="<?= base_url('/') ?>" class="p-1">Principal</a></li>
                    <li><a href="<?= base_url('/tienda') ?>" class="p-1">Tienda</a></li>
                    <li><a href="<?= base_url('/quienes-somos') ?>" class="p-1">¿Quiénes somos?</a></li>
                    <li><a href="<?= base_url('/comercializacion') ?>" class="p-1">Comercialización</a></li>
                    <li><a href="<?= base_url('/contacto') ?>" class="p-1">Contacto</a></li>
                    <li><a href="<?= base_url('/terminos-y-usos') ?>" class="p-1">Términos y Usos</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-4 order-1 order-md-2 d-flex flex-column justify-content-center align-items-center">
                <h4>Encuentranos en</h4>
                <div class="col-12 ratio ratio-4x3 w-75">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.6206240441084!2d-58.39509302492862!3d-34.61375357295069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccaddba55121f%3A0xcefe5a90ce8a8607!2sAv.%20Belgrano%201851%2C%20C1094AAA%20CABA!5e0!3m2!1ses-419!2sar!4v1681845809662!5m2!1ses-419!2sar" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 order-3 order-md-3">
                <ul class="navbar-nav justify-content-center align-items-center gap-2 fuente-s">
                    <li>
                        <h4>Contacto</h4>
                    </li>
                    <li>Email: server101@gmail.com</li>
                    <li>Telefono:+54 444-6558452</li>
                    <li>Whatsapp:+54 370-4655820</li>
                    <li>Redes:
                        <ul>
                            <li class="m-2"><a class="p-1" href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i> Server101</a></li>
                            <li class="m-2"><a class="p-1" href="https://twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i> @server101</a></li>
                            <li class="m-2"><a class="p-1" href="https://instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i> /server_101</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-12 order-4 fuente-md">
                <p><i class="fa-regular fa-copyright"></i><span class="fw-bold"> Server101</span> 2023 - Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</footer>

<script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/fontawesome/js/all.js') ?>" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>