<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{   
    protected $table      = 'consultas';
    protected $primaryKey = 'id_consulta';

    protected $allowedFields = ['asunto', 'contenido', 'fecha_cons','usuario_id','leido', 'fecha_leido'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_cons';
    protected $updatedField = 'fecha_leido';

    protected $validationRules = [
        'asunto' => 'required',
        'contenido' => 'required'
    ];

    protected $validationMessages = [
        'asunto' => [
            'required' => 'Debe ingresar un asunto.'
        ],
        'contenido' => [
            'required' => 'Debe ingresar un mensaje.'
        ]
    ];
}
?>