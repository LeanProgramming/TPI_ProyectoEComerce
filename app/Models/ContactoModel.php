<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactoModel extends Model
{   
    protected $table      = 'contactos';
    protected $primaryKey = 'id_contacto';

    protected $allowedFields = ['nombre_contacto', 'email_contacto', 'mensaje', 'fecha_envio', 'leido', 'fecha_leido'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_envio';
    protected $updatedField = 'fecha_leido';

    protected $validationRules = [
        'nombre_contacto' => 'required',
        'email_contacto' => 'required|valid_email',
        'mensaje' => 'required'
    ];

    protected $validationMessages = [
        'nombre_contacto' => [
            'required' => 'Debe ingresar un nombre.'
        ],
        'email_contacto' => [
            'required' => 'Debe ingresar un email.',
            'valid_email' => 'Debe ingresarun email válido.'
        ],
        'mensaje' => [
            'required' => 'Debe ingresar un mensaje.'
        ]
    ];
}
?>