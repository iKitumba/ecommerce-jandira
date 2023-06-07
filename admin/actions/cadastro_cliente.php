<?php
session_start();
require(__DIR__ . "/connection.php");


if ($connection && isset($_POST["nome_cliente"]) && isset($_POST["telefone_cliente"]) && isset($_POST["email_cliente"]) && isset($_POST["endereco_cliente"]) && isset($_POST["senha_cliente"])) {
  $nome_cliente = $_POST["nome_cliente"];
  $email_cliente = $_POST["email_cliente"];
  $telefone_cliente = $_POST["telefone_cliente"];
  $endereco_cliente = $_POST["endereco_cliente"];
  $senha_cliente = $_POST["senha_cliente"];

  try {
    //code...
    $query = $connection->prepare("INSERT INTO clientes(nome_cliente, telefone_cliente, email_cliente, endereco_cliente, senha_cliente) VALUES(?,?,?,?,?)");
    $query2 = $connection->prepare("SELECT * FROM clientes WHERE nome_cliente = ? AND telefone_cliente = ? AND email_cliente = ?");
    $query->execute(array($nome_cliente, $telefone_cliente, $email_cliente, $endereco_cliente, md5($senha_cliente)));

    $query2->execute(array($nome_cliente, $telefone_cliente, $email_cliente));
    $cliente = $query2->fetchAll(PDO::FETCH_ASSOC)[0];
    session_start();

    $_SESSION["cliente"] = array($cliente["id_cliente"], $cliente["nome_cliente"], $cliente["telefone_cliente"], $cliente["email_cliente"], $cliente["endereco_cliente"]);
    
    echo "<script>window.location = '../../index.php'</script>";
    echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
  } catch (\Throwable $th) {
    // print_r($th);
    echo "<script>alert('Houve um erro durante o seu cadastro')</script>";
    echo "<script>window.location = '../../cadastro.php'</script>";
  }

} else {
  echo "<script>window.location = '../../cadastro.php'</script>";
}
?>