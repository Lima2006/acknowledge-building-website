<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["id"])) {
  die ("<a href=\"login.php\">Entrar</a>");
}