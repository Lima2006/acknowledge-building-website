<?php include "protect.php" ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Início - Acnowledge Building</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
  <link rel="stylesheet" href="base.css"
    </head>

<body>
  <form method="POST">
    <input type="search" name="pesquisa">
    <input type="submit" />
  </form>
  <?php
  include "./connection.php";

  if (isset($_POST["pesquisa"])) {
    $pesquisa = $conn->real_escape_string($_POST["pesquisa"]);
    $result = $conn->query("SELECT * FROM assunto WHERE nome LIKE \"%$pesquisa%\"");
    $tableResult = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $tableResult[] = $row;
      }
    }
    print_r($tableResult);
  }
  ?>
  <br />Olá
  <?php echo $_SESSION['nome'] ?>!
  <br /><a href="logout.php">Sair</a>
</body>

</html>