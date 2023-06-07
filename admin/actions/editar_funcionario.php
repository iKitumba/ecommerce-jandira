<?php
session_start();
require(__DIR__ . "/connection.php");


if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_POST["nome_funcionario"]) && isset($_POST["telefone_funcionario"]) && isset($_POST["email_funcionario"]) && isset($_POST["salario_funcionario"]) && isset($_POST["endereco_funcionario"]) && isset($_POST["cargo_id"]) && isset($_POST["id_funcionario"])) {
  $usuario_id = $_SESSION["usuario"][0];
  $nome_usuario = $_SESSION["usuario"][1];
  $tipo_acesso = $_SESSION["tipo_acesso"][2];
  $nome_funcionario = $_POST["nome_funcionario"];
  $telefone_funcionario = $_POST["telefone_funcionario"];
  $email_funcionario = $_POST["email_funcionario"];
  $endereco_funcionario = $_POST["endereco_funcionario"];
  $salario_funcionario = $_POST["salario_funcionario"];
  $cargo_id = $_POST["cargo_id"];
  $id_funcionario = $_POST["id_funcionario"];

  
  if($tipo_acesso !== "ADMIN"){
    echo "<script>window.location = '../login.php'</script>";
  }

  try {
    //code...
    $query = $connection->prepare("UPDATE funcionarios SET nome_funcionario = ?, telefone_funcionario = ?, email_funcionario = ?, endereco_funcionario = ?, salario_funcionario = ?, cargo_id = ? WHERE id_funcionario = ?");
    $query->execute(array($nome_funcionario, $telefone_funcionario, $email_funcionario, $endereco_funcionario, $salario_funcionario, $cargo_id, $id_funcionario));
    echo "<script>alert('Funcionario Editado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante a edição do funcionario')</script>";
  }

  echo "<script>window.location = '../funcionarios.php'</script>";  

} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>