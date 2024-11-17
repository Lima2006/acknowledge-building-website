<?php
// Conectar ao banco de dados (inclua seu arquivo de conexão)
include('connection.php');

// Verificar se o ID do responsável foi passado
$responsavel_id = isset($_GET['responsavel_id']) ? $_GET['responsavel_id'] : null;

// Consultar alunos filtrados por responsável
if ($responsavel_id) {
    // Selecionar os alunos com o responsável específico
    $query = "SELECT * FROM usuario WHERE responsavel_id = '$responsavel_id'";
} else {
    // Caso não tenha um responsável selecionado, listar todos os alunos
    $query = "SELECT * FROM usuario";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="lista_alunos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=account_circle" />
</head>
<body>
    <div class="header-title">Lista de Alunos</div>
    <div class="container">
        <div class="main-content student-list">
            <?php
            // Verifica se há alunos no banco de dados
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="student-item">
                        <div class="student-info">
                            <span class="student-icon material-symbols-outlined">account_circle</span>
                            <div>
                                <h3 class="student-name">' . $row['nome'] . '</h3>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="info.php?id=' . $row['id'] . '" class="details-btn">Ver Detalhes</a>
                        </div>
                    </div>';
                }
            } else {
                echo "<p>Nenhum aluno encontrado.</p>";
            }
            ?>
        </div>
    </div>

    <div class="footer">
        <div class="copyright">
            Copyright Arquitetos do Conhecimento 2024
        </div>
        <div class="accessibility">
            <button onclick="aumentarFonte()">
                <span style="font-size: 18px;">🔍</span> Aumentar Fonte
            </button>
        </div>
    </div>

    <script src="lista_alunos.js"></script>
</body>
</html>
