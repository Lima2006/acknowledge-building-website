<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['user']["id"])) {
  header("Location: login.php");
  die();
}