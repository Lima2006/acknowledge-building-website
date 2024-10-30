<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "ackbuilding";

$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
} else {
  // echo "Conexão Efetuada com Sucesso!!!"; 
}
