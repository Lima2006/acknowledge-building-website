<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Turma - Acknowledge Building</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
</head>
<body>
<?php
include 'connection.php';

$sql = "SELECT id, nome FROM assunto";
$result = $conn->query($sql);
?>
<form method="get" action="">
    <div>
        <div>
            <label for="nome_da_turma">Nome da turma *</label>
        </div>
        <input type="text" name="nome_da_turma">
    </div>
    <div>
        <div>
            <label for="assuntos">Assunto *</label>
        </div>
        <select name="assunto" id="assunto">
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
    <div>
    <div>
    <label for="Descricao">Descrição</label>
    </div>
    <input type="e-mail" name="descricao">
    </div>
    <input type="submit" name="criar" value="Criar">    
</form>
</body>
</html>