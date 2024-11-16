<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="senha.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
    <style>
        body {
            background-image: url('assets/background-image.webp');
            background-size: 100% auto;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Recuperar Senha</h2>
            <p>Informe o endereço que deseja recuperar e enviaremos um email com as instruções de recuperação</p>
            <form id="recuperarSenhaForm" action="#" method="post">
                <input type="email" id="email" placeholder="Email" required>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <img src="assets/logo.png" alt="Imagem" class="imagem-logo">

    <script>
        // Adiciona um ouvinte de evento para o envio do formulário
        document.getElementById('recuperarSenhaForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita o envio imediato do formulário

            // Captura o valor do campo de email
            var email = document.getElementById('email').value;

            // Verifica se o email está no formato correto (validação simples)
            if (email === "") {
                alert("Por favor, insira um endereço de email.");
                return; // Impede o envio do formulário se o email estiver vazio
            }

            // Se a validação passar, redireciona para a página login.php
            window.location.href = 'login.php';
        });
    </script>
</body>
</html>
