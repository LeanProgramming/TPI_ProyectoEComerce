<div class="container mb-5">
    <div class="row gap-3 justify-content-around">
        <div class="col-12 col-md-5 fondo-1 sombra-x rounded p-3">
            <p>Dirección</p>
            <hr>
            <p>
                Belgrano 1851 Local 59 <br>
                Ciudad Autónoma de Buenos Aires <br>
                República Argentina
            </p>
            <p>Información de Contacto</p>
            <hr>
            <ul>
                <li>Email: server101@gmail.com</li>
                <li>Telefono:+54 444-6558452</li>
                <li>Whatsapp:+54 011-4655820</li>
                <li>Redes:
                    <ul>
                        <li class="m-2"><a class="p-1" href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i> Server101</a></li>
                        <li class="m-2"><a class="p-1" href="https://twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i> @server101</a></li>
                        <li class="m-2"><a class="p-1" href="https://instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i> /server_101</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-6 fondo-1 sombra-x rounded p-3">
            <form class="row justify-content-center" method="POST" action="<?= base_url('/contacto') ?>">
                <div class="col-12 col-md-6">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control fondo-3" type="text" name="nombre_contacto" id="nombre">
                    <?php if (isset($errores['nombre_contacto'])) {
                        echo '<p class="text-danger">* ' . $errores['nombre_contacto'] . '</p>';
                    } ?>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label" for="correo">Correo</label>
                    <input class="form-control fondo-3" type="email" name="email_contacto" id="correo">
                    <?php if (isset($errores['email_contacto'])) {
                        echo '<p class="text-danger">* ' . $errores['email_contacto'] . '</p>';
                    } ?>
                </div>
                <div class="col-12">
                    <label class="form-label" for="mensaje">Mensaje</label>
                    <textarea class="form-control fondo-3" name="mensaje" id="mensaje" cols="30" rows="5"></textarea>
                    <?php if (isset($errores['mensaje'])) {
                        echo '<p class="text-danger">* ' . $errores['mensaje'] . '</p>';
                    } ?>
                </div>
                <div class="col-12 d-flex justify-content-center gap-5">
                    <button class="btn border w-50 my-3 fondo-2 borde-2" type="submit">Enviar</button>
                    <button class="btn border w-50 my-3 fondo-2 borde-2" type="reset">Borrar</button>
                </div>
                <div class="col-12 ratio ratio-4x3 w-75">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.6206240441084!2d-58.39509302492862!3d-34.61375357295069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccaddba55121f%3A0xcefe5a90ce8a8607!2sAv.%20Belgrano%201851%2C%20C1094AAA%20CABA!5e0!3m2!1ses-419!2sar!4v1681845809662!5m2!1ses-419!2sar" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </form>
        </div>
    </div>
</div>