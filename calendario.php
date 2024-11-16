<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendário com Formulário de Evento</title>
  <link rel="stylesheet" href="calendario.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
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
        <form method="post" action="salvar_evento.php">
          <div>
            <label>Nome do evento</label>
            <input type="text" name="nome" required />
          </div>
          <div>
            <label>Início do Evento</label>
            <input id="date_inicio" type="date" name="data_inicio" required />
            <input id="time_inicio" type="time" name="hora_inicio" required />
          </div>
          <div>
            <label>Fim do Evento</label>
            <input id="date_fim" type="date" name="data_fim" required />
            <input id="time_fim" type="time" name="hora_fim" required />
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