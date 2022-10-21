<?php
include "config.php";

if(isset($_GET['id'])){
    $id =$_GET['id'];
    $sql = "DELETE FROM `cliente`.`usuarios` WHERE ´id`= '$id' ";

    $result = $conn -> query($sql);
    if ($result ==TRUE){
        echo "Registro deletado com sucesso";
    }else {
        echo "ERRO:" .$sql. "<br>" . $conn->error;
    }
}





?>