<div class="container mb-5">
    <div class="row gap-3">
        <div class="fondo-1 sombra-x rounded p-3">
            <form class="row justify-content-center" action="<?= base_url('/consulta') ?>" method="post">
                <div>
                    <h4 class="text-center">Realizar Consulta</h4>
                </div>
                <div class="col-12">
                    <label class="form-label" for="asunto">Asunto</label>
                    <input class="form-control fondo-3" type="text" name="asunto" id="asunto">
                    <?php if (isset($errores)) {
                        echo "<p class='text-danger'>* {$errores['asunto']}</p>";
                    } ?>
                </div>
                <div class="col-12">
                    <label class="form-label" for="contenido">Mensaje</label>
                    <textarea class="form-control fondo-3" name="contenido" id="contenido" cols="30" rows="5"></textarea>
                    <?php if (isset($errores)) {
                        echo "<p class='text-danger'>* {$errores['contenido']}</p>";
                    } ?>
                </div>
                <div class="col-12 d-flex justify-content-center gap-5">
                    <button class="btn border w-50 my-3 fondo-2 borde-2" type="submit">Enviar</button>
                    <button class="btn border w-50 my-3 fondo-2 borde-2" type="reset">Borrar</button>
                </div>

            </form>
        </div>
        <?php if (isset($consultas)) { ?>
            <div class="fondo-1 sombra-x rounded p-3">
                <h5 class="text-center">Mis consultas</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asunto</th>
                            <th>Contenido</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($consultas as $cons) {
                            $fechaHora = date_create($cons['fecha_cons']);
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $cons['asunto'] ?></td>
                                <td><?= $cons['contenido'] ?></td>
                                <td><?= date_format($fechaHora, 'd/m/y') ?></td>
                                <td><?= date_format($fechaHora, 'H:i:s') ?></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
</div>