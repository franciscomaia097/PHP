<?php

include 'header.php';
include "baseDados/bd.h";

//print all table with all reservations

$sql = "SELECT * FROM reservas WHERE estado = 'Pré Reserva'";
$result = $conn->query($sql);

echo "<h1>Reservas</h1>";
echo "<table id='t01'>";
echo "<tr>";
echo "<th>Nome do Utilizador</th>";
echo "<th>Nome da Cabana</th>";
echo "<th>Estado</th>";
echo "<th>Cancelar Reserva</th>";
echo "<th>Aprovar Reserva</th>";
echo "</tr>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $nomeCabana = $row['nome_cabana'];
    $estado = $row['estado'];
    echo "<tr>";
    echo "<td>" . $row['nome_utilizador'] . "</td>";
    echo "<td>" . $nomeCabana . "</td>";
    echo "<td>" . $estado . "</td>";
    echo "<td> <a href='cancelarReserva.php?id=" . $nomeCabana . "'><button class='button'>Cancelar Reserva</button></a>";
    echo "<td> <a href='aprovarReserva.php?id=" . $nomeCabana . "'><button class='button'>Aprovar Reserva</button></a>";
    echo "</tr>";
  }
} else {
    echo "<h2> Não existem reservas pendentes </h2>";
}

