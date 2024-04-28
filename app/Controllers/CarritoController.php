<?php

namespace App\Controllers;

use App\Models\ComprobanteModel;
use App\Models\DetalleCompraModel;
use App\Models\ProductoModel;
use App\Models\ClasificacionModel;
use App\Models\SubclasificacionModel;

session_start();

class CarritoController extends BaseController
{
    public function agregar_carrito($origen, $id)
    {
        //Si el cliente no ingreso a su cuenta redirecciona al inicio
        if (!isset($_SESSION['tipo']) && $_SESSION['tipo'] != 2) {
            return redirect()->to(base_url('/'));
        }

        $clasif = (new ClasificacionModel())->findAll();
        $subclasif= (new SubclasificacionModel())->join('clasificacion','clasif_id=id_clasificacion')->findAll();

        foreach ($clasif as $c) {
            if($origen == $c['clasif']) {
                $origen = 'tienda/'.$origen;
            }
        }

        foreach ($subclasif as $sc) {
            if($origen == $sc['subclasif']) {
                $origen = 'tienda/'.$sc['clasif'].'/'.$origen;
            }
        }

        if($origen== 'principal') {
            $origen = '/';
        } 


        //Se crea una variable del modelo de producto y 
        //se busca el producto seleccionado para agregar al carrito por medio de su id
        $producto = (new ProductoModel())->find($id);

        //comprueba si existe la variable de sesión del carrito, en caso que no, la crea
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        //se obtiene el tamaño del carrito
        $size = sizeof($_SESSION['carrito']);

        //si el id ya existe el producto se suma 1 a la cantidad
        for ($i = 0; $i < $size; $i++) {

            if (isset($_SESSION['carrito'][$i]) && $_SESSION['carrito'][$i]['id'] == $id) {
                //agrega un error de falta de stock si lo supera
                if($_SESSION['carrito'][$i]['cantidad'] >= $producto['stock'] ) {
                    $_SESSION['carrito'][$i]['error'] = 'Stock insuficiente';
                    $_SESSION['faltaStock'] = true;
                }
                
                $_SESSION['carrito'][$i]['cantidad']++;
                return redirect()->to(base_url($origen));
            }
        }

        //si no existe se agrega el producto a la variable de sesión del carrito

        $_SESSION['carrito'][$size] = [
            'id' => $producto['id_producto'],
            'nombre' => $producto['nombre'],
            'cantidad' => 1,
            'precio' => $producto['precio']
        ];

        
        return redirect()->to(base_url($origen));
    }

    public function quitar_carrito($origen, $id)
    {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 2) {
            return redirect()->to(base_url('/'));
        }

        $clasif = (new ClasificacionModel())->findAll();
        $subclasif= (new SubclasificacionModel())->join('clasificacion','clasif_id=id_clasificacion')->findAll();

        foreach ($clasif as $c) {
            if($origen == $c['clasif']) {
                $origen = 'tienda/'.$origen;
            }
        }

        foreach ($subclasif as $sc) {
            if($origen == $sc['subclasif']) {
                $origen = 'tienda/'.$sc['clasif'].'/'.$origen;
            }
        }

        if($origen== 'principal') {
            $origen = '/';
        }

        $producto = (new ProductoModel())->find($id);
       
        //recorre todo el carrito
        foreach ($_SESSION['carrito'] as $prod) {  
            //busca el producto que se quiere eliminar del carrito
            if ($prod['id'] == $id) {
                
                //guarda el índice del produto
                $prod_key = array_search($prod, $_SESSION['carrito']);

                //si la cantidad del producto es mayor que uno, se elimina solo un producto de ese tipo
                if ($prod['cantidad'] > 1) {
                    $_SESSION['carrito'][$prod_key]['cantidad']--;;
                    if($_SESSION['carrito'][$prod_key]['cantidad'] <= $producto['stock']) {
                        unset($_SESSION['carrito'][$prod_key]['error']);
                        unset($_SESSION['faltaStock']);
                    }
                    return redirect()->to(base_url($origen));
                }
                
                //si solo quedaba un solo elemento, se elimina el producto del carrito por su id
                unset($_SESSION['carrito'][$prod_key]);

                //si el carrito queda vacío, se elimna la sesión del carrito
                if(empty($_SESSION['carrito'])) {
                    unset($_SESSION['carrito']);
                    return redirect()->to(base_url($origen));
                }

                return redirect()->to(base_url($origen));                 
            }
        }
    }

    public function vaciar_carrito($origen) {
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 2) {
            return redirect()->to(base_url('/'));
        }

        $clasif = (new ClasificacionModel())->findAll();
        $subclasif= (new SubclasificacionModel())->join('clasificacion','clasif_id=id_clasificacion')->findAll();

        foreach ($clasif as $c) {
            if($origen == $c['clasif']) {
                $origen = 'tienda/'.$origen;
            }
        }

        foreach ($subclasif as $sc) {
            if($origen == $sc['subclasif']) {
                $origen = 'tienda/'.$sc['clasif'].'/'.$origen;
            }
        }

        if($origen== 'principal') {
            $origen = '/';
        }

        //verifica si existe la sesión del carrito
        if(isset($_SESSION['carrito'])) {
            //elimina la sesión del carrito
            unset($_SESSION['carrito']);
        }

        return redirect()->to(base_url($origen));
    }

    public function comprar() {
        
        if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 2) {
            return redirect()->to(base_url('/'));
        }

        if(empty($_SESSION['carrito'])) {
            return redirect()->to(base_url('/'));
        }

        $comprobante = new ComprobanteModel();

        $cant_prods = 0;
        foreach($_SESSION['carrito'] as $prod) {
            $cant_prods += $prod['cantidad'];
        }

        $dato = [
            'usuario_id' => $_SESSION['id'],
            'cant_prods' => $cant_prods,
            'monto_total' => $_SESSION['monto_total']
        ];

        $comprobante->insert($dato);

        $comprobante_id = $comprobante->getInsertID();

        foreach ($_SESSION['carrito'] as $prod) {
            $detalle = new DetalleCompraModel();

            $dato = [
                'nombre_producto' => $prod['nombre'],
                'cantidad' => $prod['cantidad'],
                'precio_unitario' => $prod['precio'],
                'precio_total' => ($prod['precio'] * $prod['cantidad']),
                'comprobante_id' => $comprobante_id
            ];

            $detalle->insert($dato);

            $modelo = new ProductoModel();
            $producto = (new ProductoModel())->find($prod['id']);
            $stock = ($producto['stock'] - $prod['cantidad']);
            $modelo->update($prod['id'], ['stock' => $stock]);

        }

        unset($_SESSION['carrito']);
        
        $data = [
            'titulo' => 'Compra exitosa',
            'link' => ['/'],
            'clasificaciones' => (new ClasificacionModel())->asArray()->where('baja_clasif', 0)->findAll(),
            'subclasificaciones' => (new SubclasificacionModel())->asArray()->where('baja_subclasif', 0)->findAll()
        ];

        return view('templates/header', $data)
        . view('templates/navbar')
        . view('templates/navbar2')
        . view('templates/guardado_exitoso')
        . view('templates/footer');
    }
}
