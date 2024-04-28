<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\ClasificacionModel;
use App\Models\SubclasificacionModel;

session_start();

class ProductoController extends BaseController
{
    protected $helpers = ['form'];
    private $clasificaciones;
    private $subclasificaciones;

    public function __construct()
    {
        $this->clasificaciones = (new ClasificacionModel())->asArray()->where('baja_clasif', 0)->findAll();
        $this->subclasificaciones = (new SubclasificacionModel())->asArray()->where('baja_subclasif', 0)->findAll();
    }

    public function agregar()
    {

        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'titulo' => 'Agregar Producto',
            'link' => ['/'],
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];


        if ($this->request->is('post')) {
            //se crea un modelo de producto
            $producto = new ProductoModel();
            //se obtiene la imagen del post
            $imagen = $this->request->getFile('imagen');
            //se inserta la información del archivo en la variable del post
            $_POST['imagen'] = $imagen;

            //se valida si los datos ingresados en el post son correctos
            if (!$producto->validate($_POST)) {
                $data['errores'] = $producto->errors();
                return view('templates/header', $data)
                    . view('templates/navbarAdmin')
                    . view('pages/producto/agregarProducto')
                    . view('templates/footerAdmin');
            }

            //se se cambia el nombre de la imagen y se guarda en la carpeta de imagenes de productos
            //Se guarda el nombre de la imagen en la variable del post
            if ($imagen->isValid() && !$imagen->hasMoved()) {
                $imagen->move('assets/img/productos', str_replace(' ', '_', $_POST['nombre']).'.'.$imagen->getExtension());
                $_POST['imagen'] = $imagen->getName();
            }

            //se modifica la regla de validación de la imagen para que no entre en conflicto por ya no ser una imagen
            $producto->setValidationRule('imagen', 'required');
            
            //se guarda el producto en la base de datos
            $producto->save($_POST);
            
            return view('templates/header', $data)
                . view('templates/navbar')
                . view('templates/navbar2')
                . view('templates/guardado_exitoso')
                . view('templates/footer');
        }

        return view('templates/header', $data)
            . view('templates/navbarAdmin')
            . view('pages/producto/agregarProducto')
            . view('templates/footerAdmin');
    }

    public function modificar($id)
    {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'titulo' => 'Modificar Producto',
            'rutas' => ['Principal', 'Modificar Producto'],
            'link' => ['/', 'modificar_producto'],
            'clasificaciones' => $this->clasificaciones,
            'subclasificaciones' => $this->subclasificaciones
        ];

        $productos = new ProductoModel();
        $prod = $productos->find($id);
        $data['producto'] = $prod;
        
        $rules = [
            'codigo_producto' => 'required',
            'nombre' => 'required',
            'precio' => 'required|numeric|greater_than[0]',
            'descripcion' => 'required|max_length[250]',
            'tipo1' => 'required',
            'tipo2' => 'required',
            'stock' => 'required|numeric|greater_than[0]',
            'imagen' => 'required'
        ];
        $productos->setValidationRules($rules);

        if ($this->request->is('post')) {

            $imagen = $this->request->getFile('imagen');
            
            if ($imagen->isValid() && !$imagen->hasMoved()) {
                $imagen->move('assets/img/productos', str_replace(' ', '_', $_POST['nombre']).'.'.$imagen->getExtension());
                $_POST['imagen'] = $imagen->getName();
            }

            if ($productos->update($id,$_POST) == false) {
                $data['errores'] = $productos->errors();
                return view('templates/header', $data)
                    . view('templates/navbarAdmin')
                    . view('pages/producto/modificarProducto')
                    . view('templates/footerAdmin');
            }

            return view('templates/header', $data)
                . view('templates/navbar')
                . view('templates/navbar2')
                . view('templates/guardado_exitoso')
                . view('templates/footer');
        }

        return view('templates/header', $data)
            . view('templates/navbarAdmin')
            . view('pages/producto/modificarProducto')
            . view('templates/footerAdmin');
    }

    public function dar_baja($id)
    {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $productos = new ProductoModel();
        $productos->update($id,['baja' => true]);
        
        return redirect()->to(base_url('/'));
    }

    public function dar_alta($id)
    {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
            return redirect()->to(base_url('/'));
        }

        $productos = new ProductoModel();

        $productos->update($id,['baja' => false]);

        return redirect()->to(base_url('/'));
    }
}
