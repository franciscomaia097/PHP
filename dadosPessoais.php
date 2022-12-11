<?php
include 'header.php';

?>
<body>

<?php

include "baseDados/bd.h";

$nomeUtilizador = $_SESSION['nomeUtilizador'];

$sql = "SELECT * FROM utilizadores WHERE nomeUtilizador = '$nomeUtilizador'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<h1>Dados pessoais</h1>";
  echo "<table id='t01'>";

  echo "<form action='update.php' method='post'>
<tr>
<th>Email</th>
<th>Morada</th>
<th>Telefone</th>
<th></th>
</tr>";


  while($row = $result->fetch_assoc()) {
    echo "<tr>";


echo "<td><input type='text' name='mail' value='" . $row['mail'] . "'></td>";
echo "<td><input type='text' name='morada' value='" . $row['morada'] . "'></td>";
echo "<td><input type='text' name='telefone' value='" . $row['telefone'] . "'></td>";




echo "<td><button type='submit'>Editar</button></td>";





echo "</tr>";

  }
  echo "</form>";
} else {
  echo "0 results";
}
echo "</table>";
if(isset ($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
$conn->close();

?>
</body>
</html>

