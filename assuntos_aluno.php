<?php
    include "protect.php";
    include "connection.php";
    
    $user_id = $_SESSION ['usuario'] ['id'];

    $sql = "SELECT ma.*, t.nome AS nome_turma FROM material ma INNER JOIN turma t ON t.assunto_id = ma.assunto_id INNER JOIN  matricula m ON t.id = m.turma_id INNER JOIN  usuario u ON m.id = u.id WHERE  u.id = $user_id";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprenda Teclado do Zero</title>
    <link rel="stylesheet" href="assuntos_aluno.css">
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
        <?php
            include "components/sidebar.php";
            $render();
        ?>
        
        <main class="content">
            <h2>Seus Assuntos</h2>
            <h3>
                <?php
                    
                    if ($result->num_rows > 0) {
                    
                        $turma = $result->fetch_assoc();
                        echo htmlspecialchars($turma['nome_turma']);
                    } else {
                        echo "Nenhuma turma encontrada.";
                    }
                ?>
            </h3>

            <div class="cards">
                <?php
                    
                    if ($result->num_rows > 0) {
                    
                        $result->data_seek(0);

                        while ($row = $result->fetch_assoc()) {
                            echo '<a href="detalhes.php?id=' . $row["assunto_id"] . '" class="card">';
                            echo '<h4>' . htmlspecialchars($row["nome"]) . '</h4>';
                            echo '<p>Descrição: ' . htmlspecialchars($row["descricao"]) . '</p>';
                            echo '<p>Data: ' . htmlspecialchars($row["data_postagem"]) . '</p>';
                            echo '</a>';
                        }
                    } else {
                        echo '<p>Nenhum assunto encontrado.</p>';
                    }
                ?>
            </div>
        </main>

    </div>            

    <footer>

    </footer>
</body>
</html>
