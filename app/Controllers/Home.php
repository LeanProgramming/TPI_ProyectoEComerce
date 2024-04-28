<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ClasificacionModel;
use App\Models\ContactoModel;
use App\Models\ConsultaModel;
use App\Models\SubclasificacionModel;

session_start();

class Home extends BaseController
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
            'titulo' => 'Server101',
            'rutas' => ['Principal'],
            'link' => ['principal'],
            'productos' => $this->productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones,
            'productos' => $this->productos
        ];


        if (isset($_SESSION['usuario'])) {
            if ($_SESSION['tipo'] == 1) {

                $productos = (new ProductoModel())->join('clasificacion', 'tipo1=id_clasificacion')
                ->join('subclasificacion', 'tipo2=id_subclasif')
                ->where('baja', 0)->findAll();
                $bajas = (new ProductoModel())->join('clasificacion', 'tipo1=id_clasificacion')
                ->join('subclasificacion', 'tipo2=id_subclasif')
                ->where('baja', 1)->findAll();

                $data['productos'] = $productos;
                $data['bajas'] = $bajas;

                return view('templates/header', $data)
                    . view('templates/navbarAdmin')
                    . view('pages/admin/indexAdmin')
                    . view('templates/footerAdmin');
            }
        }

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/navbar3')
            . view('pages/principal')
            . view('templates/footer');
    }

    public function quienes_somos()
    {

        $data = [
            'titulo' => 'Quiénes somos',
            'rutas' => ['Principal', '¿Quienes somos?'],
            'link' => ['/', '/quienes-somos'],
            'productos' => $this->productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/navbar3')
            . view('templates/breadcrum')
            . view('pages/quienes_somos')
            . view('templates/footer');
    }

    public function terminos_y_usos()
    {

        $data = [
            'titulo' => 'Términos y usos',
            'rutas' => ['Principal', 'Términos y usos'],
            'link' => ['/', '/terminos-y-usos'],
            'productos' => $this->productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/navbar3')
            . view('templates/breadcrum')
            . view('pages/terminos_y_usos')
            . view('templates/footer');
    }

    public function contacto()
    {

        $data = [
            'titulo' => 'Contacto',
            'rutas' => ['Principal', 'Contacto'],
            'link' => ['/', '/contacto'],
            'productos' => $this->productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        if($this->request->is('post')){
            $contacto = (new ContactoModel());

            if ($contacto->validate($_POST) == false) {
                $data['errores'] = $contacto->errors();
                return view('templates/header', $data)
                    . view('templates/navbar')
                    . view('templates/navbar2')
                    . view('templates/navbar3')
                    . view('templates/breadcrum')
                    . view('pages/contacto')
                    . view('templates/footer');
            }

            $contacto->save($_POST);

            return view('templates/header', $data)
                    . view('templates/navbar')
                    . view('templates/navbar2')
                    . view('templates/navbar3')
                    . view('templates/breadcrum')
                    . view('templates/guardado_exitoso')
                    . view('templates/footer');
        }

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/navbar3')
            . view('templates/breadcrum')
            . view('pages/contacto')
            . view('templates/footer');
    }

    public function consulta()
    {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 2) {
            return redirect()->to(base_url('/'));
        }
        
        $consultas = (new ConsultaModel())->where('usuario_id', $_SESSION['id'])->findAll();

        $data = [
            'titulo' => 'Consulta',
            'rutas' => ['Principal', 'Consulta'],
            'link' => ['/', '/consulta'],
            'productos' => $this->productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones,
            'consultas' => $consultas
        ];

        if($this->request->is('post')){
            $consulta = (new ConsultaModel());

            $_POST['usuario_id'] = $_SESSION['id'];

            if ($consulta->save($_POST) == false) {
                $data['errores'] = $consulta->errors();
                return view('templates/header', $data)
                    . view('templates/navbar')
                    . view('templates/navbar2')
                    . view('templates/navbar3')
                    . view('templates/breadcrum')
                    . view('pages/consulta')
                    . view('templates/footer');
            }

            return view('templates/header', $data)
                    . view('templates/navbar')
                    . view('templates/navbar2')
                    . view('templates/navbar3')
                    . view('templates/breadcrum')
                    . view('templates/guardado_exitoso')
                    . view('templates/footer');
        }

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/navbar3')
            . view('templates/breadcrum')
            . view('pages/consulta')
            . view('templates/footer');
    }

    public function comercializacion()
    {

        $data = [
            'titulo' => 'Comercialización',
            'rutas' => ['Principal', 'Comercialización'],
            'link' => ['/', '/comercializacion'],
            'productos' => $this->productos,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/navbar3')
            . view('templates/breadcrum')
            . view('pages/comercializacion')
            . view('templates/footer');
    }

    public function en_construccion()
    {
        $data = [
            'titulo' => 'En construcción',
        ];

        return view('templates/header', $data)
            . view('pages/en_construccion');
    }
}
