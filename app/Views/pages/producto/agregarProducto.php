<div class="container fondo-1 w-50 my-4 p-3 sombra-x rounded">
    <div class="agregar-header">
        <a class="btn btn-outline-info" href="<?= base_url('/') ?>"><i class="fa-solid fa-chevron-left"></i></a>
        <h1 class="fs-5 text-center" id="registrar">Agregar Producto</h1>
    </div>
    <div class="agregar-body">
        <form action="<?= base_url('/agregar_producto') ?>" method="post"  enctype="multipart/form-data" class="d-flex flex-column justify-content-around bg-transparent borde-3">
            <label for="prod-codigo" class="form-label">Código de Producto</label>
            <input class="form-control mb-3" type="number" value="<?= set_value('codigo_producto') ?>"id="prod-codigo" name="codigo_producto" placeholder="Código del producto">
            <?php if(isset($errores['codigo_producto'])) {echo '<p class="text-danger">* '.$errores['codigo_producto'].'</p>';} ?>

            <label for="prod-nombre" class="form-label">Nombre del Producto:</label>
            <input class="form-control mb-3" type="text" value="<?= set_value('nombre') ?>" id="prod-nombre" name="nombre" placeholder="Nombre del Producto">
            <?php if(isset($errores['nombre'])) {echo '<p class="text-danger">* '.$errores['nombre'].'</p>';} ?>

            <label for="prod-precio" class="form-label">Precio</label>
            <input class="form-control mb-3" type="number" value="<?= set_value('precio') ?>"id="prod-precio" name="precio" step="0.01" placeholder="Precio">
            <?php if(isset($errores['precio'])) {echo '<p class="text-danger">* '.$errores['precio'].'</p>';} ?>

            <label for="prod-desc" class="form-label">Descripción</label>
            <textarea class="form-control mb-3" id="prod-desc" name="descripcion" placeholder="Ingrese una descripción"><?= set_value('descripcion') ?></textarea>
            <?php if(isset($errores['descripcion'])) {echo '<p class="text-danger">* '.$errores['descripcion'].'</p>';} ?>

            <label for="prod-clasif" class="form-label">Clasificación</label>
            <select class="form-select mb-3" aria-label="prod-clasif" name="tipo1" id="prod-clasif">
                <option selected value='0'>Seleccionar una clasificación</option>
                <?php foreach ($clasificaciones as $clasif) { ?>
                    <option value="<?= $clasif['id_clasificacion'] ?>" <?= set_select('tipo1', $clasif['id_clasificacion']) ?>><?= $clasif['clasif'] ?></option>
                <?php } ?>
            </select>
            <?php if(isset($errores['tipo1'])) {echo '<p class="text-danger">* '.$errores['tipo1'].'</p>';} ?>

            <label for="prod-subclasif" class="form-label">Subclasificación</label>
            <select class="form-select mb-3" aria-label="prod-subclasif" name="tipo2"  id="prod-subclasif">
                <option selected value='0'>Seleccionar una subclasificación</option>
                <?php foreach ($subclasificaciones as $clasif) { ?>
                    <option class="subclasif-prod d-none" <?= set_select('tipo2', $clasif['id_subclasif']) ?> id="<?= $clasif['clasif_id'] ?>" value="<?= $clasif['id_subclasif']  ?>"><?= $clasif['subclasif']  ?></option>
                <?php } ?>
            </select>
            <?php if(isset($errores['tipo2'])) {echo '<p class="text-danger">* '.$errores['tipo2'].'</p>';} ?>

            <label for="prod-stock" class="form-label">Stock</label>
            <input class="form-control mb-3" type="number" id="prod-stock" name="stock" value="<?= set_value('stock') ?>" placeholder="Stock">
            <?php if(isset($errores['stock'])) {echo '<p class="text-danger">* '.$errores['stock'].'</p>';} ?>

            <label for="prod-imagen" class="form-label">Imagen</label>
            <input class="form-control-file mb-3" type="file" id="prod-imagen" name="imagen">
            <?php if(isset($errores['imagen'])) {echo '<p class="text-danger">* '.$errores['imagen'].'</p>';} ?>

            <button class="btn border w-50 my-3 fondo-2 borde-2 align-self-center" type="submit">Agregar producto</button>

        </form>
    </div>
</div>