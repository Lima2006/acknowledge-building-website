<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['usuario']["id"])) {
  header("Location: login.php");
  die();
}