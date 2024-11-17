<?php
include "connection.php";
include "protect.php";
$usuario = $_SESSION['usuario'];

$sql = "
    SELECT t.*
    FROM turma t
    INNER JOIN matricula m ON t.id = m.turma_id
    INNER JOIN usuario u ON m.aluno_id = u.id
    WHERE u.id = 3;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suas Turmas</title>
  <link rel="stylesheet" href="suas_turmas_professor.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
</head>

<body>
  <div class="container">
    <?php include "components/sidebar.php";
    $render(); ?>
    <main>
      <h1>Suas Turmas</h1>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="turma">
            <img src="placeholder.jpg" alt="Imagem da turma">
            <div class="info">
              <h2><?php echo htmlspecialchars($row['nome']); ?></h2>
              <p><?php echo htmlspecialchars($row['descricao']); ?></p>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Você ainda não possui nenhuma turma.</p>
      <?php endif; ?>
    </main>
  </div>
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
</body>

</html>