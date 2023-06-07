<?php
session_start();
require(__DIR__ . "/connection.php");


if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_GET["id_produto"])) {
 
  $id_produto = $_GET["id_produto"];

  try {
    //code...
    $query = $connection->prepare("DELETE FROM produtos WHERE id_produto = ?");
    $query->execute(array($id_produto));
    echo "<script>alert('Produto Eliminado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante a eliminação do produto')</script>";
  }

  echo "<script>window.location = '../produtos.php'</script>";  

} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>