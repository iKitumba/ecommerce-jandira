<?php
session_start();
require(__DIR__ . "/connection.php");


if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_POST["nome_produto"]) && isset($_POST["quantidade_produto"]) && isset($_POST["preco_produto"]) && isset($_POST["categoria_id"]) && isset($_POST["descricao_produto"])) {
  $usuario_id = $_SESSION["usuario"][0];
  $nome_usuario = $_SESSION["usuario"][1];
  $nome_produto = $_POST["nome_produto"];
  $quantidade_produto = $_POST["quantidade_produto"];
  $preco_produto = $_POST["preco_produto"];
  $descricao_produto = $_POST["descricao_produto"];
  $categoria_id = $_POST["categoria_id"];
  $id_produto = $_POST["id_produto"];

  try {
    //code...
    $query = $connection->prepare("UPDATE produtos SET nome_produto = ?, quantidade_produto = ?, preco_produto = ?, categoria_id = ?, descricao_produto = ? WHERE id_produto = ?");
    $query->execute(array($nome_produto, $quantidade_produto, $preco_produto, $categoria_id, $descricao_produto, $id_produto));
    echo "<script>alert('Produto Editado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante a edição do produto')</script>";
  }

  echo "<script>window.location = '../produtos.php?categoria_id=$categoria_id'</script>";  

} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>