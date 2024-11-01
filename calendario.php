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

    <script>
      const monthNames = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
        "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
      ];

      let currentMonth = new Date().getMonth();
      let currentYear = new Date().getFullYear();

      function renderCalendar() {
        const daysContainer = document.getElementById('days');
        const monthYear = document.getElementById('month-year');
        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const lastDate = new Date(currentYear, currentMonth + 1, 0).getDate();

        monthYear.textContent = `${monthNames[currentMonth]} ${currentYear}`;
        daysContainer.innerHTML = '';

        for (let i = 0; i < (firstDay + 6) % 7; i++) {
          const emptyDiv = document.createElement('div');
          daysContainer.appendChild(emptyDiv);
        }

        for (let day = 1; day <= lastDate; day++) {
          const dayDiv = document.createElement('div');
          dayDiv.textContent = day;
          dayDiv.onclick = () => {
            document.querySelectorAll('.days div').forEach(div => div.classList.remove('selected'));
            dayDiv.classList.add('selected');
          };
          daysContainer.appendChild(dayDiv);
        }
      }

      function prevMonth() {
        currentMonth--;
        if (currentMonth < 0) {
          currentMonth = 11;
          currentYear--;
        }
        renderCalendar();
      }

      function nextMonth() {
        currentMonth++;
        if (currentMonth > 11) {
          currentMonth = 0;
          currentYear++;
        }
        renderCalendar();
      }

      function openModal() {
        document.getElementById('modal').style.display = 'flex';
      }

      function closeModal() {
        document.getElementById('modal').style.display = 'none';
      }

      renderCalendar();
    </script>
</body>

</html>