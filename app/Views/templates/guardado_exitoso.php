<div class="container d-flex justify-content-center align-content-center">
    <div class="text-center p-5 m-5 bg-tranparent borde-1 rounded sombra-x">
    <?php if($titulo == 'Registro') { ?>
        <h1>Usted se ha registrado con éxito</h1>
        <a href="<?= base_url('/') ?>">Volver al Inicio</a>
    <?php } ?>
    <?php if($titulo == 'Agregar Producto' || $titulo == 'Modificar Producto') { ?>
        <h1>Producto guardado con éxito</h1>
        <a href="<?= base_url('/') ?>">Volver al Inicio</a>
    <?php } ?>
    <?php if($titulo == 'Contacto' ) { ?>
        <h1>Su mensaje se ha enviado con éxito</h1>
        <a href="<?= base_url('/contacto') ?>">Volver a Consulta</a>
    <?php } ?>
    <?php if($titulo == 'Consulta' ) { ?>
        <h1>Su consulta se ha realizado con éxito</h1>
        <a href="<?= base_url('/consulta') ?>">Volver a Consulta</a>
    <?php } ?>
    <?php if($titulo == 'Compra exitosa' ) { ?>
        <h1>Su compra se ha realizado con éxito</h1>
        <a href="<?= base_url('/') ?>">Volver al Inicio</a>
    <?php } ?>
    </div>
    
</div>