<?php

class UsuarioController
{
    private $usuarios = [
        'admin' => 'admin',
        'usuario' => 'usuario',
    ];

    public function login($data)
    {
        $usuario = $data['usuario'];
        $contrasena = $data['contrasena'];

        if (isset($this->usuarios['usuario']) && $this->usuarios['usuario'] === $contrasena) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header('Location: ../main.php');
            exit();
        } else {
            header('Location: ../index.php');
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
