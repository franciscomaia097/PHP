<?php

include 'baseDados/bd.h';
session_start();
$mail = $_POST['mail'];
$morada = $_POST['morada'];
$telefone = $_POST['telefone'];
$nomeUtilizador = $_SESSION['nomeUtilizador'];

$sql = "UPDATE utilizadores SET mail = '$mail', morada = '$morada', telefone = '$telefone' WHERE nomeUtilizador = '$nomeUtilizador'";
if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "Record updated successfully";
  } else {
    $_SESSION['msg'] = "Error updating record: " . $conn->error;
  }
  
  header('Location: dadosPessoais.php');

$conn->close();
?>