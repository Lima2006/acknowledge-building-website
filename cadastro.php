<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Acknowledge Building</title>
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="cadastro.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
</head>
<body>
    <div class="background">
    <div class="cadastro">
        <div>
            <div>
                Nome
            </div>
            <input type="text" name="nome" >
        </div>
        <div>
            <div>
                Sexo
            </div>
            <select name="sexo" id="sexo">
                <option value="0">Selecionar sexo</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            <input id="data_nasc" type="date" name="data_nasc" required />
        </div>
        <div>
            <div>
                Email
            </div>
            <input type="text" name="email" >
        </div>
        <div>
            <div>
                Senha
            </div>
            <input type="text" name="senha" >
        </div>
        <div>
            <div>
                Confirmar Senha
            </div>
            <input type="text" name="confirmar_senha" >
        </div>
        <div>
        <button id="send" type="submit" class="cadastro__button">Próxima Estapa</button>
        </div>
    </div>
    <img src="assets/logo.png" alt="Imagem" class="imagem-logo">
</body>
</html>