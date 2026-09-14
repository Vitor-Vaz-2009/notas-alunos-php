<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notas dos Alunos</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
        }

        .titulo {
            text-align: center;
        }

        .aprovado {
            font-weight: bold;
        }

        .reprovado {
            font-weight: bold;
        }
    </style>
</head>

<body>

<!-- Botão para voltar à página inicial -->
<a href="index.php" class="w3-display-topleft">
    <i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-xxlarge"></i>
</a>

<div class="container w3-padding">

    <h1 class="titulo w3-teal w3-round-large w3-padding">
        Notas dos Alunos
    </h1>

    <!-- Campo de pesquisa -->
    <form method="GET" class="w3-margin-bottom">

        <input
            class="w3-input w3-border w3-round"
            type="text"
            name="nome"
            placeholder="Digite o nome do aluno"
            value="<?php echo isset($_GET['nome']) ? $_GET['nome'] : ''; ?>"
        >

        <button class="w3-button w3-teal w3-margin-top w3-round" type="submit">
            <i class="fa fa-search"></i> Pesquisar
        </button>

    </form>

<?php

// Dados para conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pwii";

// Cria a conexão com o banco de dados
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Verifica se foi digitado um nome na pesquisa
if (isset($_GET['nome']) && $_GET['nome'] != '') {

    $nome = $_GET['nome'];

    // Busca alunos pelo nome
    $sql = "SELECT * FROM alunoconcluinte
            WHERE nome LIKE '%$nome%'
            ORDER BY ((nota1 + nota2 + nota3 + nota4) / 4) DESC";

} else {

    // Lista todos os alunos ordenados pela média
    $sql = "SELECT * FROM alunoconcluinte
            ORDER BY ((nota1 + nota2 + nota3 + nota4) / 4) DESC";
}

// Executa a consulta
$resultado = $conexao->query($sql);

?>

<table class="w3-table-all w3-centered w3-card-4">

    <thead>
        <tr class="w3-teal">
            <th>Ranking</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Nota 4</th>
            <th>Média</th>
        </tr>
    </thead>

    <tbody>

<?php

// Começa a posição do ranking
$ranking = 1;

// Percorre os alunos encontrados
if ($resultado != null) {

    foreach ($resultado as $linha) {

        // Calcula a média das quatro notas
        $media = (
            $linha['nota1'] +
            $linha['nota2'] +
            $linha['nota3'] +
            $linha['nota4']
        ) / 4;

        echo '<tr>';

        echo '<td>' . $ranking . 'º</td>';

        echo '<td>' . $linha['idalunoconcluinte'] . '</td>';

        echo '<td>' . $linha['nome'] . '</td>';

        echo '<td>' . $linha['nota1'] . '</td>';

        echo '<td>' . $linha['nota2'] . '</td>';

        echo '<td>' . $linha['nota3'] . '</td>';

        echo '<td>' . $linha['nota4'] . '</td>';

        echo '<td><b>' . number_format($media, 2, ',', '.') . '</b></td>';

        echo '</tr>';

        // Passa para a próxima posição do ranking
        $ranking++;
    }
}

?>

    </tbody>

</table>

</div>

<?php

// Fecha a conexão com o banco de dados
$conexao->close();

?>

</body>
</html>