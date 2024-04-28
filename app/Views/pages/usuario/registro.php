<div class="container-fluid row m-0 justify-content-center align-items-center ">
    <div class="col-12 col-md-8 col-lg-6 fondo rounded my-4 p-5 sombra-x">
        <div class="registro-header">
            <a class="btn btn-outline-info" href="<?= base_url('/ingresar') ?>"><i class="fa-solid fa-chevron-left"></i></a>
            <h1 class="fs-5 text-center" id="registrar">Registrarse</h1>
        </div>
        <div class="registro-body">
            <form action="<?= base_url('/registrar') ?>" method="post" class="d-flex flex-column justify-content-around bg-transparent borde-3">
                <label for="signin-usuario" class="form-label">Ingrese un nombre de usuario:</label>
                <input class="form-control mb-3" type="text" value="<?= set_value('usuario') ?>" id="signin-usuario" name="usuario" placeholder="Nombre de Usuario">
                <?php if (isset($errores['usuario'])) {
                    echo '<p class="text-danger">* ' . $errores['usuario'] . '</p>';
                } ?>

                <label for="singin-email" class="form-label">Ingrese una dirección de correo:</label>
                <input class="form-control mb-3" type="email" value="<?= set_value('email') ?>" id="signin-email" name="email" placeholder="Email">
                <?php if (isset($errores['email'])) {
                    echo '<p class="text-danger">* ' . $errores['email'] . '</p>';
                } ?>

                <label for="singin-pass" class="form-label">Ingrese una contraseña (mínimo 8 caracteres)</label>
                <input class="form-control mb-3" type="password" value="<?= set_value('pass') ?>" id="singin-pass" name="pass" placeholder="Contraseña">
                <?php if (isset($errores['pass'])) {
                    echo '<p class="text-danger">* ' . $errores['pass'] . '</p>';
                } ?>

                <hr>
                <h5 class="text-center">Datos personales</h5>

                <label for="singin-nombre" class="form-label">Nombre</label>
                <input class="form-control mb-3" type="text" id="signin-nombre" name="nombre" value="<?= set_value('nombre') ?>" placeholder="Nombre/s">
                <?php if (isset($errores['nombre'])) {
                    echo '<p class="text-danger">* ' . $errores['nombre'] . '</p>';
                } ?>

                <label for="singin-apellido" class="form-label">Apellido</label>
                <input class="form-control mb-3" type="text" id="singin-apellido" name="apellido" value="<?= set_value('apellido') ?>" placeholder="Apellido/s">
                <?php if (isset($errores['apellido'])) {
                    echo '<p class="text-danger">* ' . $errores['apellido'] . '</p>';
                } ?>

                <label id="signin-prov-label" for="singin-provincias" class="form-label">Seleccione su provincia</label>
                <select class="form-select mb-3" aria-label="signin-provincias" name="provincia_id" id="signin-provincias">
                    <option class="text-secondary" value="0">Seleccione una ciudad</option>
                    <?php foreach ($provincias as $prov) { ?>
                        <option value="<?= $prov['id_provincia'] ?>" <?= set_select('provincia_id', $prov['id_provincia']) ?>><?= $prov['provincia'] ?></option>
                    <?php } ?>
                </select>
                <?php if (isset($errores['provincia_id'])) {
                    echo '<p class="text-danger">* ' . $errores['provincia_id'] . '</p>';
                } ?>

                <label id="signin-ciud-label" for="singin-ciudades" class="form-label">Seleccione su ciudad</label>
                <select class="form-select mb-3" aria-label="signin-ciudades" name="localidad_id" id="signin-ciudades">
                    <option class="text-secondary" value="0">Seleccione una ciudad</option>
                    <?php foreach ($localidades as $loc) { ?>
                        <option class='loc_opc d-none' <?= set_select('localidad_id', $loc['id_localidad']) ?> id="<?= $loc['provincia_id'] ?>" value="<?= $loc['id_localidad'] ?>"><?= $loc['localidad'] ?></option>
                    <?php } ?>
                </select>
                <?php if (isset($errores['localidad_id'])) {
                    echo '<p class="text-danger">* ' . $errores['localidad_id'] . '</p>';
                } ?>

                <label for="singin-direccion" class="form-label">Dirección</label>
                <input class="form-control mb-3" type="text" id="singin-direccion" name="direccion" value="<?= set_value('direccion') ?>" placeholder="Dirección">
                <?php if (isset($errores['direccion'])) {
                    echo '<p class="text-danger">* ' . $errores['direccion'] . '</p>';
                } ?>

                <label for="singin-tel" class="form-label">Nro. de Teléfono</label>
                <input class="form-control mb-3" type="text" id="singin-tel" name="tel" value="<?= set_value('tel') ?>" placeholder="Telefóno">
                <?php if (isset($errores['tel'])) {
                    echo '<p class="text-danger">* ' . $errores['tel'] . '</p>';
                } ?>

                <button class="btn border w-50 my-3 fondo-2 borde-2 align-self-center" type="submit">Registrarse</button>

            </form>
        </div>
    </div>
</div>