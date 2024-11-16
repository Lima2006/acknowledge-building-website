<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Professores</title>
    <link rel="stylesheet" href="gerenciar_professores.css">
</head>
<?php
include 'connection.php';

$query = "SELECT id, nome, email FROM usuario WHERE tipo_professor = TRUE AND status = 'ATIVO'";
$stmt = $conn->query($query);
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<body>
    <h1>Gerenciar Professores</h1>
    <div class="professor-list">
        <?php if (!empty($professores)): ?>
            <?php foreach ($professores as $professor): ?>
                <div class="professor-item">
                    <img src="https://via.placeholder.com/40" alt="Foto do Professor">
                    <div class="professor-info">
                        <span class="professor-name"><?= htmlspecialchars($professor['nome']) ?></span>
                        <span class="professor-email"><?= htmlspecialchars($professor['email']) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum professor encontrado.</p>
        <?php endif; ?>
    </div>
</body>
<footer class="footer">
        <div class="footer-left">
            <p>Copyright Arquitetos do Conhecimento 2024</p>
        </div>
        <div class="footer-right">
            <h4>Acessibilidade</h4>
            <div class="accessibility">
                <span class="zoom-icon">🔍</span>
                <span class="zoom-text">Aumentar Fonte</span>
            </div>
        </div>
</footer>
</html>