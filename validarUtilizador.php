<?php
$idUtilizador = $_GET['id'];
$estado = $_GET['estado'];
include "baseDados/bd.h";


if($estado == 3){
    $sql = "UPDATE utilizadores SET tipoUtilizador='2' WHERE nomeUtilizador = '$idUtilizador'";
}
else if($estado == 2){
    $sql = "UPDATE utilizadores SET tipoUtilizador='3' WHERE nomeUtilizador = '$idUtilizador'";
}

if ($conn->query($sql) === TRUE) {
    header('Location: gestaoUtilizador.php');
  } else {
    echo "Error updating record: " . $conn->error;
  }



?>