<?php

namespace App\Clases;

use Conexion\ConexionBD as Conexion;
use PDO;
use PDOException;

include_once "Conexion/autoload.php";

class Producto
{
    public function agregarProducto(string $tipo, int $stock, string $fechavencimiento, string $nombre, string $descripcion, string $precio, string $marca)
    {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO Productos(tipo, stock, fechavencimiento, nombre, descripcion, precio, marca) values(?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(1, $tipo, PDO::PARAM_STR);
            $stmt->bindParam(2, $stock, PDO::PARAM_INT);
            $stmt->bindParam(3, $fechavencimiento, PDO::PARAM_STR);
            $stmt->bindParam(4, $nombre, PDO::PARAM_STR);
            $stmt->bindParam(5, $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(6, $precio, PDO::PARAM_STR);
            $stmt->bindParam(7, $marca, PDO::PARAM_STR);

            $stmt->execute();
            $resultado = $stmt->rowCount();
            $conexionDB->cerrarConexion();

            return $resultado;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function ListarProductos()
    {
        try {
            $conectar = new Conexion();
            $solicitud = $conectar->abrirConexion();
            $sql = "SELECT * FROM productos";

            $result = $solicitud->prepare($sql);
            $result->execute();

            $resultado = $result->fetchAll();
            return $resultado;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function buscarProductos(string $nombre)
    {
        try {
            $conectar = new Conexion();
            $solicitud = $conectar->abrirConexion();
            $sql = "SELECT * FROM productos where nombre='$nombre'";

            $result = $solicitud->prepare($sql);
            $result->execute();

            $resultado = $result->fetchAll();
            return $resultado;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
