<?php
include 'header.php';

?>
<body>
    <p>Faça login</p>
    

    <div class="formRegistar">

    <form action="login.php" method="post">
        <label for="nome"> Nome</label>
        <input type="text" name="nome" id="nome" required>
        <label for="nome"> Password</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Login" id="btnRegistar" name="login">
    </form>
    <p>Se não tem uma conta clique <a href="registar.php"> aqui</a></p>
    </div>
   

    <?php
    
    if(isset($_SESSION['tipoUtilizador'])){
        header('Location: pagina_Inicial.php');
    }

    if(isset($_POST['login'])){
        include "baseDados/bd.h";
        
        $nome = $_POST['nome'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM utilizadores WHERE nomeUtilizador = '$nome'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
        
        if(password_verify($password, $row['pass'])){
            $_SESSION['tipoUtilizador'] = $row['tipoUtilizador'];

            $_SESSION['nomeUtilizador'] = $row['nomeUtilizador'];

            if($_SESSION['tipoUtilizador'] == 2){
                header('Location: pagina_Inicial.php');
            }
            else if($_SESSION['tipoUtilizador'] == 1){
                header('Location: gestaoUtilizador.php');
            }
            else if($_SESSION['tipoUtilizador'] == 3){
                header('Location: pagina_Inicial.php');
            }
            else{
                echo "Login falhou";
            }
    }
    else{
        echo "Login falhou";
    }
}
            

    ?>


</body>
</html>

