<?php

include 'header.php';
include "baseDados/bd.h";

//select all quotas table where nomeUtilizador = nomeUtilizador

$sql = "SELECT * FROM quotas WHERE username = '".$_SESSION['nomeUtilizador']."'";
$result = $conn->query($sql);

echo "<h1>Quotas</h1>";
echo "<table id='t01'>";
echo "<tr>";
echo "<th>Data de Pagamento</th>";
echo "<th>Valor</th>";
echo "<th>Estado</th>";


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $valor = $row['amount'];
    $dataPagamento = $row['payment_date'];
    echo "<tr>";
    echo "<td>" . $dataPagamento . "</td>";
    echo "<td>" . $valor . "€". "</td>";
    if($row['paid'] == 1){
      echo "<td> Pago </td>";
    }else{
        echo "<td> Não Pago </td>";
        }
    echo "</tr>";
  }
} else {
  echo "<h1> Não tem quotas </h1>";
}

?>

