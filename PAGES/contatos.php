<?php
     session_start();  // Continua a sessão para permitir o uso de variáveis de sessão
     
     $conexao = mysqli_connect("localhost", "root", "", "dbagenda"); // Conexão com o Bando de Dados

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))  // Verifica se as variáveis de sessão email e senha 
    {                                                                                  //  existem
        
        unset($_SESSION['email']); // Se for verdade, destrói os dados da sessão
        unset($_SESSION['senha']); //

        header('Location: index.php'); // E redereciona para login
    }
 
    if(!empty($_GET['search'])) // Verifica se existe algum parâmetro 'search' na URL
    {
        $data = $_GET['search']; // Armazena o parâmetro 
        
        $sql = "SELECT * FROM contatos WHERE nome LIKE '%$data%' 
        or telefone LIKE '%$data%' ORDER BY nome ASC"; // Realiza uma consulta no Banco de Dados por nome ou telefone
        
    }
    else{
        $sql = "SELECT * FROM contatos ORDER BY nome ASC"; // Se não houver um 'valor' search na URL, realiza uma consulta pelos valores
    }


    $result = $conexao->query($sql); // Executa a consulta e armazena o resultado na variável
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Contatos</title>
    <link rel="stylesheet" href="styles.css">
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

button[type="submit"] {
    padding: 10px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.signup-link {
    text-align: center;
    margin-top: 10px;
}

.agenda-container {
    width: auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.add-contact {
    float: right;
    margin-right: 30px;
    font-size: 40px;
    background: none;
    border: none;
    cursor: pointer;
    color: #007BFF; /* Cor do botão */
    margin-bottom: 10px; /* Espaçamento inferior */
}

.search {
    align-items: center;
    display: flex;
    justify-content: center; /* Centraliza a barra de pesquisa */
    margin: 10px 0; /* Margem para espaçamento */
    margin-left: 45px;
}

.search__input {
    width: 0; /* Inicialmente escondido */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: width 120ms;
    opacity: 0; /* Esconde o campo de entrada */
    visibility: hidden; /* Esconde o campo de entrada */
}

.search--expanded .search__input {
    width: 10rem; /* Largura quando expandido */
    opacity: 1; /* Torna visível */
    visibility: visible; /* Torna visível */
}

.search__button {
    align-items: center;
    display: flex;
    justify-content: center;
    background-color: transparent; /* Remove o fundo azul */
    border: none; /* Remove a borda */
    cursor: pointer;
    padding: 7px; /* Ajusta o padding para centralizar a lupa */
    color: #007BFF; /* Cor do botão */
}

table {
    width: 370px;
    border-collapse: collapse;
    color: black;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: white;
    font-weight: bold;
    color: black;
}


.contacts-list {
    margin-top: 20px;
}

.contact-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

.contact-item span {
    flex: 1;
    margin: 0 10px;
}

.contact-item button {
    background: none;
    border: none;
    cursor: pointer;
    margin-left: 5px;
}
.container {
    display: flex;
    align-items: center;
    justify-content: center;
}
.voltar {
    background-color: #007BFF;
    border: none;
    padding: 8px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    margin-top: 10px;
    color:#fff;
}

.footer {
    margin-top: 20px;
    padding: 10px;
    text-align: center;
    background-color: #f8f8f8;
    border-top: 1px solid #ccc;
}

.footer__info {
    display: flex;
    justify-content: space-between; /* Espaça os itens */
    align-items: center; /* Alinha verticalmente */
 max-width: 400px; /* Largura máxima */
    margin: 0 auto; /* Centraliza */
}

.weather {
    display: flex;
    align-items: center; /* Alinha verticalmente */
}

.weather__icon {
    font-size: 24px; /* Tamanho do ícone */
    margin-right: 5px; /* Espaço entre ícone e temperatura */
}

.weather__temp {
    font-size: 18px; /* Tamanho da temperatura */
}

.time {
    font-size: 18px; /* Tamanho da hora */
}

.initial-avatar {
    align-items: center;
    display: flex;
    justify-content: center;
    background-color: #d1d5db;
    color: #fff;
    border-radius: 50%;
    height: 3rem;
    width: 3rem;
}
</style>

<body> 
    <nav class="navbar">

        <div class="botaoSair">
            <a href="sair.php"><button class="sair">Sair</button></a> <!--Botao para deslogar-->
        </div>
    </nav>

    <div class="bloco">
        <div class="agenda-container">
        <center><h1>Contatos</h1></center>
        <a href="newcontact.php"><button class="add-contact">+</button></a>
            <div class="search" id="searchBar">
                
                    <input type="text" name="search" class="search__input" placeholder="Pesquisar contatos..." id="searchInput" />
                    <button onclick="searchData()" class="search__button" id="searchButton">
                        <svg class="search__icon" width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="2"/>
                            <line x1="16" y1="16" x2="22" y2="22" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>
                
            </div>
        
            <!--Contatos-->
            <div class="contacts-list">
                <div class="contact-item">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <tbody id="contacts">
                    <?php
                         while($user_data = mysqli_fetch_assoc($result)) // Realiza uma consulta e retorna os dados
                        {                                                // como um array associativo
                                            
                        echo"<tr>";
                            echo"<td>".$user_data['nome']."</td>";     // Imprime na tabela os dados retornados
                            echo"<td>".$user_data['endereco']."</td>"; //
                            
                            echo"<td><a href='viewcontact.php?idContato=$user_data[idContato]'><button class='view-icon'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0'/>
                                <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7'/>
                                </svg></button>
                                </a> 
                                </td>";  // Botão com um redirecionamento para viewcontact
                        echo"</tr>";
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
                </div>
                <div class="container">  <!--Botão para recarregar a página-->

                        <a href="contatos.php"><button class="voltar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                        </svg></button>  
                        </a>
                </div>
        </div>

        <!--Clima e hora-->
        <div class="footer">
            <div class="footer__info">
                <div class="weather">
                    <span class="weather__icon">☀️</span> <!-- Você pode usar um ícone de clima aqui -->
                    <span class="weather__temp">25°C</span> <!-- Temperatura -->
                </div>
                <div class="time">
                    <span id="currentTime"></span> <!-- Hora atual -->
                </div>
            </div>
        </div>
    </div>
    </div>

    
   <script>

var search = document.getElementById('searchInput');

    search.addEventListener("keydown", function(event){   // Verifica se a tecla Enter foi usada no input

        if(event.key == "Enter"){  // Chama a função searchData() para processar a pesquisa
            searchData();
        }
    });

    function searchData(){  // Define a função searchData()

        if (search.value.trim() !== '') {  // Verifica se o valor do campo de entrada não está vazio
        
            window.location = 'contatos.php?search=' + encodeURIComponent(search.value); // Redireciona o navegador para a página 
    }                                                                                   //'contatos.php' com o valor de busca anexado na URL
    else {
        // Caso o campo de entrada esteja vazio, nenhuma ação é realizada
    }   
    }                   


    // JS para o botão de pesquisa
    const searchButton = document.getElementById('searchButton');
    const searchBar = document.getElementById('searchBar');
    const inputEle = document.getElementById('searchInput');
    
    searchButton.addEventListener('click', () => {   // Adiciona um evento de clique ao botão de pesquisa
        searchBar.classList.toggle('search--expanded');
        const isExpanded = searchBar.classList.contains('search--expanded'); // Verifica se a barra de pesquisa está expandida

        if (isExpanded) {    // Se a barra estiver expandida, foca automaticamente no campo de entrada
            inputEle.focus();
        }
    });


    // JS de Tempo e Clima.
    function updateTime() {
    const now = new Date();
    const options = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
    document.getElementById('currentTime').textContent = now.toLocaleTimeString([], options);
}

    setInterval(updateTime, 1000); // Atualiza a hora a cada segundo
    updateTime(); // Chama a função uma vez para definir a hora imediatamente

    </script>

</body>
</html>
