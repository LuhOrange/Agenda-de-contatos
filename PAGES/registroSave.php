<?php
    $conexao = mysqli_connect("localhost", "root", "", "dbagenda"); // Conexão com o Banco de Dados
   
    if(isset($_POST['submit'])) // Verifica se o formulário foi enviado pelo botão 'submit'
    { 
        // Armazena os dados enviados pelo formulário via método POST nas variáveis

        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];

        // Executa uma consulta para inserir os dados na tabela 'usuarios' do banco de dados

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, senha, email)
        VALUES ('$nome', '$senha', '$email')");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Contato</title>
</head>
<style>
    body {
    font-family: 'Perpetua', sans-serif;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
    margin: 0;
    background-image: url("caderno1.avif");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;   
}
.navbar {
    display: flex;
    align-items: center;
    background:none;
    padding: 15px 20px;
    border-radius: 5px;
}
.navbar img {
    margin-right: 10px;
}
.navbar span {
    font-size: 35px; 
    font-weight: bold; 
    color: #fff;
}

.bloco{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
.container {
    width: auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px; /* Espaçamento entre login e agenda */
}
h1 {
    font-size: 24px;
    color: #333;
    margin: 0;
}

a {
    text-decoration: none;
    color: #007BFF;
}
button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 8px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

.botao {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<body>
    <nav class="navbar">
        <span>Agenda</span>
    </nav>

    <div class="bloco">
        <div class="container">
            <h1>Cadastrado com sucesso!</h1><br>
            <div class="botao">
                <a href="index.php"><button>Fazer Login</button></a> <!--Redireciona para o login-->
            </div>
        </div>
    </div>
</body>
</html>