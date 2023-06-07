<?php
session_start();
require(__DIR__ . "/connection.php");

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_POST["nome_funcionario"]) && isset($_POST["telefone_funcionario"]) && isset($_POST["endereco_funcionario"]) && isset($_POST["salario_funcionario"]) && isset($_POST["cargo_id"])) {
  $usuario_id = $_SESSION["usuario"][0];
  $nome_usuario = $_SESSION["usuario"][1];
  $tipo_acesso = $_SESSION["usuario"][2];
  $nome_funcionario = $_POST["nome_funcionario"];
  $telefone_funcionario = $_POST["telefone_funcionario"];
  $email_funcionario = $_POST["email_funcionario"];
  $endereco_funcionario = $_POST["endereco_funcionario"];
  $salario_funcionario = $_POST["salario_funcionario"];
  $cargo_id = $_POST["cargo_id"];

  if($tipo_acesso !== "ADMIN"){
    echo "<script>window.location = '../login.php'</script>";
  }

  $fileName = $_FILES["foto_funcionario"]["name"];
  $actualPath = $_FILES["foto_funcionario"]["tmp_name"];
  $ext = explode(".", $fileName)[sizeof(explode(".", $fileName)) - 1];
  $nameToSave = bin2hex(random_bytes(16)).".".$ext;
  $destPath = "../fotos_funcionarios/".$nameToSave;

if(move_uploaded_file($actualPath, $destPath)) {
  try {
    //code...
    $query = $connection->prepare("INSERT INTO funcionarios(nome_funcionario, telefone_funcionario, email_funcionario, endereco_funcionario, salario_funcionario, cargo_id, foto_funcionario) VALUES(?,?,?,?,?,?,?)");
    $query->execute(array($nome_funcionario, $telefone_funcionario, $email_funcionario, $endereco_funcionario, $salario_funcionario, $cargo_id, $nameToSave));
    echo "<script>alert('Funcionario cadastrado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante o cadastro do funcionario')</script>";
  }

  echo "<script>window.location = '../funcionarios.php'</script>";  
  } 

} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>