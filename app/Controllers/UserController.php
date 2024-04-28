<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\ProvinciaModel;
use App\Models\LocalidadModel;
use App\Models\ClasificacionModel;
use App\Models\ComprobanteModel;
use App\Models\DetalleCompraModel;
use App\Models\SubclasificacionModel;

session_start();

class UserController extends BaseController
{
    private $provincias;
    private $localidades;
    private $clasificaciones;
    private $subclasificaciones;

    public function __construct()
    {
        $this->clasificaciones = (new ClasificacionModel())->asArray()->where('baja_clasif', 0)->findAll();
        $this->subclasificaciones = (new SubclasificacionModel())->asArray()->where('baja_subclasif', 0)->findAll();
        $this->provincias = (new ProvinciaModel())->asArray()->findAll();
        $this->localidades = (new LocalidadModel())->asArray()->findAll();
    }

    protected $helpers = ['form'];

    public function registrar()
    {
        $data = [
            'titulo' => 'Registro',
            'rutas' => ['Principal', 'Registro'],
            'link' => ['/', 'registrar'],
            'provincias' => $this->provincias,
            'localidades' => $this->localidades,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        if ($this->request->is('post')) {
            $data = [
                'titulo' => 'Registro',
                'rutas' => ['Principal', 'Registro'],
                'link' => ['/', 'registro'],
                'provincias' => $this->provincias,
                'localidades' => $this->localidades,
                'clasificaciones' => $this->clasificaciones,
                'subclasificaciones' => $this->subclasificaciones
            ];

            $usuario = new UsuarioModel();

            if ($usuario->validate($_POST)) {

                $usuario->save($_POST);

                return $this->registro_exitoso();
            } else {
                $data['errores'] = $usuario->errors();
                return view('templates/header', $data)
                    . view('templates/navbar')
                    . view('templates/navbar2')
                    . view('pages/usuario/registro')
                    . view('templates/footer');
            }
        }

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('pages/usuario/registro')
            . view('templates/footer');
    }

    public function registro_exitoso()
    {

        $data = [
            'titulo' => 'Registro',
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/guardado_exitoso')
            . view('templates/footer');
    }

    public function login()
    {
        $data = [
            'titulo' => 'Ingresar usuario',
            'rutas' => ['Principal', 'Ingresar Usuario'],
            'link' => ['/'],
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        if ($this->request->is('post')) {
            //creo un modelo de usuario para buscar al usuario en la base de datos
            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->where('usuario', $_POST['usuario'])->orWhere('email', $_POST['usuario'])->first();

            //se crean reglas de validación particulares
            $rules = [
                'usuario' => [
                    'rules' => 'required|is_not_unique[usuarios.usuario]',
                    'errors' => [
                        'required' => 'Debe ingresar su nombre de usuario o correo.',
                        'is_not_unique' => 'El nombre de usuario o correo ingresado no existe.'
                    ]
                ],
                'pass' => [
                    'rules' => 'required|check_pass[usuario]', //check_pass es una regla personalizada que recibe el nombre campo con el usuario que se quiere ingresar
                    'errors' => [
                        'required' => 'Debe ingresar su contraseña.',
                        'check_pass' => 'La contraseña ingresada es incorrecta.'
                    ]
                ],
            ];

            //verifica si se cumple con la verificacipon de datos
            if ($this->validate($rules)) {

                //se guardan variables de sesión
                $_SESSION['id'] = $usuario['id_usuario'];
                $_SESSION['usuario'] = $usuario['nombre'];
                $_SESSION['tipo'] = $usuario['tipo_usuario'];


                return redirect()->to(base_url('/'));
            } else {
                //si no se verifica algún campo, se obtienen los errores y se envia a la vista
                $data['errores'] = $this->validator;

                return view('templates/header', $data)
                    . view('templates/navbar')
                    . view('templates/navbar2')
                    . view('pages/usuario/ingresar')
                    . view('templates/footer');
            }
        }

        //en el caso de no ser un post muestra el formulario de login normalmente
        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('pages/usuario/ingresar')
            . view('templates/footer');
    }

    public function logout()
    {

        session_unset();
        session_destroy();

        return redirect()->to(base_url('/'));
    }

    public function perfil()
    {

        $usuario = (new UsuarioModel())->join('provincias', 'provincia_id = id_provincia')
            ->join('localidades', 'localidad_id = id_localidad')
            ->find($_SESSION['id']);

        $data = [
            'titulo' => 'Perfil',
            'rutas' => ['Principal', 'Perfil'],
            'link' => ['/'],
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones,
            'usuario' => $usuario
        ];

        if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) {
            return view('templates/header', $data)
                . view('templates/navbarAdmin')
                . view('pages/usuario/perfil')
                . view('templates/footerAdmin');
        }

        if ($_SESSION['tipo'] == 2) {
            $comprobantes = (new ComprobanteModel())->where('usuario_id', $_SESSION['id'])->findAll();
            $data['comprobantes'] = $comprobantes;
        }

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/breadcrum')
            . view('pages/usuario/perfil')
            . view('templates/footer');
    }

    public function modificar_usuario($id)
    {
        $usuario = (new UsuarioModel())->find($id);

        $data = [
            'titulo' => 'Modificar usuario',
            'rutas' => ['Principal', 'Perfil', 'Modificar usuario'],
            'link' => ['/', 'perfil'],
            'provincias' => $this->provincias,
            'localidades' => $this->localidades,
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones,
            'usuario' => $usuario
        ];

        if ($this->request->is('post')) {

            $usuario = new UsuarioModel();

            if ($usuario->validate($_POST)) {

                $usuario->update($id, $_POST);

                $_SESSION['usuario'] = $_POST['nombre'];

                return redirect()->to(base_url('/perfil'));
            } else {
                $data['errores'] = $usuario->errors();
                return view('templates/header', $data)
                    . view('templates/navbar')
                    . view('templates/navbar2')
                    . view('pages/usuario/modificar_usuario')
                    . view('templates/footer');
            }
        }

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('pages/usuario/modificar_usuario')
            . view('templates/footer');
    }

    public function ver_detalle_compra($id)
    {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 2) {
            return redirect()->to(base_url('/'));
        }

        $comprobante = (new ComprobanteModel())->join('usuarios', 'usuario_id=id_usuario')->find($id);
        $detalles = (new DetalleCompraModel())->where('comprobante_id', $id)->findAll();

        $data = [
            'titulo' => 'Detalle de compra',
            'rutas' => ['Principal', 'Perfil'],
            'link' => ['/'],
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones,
            'detalles' => $detalles,
            'comprobante' => $comprobante
        ];

        return view('templates/header', $data)
            . view('templates/navbar')
            . view('templates/navbar2')
            . view('templates/breadcrum')
            . view('pages/admin/ver_detalle')
            . view('templates/footer');
    }

    public function listar_usuarios()
    {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $usuarios = (new UsuarioModel())->join('provincias', 'provincia_id=id_provincia')
            ->join('localidades', 'localidad_id=id_localidad')
            ->where('baja', 0)->findAll();
        $bajas = (new UsuarioModel())->join('provincias', 'provincia_id=id_provincia')
            ->join('localidades', 'localidad_id=id_localidad')
            ->where('baja', 1)->findAll();

        $data = [
            'titulo' => 'Usuarios',
            'usuarios' => $usuarios,
            'bajas' => $bajas
        ];

        return view('templates/header', $data)
            . view('templates/navbarAdmin')
            . view('pages/admin/usuarios')
            . view('templates/footerAdmin');
    }

    public function baja_usuario($id)
    {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }
        $modelo = new UsuarioModel();

        $consulta = [
            'id_consulta' => $id,
            'baja' => 1
        ];

        $modelo->update($id, $consulta);

        return redirect()->to(base_url('usuarios'));
    }

    public function alta_usuario($id)
    {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }
        $modelo = new UsuarioModel();

        $consulta = [
            'id_consulta' => $id,
            'baja' => 0
        ];

        $modelo->update($id, $consulta);

        return redirect()->to(base_url('usuarios'));
    }
}
