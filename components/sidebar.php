<?php
$render = function () {
?>
  <aside class="sidebar">
    <img src="assets/logo.png" alt="Logo" class="logo">
    <nav>
      <?php if ($_SESSION['usuario']['tipo_administrador']): ?>
        <span>Administrador</span>
        <ul>
          <li><a href="gerenciar_professores.php">Gerenciar Professores</a></li>
          <li><a href="gerenciar_materiais.php">Gerenciar Materiais</a></li>
        </ul>
        <?php
      endif;
      if ($_SESSION['usuario']['tipo_professor']):
        ?>
        <span>Professor</span>
        <ul>
          <li><a href="suas_turmas_professor.php">Suas Turmas</a></li>
          <li><a href="assuntos_professor.php">Seus Assuntos</a></li>
          <li><a href="relatorio_professor.php">Relatório de Alunos</a></li>
        </ul>
      <?php
      endif;
      if ($_SESSION['usuario']['tipo_responsavel']):
      ?>
        <span>Responsável</span>
        <ul>
          <li><a href="lista_alunos.php">Alunos</a></li>
        </ul>
      <?php
      endif;
      if ($_SESSION['usuario']['tipo_aluno']):
      ?>
        <span>Aluno</span>
        <ul>
          <li><a href="./">Pesquisar Turmas</a></li>
          <li><a href="./">Suas Turmas</a></li>
        </ul>
      <?php endif ?>
      <hr>
      <ul>
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
    background-color: #fff;
    color: #333;
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
    color: #333;
    text-decoration: none;
  }

  .sidebar nav span {
    color: #b8b8b8;
    font-size: small;
  }
</style>