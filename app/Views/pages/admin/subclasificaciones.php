<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <button id="btn_agregar_subclasif" class="btn btn-lg btn-outline-success"><i class="fa-solid fa-plus"></i> Agregar nueva subclasificación</button>
        </div>

        <div id="agregar_subclasif" class="col-12 d-flex justify-content-center align-items-center  <?= $esAgregar ? '' : 'd-none' ?> ">
            <div class="fondo-1 my-4 p-3 sombra-x rounded w-50">
                <div>
                    <h1 class="fs-5 text-center">Agregar Sublasificación</h1>
                </div>
                <div>
                    <form action="<?= base_url('/subclasificaciones') ?>" method="post" class="d-flex flex-column justify-content-around bg-transparent borde-3">

                        <label for="clasif-id" class="form-label">Clasificación:</label>
                        <select class="form-select mb-3" name="clasif_id" id="clasif-id">
                            <option selected value='0'>Seleccionar una clasificación</option>
                            <?php foreach ($clasificaciones as $clasif) { ?>
                                <option value="<?= $clasif['id_clasificacion'] ?>" <?= set_select('clasif_id', $clasif['id_clasificacion']) ?>><?= $clasif['clasif'] ?></option>
                            <?php } ?>
                        </select>
                        <?php if (isset($errores['clasif_id'])) {
                            echo '<p class="text-danger">* ' . $errores['clasif_id'] . '</p>';
                        } ?>

                        <label for="subclasif-nombre" class="form-label">Subclasificación:</label>
                        <input class="form-control mb-3" type="text" name="subclasif" value="<?= set_value('subclasif') ?>" id="subclasif-nombre" placeholder="Ingresar subclasificación">
                        <?php if (isset($errores['subclasif'])) {
                            echo '<p class="text-danger">* ' . $errores['subclasif'] . '</p>';
                        } ?>

                        <button class="btn border w-50 my-3 fondo-2 borde-2 align-self-center" type="submit">Agregar subclasificación</button>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5 fondo-1 sombra-x rounded p-3 m-3 h-100">
            <h5 class="text-center">Sublasificaciones</h5>
            <div class="table-responsive">
                <table class="table table-sm table-hover fuente-md">
                    <thead>
                        <tr class="text-center">
                            <th>ID Subclasificación</th>
                            <th>Nombre</th>
                            <th>Clasificación</th>
                            <th>Editar</th>
                            <th>Dar de baja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subclasificaciones as $clasif) { ?>
                            <tr class="text-center">
                                <td class="text-center"><?= $clasif['id_subclasif'] ?></td>
                                <td class="text-center"><?= $clasif['subclasif'] ?></td>
                                <td class="text-center"><?= $clasif['clasif'] ?></td>
                                <td class="text-center"><a class="btn btn-small btn-outline-warning" href="<?= base_url('modificar_subclasif/' . $clasif['id_subclasif']) ?>"><i class="fa-solid fa-pencil"></i></a></td>
                                <td class="text-center"><a class="btn btn-small btn-outline-danger" href="<?= base_url('baja_subclasif/' . $clasif['id_subclasif']) ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        <?php }
                        if (empty($subclasificaciones)) {
                            echo "<td class='text-center fw-bold fs-4' colspan='5'>No hay subclasificaciones activas</td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-lg-5 fondo-1 sombra-x rounded p-3 m-3 h-100">
            <h5 class="text-center">Subclasificaciones dadas de baja</h5>
            <div class="table-responsive">
                <table class="table table-sm table-hover fondo-3 fuente-md">
                    <thead>
                        <tr class="text-center">
                            <th>ID Subclasificación</th>
                            <th>Nombre</th>
                            <th>Clasificacion</th>
                            <th>Editar</th>
                            <th>Dar de alta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bajas as $clasif) { ?>
                            <tr class="text-center">
                                <td class="text-center"><?= $clasif['id_subclasif'] ?></td>
                                <td class="text-center"><?= $clasif['subclasif'] ?></td>
                                <td class="text-center"><?= $clasif['clasif'] ?></td>
                                <td class="text-center"><a class="btn btn-small btn-outline-warning" href="<?= base_url('modificar_subclasif/' . $clasif['id_subclasif']) ?>"><i class="fa-solid fa-pencil"></i></a></td>
                                <td class="text-center"><a class="btn btn-small btn-outline-success" href="<?= base_url('alta_subclasif/' . $clasif['id_subclasif']) ?>"><i class="fa-solid fa-plus"></i></a></td>
                            </tr>
                        <?php }
                        if (empty($bajas)) {
                            echo "<td class='text-center fw-bold fs-4' colspan='5'>No hay subclasificaciones dadas de baja</td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>