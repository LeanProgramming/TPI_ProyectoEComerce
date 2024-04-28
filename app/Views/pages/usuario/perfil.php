<div class="container fondo-1 rounded sombra-x p-3 my-3">
    <div class="row justify-content-center g-3">
        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="<?= base_url('assets/img/user.png') ?>" alt="Profile Picture">
        </div>
        <div class="col-12 col-lg-8 d-flex flex-column justify-content-around align-items-around">
            <div>
                <h3>Hola <?= $usuario['usuario'] ?></h3>
            </div>
            <hr>
            <div>
                <h5>Datos del usuario</h5>
            </div>
            <hr>
            <div>
                <div class="d-flex flex-row flex-lg-column justify-content-left">
                    <p class="me-3">Nombre: <?= $usuario['nombre'] ?></p>
                    <p>Apellido: <?= $usuario['apellido'] ?></p>
                </div>
                <div class="d-flex justify-content-left">
                    <p class="me-3">Dirección: <?= $usuario['direccion'] ?></p>
                    <p>Provincia: <?= $usuario['provincia'] ?></p>
                    <p class="mx-3">Localidad: <?= $usuario['localidad'] ?></p>
                </div>
                <p>Teléfono: <?= $usuario['tel'] ?></p>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <a class="btn btn-lg btn-outline-warning" href="<?= base_url('modificar_usuario/' . $usuario['id_usuario']) ?>"><i class="fa-solid fa-pencil"></i> Modificar datos de usuario</a>
            </div>
        </div>

    </div>
</div>

<?php if ($_SESSION['tipo'] == 2) { ?>
    <div class="container fondo-1 sombra-x rounded p-3 my-3">
        <h5 class="text-center">Compras realizadas</h5>
        <div class="table-responsive">
            <table class="table table-hover fuente-md">
                <thead>
                    <tr class="text-center">
                        <th>ID Compra</th>
                        <th>Cantidad de Productos</th>
                        <th>Monto total</th>
                        <th>Fecha de Compra</th>
                        <th>Hora de Compra</th>
                        <th>Ver detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comprobantes as $compr) {
                        $fechaHora = date_create($compr['fecha_compra'])
                    ?>
                        <tr class="text-center">
                            <td class="text-center"><?= $compr['id_comprobante'] ?></td>
                            <td class="text-center"><?= $compr['cant_prods'] ?></td>
                            <td class="text-center">$<?= number_format($compr['monto_total'], 2, ',', '.') ?></td>
                            <td class="text-center"><?= date_format($fechaHora, 'd/m/y') ?></td>
                            <td class="text-center"><?= date_format($fechaHora, 'H:i:s') ?></td>
                            <td class="text-center"><a class="btn btn-small btn-outline-info" href="<?= base_url('ver_detalle_compra/' . $compr['id_comprobante']) ?>"><i class="fa-solid fa-eye"></i></a></td>
                        </tr>
                    <?php }
                    if (empty($comprobantes)) {
                        echo "<td class='text-center fw-bold fs-4' colspan='10'>No se han realizado ventas</td>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>