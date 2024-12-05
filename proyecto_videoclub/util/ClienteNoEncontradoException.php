<?php 
include_once "VideoclubException.php";
class ClienteNoEncontradoException extends VideoclubException{
    public $text;

    public function __construct() {
        $this->text = parent::$text+"Cliente no encontrado";
    }
}


?>