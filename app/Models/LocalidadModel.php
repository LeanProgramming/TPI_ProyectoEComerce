<?php

namespace App\Models;

use CodeIgniter\Model;

class LocalidadModel extends Model
{
    protected $table      = 'localidades';
    protected $primaryKey = 'id_localidad';

    protected $allowedFields = ['provincia_id', 'localidad'];

}

?>