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
                // Consulta SQL para buscar os materiais
                $sql = "
                    SELECT 
                        m.id, 
                        m.nome AS material_nome, 
                        m.descricao, 
                        m.data_postagem, 
                        m.aprovado,
                        u.nome AS professor_nome 
                    FROM 
                        material m 
                    INNER JOIN 
                        usuario u ON m.professor_id = u.id 
                    WHERE 
                        u.tipo_professor = 1;
                ";
                $result = $conn->query($sql);

                // Verifica se há resultados e exibe os materiais
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
                                    Status:<?php echo $row['aprovado'] ? "Aprovado" : "Pendente"; ?>
                                </p>
                                <?php if (!$row['aprovado']) { ?>
                                    <form action="aprovar_material.php" method="POST">
                                        <input type="hidden" name="material_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="action" value="aprovar">Aprovar</button>
                                    </form>
                                <?php } ?>
                                <?php if ($row['aprovado']) { ?>
                                    <form action="aprovar_material.php" method="POST">
                                        <input type="hidden" name="material_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="action" value="invalidar">Invalidar</button>
                                    </form>
                                <?php } ?>
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
    <footer class="footer">
        <div class="footer-left">
            <p>Copyright Arquitetos do Conhecimento 2024</p>
        </div>
        <div class="footer-right">
            <h4>Acessibilidade</h4>
            <div class="accessibility">
                <span class="zoom-icon">🔍</span>
                <span class="zoom-text">Aumentar Fonte</span>
            </div>
        </div>
</footer>
</body>
</html>
