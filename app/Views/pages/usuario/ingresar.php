<div class="container-fluid m-0 row justify-content-center ">
    <div class="col-12 col-md-8 col-lg-6 fondo p-5 rounded sombra-x my-4">
        <h1 class="modal-title fs-5 text-center" id="login">Ingresar usuario</h1>
        <form action="<?= base_url('ingresar') ?>" method="post" class="d-flex flex-column align-items-center bg-transparent borde-3">
            <label for="login-usuario" class="form-label"></label>
            <input class="form-control mx-2" type="text" id="login-usuario" name="usuario" placeholder="Nombre de usuario">
            <?php if (isset($errores)) {
                echo '<p>' . $errores->showError('usuario') . '</p>';
            } ?>

            <label for="login-pass" class="form-label"></label>
            <input class="form-control mx-2" type="password" id="login-pass" name="pass" placeholder="Contraseña">
            <?php if (isset($errores)) {
                echo '<p>' . $errores->showError('pass') . '</p>';
            } ?>


            <button class="btn border w-50 my-3 fondo-2 borde-2" type="submit">Ingresar</button>
            <p class="text-center">Aún no te encuentras registrado. <a href="<?= base_url('registrar') ?>">Registrate</a></p>
        </form>
    </div>
</div>