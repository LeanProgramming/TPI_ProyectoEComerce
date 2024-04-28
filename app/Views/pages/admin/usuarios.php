<div class="container fondo-1 sombra-x rounded p-3 my-3">
    <h5 class="text-center">Usuarios activos</h5>
    <div class="table-responsive">
        <table class="table table-hover fuente-md">
            <thead>
                <tr class="text-center">
                    <th>ID Usuario</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Provincia</th>
                    <th>Localidad</th>
                    <th>Direccion</th>
                    <th>Teléfono</th>
                    <th>Tipo</th>
                    <th>Dar de baja</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usr) { ?>
                    <tr class="text-center">
                        <td class="text-center"><?= $usr['id_usuario'] ?></td>
                        <td class="text-center"><?= $usr['usuario'] ?></td>
                        <td class="text-center"><?= $usr['nombre'] . ' ' . $usr['apellido'] ?></td>
                        <td class="text-center"><?= $usr['email'] ?></td>
                        <td class="text-center"><?= $usr['provincia'] ?></td>
                        <td class="text-center"><?= $usr['localidad'] ?></td>
                        <td class="text-center"><?= $usr['direccion'] ?></td>
                        <td class="text-center"><?= $usr['tel'] ?></td>
                        <td class="text-center"><?= $usr['tipo_usuario'] == 1 ? 'Admin' : 'Cliente' ?></td>
                        <td class="text-center"><a class="btn btn-small btn-outline-danger" href="<?= base_url('baja_usuario/' . $usr['id_usuario']) ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                <?php }
                if (empty($usuarios)) {
                    echo "<td class='text-center fw-bold fs-4' colspan='10'>No hay usuarios activos</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container fondo-1 sombra-x rounded p-3 my-3">
    <h5 class="text-center">Usuarios dados de baja</h5>
    <div class="table-responsive">
        <table class="table table-hover fondo-3 fuente-md">
            <thead>
                <tr class="text-center">
                    <th>ID Usuario</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Provincia</th>
                    <th>Localidad</th>
                    <th>Direccion</th>
                    <th>Teléfono</th>
                    <th>Tipo</th>
                    <th>Dar de alta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bajas as $usr) { ?>
                    <tr>
                        <td class="text-center"><?= $usr['id_usuario'] ?></td>
                        <td class="text-center"><?= $usr['usuario'] ?></td>
                        <td class="text-center"><?= $usr['nombre'] . ' ' . $usr['apellido'] ?></td>
                        <td class="text-center"><?= $usr['email'] ?></td>
                        <td class="text-center"><?= $usr['provincia'] ?></td>
                        <td class="text-center"><?= $usr['localidad'] ?></td>
                        <td class="text-center"><?= $usr['direccion'] ?></td>
                        <td class="text-center"><?= $usr['tel'] ?></td>
                        <td class="text-center"><?= $usr['tipo_usuario'] == 1 ? 'Admin' : 'Cliente' ?></td>
                        <td class="text-center"><a class="btn btn-small btn-outline-success" href="<?= base_url('alta_usuario/' . $usr['id_usuario']) ?>"><i class="fa-solid fa-plus"></i></a></td>
                    </tr>
                <?php }
                if (empty($bajas)) {
                    echo "<td class='text-center fw-bold fs-4' colspan='10'>No hay usuarios dados de baja</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>