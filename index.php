<?php include "connection.php" ?>
<?php include "iniciar_sessao.php" ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquisar Turmas</title>
  <link rel="stylesheet" href="procurar_turmas.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('assets/background-image.webp'); /* Caminho da imagem */
      background-size: cover; /* Faz a imagem cobrir toda a tela */
      background-position: center; /* Centraliza a imagem */
      background-repeat: no-repeat; /* Evita que a imagem se repita */
      background-attachment: fixed; /* Faz a imagem ficar estática ao rolar */
      height: 100vh; /* Garante que o fundo cubra a altura da tela */
      font-family: Arial, sans-serif;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php include "components/sidebar.php";
    $render(); ?>

    <main class="main-content">
      <h1>Pesquisar Turmas</h1>
      <form id="searchForm" method="POST">
        <input type="text" name="pesquisa" placeholder="Pesquisar Turmas">
        <button type="submit">Confirmar</button>
      </form>
      <div class="turma-grid">
        <?php
        include "connection.php";

        $pesquisa = $conn->real_escape_string(isset($_POST["pesquisa"]) ? $_POST["pesquisa"] : "");

        $sql = "SELECT * FROM turma";
        if (isset($_POST["pesquisa"])) {
          $sql .= " WHERE nome LIKE \"%$pesquisa%\"";
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          include "components/turma_card.php";
          while ($row = $result->fetch_assoc()) {
            $render($row);
          }
        } else {
        ?>
          <span>Nenhum resultado encontrado</span>
        <?php
        }
        ?>
      </div>
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