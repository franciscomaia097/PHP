<?php
include 'header.php';

?>
<body>

<?php

include "baseDados/bd.h";
$sql = "SELECT * FROM cabanasinfo, estado where cabanasinfo.estado = estado.idEstado";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<h1>Lista de Cabanas</h1>";
  echo "<table id='t01'>
  
<tr>

</tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
echo "<td> <img src='imagens/".$row['img_cabana']."'> </td>";
echo "<td>" . $row['nome'] . "</td>";
echo "<td>" . $row['tipo'] . "</td>";
echo "<td>" . $row['descricao'] . "</td>";
echo "<td>" . "Preço por noite:". " " . $row['preco_noite'] . "</td>";
echo "<td>" . "Estado:" . " ". $row['nomeEstado'] . "</td>";
echo "</tr>";
  }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();

?>
</body>
</html>

