<div class="container rounded sombra-x p-3 my-3">
    <?php if($_SESSION['tipo'] == 1) { ?>
    <a class="btn btn-outline-info" href="<?= base_url('/ventas') ?>"><i class="fa-solid fa-chevron-left"></i></a>
    <?php } else {?>
        <a class="btn btn-outline-info" href="<?= base_url('/perfil') ?>"><i class="fa-solid fa-chevron-left"></i></a>
    <?php }?>
    <h2 class="text-center">Detalle de Compra</h2>
    <?php $fechaHora = date_create($comprobante['fecha_compra']); ?>
    <p class="text-center">Fecha de compra: <?= date_format($fechaHora, 'd/m/y') ?></p>
    <p class="text-center">Hora de compra: <?= date_format($fechaHora, 'H:i:s') ?></p>
    <hr>
    <div class="row my-2 p-2 g-3">
        <div class="col-6">
            <div class="border p-3 w-100 h-100">
                <p>Server 101 </p>
                <p>Belgrano 1851 Local 59</p>
            </div>
        </div>
        <div class="col-6">
            <div class="border p-3 w-100 h-100">
                <p class="border p-1">Nro de Comprobante:</p>
                <p class="text-center"><?= $comprobante['id_comprobante'] ?></p>
            </div>
        </div>

        <div class="col-6">
            <div class="border p-3 w-100 h-100">
                <p>Detalles del cliente</p>
                <p>Nombre de usuario: <?= $comprobante['usuario'] ?></p>
                <p>Nombre: <?= $comprobante['nombre'] ?></p>
                <p>Apellido: <?= $comprobante['apellido'] ?></p>
            </div>
        </div>
        <div class="col-6">
            <div class="border p-3 w-100 h-100">
                <p>Fecha: <?= date_format($fechaHora, 'd/m/y')  ?></p>
                <p>Forma de pago: Transferencia Bancaria</p>
                <p>Domicilio de envío: <?= $comprobante['direccion'] ?></p>
            </div>
        </div>

        <hr class="my-2">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-dark">
                        <th scope='col'>#</th>
                        <th scope='col'>Nombre del Producto</th>
                        <th scope='col'>Cantidad</th>
                        <th scope='col'>Precio Unitario</th>
                        <th scope='col'>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($detalles as $d) {
                    ?>
                        <tr>
                            <td scope='row' class="text-center"><?= $i ?></td>
                            <td><?= $d['nombre_producto'] ?></td>
                            <td class="text-center"><?= $d['cantidad'] ?></td>
                            <td class="text-center">$ <?= number_format($d['precio_unitario'], 2, ',', '.') ?></td>
                            <td class="text-center">$ <?= number_format(($d['precio_unitario'] * $d['cantidad']), 2, ',', '.') ?></td>
                        </tr>
                    <?php $i++;
                    } ?>
                    <tr>
                        <td class="text-end" colspan="2">Total</td>
                        <td class="text-center"><?= $comprobante['cant_prods'] ?></td>
                        <td></td>
                        <td class="text-center">$ <?= number_format($comprobante['monto_total'], 2, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
