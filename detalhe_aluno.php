<?php
// Incluindo a conexão com o banco de dados
include 'connection.php';
include 'protect.php';
// Verificando se o parâmetro 'id' foi passado via URL
if (isset($_GET['id'])) {
    $aluno_id = $_GET['id'];
} else {
    // Redireciona caso o ID não seja passado na URL
    die("ID do aluno não fornecido.");
}

// Consulta para pegar as informações do aluno
$sql = "
    SELECT u.id, u.nome, u.sexo, u.email, u.data_nasc, r.nome AS responsavel_nome
    FROM usuario u
    LEFT JOIN usuario r ON u.responsavel_id = r.id
    WHERE u.id = ? AND u.tipo_aluno = TRUE
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $aluno_id);
$stmt->execute();
$result = $stmt->get_result();

// Verificando se encontrou o aluno
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Aluno não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Aluno</title>
    <link rel="stylesheet" href="detalhe_aluno.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=account_circle" />
</head>
<body>
    <div class="header-title">Informações pessoais</div>
    
    <div class="container">
        <?php include "components/sidebar.php";
        $render(); ?>
    </div>

    <!-- Div centralizada fora do container -->
    <div class="main-content-student-details">
        <div class="icone">
            <span class="material-symbols-outlined" style="font-size: 150px;">account_circle</span><br>
        </div>
        <h2 class="student-name"><?= htmlspecialchars($row['nome']) ?></h2>
        <p class="student-info"><?= htmlspecialchars($row['responsavel_nome']) ? 'Responsável: ' . htmlspecialchars($row['responsavel_nome']) : 'Sem responsável' ?></p><br>
        <p><span class="student-label">Matrícula</span><br> <span class="student-info"><?= htmlspecialchars($row['id']) ?></span></p><br>
        <p><span class="student-label">Sexo</span><br> <span class="student-info"><?= $row['sexo'] === 'M' ? 'Masculino' : 'Feminino' ?></span></p><br>
        <p><span class="student-label">Email</span><br> <span class="student-info"><?= htmlspecialchars($row['email']) ?></span></p><br>
        <p><span class="student-label">Data de Nascimento</span><br> <span class="student-info"><?= date('d/m/Y', strtotime($row['data_nasc'])) ?></span></p><br>
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

    <script src="detalhe_aluno.js"></script>
</body>
</html>
