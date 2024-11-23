<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
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

.login-container {
    width: auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px; /* Espaçamento entre login e agenda */
}

.login-form {
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

.signup-link {
    text-align: center;
    margin-top: 10px;
}

</style>

<body>
    <nav class="navbar">
        <span>Agenda</span>
        
    </nav>

    <div class="bloco">
        <div class="login-container">
            <form action="testLogin.php" method="post" class="login-form">  <!--Formulário para pegar o email e senha-->
                <h1>Bem-vindo de Volta!</h1>
                <div class="input-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
                <button type="submit" name="submit">Entrar</button>            <!--Button com name submit para enviar os dados 
                                                                                             do formulário para testlogin.php-->
                <p class="signup-link">Não tem uma conta? <a href="registro.php">Crie uma aqui</a></p>
            </form>
        </div>
    </div>
</body>
</html>
