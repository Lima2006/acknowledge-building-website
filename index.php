<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Início - Acnowledge Building</title>
  <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">
</head>
<body>
  <?php
    include "./connection.php";
    $result = $conn->query("SELECT * FROM usuario WHERE nome LIKE \"João%\";");
    $row = $result->fetch_assoc();
    print_r($row);
  ?>
  
</body>
</html>