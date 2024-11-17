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
// Inclui o arquivo de conexão
include 'connection.php';

// Consulta assuntos disponíveis
$sql = "SELECT id, nome FROM assunto";
$result = $conn->query($sql);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_da_turma = $_POST['nome_da_turma'];
    $assunto_id = $_POST['assunto'];
    $descricao = $_POST['descricao'];
    $professor_id = 1; // ID de um professor já existente (pode ser dinâmico)

    // Validações simples
    if (empty($nome_da_turma) || empty($assunto_id) || $assunto_id == 0) {
        echo "<p style='color: red;'>Por favor, preencha todos os campos obrigatórios.</p>";
    } else {
        // Insere a nova turma na tabela `turma`
        $stmt = $conn->prepare("INSERT INTO turma (assunto_id, professor_id, nome, descricao) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $assunto_id, $professor_id, $nome_da_turma, $descricao);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Turma criada com sucesso!</p>";
        } else {
            echo "<p style='color: red;'>Erro ao criar a turma: " . $conn->error . "</p>";
        }

        $stmt->close();
    }
}
?>
<div class="form-container">
    <form method="post" action="">
        <div class="form-group">
            <label for="nome_da_turma">Nome da turma *</label>
            <input type="text" name="nome_da_turma" class="input-field">
        </div>
        <div class="form-group">
            <label for="assunto">Assunto *</label>
            <select name="assunto" id="assunto" class="input-field">
                <option value="0">Selecionar Assunto</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                    }
                } else {
                    echo "<option value=''>Nenhum assunto encontrado</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="input-field"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="criar" value="Criar" class="submit-button">
        </div>
    </form>
</div>
</body>
</html>
