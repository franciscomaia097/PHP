<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" href="style.css">
    <nav>
        <ul>
            <?php
            session_start();
            if(isset($_SESSION['tipoUtilizador'])){
                if($_SESSION['tipoUtilizador'] == 2){
                    echo "<li><a href='pagina_Inicial.php' class='navbar-nav'>Booking</a></li>";
                    echo "<li><a href='contactos.php' class='navbar-nav'>Contactos</a></li>";
                    echo "<li><a href='logout.php' class='navbar-nav'>Logout</a></li>";
                    echo "<li><a href='dadosPessoais.php' class='navbar-nav'>Dados Pessoais</a></li>";

                }
                else if($_SESSION['tipoUtilizador'] == 1){
                    echo "<li><a href='gestaoUtilizador.php' class='navbar-nav'>Gestão de Utilizadores</a></li>";
                    echo "<li><a href='logout.php' class='navbar-nav'>Logout</a></li>";
                    echo "<li><a href='dadosPessoais.php' class='navbar-nav'>Dados Pessoais</a></li>";

                }
                else if($_SESSION['tipoUtilizador'] == 3){
                    echo "<li><a href='pagina_Inicial.php' class='navbar-nav'>Booking</a></li>";
                    echo "<li><a href='contactos.php' class='navbar-nav'>Contactos</a></li>";
                    echo "<li><a href='logout.php' class='navbar-nav'>Logout</a></li>";
                    echo "<li><a href='dadosPessoais.php' class='navbar-nav'>Dados Pessoais</a></li>";
                }
            }
            else{
                echo "<li><a href='pagina_Inicial.php' class='navbar-nav'>Booking</a></li>";
                echo "<li><a href='contactos.php' class='navbar-nav'>Contactos</a></li>";
                echo "<li><a href='registar.php' class='navbar-nav'>Registar</a></li>";
                echo "<li><a href='login.php' class='navbar-nav'>Login</a></li>";
            }

            ?>
        </ul>
    </nav>

</head>