<?php

namespace App\Controllers;

use App\Models\Clase;

class ClaseController
{
    public function index()
    {
        $clases = Clase::getClases();
        include __DIR__ . '/../views/clase_list.php';
    }

    public function showForm($claseNombre)
    {
        $clase = Clase::findClaseByName($claseNombre);
        if ($clase) {
            include __DIR__ . '/../views/clase_form.php';
        } else {
            echo "Clase no encontrada.";
        }
    }

    public function procesarFormulario($data)
    {
        $clase = Clase::findClaseByName($data['clase']);
        $dia = $data['dia'];
        $action = $data['action'];

        if (!$clase) {
            echo "Clase no válida.";
            return;
        }

        $resultado = false;

        if ($action === 'reservar') {
            $resultado = $clase->reservarPlaza($dia);
        } elseif ($action === 'liberar') {
            $resultado = $clase->liberarPlaza($dia);
        }

        if ($resultado) {
            echo "Acción realizada correctamente.";
        } else {
            echo "No se pudo realizar la acción.";
        }
    }
}
