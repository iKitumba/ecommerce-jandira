<?php
  $server = "mysql-kitumba.alwaysdata.net";
  $user = "kitumba";
  $password = "legends132004";
  $database = "kitumba_dyanne";

  try {
    
  $connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $error) {
    echo "Ocorreu um erro de conexão: {$error->getMessage()}";
    $connection = null;
  }
