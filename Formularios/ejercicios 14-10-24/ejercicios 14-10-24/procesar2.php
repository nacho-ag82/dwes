<?php 
if(isset($_REQUEST["checkbox"])&&isset($_REQUEST["radio"])){
print_r($_REQUEST);
print_r($_GET);
print_r($_POST);
}else{
    echo "la que has liao pollito";
}
?>