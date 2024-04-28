<div class="container fondo-1 sombra-x rounded p-3 my-3">
    <h5 class="text-center">Comprobantes de venta</h5>
    <div class="table-responsive">
        <table class="table table-hover fuente-md">
            <thead>
                <tr class="text-center">
                    <th>ID Compra</th>
                    <th>Usuario</th>
                    <th>Nombre Completo</th>
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
                        <td class="text-center"><?= $compr['usuario'] ?></td>
                        <td class="text-center"><?= $compr['nombre'] . ' ' . $compr['apellido'] ?></td>
                        <td class="text-center"><?= $compr['cant_prods'] ?></td>
                        <td class="text-center">$<?= number_format($compr['monto_total'], 2, ',', '.') ?></td>
                        <td class="text-center"><?= date_format($fechaHora, 'd/m/y') ?></td>
                        <td class="text-center"><?= date_format($fechaHora, 'H:i:s') ?></td>
                        <td class="text-center"><a class="btn btn-small btn-outline-info" href="<?= base_url('ver_detalle/' . $compr['id_comprobante']) ?>"><i class="fa-solid fa-eye"></i></a></td>
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