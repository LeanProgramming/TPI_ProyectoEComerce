<div class="container fondo-1 w-50 my-4 p-3 sombra-x rounded">
    <div class="agregar-header">
        <a class="btn btn-outline-info" href="<?= base_url('/clasificaciones') ?>"><i class="fa-solid fa-chevron-left"></i></a>
        <h1 class="fs-5 text-center" id="agregar_clasif">Modificar "<?= $clasif['clasif']?>"</h1>
    </div>
    <div class="agregar-body">
        <form action="<?= base_url('modificar_clasif/'.$clasif['id_clasificacion']) ?>" method="post" class="d-flex flex-column justify-content-around bg-transparent borde-3">

            <label for="clasif-id" class="form-label">ID Clasificación: </label>
            <input class="form-control mb-3" type="text" name="id_clasificacion" value="<?= set_value('id_clasificacion',$clasif['id_clasificacion']) ?>" id="clasif-id"  disabled>

            <label for="clasif-nombre" class="form-label">Clasificación:</label>
            <input class="form-control mb-3" type="text" name="clasif" value="<?= set_value('clasif', $clasif['clasif']) ?>" id="clasif-nombre"  placeholder="Ingresar clasificación">
            <?php if(isset($errores['clasif'])) {echo '<p class="text-danger">* '.$errores['clasif'].'</p>';} ?>

            <button class="btn border w-50 my-3 fondo-2 borde-2 align-self-center" type="submit">Modificar clasificación</button>

        </form>
    </div>
</div>