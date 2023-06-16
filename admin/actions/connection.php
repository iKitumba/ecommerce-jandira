<?php
$server = "127.0.0.1";
$user = "root";
$password = "";
$database = "ecommerce";

try {

  $connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
  echo "Ocorreu um erro de conexão: {$error->getMessage()}";
  $connection = null;
}
