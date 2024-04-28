<?php

namespace App\Models;

use CodeIgniter\Model;

class ClasificacionModel extends Model
{
    protected $table      = 'clasificacion';
    protected $primaryKey = 'id_clasificacion';

    protected $allowedFields = ['clasif', 'baja_clasif'];

    protected $validationRules = [
        'clasif' => 'required|max_length[100]'
    ];

    protected $validationMessages = [
        'clasif' => [
            'required' => 'Debe ingresar un nombre para la clasificación.',
            'max_length' => 'La clasificación debe contener menos de 100 caracteres.'
        ]
    ];
}

?>