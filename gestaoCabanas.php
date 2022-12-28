<?php
include 'header.php';
include "baseDados/bd.h";

//print all table with canaba info into a table with crud options

$sql = "SELECT * FROM cabanasinfo";
$result = $conn->query($sql);

echo "<h1>Cabanas</h1>";

echo "<a href='adicionarCabana.php'><button class='button'>Adicionar Cabana</button></a>";
echo "<table id='t01'>
<tr>
<th>Nome</th>
<th>Descrição</th>
<th>Estado</th>
<th>Preço por noite</th>
<th>Editar</th>
<th>Eliminar</th>
</tr>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $nomeCabana = $row['nome'];
    $estado = $row['estado'];
    echo "<tr>";
    echo "<td>" . $nomeCabana . "</td>";
    echo "<td>" . $row['descricao'] . "</td>";
    echo "<td>" . $estado . "</td>";
    echo "<td>" . $row['preco_noite'] . "</td>";
    echo "<td> <a href='editarCabana.php?id=" . $nomeCabana . "'><button class='button'>Editar</button></a>";
    echo "<td> <a href='eliminarCabana.php?id=" . $nomeCabana . "'><button class='button'>Eliminar</button></a>";
    echo "</tr>";
  }
} else {
    echo "<h2> Não existem cabanas </h2>";
}

$conn->close();




?>