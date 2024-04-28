<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id_producto';

    protected $allowedFields = ['codigo_producto', 'nombre', 'precio', 'descripcion', 'tipo1', 'tipo2', 'stock', 'imagen', 'baja'];

    protected $validationRules = [
        'codigo_producto' => 'required|is_unique[productos.codigo_producto]|numeric|greater_than[0]',
        'nombre' => 'required|is_unique[productos.nombre]',
        'precio' => 'required|numeric|greater_than[0]',
        'descripcion' => 'required',
        'tipo1' => 'required|greater_than[0]',
        'tipo2' => 'required|greater_than[0]',
        'stock' => 'required|numeric|greater_than[0]',
        'imagen' => 'uploaded[imagen]|is_image[imagen]'
    ];

    protected $validationMessages = [
        'codigo_producto' => [
            'required' => 'Debe ingresar un código de producto',
            'is_unique' => 'El código ingresado ya existe.',
            'numeric' => 'Solo debe contener números.',
            'greater_than' => 'Debe ingresar un valor mayor a 0.'
        ],
        'nombre' => [
            'required' => 'Debe ingresar un nombre de producto',
            'is_unique' => 'El nombre del producto ya existe.'
        ],
        'precio' => [
            'required' => 'Debe ingresar un precio de producto',
            'numeric' => 'Solo debe contener números.',
            'greater_than' => 'Debe ingresar un valor mayor a 0.'
        ],
        'descripcion' => [
            'required' => 'Debe ingresar una descripción.'
        ],
        'tipo1' => [
            'required' => 'Debe seleccionar una clasificación.',
            'greater_than' => 'Debe seleccionar una clasificación.'
        ],
        'tipo2' => [
            'required' => 'Debe seleccionar una subclasificación.',
            'greater_than' => 'Debe seleccionar una subclasificación.'
        ],
        'stock' => [
            'required' => 'Debe ingresar un monto.',
            'numeric' => 'Solo debe contener números.',
            'greater_than' => 'Debe ingresar un valor mayor a 0.'
        ],
        'imagen' => [
            'uploaded' => 'Debe subir una imagen del producto.',
            'is_image' => 'El elemento subido debe ser una imagen.'
        ]
    ];

}
