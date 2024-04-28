<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleCompraModel extends Model
{   
    protected $table      = 'detalles_compras';
    protected $primaryKey = 'id_detalle';

    protected $allowedFields = ['nombre_producto', 'cantidad', 'precio_unitario', 'precio_total', 'comprobante_id'];
}
?>