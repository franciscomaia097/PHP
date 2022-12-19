<?php


include 'header.php';
include "baseDados/bd.h";

//sql query to get all reservations from the user name WHERE nomeUtilizador = session and estado = pré reserva or estado = reservado
$sql = "SELECT * FROM reservas WHERE nome_utilizador = '".$_SESSION['nomeUtilizador']."' AND estado = 'Reservada' OR estado = 'Pré Reserva'";


$result = $conn->query($sql);


//print the table with reservations from the user
echo "<h1>Reservas</h1>";
echo "<table id='t01'>";
echo "<tr>";
echo "<th>Nome da Cabana</th>";
echo "<th>Estado</th>";
echo "<th>Cancelar Reserva</th>";
echo "</tr>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $nomeCabana = $row['nome_cabana'];
    $estado = $row['estado'];
    echo "<tr>";
    echo "<td>" . $nomeCabana . "</td>";
    echo "<td>" . $estado . "</td>";
    echo "<td> <a href='cancelarReserva.php?id=" . $nomeCabana . "'><button class='button'>Cancelar Reserva</button></a>";
    echo "</tr>";
  }
} else {
  echo "<h1> Não tem reservas </h1>";
}


