<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desempenho Acadêmico do Aluno</title>
    <link rel="stylesheet" href="desempenho.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Desempenho de João da Silva</h1>
            <div class="chart-container">
                <img src="?mostrar_grafico=1" alt="Gráfico de Desempenho Acadêmico">
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
        </div>
    </div>

    <script>
        function aumentarFonte() {
            const elements = document.querySelectorAll('body, .container, .sidebar, .content');
            elements.forEach(element => {
                const currentFontSize = window.getComputedStyle(element).fontSize;
                const newFontSize = parseFloat(currentFontSize) + 2 + "px";
                element.style.fontSize = newFontSize;
            });
        }
    </script>
</body>
</html>

<?php
if (isset($_GET['mostrar_grafico'])) {
    require_once("pChart/class/pData.class.php");
    require_once("pChart/class/pDraw.class.php");
    require_once("pChart/class/pImage.class.php");

    $desempenho = [75, 85, 90, 60, 80, 95];
    $materias = ["Matemática", "Português", "História", "Geografia", "Ciências", "Inglês"];

    $dados = new pData();
    $dados->addPoints($desempenho, "Desempenho");
    $dados->setAxisName(0, "Nota");
    $dados->addPoints($materias, "Materias");
    $dados->setSerieDescription("Materias", "Matérias");
    $dados->setAbscissa("Materias");

    $imagem = new pImage(700, 300, $dados);
    $imagem->setFontProperties(array("FontName" => "pChart/fonts/verdana.ttf", "FontSize" => 10));
    $imagem->setGraphArea(50, 30, 650, 250);
    $imagem->drawScale(array("DrawSubTicks" => true));
    $imagem->drawBarChart(array("DisplayValues" => true, "Rounded" => true, "Surrounding" => -30));

    header("Content-Type: image/png");
    $imagem->Stroke();
    exit;
}
?>
