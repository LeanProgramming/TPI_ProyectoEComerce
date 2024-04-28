<div id="agregar_subclasif" class="col-12 d-flex justify-content-center align-items-center">
    <div class="fondo-1 my-4 p-3 sombra-x rounded w-50">
        <div>
            <a class="btn btn-outline-info" href="<?= base_url('/subclasificaciones') ?>"><i class="fa-solid fa-chevron-left"></i></a>
            <h1 class="fs-5 text-center">Modificar "<?= $subclasif['subclasif'] ?>"</h1>
        </div>
        <div>
            <form action="<?= base_url('modificar_subclasif/'.$subclasif['id_subclasif']) ?>" method="post" class="d-flex flex-column justify-content-around bg-transparent borde-3">

                <label for="subclasif-id" class="form-label">ID Subclasificación: </label>
                <input class="form-control mb-3" type="text" name="id_subclasif" value="<?= set_value('id_subclasif', $subclasif['id_subclasif']) ?>" id="subclasif-id" disabled>

                <label for="clasif-id" class="form-label">Clasificación</label>
                <select class="form-select mb-3" name="clasif_id" id="clasif-id">
                    <option selected value='0'>Seleccionar una clasificación</option>
                    <?php foreach ($clasificaciones as $clasif) { ?>
                        <option value="<?= $clasif['id_clasificacion'] ?>" <?= set_select('clasif_id', $clasif['id_clasificacion'], $subclasif['clasif_id']==$clasif['id_clasificacion']? true:false) ?>><?= $clasif['clasif'] ?></option>
                    <?php } ?>
                </select>
                <?php if (isset($errores['clasif_id'])) {
                    echo '<p class="text-danger">* ' . $errores['clasif_id'] . '</p>';
                } ?>

                <label for="subclasif-nombre" class="form-label">Subclasificación:</label>
                <input class="form-control mb-3" type="text" name="subclasif" value="<?= set_value('subclasif', $subclasif['subclasif']) ?>" id="subclasif-nombre" placeholder="Subclasificación">
                <?php if (isset($errores['subclasif'])) {
                    echo '<p class="text-danger">* ' . $errores['subclasif'] . '</p>';
                } ?>

                <button class="btn border w-50 my-3 fondo-2 borde-2 align-self-center" type="submit">Modificar subclasificación</button>

            </form>
        </div>
    </div>
</div>