<?php


include 'header.php';
include "baseDados/bd.h";

$idCabana = $_GET['id'];



//se a cabana estiver livre, muda o estado para 2 (reservado)

$sql = "SELECT * FROM cabanasinfo WHERE idCabana = '$idCabana'";



$result = $conn->query($sql);
$followingdata = $result->fetch_assoc();

//TÁ ERRADO WI
if($followingdata ["estado"] == "1"){
  $sql = "UPDATE cabanasinfo SET estado = 3 WHERE idCabana = '$idCabana'";
  $result = $conn->query($sql);
  echo "<h1>Reserva pendente, aguarde a confirmação de um funcionário!</h1>";

//enserir na tabela de reservas nome do utilizador, nome da cabana e estado da reserva
$nomeCabana = $followingdata['nome'];
$sql = "INSERT INTO reservas (nome_utilizador, nome_cabana, estado) VALUES ('".$_SESSION['nomeUtilizador']."', '$nomeCabana', 'Pré Reserva')";

 

  $result = $conn->query($sql);

} else {
  echo "<h1>Esta cabana já está reservada!</h1>";
  }


//header( "refresh:2;url=pagina_Inicial.php" );

?>
