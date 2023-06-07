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

  $fileName = $_FILES["foto_produto"]["name"];
  $actualPath = $_FILES["foto_produto"]["tmp_name"];
  $ext = explode(".", $fileName)[sizeof(explode(".", $fileName)) - 1];
  $nameToSave = bin2hex(random_bytes(16)).".".$ext;
  $destPath = "../fotos_produtos/".$nameToSave;

if(move_uploaded_file($actualPath, $destPath)) {
  try {
    //code...
    $query = $connection->prepare("INSERT INTO produtos(nome_produto, quantidade_produto, preco_produto, categoria_id, foto_produto, descricao_produto) VALUES(?,?,?,?,?, ?)");
    $query->execute(array($nome_produto, $quantidade_produto, $preco_produto, $categoria_id, $nameToSave, $descricao_produto));
    echo "<script>alert('Produto cadastrado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante o cadastro do produto')</script>";
  }

  echo "<script>window.location = '../produtos.php?categoria_id=$categoria_id'</script>";  
  } 

} else {
  echo "<script>window.location = './login.php'</script>";
}
?>