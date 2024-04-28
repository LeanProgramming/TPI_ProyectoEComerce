<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ClasificacionModel;
use App\Models\SubclasificacionModel;

session_start();

class TiendaController extends BaseController
{
    private $productos;
    private $clasificaciones;
    private $subclasificaciones;

    public function __construct()
    {
        $this->productos = (new ProductoModel())->asArray()->where('baja', 0)->orderBy('id_producto', 'desc')->findAll();
        $this->clasificaciones = (new ClasificacionModel())->asArray()->where('baja_clasif', 0)->findAll();
        $this->subclasificaciones = (new SubclasificacionModel())->asArray()->where('baja_subclasif', 0)->findAll();
    }

    public function index()
    {

        $data = [
            'titulo' => 'Tienda',
            'rutas' => ['Principal', 'Tienda'],
            'link' => ['/', '/tienda'],
            'productos' => $this->productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        if (isset($_SESSION['usuario']) && $_SESSION['tipo'] == 1) {

            return view('templates/header', $data)
                . view('templates/navbarAdmin')
                . view('pages/tienda')
                . view('templates/footerAdmin');
        }

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/breadcrum')
            . view('pages/tienda')
            . view('templates/footer');
    }

    public function producto($id)
    {
        $producto = (new ProductoModel())->find($id);

        $data = [
            'titulo' => $producto['nombre'],
            'rutas' => ['Principal', 'Tienda', $producto['nombre']],
            'link' => ['/', '/tienda//', $producto['id_producto']],
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones,
            'producto' => $producto
        ];

        if (isset($_SESSION['usuario']) && $_SESSION['tipo'] == 1) {

            return view('templates/header', $data)
                . view('templates/navbarAdmin')
                . view('pages/producto')
                . view('templates/footerAdmin');
        }

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/breadcrum')
            . view('pages/producto')
            . view('templates/footer');
    }

    public function clasificar($clasif) {

        $productos = (new ProductoModel())->join('clasificacion', 'tipo1 = id_clasificacion')
        ->like('clasif',$clasif)
        ->findAll();

        $clasif = (new ClasificacionModel())->like('clasif', $clasif)->findAll();

        $data = [
            'titulo' => $clasif[0]['clasif'],
            'rutas' => ['Principal', 'Tienda', $clasif[0]['clasif']],
            'link' => ['/', '/tienda', '/'.$clasif[0]['clasif']],
            'productos' => $productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        return view('templates/header', $data)
        . view('templates/navbar')
        . view('templates/navbar2')
        . view('templates/breadcrum')
        . view('pages/tienda')
        . view('templates/footer');
    }

    public function subclasificar($clasif, $subclasif) {
        $productos = (new ProductoModel())->join('clasificacion', 'tipo1 = id_clasificacion')
        ->join('subclasificacion', 'tipo2 = id_subclasif')
        ->like('subclasif', $subclasif)
        ->findAll();

        $clasif = (new SubclasificacionModel())->join('clasificacion', 'clasif_id = id_clasificacion')->like('subclasif', $subclasif)->findAll();

        $data = [
            'titulo' => $clasif[0]['subclasif'],
            'rutas' => ['Principal', 'Tienda', $clasif[0]['clasif'], $clasif[0]['subclasif']],
            'link' => ['/', '/tienda', '/'.$clasif[0]['clasif'],'/'.$clasif[0]['subclasif']],
            'productos' => $productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        return view('templates/header', $data)
        . view('templates/navbar')
        . view('templates/navbar2')
        . view('templates/breadcrum')
        . view('pages/tienda')
        . view('templates/footer');
    }

    public function buscar() {
        if($this->request->is('post')) {
            $productos = (new ProductoModel())->like('nombre', $_POST['buscar'])->findAll();
        
        $data = [
            'titulo' => 'Buscar',
            'rutas' => ['Principal', 'Tienda', 'Buscar "'.$_POST['buscar'].'"'],
            'link' => ['/', 'tienda'],
            'productos' => $productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        return view('templates/header', $data)
        . view('templates/navbar')
        . view('templates/navbar2')
        . view('templates/breadcrum')
        . view('pages/tienda')
        . view('templates/footer');
        }
        
    }
}
