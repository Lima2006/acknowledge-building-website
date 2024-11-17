<?php include "protect.php" ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informações do Usuário</title>
  <link rel="stylesheet" href="info.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=account_circle" />
</head>

<body>
  <div class="container">
    <?php include "components/sidebar.php";
    $render() ?>
    <?php $user = $_SESSION['usuario'] ?>
    <div class="main-content student-details">
      <div class="header-title">Informações pessoais</div>
      <div class="icone">
        <span class="material-symbols-outlined" style="font-size: 150px;">account_circle</span><br>
      </div>
      <h2 class="student-name"><?php echo $user['nome'] ?></h2>
      <p class="student-info"><?php echo getUserType() ?></p><br>
      <p><span class="student-label">Matrícula</span><br> <span class="student-info"><?php echo $user['id'] ?></span></p><br>
      <p><span class="student-label">Sexo</span><br> <span class="student-info"><?php echo getGender() ?></span></p><br>
      <p><span class="student-label">Email</span><br> <span class="student-info"><?php echo $user['email'] ?></span></p><br>
      <p><span class="student-label">Data de Nascimento</span><br> <span class="student-info"><?php echo date("j/m/Y", strtotime($user['data_nasc'])) ?></span></p><br>
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

  <script src="info.js"></script>
</body>

</html>

<?php
function getUserType()
{
  $isTeacher = $_SESSION['usuario']['tipo_professor'];
  $isStudent = $_SESSION['usuario']['tipo_aluno'];
  $isAdmin = $_SESSION['usuario']['tipo_administrador'];
  $isGuardian = $_SESSION['usuario']['tipo_responsavel'];
  $roles = array();
  if ($isTeacher) {
    array_push($roles, "Professor");
  }
  if ($isStudent) {
    array_push($roles, "Aluno");
  }
  if ($isAdmin) {
    array_push($roles, "Administrador");
  }
  if ($isGuardian) {
    array_push($roles, "Responsável");
  }
  return join(", ", $roles);
}
function getGender()
{
  switch ($_SESSION['usuario']['sexo']) {
    case "M":
      return "Masculino";
    case "F":
      return "Feminino";
    default:
      return "Não especificado";
  }
}
?>