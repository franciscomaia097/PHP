<?php
$nomeUtilizador = $_GET['nomeUtilizador'];
include "baseDados/bd.h";

//delete nomeUtilizador
$sql = "DELETE FROM utilizadores WHERE nomeUtilizador = '$nomeUtilizador'";


if ($conn->query($sql) === TRUE) {
    header('Location: gestaoUtilizador.php');
  } else {
    echo "Error updating record: " . $conn->error;
  }


?>