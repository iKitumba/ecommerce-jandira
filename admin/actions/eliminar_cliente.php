<?php
session_start();
require(__DIR__ . "/connection.php");


if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_GET["cliente_id"])) {
  $tipo_acesso = $_SESSION["usuario"][2];
  $cliente_id = $_GET["cliente_id"];

  try {
    //code...
    $query = $connection->prepare("DELETE FROM clientes WHERE id_cliente = ?");
    $query->execute(array($cliente_id));
    echo "<script>alert('Cliente Eliminado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante a eliminação do cliente')</script>";
  }

  echo "<script>window.location = '../clientes.php'</script>";  

} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>