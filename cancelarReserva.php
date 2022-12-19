<?php

include 'header.php';
include "baseDados/bd.h";

$idCabana = $_GET['id'];

$sql = "SELECT * FROM reserva WHERE nome_cabana = '$idCabana'";


//update reservas and cabanasinfo tables



$sql = "UPDATE reservas SET estado = 'Cancelada' WHERE nome_cabana = '$idCabana'";
$result = $conn->query($sql);

$sql = "UPDATE cabanasinfo SET estado = 1 WHERE nome = '$idCabana'";
$result = $conn->query($sql);

if($conn->query($sql)){
    echo "<h1>Reserva cancelada com sucesso!</h1>";
} else {
    echo "<h1>Erro ao cancelar a reserva!</h1>";
}


?>

