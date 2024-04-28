<?php

namespace App\Models;

use CodeIgniter\Model;

class ComprobanteModel extends Model
{   
    protected $table      = 'comprobantes';
    protected $primaryKey = 'id_comprobante';

    protected $allowedFields = ['usuario_id', 'fecha_compra', 'cant_prods', 'monto_total'];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'fecha_compra';
    protected $updatedField = 'fecha_compra';
}
?>