<?php

    if(!empty($_GET['idContato'])) // Verifica se há o idContato na URL
       {
        $conexao = mysqli_connect("localhost", "root", "", "dbagenda"); // Conexão com o Banco de Dados
   
        $idContato = $_GET['idContato']; // Joga o id do contato da URL para a variável
        
        $sqlSelect = "SELECT * FROM contatos WHERE idContato=$idContato"; // Busca o contato pelo ID fornecido
   
        $result = $conexao->query($sqlSelect); // Faz a consulta e armazena o resultado na variável
   
        if($result->num_rows > 0) // Se o número de linhas for maior que 0 significa que o contato existe
        {
           $sqlDelete = "DELETE FROM contatos WHERE idContato=$idContato"; // Faz um consulta para deletar o contato pelo ID fornecido

           $resultDelete = $conexao->query($sqlDelete); // Executa a consulta de exclusão e armazena o resultado na variável
       
        }
        else{
        header('Location contatos.php'); // Redireciona para contatos.php caso o contato não exista
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
    margin: 0;
}
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

        <div class="botaoSair">
            <a href="sair.php"><button class="sair">Sair</button></a> <!--Botao para deslogar-->
        </div>
    </nav>

    <div class="bloco">
        <div class="container">
            <h1>Contato excluído com sucesso!</h1><br>
            <div class="botao">                                  <!--Botão para voltar para viewcontact.php-->
                <a href="viewcontact.php"><button>Voltar</button></a> 
            </div>
        </div>
    </div>

</body>
</html>