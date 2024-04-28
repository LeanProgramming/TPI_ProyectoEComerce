<div class="container fondo-1 sombra-x rounded p-3 my-3">
    <h5 class="text-center">Mensajes de contacto no leídos</h5>
    <div class="table-responsive">
        <table class="table table-hover fuente-md">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contenido</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Marcar Leido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contactos as $cont) {
                    $fechaHora = date_create($cont['fecha_envio'])
                ?>
                    <tr>
                        <td class="text-center"><?= $cont['id_contacto'] ?></td>
                        <td class="text-center"><?= $cont['nombre_contacto'] ?></td>
                        <td class="text-center"><?= $cont['email_contacto'] ?></td>
                        <td><?= $cont['mensaje'] ?></td>
                        <td class="text-center"><?= date_format($fechaHora, 'd/m/y') ?></td>
                        <td class="text-center"><?= date_format($fechaHora, 'H:i:s') ?></td>
                        <td class="text-center"><a class="btn btn-small btn-outline-success" href="<?= base_url('leer_mensaje/' . $cont['id_contacto']) ?>"><i class="fa-solid fa-check"></i></a></td>
                    </tr>
                <?php }
                if (empty($contactos)) {
                    echo "<td class='text-center fw-bold fs-4' colspan='9'>No hay mensajes sin leer</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container fondo-1 sombra-x rounded p-3 my-3">
    <h5 class="text-center">Mensajes de contacto leídos</h5>
    <div class="table-responsive">
        <table class="table table-hover fondo-3 fuente-md overflow-scroll">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contenido</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Fecha y hora de lectura</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leidos as $cont) {
                    $fechaHora = date_create($cont['fecha_envio'])
                ?>
                    <tr>
                        <td class="text-center"><?= $cont['id_contacto'] ?></td>
                        <td class="text-center"><?= $cont['nombre_contacto'] ?></td>
                        <td class="text-center"><?= $cont['email_contacto'] ?></td>
                        <td><?= $cont['mensaje'] ?></td>
                        <td class="text-center"><?= date_format($fechaHora, 'd/m/y') ?></td>
                        <td class="text-center"><?= date_format($fechaHora, 'H:i:s') ?></td>
                        <td class="text-center"><?= $cont['fecha_leido'] ?></td>
                    </tr>
                <?php }
                if (empty($leidos)) {
                    echo "<td class='text-center fw-bold fs-4' colspan='8'>No hay mensajes leídos.</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>