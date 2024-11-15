<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Aluno</title>
    <link rel="stylesheet" href="info.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=account_circle" />
</head>
<body>
    <div class="header-title">Informações pessoais</div>
    <div class="container">
        <div class="main-content student-details">
            <div class="icone">
                <span class="material-symbols-outlined" style="font-size: 150px;">account_circle</span><br>
            </div>
            <h2 class="student-name">João da Silva</h2>
            <p class="student-info">Responsável</p><br>
            <p><span class="student-label">Matrícula</span><br> <span class="student-info">12930857923</span></p><br>
            <p><span class="student-label">Sexo</span><br> <span class="student-info">Masculino</span></p><br>
            <p><span class="student-label">Email</span><br> <span class="student-info">joao@email.com</span></p><br>
            <p><span class="student-label">Data de Nascimento</span><br> <span class="student-info">10/10/2000</span></p><br>
        </div>
    </div>

    <div class="footer">
        <div class="copyright">
            Copyright Arquitetos do Conhecimento 2024
        </div>
        <div class="accessibility">
            <button onclick="aumentarFonte()">
                <span style="font-size: 18px;">🔍</span> Aumentar Fonte
            </button>
        </div>
    </div>

    <script src="info.js"></script>
</body>
</html>
