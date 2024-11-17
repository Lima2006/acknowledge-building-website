<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desempenho Acadêmico</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="desempenho.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Desempenho Acadêmico</h1>
            <div class="chart-container">
                <canvas id="desempenhoChart" width="700" height="300"></canvas>
            </div>
            <div class="footer">
                <div class="copyright">
                    Copyright Arquitetos do Conhecimento 2024
                </div>
            </div>
        </div>
    </div>

<?php
include 'connection.php';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se o ID do aluno foi passado
    if (!isset($_GET['aluno_id'])) {
        die("<p>ID do aluno não foi fornecido!</p>");
    }

    $aluno_id = (int)$_GET['aluno_id'];

    // Buscar dados de desempenho do aluno
    $stmt = $pdo->prepare("
        SELECT a.nome AS materia, IFNULL(n.valor, 0) AS nota
        FROM assunto a
        LEFT JOIN notas n ON n.assunto_id = a.id
        WHERE n.aluno_id = :aluno_id
    ");
    $stmt->bindParam(':aluno_id', $aluno_id, PDO::PARAM_INT);
    $stmt->execute();

    $materias = [];
    $notas = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $materias[] = $row['materia'];
        $notas[] = $row['nota'];
    }

    // Verificar se há dados
    if (empty($materias) || empty($notas)) {
        echo "<p>Não há dados de desempenho para o aluno com ID {$aluno_id}.</p>";
        exit;
    }

    // Passar os dados para o JavaScript
    echo "<script>
            var materias = " . json_encode($materias) . ";
            var notas = " . json_encode($notas) . ";
    
            var ctx = document.getElementById('desempenhoChart').getContext('2d');
            var desempenhoChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: materias,
                    datasets: [{
                        label: 'Desempenho Acadêmico',
                        data: notas,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });
          </script>";
} catch (PDOException $e) {
    echo "<p>Erro na conexão: " . $e->getMessage() . "</p>";
}
?>
</body>
</html>
