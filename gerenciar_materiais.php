<?php
    include "protect.php";
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Materiais</title>
    <link rel="stylesheet" href="gerenciar_materiais.css">
</head>
<body>
    <div class="container">
        <?php include "components/sidebar.php"; 
        $render(); ?>

        <main class="main-content">
            <header>
                <h1>Gerenciar Materiais</h1>
            </header>
            <div class="cards">
                <?php
                $sql = "
                    SELECT 
                        m.id, 
                        m.nome AS material_nome, 
                        m.descricao, 
                        m.data_postagem, 
                        m.aprovado, 
                        m.proibido, 
                        u.nome AS professor_nome 
                    FROM 
                        material m 
                    INNER JOIN 
                        usuario u ON m.professor_id = u.id 
                    WHERE 
                        u.tipo_professor = 1;
                ";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="card">
                            <div class="card-img"></div>
                            <div class="card-info">
                                <h2><?php echo htmlspecialchars($row['material_nome']); ?></h2>
                                <p>
                                    <?php echo htmlspecialchars($row['descricao']); ?><br>
                                    Professor: <?php echo htmlspecialchars($row['professor_nome']); ?><br>
                                    Postado em: <?php echo htmlspecialchars($row['data_postagem']); ?><br>
                                    Status: 
                                    <?php 
                                    if ($row['proibido']) {
                                        echo "Proibido";
                                    } elseif ($row['aprovado']) {
                                        echo "Aprovado";
                                    } else {
                                        echo "Pendente";
                                    }
                                    ?>
                                </p>
                                <!-- Botão de Aprovar -->
                                <?php if (!$row['proibido'] && !$row['aprovado']) { ?>
                                    <form action="aprovar_material.php" method="POST">
                                        <input type="hidden" name="material_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="action" value="aprovar">Aprovar</button>
                                    </form>
                                <?php } ?>
                                <!-- Botão de Proibir/Permitir -->
                                <form action="aprovar_material.php" method="POST">
                                    <input type="hidden" name="material_id" value="<?php echo $row['id']; ?>">
                                    <?php if ($row['proibido']) { ?>
                                        <button type="submit" name="action" value="permitir">Permitir</button>
                                    <?php } else { ?>
                                        <button type="submit" name="action" value="proibir">Proibir</button>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>Nenhum material encontrado.</p>";
                }
                ?>
            </div>

        </main>
    </div>
    <footer>
        <p>Copyright Arquitetos do Conhecimento 2024</p>
        <div class="accessibility">
            <a href="#">Aumentar Fonte</a>
        </div>
    </footer>
    <img src="assets/logo.png" alt="Imagem" class="imagem-logo">
</body>
</html>
