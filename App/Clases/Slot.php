<?php

namespace App\Clases;

use Conexion\ConexionBD as Conexion;
use PDO;
use PDOException;

include_once "Conexion/autoload.php";

class Slot
{
    public function agregarSlot(int $id)
    {
        try {
            $conexionBD = new Conexion();
            $conn = $conexionBD->abrirConexion();
            $sql = "INSERT INTO slots(ID,Estado) values(?, 'Disponible')";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_STR);
            $stmt->execute();
            $Result = $stmt->rowCount();
            $conexionBD->cerrarConexion();
            return $Result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function MostrarSlots(string $estado)
    {
        $conexionBD = new Conexion();
        $conn = $conexionBD->abrirConexion();
        $sql = "SELECT * FROM slots WHERE Estado = '$estado'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conexionBD->cerrarConexion();
        return $stmt;
    }

    public function CambiarEstado(string $id, string $estado)
    {
        $conexionBD = new Conexion();
        $conn = $conexionBD->abrirConexion();
        $sql = "UPDATE slots WHERE ID = $id SET Estado = '$estado'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conexionBD->cerrarConexion();
        return "Estado Cambiado";
    }

    // TODO: Terminar
    public function VerContenido(int $id) {
        $conexionBD = new Conexion();
        $conn = $conexionBD->abrirConexion();
        $sql = "SELECT * FROM slots WHERE ID=$id";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conexionBD->cerrarConexion();
        foreach ($stmt->fetchAll() as $lista):
            return $lista["Lista"];
        endforeach;
    }

    public function AgregarContenido(int $id, string $lista):void {
        $conexionBD = new Conexion();
        $conn = $conexionBD->abrirConexion();
        $sql = "UPDATE slots SET Lista = '$lista' WHERE ID = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $conexionBD->cerrarConexion();
    }
}
