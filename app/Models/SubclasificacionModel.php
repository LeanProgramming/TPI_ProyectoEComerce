<?php

namespace App\Models;

use CodeIgniter\Model;

class SubclasificacionModel extends Model
{
    protected $table      = 'subclasificacion';
    protected $primaryKey = 'id_subclasif';

    protected $allowedFields = ['clasif_id','subclasif', 'baja_subclasif'];

    protected $validationRules = [
        'clasif_id' => 'required|greater_than[0]',
        'subclasif' => 'required|max_length[100]',
    ];

    protected $validationMessages = [
        'clasif_id' => [
            'required' => 'Debe seleccionar una clasificación.',
            'greater_than' => 'Debe seleccionar una clasificacion.',
        ],
        'subclasif' => [
            'required' => 'Debe ingresar un nombre para la subclasificación.',
            'max_length' => 'La subclasificación debe contener menos de 100 caracteres.'
        ]
    ];
}

?>