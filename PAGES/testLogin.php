<?php
   session_start(); // Inicia uma sessão para gerenciar as informações do login

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))   // Verificia se submit foi enviado e se email e senha 
    {                                                                                   // foram preenchidos no formulário
        
        $conexao = mysqli_connect("localhost", "root", "", "dbagenda"); // Estabelece a conexão com o Banco de Dados se a condição for true
        
        $email = $_POST['email'];  // Variáveis armazenam o email e a senha fornecidas no formulário
        $senha = $_POST['senha'];  //

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";    // Realiza uma consulta para ver se existe um usuário
        $result = $conexao->query($sql);                                                //  com o email e senha fornecidos
 
        
        if(mysqli_num_rows($result)< 1)  // Se a consulta for < 1, significa que não existe um usuário com o dados informados
        {
            
            unset($_SESSION['email']); // Se não existir, os dados são destruídos
            unset($_SESSION['senha']);

           header('Location: index.php'); // E redireciona para a página de login novamente
        }
        else{  // Caso exista o usuário

            $_SESSION['email'] = $email;  // Armazena o email e a senha na sessão
            $_SESSION['senha'] = $senha;  //

            header('Location: contatos.php'); // E redireciona para a página principal, dando acesso
        }
    }
    else{
        header('Location: index.php'); // Se o submit não tiver sido enviado ou se email e senha não foram preenchidos,
}                                      // redireciona para o login
?>