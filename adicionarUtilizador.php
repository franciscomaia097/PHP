<?php
include 'header.php';

?>
<body>
    <p>Adicione um utilizador</p>
    

    <div class="formRegistar">

    <form action="registar.php" method="post">
        <label for="nome"> Nome</label>
        <input type="text" name="nome" id="nome" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="morada">Morada</label>
        <input type="text" name="morada" id="morada" required>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Adicionar" id="btnRegistar" name="registo">
    </form>
    </div>
   

    <?php
    if(isset($_POST['registo'])){
        include "baseDados/bd.h";
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $morada = $_POST['morada'];
        $telefone = $_POST['telefone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilizadores (nomeUtilizador, mail, morada, pass, telefone, tipoUtilizador) VALUES ('$nome', '$email', '$morada', '$password', '$telefone', '3')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Utilizador adicionado com sucesso</p>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
          $conn->close();
    }
            

    ?>


</body>
</html>

