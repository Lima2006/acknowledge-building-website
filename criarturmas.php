<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Turma - Acknowledge Building</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="criarturmas.css"> <!-- Link para o CSS -->
</head>
<body>
<?php
include 'connection.php';

$sql = "SELECT id, nome FROM assunto";
$result = $conn->query($sql);
?>
<div class="form-container">
    <form method="get" action="">
        <div class="form-group">
            <label for="nome_da_turma">Nome da turma *</label>
            <input type="text" name="nome_da_turma" class="input-field">
        </div>
        <div class="form-group">
            <label for="assuntos">Assunto *</label>
            <select name="assunto" id="assunto" class="input-field">
                <option value="0">Selecionar Assunto</option>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhum nome encontrado</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Descricao">Descrição</label>
            <textarea name="descricao" class="input-field"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="criar" value="Criar" class="submit-button">
        </div>
    </form>
</div>
</body>
</html>
