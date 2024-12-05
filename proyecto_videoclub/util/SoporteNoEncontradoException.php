<?php 
include_once "VideoclubException.php";
class SoporteNoEncontradoException extends VideoclubException{
    public $text;
    public function __construct() {
        $this->text= parent::$text+"Soporte no encontrado";
    }
}?>