<?php
session_start();
require(__DIR__ . "/connection.php");


if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_POST["nome_cliente"]) && isset($_POST["telefone_cliente"]) && isset($_POST["email_cliente"]) && isset($_POST["endereco_cliente"]) && isset($_POST["id_cliente"])) {
  $nome_cliente = $_POST["nome_cliente"];
  $telefone_cliente = $_POST["telefone_cliente"];
  $email_cliente = $_POST["email_cliente"];
  $endereco_cliente = $_POST["endereco_cliente"];
  $id_cliente = $_POST["id_cliente"];

  try {
    //code...
    $query = $connection->prepare("UPDATE clientes SET nome_cliente = ?, telefone_cliente = ?, email_cliente = ?, endereco_cliente = ? WHERE id_cliente = ?");
    $query->execute(array($nome_cliente, $telefone_cliente, $email_cliente, $endereco_cliente,  $id_cliente));
    echo "<script>alert('Cliente Editado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante a edição do cliente')</script>";
  }

  echo "<script>window.location = '../clientes.php'</script>";  

} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>