<?php 
include_once "VideoclubException.php";
class SoporteYaAlquiladoException extends VideoclubException{
    public $text;
    public function __construct() {
        $this->text= parent::$text+"Soporte ya alquilado";
    }

}?>