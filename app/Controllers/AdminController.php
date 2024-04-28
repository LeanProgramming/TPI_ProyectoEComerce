<?php

namespace App\Controllers;


use App\Models\ComprobanteModel;
use App\Models\ContactoModel;
use App\Models\ConsultaModel;
use App\Models\ClasificacionModel;
use App\Models\DetalleCompraModel;
use App\Models\SubclasificacionModel;

session_start();

class AdminController extends BaseController
{   
    protected $helpers = ['form'];

    //Consultas
    public function consultas() {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }
        
        $consultas = (new ConsultaModel())->join('usuarios','usuario_id=id_usuario')
        ->where('leido', 0)->findAll();
        $leidos = (new ConsultaModel())->join('usuarios','usuario_id=id_usuario')
        ->where('leido', 1)->findAll();

        $data = [
            'titulo' => 'Consulta',
            'consultas' => $consultas,
            'leidos' => $leidos
        ];

        return view('templates/header', $data)
                . view('templates/navbarAdmin')
                . view('pages/admin/consultas')
                . view('templates/footerAdmin');
    }

    public function leer_consulta($id) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }
        $modelo = new ConsultaModel();

        $consulta = [
            'id_consulta' => $id,
            'leido' => 1
        ];

        $modelo->update($id, $consulta);

        return redirect()->to(base_url('consultas'));
    }

    //Contactos
    public function contactos() {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }
        
        $contactos = (new ContactoModel())->where('leido', 0)->findAll();
        $leidos = (new ContactoModel())->where('leido', 1)->findAll();

        $data = [
            'titulo' => 'Consulta',
            'contactos' => $contactos,
            'leidos' => $leidos
        ];

        return view('templates/header', $data)
                . view('templates/navbarAdmin')
                . view('pages/admin/contactos')
                . view('templates/footerAdmin');
    }

    public function leer_mensaje($id) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }
        $modelo = new ContactoModel();
        
        $modelo->update($id, ['leido' => 1]);

        return redirect()->to(base_url('contactos'));
    }

    //Clasificaciones
    public function clasificaciones() {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }
        
        $clasificaciones = (new ClasificacionModel())->where('baja_clasif', 0)->findAll();
        $bajas = (new ClasificacionModel())->where('baja_clasif', 1)->findAll();

        $data = [
            'titulo' => 'Clasificaciones',
            'clasificaciones' => $clasificaciones,
            'bajas' => $bajas,
            'esAgregar' => false
        ];

        if($this->request->is('post')) {
            $modelo = new ClasificacionModel();
            $dato = [
                'clasif' => $_POST['clasif']
            ];

            if(!$modelo->validate($_POST)){
                $data['errores'] = $modelo->errors();
                $data['esAgregar'] = true;

                return view('templates/header', $data)
                    . view('templates/navbarAdmin')
                    . view('pages/admin/clasificaciones')
                    . view('templates/footerAdmin');
            }
            
            $modelo->insert($dato);

            return redirect()->to(base_url('/clasificaciones'));
        }

        return view('templates/header', $data)
                . view('templates/navbarAdmin')
                . view('pages/admin/clasificaciones')
                . view('templates/footerAdmin');
    }
    

    public function modificar_clasif($id) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $clasif = (new ClasificacionModel())->find($id);

        $data=[
            'titulo' => 'Modificar clasificación',
            'clasif' => $clasif
        ];

        if($this->request->is('post')) {
            $modelo = new ClasificacionModel();

            if(!$modelo->validate($_POST)){
                $data['errores'] = $modelo->errors();

                return view('templates/header', $data)
                    . view('templates/navbarAdmin')
                    . view('pages/producto/modificarClasificacion')
                    . view('templates/footerAdmin');
            }

            $dato = ['clasif' => $_POST['clasif']];            
            $modelo->update($id, $dato);

            return redirect()->to(base_url('/clasificaciones'));
        }

        return view('templates/header', $data)
            . view('templates/navbarAdmin')
            . view('pages/producto/modificarClasificacion')
            . view('templates/footerAdmin');
    }

    public function alta_clasif($id) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }
        
        $modelo = new ClasificacionModel();

        $modelo->update($id, ['baja_clasif'=>0]);

        return redirect()->to(base_url('/clasificaciones'));
    }

    public function baja_clasif($id) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $modelo = new ClasificacionModel();

        $modelo->update($id, ['baja_clasif'=>1]);

        return redirect()->to(base_url('/clasificaciones'));
    }

    public function subclasificaciones() {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }
        
        $subclasificaciones = (new SubclasificacionModel())
        ->join('clasificacion', 'clasif_id = id_clasificacion')
        ->where('baja_subclasif', 0)->findAll();
        $bajas = (new SubclasificacionModel())->join('clasificacion', 'clasif_id = id_clasificacion')->where('baja_subclasif', 1)->findAll();
        $clasificaciones = (new ClasificacionModel())->findAll();

        $data = [
            'titulo' => 'Subclasificaciones',
            'clasificaciones' => $clasificaciones,
            'subclasificaciones' => $subclasificaciones,
            'bajas' => $bajas,
            'esAgregar' => false
        ];

        if($this->request->is('post')) {

            $modelo = new SubclasificacionModel();
            $dato = [
                'clasif_id' => $_POST['clasif_id'],
                'subclasif' => $_POST['subclasif']
            ];

            if(!$modelo->validate($_POST)){
                $data['errores'] = $modelo->errors();
                $data['esAgregar'] = true;

                return view('templates/header', $data)
                    . view('templates/navbarAdmin')
                    . view('pages/admin/subclasificaciones')
                    . view('templates/footerAdmin');
            }
            
            $modelo->insert($dato);

            return redirect()->to(base_url('/subclasificaciones'));
        }

        return view('templates/header', $data)
                . view('templates/navbarAdmin')
                . view('pages/admin/subclasificaciones')
                . view('templates/footerAdmin');
    }

    public function modificar_subclasif($id) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $subclasif = (new SubclasificacionModel())->join('clasificacion', 'clasif_id=id_clasificacion')->find($id);
        $clasificaciones = (new ClasificacionModel())->findAll();

        $data=[
            'titulo' => 'Modificar Subclasificacion',
            'subclasif' => $subclasif,
            'clasificaciones' => $clasificaciones
        ];

        if($this->request->is('post')) {
            $modelo = new SubClasificacionModel();

            if(!$modelo->validate($_POST)){
                $data['errores'] = $modelo->errors();

                return view('templates/header', $data)
                    . view('templates/navbarAdmin')
                    . view('pages/producto/modificarSubclasificacion')
                    . view('templates/footerAdmin');
            }

            $dato = [
                'clasif_id' => $_POST['clasif_id'],
                'subclasif' => $_POST['subclasif']
            ];            
            $modelo->update($id, $dato);

            return redirect()->to(base_url('/subclasificaciones'));
        }

        return view('templates/header', $data)
            . view('templates/navbarAdmin')
            . view('pages/producto/modificarSubclasificacion')
            . view('templates/footerAdmin');
    }

    public function alta_subclasif($id) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $modelo = new SubclasificacionModel();

        $modelo->update($id, ['baja_subclasif'=>0]);

        return redirect()->to(base_url('/subclasificaciones'));
    }

    public function baja_subclasif($id) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $modelo = new SubclasificacionModel();

        $modelo->update($id, ['baja_subclasif'=>1]);

        return redirect()->to(base_url('/subclasificaciones'));
    }

    public function ventas() {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $comprobantes = (new ComprobanteModel())->join('usuarios', 'usuario_id=id_usuario')->findAll();

        $data = [
            'titulo' => 'Ventas',
            'comprobantes' => $comprobantes
        ];

        return view('templates/header', $data)
            . view('templates/navbarAdmin')
            . view('pages/admin/ventas')
            . view('templates/footerAdmin');
    }

    public function ver_detalle($id) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $comprobante = (new ComprobanteModel())->join('usuarios', 'usuario_id=id_usuario')->find($id);
        $detalles = (new DetalleCompraModel())->where('comprobante_id', $id)->findAll();

        $data = [
            'titulo' => 'Detalle de compra',
            'detalles' => $detalles,
            'comprobante' => $comprobante
        ];

        return view('templates/header', $data)
            . view('templates/navbarAdmin')
            . view('pages/admin/ver_detalle')
            . view('templates/footerAdmin');
    }

}

?>
 