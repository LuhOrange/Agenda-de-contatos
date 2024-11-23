<?php
    
    $conexao = mysqli_connect("localhost", "root", "", "dbagenda"); // Conexão com o Banco de Dados
   
    if(isset($_POST['update']))  // Verifica se o formulário foi enviado pelo botão 'update'
    {
        // Armazena os dados enviados pelo formulário via método POST nas variáveis

        $idContato = $_POST['idContato']; // Recebe o ID enviado pelo input escondido
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $email = $_POST['email'];

        $sqlUpdate = "UPDATE contatos SET nome = '$nome', telefone = '$telefone', endereco = '$endereco', 
        email = '$email' WHERE idContato='$idContato'";    // Consulta para atualizar os dados do contato pelo ID do contato

        $result = $conexao->query($sqlUpdate); // Faz a consulta 
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
    font-family: 'Arial', sans-serif;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
    margin: 0;
    background-image: url("/Projeto%20Ricardo/IMG/fundo.avif");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}
body {
    font-family: 'Arial', sans-serif;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
    margin: 0;
}
.navbar {
    display: flex;
    align-items: center;
    background:none;
    padding: 15px 20px;
    border-radius: 5px;
}
.botaoSair {
    margin-left: auto;
}
.sair {
    background-color: red;
    color: white; 
    border: none; 
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer; 
    transition: background-color 0.3s; 
}
.sair:hover {
    background-color: #d32f2f;
}

a{
    text-decoration: none;
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
.voltar {
    font-size: 18px;
}
</style>
<body>
    <nav class="navbar">
  
        <div class="botaoSair">
            <a href="sair.php"><button class="sair">Sair</button></a> <!--Botao para deslogar-->
        </div>
    </nav>
    
    <div class="bloco">
        <div class="container">
            <h1>Contato editado com sucesso!</h1><br>
            <div class="botao">
                <a href="viewcontact.php"><button class="voltar">Voltar</button></a> <!--Redireciona para viewcontact.php-->
            </div>
        </div>
    </div>
</body>
</html>