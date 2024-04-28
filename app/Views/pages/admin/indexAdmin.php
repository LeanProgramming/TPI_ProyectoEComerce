<div class="container-fluid  rounded">
    <div class="container my-4 d-flex justify-content-around">
        <button type="button" id="prod_baja" class="btn btn-lg btn-outline-info">Mostrar productos dados de baja</button>
        <a class="btn btn-lg btn-outline-success" href="<?= base_url('/agregar_producto') ?>"><i class="fa-solid fa-plus"></i> Agregar producto</a>
    </div>

    <div class="table-responsive">
        <table id="tabla_alta" class="table table-hover table-bordered fondo-transp fuente-md">
            <thead>
                <tr class="text-center">
                    <th scope="col">Imagen</th>
                    <th scope="col">Código producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Clasif</th>
                    <th scope="col">Subclasif</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Dar de baja</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $prod) { ?>
                    <tr>
                        <td scope="row"><img class="img-thumbnail" src="<?= base_url("assets/img/productos/{$prod['imagen']}") ?>" alt="<?= $prod['nombre'] ?>" style="width:100px;"></td>
                        <td class="text-center"><?= $prod['codigo_producto'] ?></td>
                        <td><?= $prod['nombre'] ?></td>
                        <td>$<?= number_format($prod['precio'], 2, ',', '.') ?></td>
                        <td><?= $prod['descripcion'] ?></td>
                        <td><?= $prod['clasif'] ?></td>
                        <td><?= $prod['subclasif'] ?></td>
                        <td class="text-center"><?= $prod['stock'] ?></td>
                        <td class="text-center"><a class="btn btn-outline-warning" href="<?= base_url('modificar_producto//' . $prod['id_producto']) ?>"><i class="fa-solid fa-pencil"></i></a></td>
                        <td class="text-center"><a class="btn btn-outline-danger" href="<?= base_url('dar_baja/' . $prod['id_producto']) ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                <?php }
                if (empty($productos)) {
                    echo "<td class='text-center fw-bold fs-4' colspan='10'>No hay productos activos</td>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table id="tabla_baja" class="table table-hover table-bordered fondo-3 fuente-md d-none">
            <thead>
                <tr class="text-center">
                    <th scope="col">Imagen</th>
                    <th scope="col">Código producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Clasif</th>
                    <th scope="col">Subclasif</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Dar de alta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bajas as $prod) { ?>
                    <tr>
                        <td scope="row"><img class="img-thumbnail" src="<?= base_url("assets/img/productos/{$prod['imagen']}") ?>" alt="<?= $prod['nombre'] ?>" style="width:100px;"></td>
                        <td class="text-center"><?= $prod['codigo_producto'] ?></td>
                        <td><?= $prod['nombre'] ?></td>
                        <td>$<?= number_format($prod['precio'], 2, ',', '.') ?></td>
                        <td><?= $prod['descripcion'] ?></td>
                        <td><?= $prod['clasif'] ?></td>
                        <td><?= $prod['subclasif'] ?></td>
                        <td class="text-center"><?= $prod['stock'] ?></td>
                        <td class="text-center"><a class="btn btn-outline-warning" href="<?= base_url('modificar_producto//' . $prod['id_producto']) ?>"><i class="fa-solid fa-pencil"></i></a></td>
                        <td class="text-center"><a class="btn btn-outline-success" href="<?= base_url('dar_alta/' . $prod['id_producto']) ?>"><i class="fa-solid fa-plus"></i></a></td>

                    </tr>
                <?php }
                if (empty($bajas)) {
                    echo "<td class='text-center fw-bold fs-4' colspan='10'>No hay productos dados de baja</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>