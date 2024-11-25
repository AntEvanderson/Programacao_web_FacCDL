<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha'])){
        //Acessa o sistema.
        include_once('config.php');
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        //print_r('Usuário: ' . $usuario);
        //print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and senha = '$senha'";

        $result = $conexao->query($sql);

        //print_r($result);
        //print_r($sql);

        if(mysqli_num_rows($result) < 1){
            
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        
        }else{
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }


    }else{
        //Se não existir, não acessa.
        header('Location: login.php');
    }
?>