<?php
    // Caso o botao Sair seja apertado

    session_start();  // Continua a sessão para permitir o uso de variáveis de sessão

    unset($_SESSION['email']); // Destrói os dados da sessão
    unset($_SESSION['senha']); //

     header('Location: index.php'); // Redireciona para o login

?>