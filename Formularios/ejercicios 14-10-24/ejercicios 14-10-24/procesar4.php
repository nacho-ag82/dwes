<?php 
$pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
if (isset($_REQUEST["nombre"])&&isset($_REQUEST["edad"])&&isset($_REQUEST["email"])){
    if(preg_match($pattern,$_REQUEST["email"])){
        echo "funka";
    }else{
        echo "correo incorrecto";
    }
}else{
    echo "faltan datos";
}
?>