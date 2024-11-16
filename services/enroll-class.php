<?php
include "../connection.php";
include "../iniciar_sessao.php";

$classId = $conn->real_escape_string(isset($_GET['classId']) ? $_GET['classId'] : "");
$userId = intval($_SESSION['usuario']['id']);

if (!($classId && $userId)) {
  die("Informe os ids necessários");
}

$selectSql = "SELECT * FROM matricula WHERE aluno_id = $userId AND turma_id = $classId";
$selectResult = $conn->query($selectSql);
if ($selectResult->num_rows === 0) {
  $insertSql = "INSERT INTO matricula (aluno_id, turma_id) VALUES ($userId, $classId)";
  $result = $conn->query($insertSql);
  echo "Aluno matriculado com sucesso";
} else {
  echo "O aluno já está matriculado nesta turma";
}
