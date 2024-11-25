<?php 
namespace App\Models;

class Usuario {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function validate($inputPassword) {
        return $this->password === $inputPassword;
    }

    public static function getUsuarios() {
        return [
            new Usuario('admin', 'admin'),
            new Usuario('usuario', 'usuario'),
        ];
    }
}