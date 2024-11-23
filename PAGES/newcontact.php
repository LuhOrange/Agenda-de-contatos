<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Contato</title>
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

    <div class="bloco">                        <!--Formulário para adicionar um novo contato pelo metódo POST-->
        <div class="addContact-container"> 
            <form action="newcontactSave.php" method="post" class="addContact-form">
                <h1>Adicionar Contato</h1>
                <div class="input-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" required>
                </div>
                <div class="input-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" placeholder="Telefone" required>
                </div>
                <div class="input-group">
                    <label for="endereço">Endereço:</label>
                    <input type="text" name="endereco" id="endereco"  placeholder="Endereço">
                </div>
                <div class="input-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="E-mail">
                </div>

                <button type="submit" name="submit" id="submit">Salvar</button>
            </form>   
        </div>
        </div>

    </div>
</body>
</html>