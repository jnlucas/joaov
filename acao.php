<?php
session_start();
include_once "banco.php";
if(!$_SESSION["usuario"]){
    header("location:index.php");
}


try{
    $sql = "INSERT INTO usuario_produto (usuario_id, produto_id, gostei,data_cadastro) VALUES (?,?,?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_SESSION["usuario"]["id"], $_POST["produto"], $_POST["valor"],date("Y-m-d H:i:s")]);
    
}catch(Exception $e){
    print_r($e->getMessage());
}

?>