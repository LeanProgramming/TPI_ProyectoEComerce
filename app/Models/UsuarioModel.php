<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{   
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $allowedFields = ['usuario', 'email', 'pass','nombre', 'apellido', 'provincia_id', 'localidad_id', 'direccion', 'tel', 'baja'];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected $validationRules = [
        'usuario' => 'required|is_unique[usuarios.usuario]',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'pass' => 'required|min_length[8]',
        'nombre' => 'required',
        'apellido' => 'required',
        'provincia_id' => 'required|greater_than[0]',
        'localidad_id' => 'required|greater_than[0]',
        'direccion' => 'required',
        'tel' => 'required'
    ];

    protected $validationMessages = [
        'usuario' => [
            'required' => 'Debe ingresar un nombre de usuario.',
            'is_unique' => 'El nombre de usuario ingresado ya existe.'
        ],
        'email' => [
            'required' => 'Debe ingresar una dirección de correo.',
            'valid_email' => 'Debe ingresar una dirección de correo válida.',
            'is_unique' => 'El correo ingresado ya existe.'
        ],
        'pass' => [
            'required' => 'Debe ingresar un nombre de usuario.',
            'min_length' => 'La contraseña debe poseer mas de 8 caracteres.'
        ],
        'nombre' => [
            'required' => 'Debe ingresar su nombre.'
        ],
        'apellido' => [
            'required' => 'Debe ingresar su apellido.'
        ],
        'provincia_id' => [
            'required' => 'Debe seleccionar una provincia.',
            'greater_than' => 'Debe seleccionar una provincia.'
        ],
        'localidad_id' => [
            'required' => 'Debe seleccionar una ciudad.',
            'greater_than' => 'Debe seleccionar una ciudad.'

        ],
        'direccion' => [
            'required' => 'Debe ingresar una dirección.'
        ],
        'tel' => [
            'required' => 'Debe ingresar un número de teléfono.',
            'numeric' => 'Solo debe contener números.'
        ]
    ];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['pass'])) {
            return $data;
        }

        $data['data']['pass'] = password_hash($data['data']['pass'], PASSWORD_DEFAULT);

        return $data;
    }
}

?>