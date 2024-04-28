<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-12 d-flex justify-content-center align-items-center">
            <button class="btn btn-lg btn-outline-success" id="btn_agregar_clasif"><i class="fa-solid fa-plus"></i> Agregar nueva clasificación</button>
        </div>

        <div id="agregar_clasif" class="col-12 d-flex justify-content-center align-items-center  <?= $esAgregar ? '': 'd-none' ?> ">
            <div class="fondo-1 my-4 p-3 sombra-x rounded w-50">
                <div>
                    <h1 class="fs-5 text-center">Agregar Clasificación</h1>
                </div>
                <div>
                    <form action="<?= base_url('/clasificaciones') ?>" method="post" class="d-flex flex-column justify-content-around bg-transparent borde-3">

                        <label for="clasif-nombre" class="form-label">Clasificación:</label>
                        <input class="form-control mb-3" type="text" name="clasif" value="<?= set_value('clasif') ?>" id="clasif-nombre" placeholder="Ingresar clasificación">
                        <?php if (isset($errores['clasif'])) {
                            echo '<p class="text-danger">* ' . $errores['clasif'] . '</p>';
                        } ?>

                        <button class="btn border w-50 my-3 fondo-2 borde-2 align-self-center" type="submit">Agregar clasificación</button>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5 fondo-1 sombra-x rounded p-3 m-3 h-100">
            <h5 class="text-center">Clasificaciones</h5>
            <div class="table-responsive">
                <table class="table table-sm table-hover fuente-md">
                    <thead>
                        <tr class="text-center">
                            <th>ID Clasificación</th>
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Dar de baja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clasificaciones as $clasif) { ?>
                            <tr class="text-center">
                                <td class="text-center"><?= $clasif['id_clasificacion'] ?></td>
                                <td class="text-center"><?= $clasif['clasif'] ?></td>
                                <td class="text-center"><a class="btn btn-small btn-outline-warning" href="<?= base_url('modificar_clasif/' . $clasif['id_clasificacion']) ?>"><i class="fa-solid fa-pencil"></i></a></td>
                                <td class="text-center"><a class="btn btn-small btn-outline-danger" href="<?= base_url('baja_clasif/' . $clasif['id_clasificacion']) ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr>
                        <?php }
                        if (empty($clasificaciones)) {
                            echo "<td class='text-center fw-bold fs-4' colspan='4'>No hay clasificaciones activas</td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-12 col-lg-5 fondo-1 sombra-x rounded p-3 m-3 h-100">
            <h5 class="text-center">Clasificaciones dadas de baja</h5>
            <div class="table-responsive">
                <table class="table table-sm table-hover fondo-3 fuente-md">
                    <thead>
                        <tr class="text-center">
                            <th>ID Clasificación</th>
                            <th>Nombre</th>
                            <th>Editar</th>
                            <th>Dar de alta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bajas as $clasif) { ?>
                            <tr class="text-center">
                                <td class="text-center"><?= $clasif['id_clasificacion'] ?></td>
                                <td class="text-center"><?= $clasif['clasif'] ?></td>
                                <td class="text-center"><a class="btn btn-small btn-outline-warning" href="<?= base_url('modificar_clasif/' . $clasif['id_clasificacion']) ?>"><i class="fa-solid fa-pencil"></i></a></td>
                                <td class="text-center"><a class="btn btn-small btn-outline-success" href="<?= base_url('alta_clasif/' . $clasif['id_clasificacion']) ?>"><i class="fa-solid fa-plus"></i></a></td>
                            </tr>
                        <?php }
                        if (empty($bajas)) {
                            echo "<td class='text-center fw-bold fs-4' colspan='4'>No hay clasificaciones dadas de baja</td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>