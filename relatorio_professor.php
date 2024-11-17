<?php include "protect.php" ?>
<?php include "connection.php" ?>
<?php
$sql = "
SELECT 
    u.id as aluno_id,
    u.nome as aluno_nome,
    t.id as turma_id,
    t.nome as turma_nome,
    a.nome as assunto_nome
FROM
	usuario u
INNER JOIN
	matricula m ON u.id = m.aluno_id
INNER JOIN
	turma t ON m.turma_id = t.id
INNER JOIN
	assunto a ON t.assunto_id = a.id
WHERE a.professor_id = 1;
";
$result = $conn->query($sql);
$structuredReportList = array();
while ($row = $result->fetch_assoc()) {
  if (!isset($structuredReportList[$row['assunto_nome']])) {
    $structuredReportList[$row['assunto_nome']] = array();
  }
  if (!isset($structuredReportList[$row['assunto_nome']][$row['turma_nome']])) {
    $structuredReportList[$row['assunto_nome']][$row['turma_nome']] = array();
  }
  array_push($structuredReportList[$row['assunto_nome']][$row['turma_nome']], $row['aluno_nome']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório das Turmas</title>
  <link rel="stylesheet" href="relatorio_professor.css">
</head>

<body>
  <div class="container">
    <?php
    include "components/sidebar.php";
    $render();
    ?>
    <main>
      <?php foreach ($structuredReportList as $assunto => $turmas_alunos) {
        $turmas = array_keys($turmas_alunos);
        $max_alunos = max(array_map('count', $turmas_alunos));
      ?>
        <h1>Relatório das Turmas de “<?php echo $assunto ?>”</h1>
        <table>
          <thead>
            <tr>
              <?php foreach ($turmas as $turma): ?>
                <th><?php echo $turma ?></th>
              <?php endforeach ?>
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 0; $i < $max_alunos; $i++): ?>
              <tr>
                <?php foreach ($turmas as $turma): ?>
                  <td>
                    <?php echo isset($turmas_alunos[$turma][$i]) ? htmlspecialchars($turmas_alunos[$turma][$i]) : "" ?>
                  </td>
                <?php endforeach ?>
              </tr>
            <?php endfor ?>
          </tbody>
        </table>
      <?php } ?>
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