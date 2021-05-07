<?php

namespace App\Controladores;

use App\Clases\Slot;

include_once "Conexion/autoload.php";

class ControladorSlot
{
    public function mostrarSlotslibres()
    {
        $slots = new Slot();
        $result = $slots->MostrarSlots("Libre");
        return $result;
    }

    public function cambiarSlot(string $id, string $estado)
    {
        $slot = new Slot();
        $message = $slot->CambiarEstado($id, $estado);
        return $message;
    }

    public function AgregarLista(int $id, string $articulo):void {
        $slot = new Slot();
        $lista = $slot->VerContenido($id);

        if ($slot->VerContenido($id) != "") {
            $slot->AgregarContenido($id, $lista . "\n-" . $articulo);
        } else {
            $slot->AgregarContenido($id, "-" .$articulo);
        }
    }
}