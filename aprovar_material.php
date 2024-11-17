<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['material_id'], $_POST['action'])) {
    $material_id = intval($_POST['material_id']);
    $action = $_POST['action'];

    // Define a consulta SQL com base na ação recebida
    if ($action === 'aprovar') {
        $sql = "UPDATE material SET aprovado = 1 WHERE id = ?";
    } elseif ($action === 'proibir') {
        $sql = "UPDATE material SET proibido = 1 WHERE id = ?";
    } elseif ($action === 'permitir') {
        $sql = "UPDATE material SET proibido = 0 WHERE id = ?";
    } else {
        header("Location: gerenciar_materiais.php?error=Ação inválida.");
        exit();
    }

    // Prepara e executa a consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $material_id);

    if ($stmt->execute()) {
        header("Location: gerenciar_materiais.php?success=Ação realizada com sucesso!");
    } else {
        header("Location: gerenciar_materiais.php?error=Erro ao realizar a ação.");
    }
    $stmt->close();
}
$conn->close();
?>
