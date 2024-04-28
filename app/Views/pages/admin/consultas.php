<div class="container fondo-1 sombra-x rounded p-3 my-3">
    <h5 class="text-center">Consultas no leídas</h5>
    <div class="table-responsive">
        <table class="table table-hover fuente-md">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Contenido</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Marcar Leido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($consultas as $cons) {
                    $fechaHora = date_create($cons['fecha_cons'])
                ?>
                    <tr>
                        <td><?= $cons['id_consulta'] ?></td>
                        <td class="text-center"><?= $cons['id_usuario'] ?></td>
                        <td><?= $cons['nombre'] . ' ' . $cons['apellido'] ?></td>
                        <td><?= $cons['email'] ?></td>
                        <td><?= $cons['asunto'] ?></td>
                        <td><?= $cons['contenido'] ?></td>
                        <td><?= date_format($fechaHora, 'd/m/y') ?></td>
                        <td><?= date_format($fechaHora, 'H:i:s') ?></td>
                        <td class="text-center"><a class="btn btn-small btn-outline-success" href="<?= base_url('leer_consulta/' . $cons['id_consulta']) ?>"><i class="fa-solid fa-check"></i></a></td>
                    </tr>
                <?php }
                if (empty($consultas)) {
                    echo "<td class='text-center fw-bold fs-4' colspan='9'>No hay mensajes sin leer</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container fondo-1 sombra-x rounded p-3 my-3">
    <h5 class="text-center">Consultas leídas</h5>
    <div class="table-responsive">
        <table class="table table-hover fondo-3 fuente-md overflow-scroll">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">ID Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Asunto</th>
                    <th scope="col">Contenido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Fecha y Hora de lectura</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leidos as $cons) {
                    $fechaHora = date_create($cons['fecha_cons'])
                ?>
                    <tr>
                        <td scope="row"><?= $cons['id_consulta'] ?></td>
                        <td class="text-center"><?= $cons['id_usuario'] ?></td>
                        <td><?= $cons['nombre'] . ' ' . $cons['apellido'] ?></td>
                        <td><?= $cons['email'] ?></td>
                        <td><?= $cons['asunto'] ?></td>
                        <td><?= $cons['contenido'] ?></td>
                        <td><?= date_format($fechaHora, 'd/m/y') ?></td>
                        <td><?= date_format($fechaHora, 'H:i:s') ?></td>
                        <td><?= $cons['fecha_leido'] ?></td>
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