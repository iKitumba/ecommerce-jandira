<?php
session_start();
require(__DIR__ . "/connection.php");


if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_POST["nome_usuario"]) && isset($_POST["senha"]) && isset($_POST["tipo_acesso"]) && isset($_POST["funcionario_id"])) {
  $usuario_id = $_SESSION["usuario"][0];
  $nome_usuario = $_SESSION["usuario"][1];
  $tipo_acesso = $_SESSION["usuario"][2];
  $nome_usuario_cadastrar = $_POST["nome_usuario"];
  $senha = $_POST["senha"];
  $tipo_acesso_cadastrar = $_POST["tipo_acesso"];
  $funcionario_id = $_POST["funcionario_id"];

  if($tipo_acesso !== "ADMIN"){
    echo "<script>window.location = '../login.php'</script>";
  }

  try {
    //code...
    $query = $connection->prepare("INSERT INTO acessos(nome_usuario, senha, tipo_acesso, funcionario_id) VALUES(?,?,?,?)");
    $query->execute(array($nome_usuario_cadastrar, md5($senha), $tipo_acesso_cadastrar, $funcionario_id));
    echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante o cadastro do usuário')</script>";
  }

  echo "<script>window.location = '../usuarios.php'</script>";

} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>