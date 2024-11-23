<?php
    
    if(!empty($_GET['idContato'])) // Verifica se contém o idContato na URL
    {
         $conexao = mysqli_connect("localhost", "root", "", "dbagenda"); // Conexão com o Banco de Dados

       $idContato = $_GET['idContato'];  // Joga o id do contato na URL para a variável

       $sqlSelect = "SELECT * FROM contatos WHERE idContato=$idContato";  // Busca o contato pelo ID fornecido

       $result = $conexao->query($sqlSelect); // Faz a consulta e armazena o resultado na variável

       if($result->num_rows > 0) // Se o número de linhas for maior que 0 significa que o contato existe
       {
        while($user_data = mysqli_fetch_assoc($result))  // Realiza uma consulta e retorna os dados como um array associativo,
        {                                                // $user_data recebe o resultado dessa consulta

           
            $nome = $user_data['nome'];  // Atribui o valor da coluna da linha atual à uma variável 
            $telefone = $user_data['telefone']; //
            $endereco = $user_data['endereco']; //
            $email = $user_data['email'];  //
        }
    
       }
       else{
        header('Location viewcontact.php'); // Redireciona para viewcontact.php caso o contato não exista
       }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Contato</title>
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
.addContact-container {
    width: auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px; /* Espaçamento entre login e agenda */
}

.addContact-form {
    display: flex;
    flex-direction: column;
}

.input-group {
    margin-bottom: 15px;
}

.input-group label {
    margin-bottom: 5px;
}

.input-group input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    padding: 10px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>

<body>
    <nav class="navbar">

        <div class="botaoSair">
            <a href="sair.php"><button class="sair">Sair</button></a> <!--Botao para deslogar-->
        </div>
    </nav>

    <div class="bloco">           <!--Formulário com os dados do contato já impressos nos inputs-->
        <div class="addContact-container">
            <form action="editcontactSave.php" method="post" class="addContact-form">
                <h1>Editar Contato</h1>
                <div class="input-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" required value="<?php echo $nome ?>">  <!--Imprime o valor da variável com echo-->
                </div>
                <div class="input-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" required value="<?php echo $telefone ?>">
                </div>
                <div class="input-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" value="<?php echo $endereco ?>">
                </div>
                <div class="input-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" value="<?php echo $email ?>">
                </div>
            
                <input type="hidden" name="idContato" value="<?php echo $idContato ?>"> <!--Input escondido que envia o ID do contato-->
                <button type="submit" name="update" id="update">Salvar</button>
            </form>   
        </div>

        </div>
    </div>
</body>
</html