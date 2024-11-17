<?php include "protect.php" ?>
<?php include "connection.php" ?>

<?php
if (isset($_POST['nome']) && isset($_POST['data_inicio']) && isset($_POST['data_fim'])) {
  $nome = $conn->real_escape_string($_POST['nome']);
  $data_inicio = $conn->real_escape_string($_POST['data_inicio']);
  $data_fim = $conn->real_escape_string($_POST['data_fim']);

  if ($data_inicio >= $data_fim) {
    echo "<script>alert('A data de término deve ser posterior à data de início!');</script>";
  } else {
    $query = "INSERT INTO evento (nome, data_inic, data_term) VALUES ('$nome', '$data_inicio', '$data_fim')";
    if (mysqli_query($conn, $query)) {
      echo "<script>alert('Evento salvo com sucesso!');</script>";
    } else {
      echo "<script>alert('Erro ao salvar evento: " . mysqli_error($conn) . "');</script>";
    }
  }
  header("Location: calendario.php");
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendário</title>
  <link rel="stylesheet" href="calendario.css">
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
    }
  </style>
</head>

<body>
  <div class="container">
    <?php include "components/sidebar.php";
    $render() ?>
    <div class="calendar">
      <div class="header">
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
          <h1 class="calendar-title">Calendário</h1>
          <button class="add-event-btn" onclick="openModal()">+</button>
        </div>
        <div class="header-wrapper">
          <div class="header-controls">
            <h2 id="month-year"></h2>
            <div class="right-controls">
              <button class="nav-btn" onclick="prevMonth()">&#10094;</button>
              <button class="nav-btn" onclick="nextMonth()">&#10095;</button>
            </div>
          </div>
        </div>

        <div class="weekdays">
          <div>Seg</div>
          <div>Ter</div>
          <div>Qua</div>
          <div>Qui</div>
          <div>Sex</div>
          <div>Sab</div>
          <div>Dom</div>
        </div>
        <div id="days" class="days"></div>
      </div>
    </div>

    <div id="modal" class="modal">
      <div class="modal-content">
        <form method="POST" action="">
          <div>
            <label>Nome do evento</label>
            <input type="text" name="nome" required />
          </div>
          <div>
            <label>Início do Evento</label>
            <input id="date_inicio" type="datetime-local" name="data_inicio" required />
          </div>
          <div>
            <label>Fim do Evento</label>
            <input id="date_fim" type="datetime-local" name="data_fim" required />
          </div>
          <div class="modal-buttons">
            <button type="button" onclick="closeModal()">Cancelar</button>
            <button type="submit">Salvar</button>
          </div>
        </form>
      </div>
    </div>

    <script src="calendario.js"></script>
</body>

</html>