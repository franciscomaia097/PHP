<?php

include 'header.php';
include "baseDados/bd.h";
//sql para ir buscar os dados do utilizador
$nomeUtilizador = $_GET['nomeUtilizador'];

$sql = "SELECT * FROM utilizadores WHERE nomeUtilizador = '$nomeUtilizador'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $nome = $row['nomeUtilizador'];
    $email = $row['mail'];
    $morada = $row['morada'];
    $telefone = $row['telefone'];
    $password = $row['pass'];
  }
} else {
  echo "0 results";
}



//form para editar os dados do utilizador
echo "<div class='formRegistar'>";

echo "<form action='editarUtilizador.php' method='post'>";

echo "<p>Editar utilizador</p>";
echo "<label for='nome'>Nome</label>";
echo "<input type='text' id='nome' name='nome' value='$nome'>";
echo "<label for='email'>Email</label>";
echo "<input type='hidden' id='nomeUtilizador_antigo' name='nomeUtilizador_antigo' value='$nomeUtilizador'>";
echo "<input type='email' id='email' name='email' value='$email'>";
echo "<label for='morada'>Morada</label>";
echo "<input type='text' id='morada' name='morada' value='$morada'>";
echo "<label for='telefone'>Telefone</label>";
echo "<input type='text' id='telefone' name='telefone' value='$telefone'>";
echo "<label for='password'>Password</label>";
echo "<input type='password' id='password' name='password' value='$password'>";
echo "<input type='submit' value='Editar' id='btnRegistar' name='editar'>";
echo "</div>";
echo "</form>";




?>

<?php
if(isset($_POST['editar'])){
$nomeAntigo = $_POST['nomeUtilizador_antigo'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$morada = $_POST['morada'];
$telefone = $_POST['telefone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "UPDATE utilizadores SET nomeUtilizador = '$nome', mail = '$email', morada = '$morada', telefone = '$telefone', pass = '$password' WHERE nomeUtilizador = '$nomeAntigo'";



if ($conn-> query($sql) === TRUE) {
    echo "<p>Utilizador editado com sucesso</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header ("Location: gestaoUtilizador.php");

}
$conn->close();

?>

