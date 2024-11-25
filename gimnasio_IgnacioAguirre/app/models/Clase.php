<?php

namespace App\Models;

class Clase
{
    private $nombre;
    private $horarios;

    public function __construct($nombre, $horarios)
    {
        $this->nombre = $nombre;
        $this->horarios = $horarios;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getHorarios()
    {
        return $this->horarios;
    }

    public function reservarPlaza($dia)
    {
        if (isset($this->horarios[$dia])) {
            $horario = &$this->horarios[$dia];
            if ($horario['plazas_disponibles'] > 0) {
                $horario['plazas_disponibles']--;
                $horario['plazas_reservadas']++;
                return true;
            }
        }
        return false;
    }

    public function liberarPlaza($dia)
    {
        if (isset($this->horarios[$dia])) {
            $horario = &$this->horarios[$dia];
            if ($horario['plazas_reservadas'] > 0) {
                $horario['plazas_disponibles']++;
                $horario['plazas_reservadas']--;
                return true;
            }
        }
        return false;
    }

    public static function getClases()
    {
        // Cargar configuración de clases desde un archivo
        $config = include __DIR__ . '/../../config/clases.php';
        $clases = [];

        foreach ($config as $nombreClase => $horarios) {
            $clases[] = new self($nombreClase, $horarios);
        }

        return $clases;
    }

    public static function findClaseByName($nombre)
    {
        $clases = self::getClases();
        foreach ($clases as $clase) {
            if ($clase->getNombre() === $nombre) {
                return $clase;
            }
        }
        return null; // Devuelve null si no se encuentra la clase
    }
}
