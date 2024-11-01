<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Acknowledge Building</title>
  <link rel="stylesheet" href="base.css">
  <link rel="stylesheet" href="login.css">
  <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
</head>

<body>
  <div class="background"></div>
  <div class="login">
    <form class="login__form" action="">
      <div class="login__form-group">
        <label for="usuario" class="login__label">Usuário<br></label>
        <input type="text" id="usuario" class="login__input" placeholder="Digite seu usuário" required>
      </div>
      <div class="login__form-group">
        <label for="senha" class="login__label">Senha<br></label>
        <input type="password" id="senha" class="login__input" placeholder="Digite sua senha" required>
      </div>
      <div class="options">
        <div>
          <input type="checkbox" id="mostrar-senha" />
          <label for="show-password">Mostrar senha</label>
        </div>
        <a href="#" class="login__link">Esqueceu a senha?</a>
      </div>
      <button type="submit" class="login__button" onclick="mostrarSenha()">Entrar</button>
    </form>
  </div>

  <img src="assets/logo.png" alt="Imagem" class="imagem-logo">
  <script src="./login.js"></script>
</body>

</html>