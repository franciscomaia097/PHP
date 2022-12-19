<?php
include 'header.php';
include "baseDados/bd.h";

$idCabana = $_GET['id'];
$sql = "SELECT * FROM cabanasinfo, estado where cabanasinfo.estado = estado.idEstado and idCabana = '$idCabana'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $nome = $row['nome'];
    $tipo = $row['tipo'];
    $descricao = $row['descricao'];
    $preco = $row['preco_noite'];
    $estado = $row['nomeEstado'];
    $img = $row['img_cabana'];
  }
} else {
  echo "0 results";
}

$precoSocio = intval($preco);
$precoSocio = $precoSocio - 20;

//display all caban info into a table

echo "<h1>Informação da Cabana</h1>";
echo "<table id='t01'>";
echo "<tr>";
echo "<td> <img src='imagens/".$img."'> </td>";
echo "<td>" . $nome . "</td>";
echo "<td>" . $tipo . "</td>";
echo "<td>" . $descricao . "</td>";
echo "<td>" . "Preço por noite:". " " . $preco . "</td>";
echo "<td>" . "Preço por noite para sócios:". " " . $precoSocio . "€". "</td>";
echo "<td>" . "Estado:" . " ". $estado . "</td>";


//echo a button to book a cabana only if you are logged in as client or socio and if the cabana is available



if(($_SESSION['tipoUtilizador'] == '4'|| $_SESSION['tipoUtilizador'] == '2') && $estado == 'Livre'){
  echo "<td> <a href='reservaCabana.php?id=" . $idCabana . "'><button class='button'>Reservar Cabana</button></a>";
}

echo "</tr>";







?>