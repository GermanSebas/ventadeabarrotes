<?php

namespace App\Controladores;

use App\Clases\Producto;

include_once "Conexion/autoload.php";

class ControladorProducto
{
    public function VerProductos()
    {
        $productos = new Producto();
        return $productos->ListarProductos();
    }

    public function addProduct(string $tipo, string $stock, string $fechavencimiento, string $nombre, string $descripcion, int $precio, string $marca)
    {
        $product = new Producto();
        $resultado = $product->addProduct($tipo, $stock, $fechavencimiento, $nombre, $descripcion, $precio, $marca);
        if ($resultado != 0) {
            return $message = "<script type='text/javascript'>alert('exito');</script>";
        } else {
            return $message = "<script type='text/javascript'>alert('Mal');</script>";
        }
    }

    public function eliminarProducto(int $id)
    {
        $product = new Producto();
        $product->EliminarProducto($id);
        $eliminado = $product->EncontrarProducto($id);
        if (empty($eliminado)) {
            return "Producto eliminado";
        } else {
            return "Error no se pudo eliminar el producto";
        }
    }

    public function modificarProducto(string $tipo, string $stock, string $fechavencimiento, string $nombre, string $descripcion, int $precio, string $marca)
    {
        $product = new Producto();
        $product->ModificarProducto($tipo, $stock, $fechavencimiento, $nombre, $descripcion, $precio, $marca);
        return "Producto cambiado";
    }

    public function buscarproducto(string $name)
    {
        $product = new Producto();
        return $product->buscarProductos($name);
    }
}