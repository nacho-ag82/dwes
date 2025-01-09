<?php 
if (isset($_POST['nombre'])&&isset($_POST['usuario'])&&isset($_POST['password'])&&isset($_POST['email'])){
    (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === FALSE) ? False : True;
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


}else{
    header("Location: registro.php");
}
?>