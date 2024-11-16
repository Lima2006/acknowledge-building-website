<?php
$render = function () {
?>
  <aside class="sidebar">
    <img src="assets/logo.png" alt="Logo" class="logo">
    <nav>
      <ul>
        <li><a href="./">Pesquisar Turmas</a></li>
        <li><a href="./">Suas Turmas</a></li>
        <li><a href="calendario.php">Calendário</a></li>
        <li><a href="info.php">Informações Pessoais</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </aside>
<?php
}
?>

<style>
  .sidebar {
    width: 200px;
    background-color: #333;
    color: #fff;
    padding: 20px;
  }

  .sidebar .logo {
    width: 100%;
    margin-bottom: 20px;
  }

  .sidebar nav ul {
    list-style: none;
    padding: 0;
  }

  .sidebar nav ul li {
    margin: 15px 0;
  }

  .sidebar nav ul li a {
    color: #fff;
    text-decoration: none;
  }
</style>