<?php 
include_once "VideoclubException.php";
class CupoSuperadoException extends VideoclubException{
    public $text;
    public function __construct() {
        $this->text =  parent::$text+"Cupo superado";
    }
}?>