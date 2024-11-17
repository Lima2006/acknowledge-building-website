<?php
// Incluindo a conexão com o banco de dados
include 'connection.php';

// Consultando os alunos matriculados
$sql = "
    SELECT u.nome AS aluno_nome, COUNT(m.id) AS cursos_matriculados
    FROM usuario u
    LEFT JOIN matricula m ON u.id = m.aluno_id
    WHERE u.tipo_aluno = TRUE AND u.status = 'ATIVO'
    GROUP BY u.id
    ORDER BY u.nome;
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seus Alunos</title>
    <link rel="stylesheet" href="lista_alunos.css">
</head>
<body>
    <div class="container">
        <?php include "components/sidebar.php";
        $render(); ?>
        <div class="main-content">
            <h1>Seus Alunos</h1>
            <div class="student-list">
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="student-item">
                            <div class="student-info">
                                <div class="student-icon">👤</div>
                                <div>
                                    <h2><?= htmlspecialchars($row['aluno_nome']) ?></h2>
                                    <p>Matriculado em <?= htmlspecialchars($row['cursos_matriculados']) ?> cursos</p>
                                </div>
                            </div>
                            <button class="details-btn">Ver Detalhes</button>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Nenhum aluno encontrado.</p>
                <?php endif; ?>
            </div>
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
