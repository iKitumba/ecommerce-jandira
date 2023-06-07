<?php
session_start();
require(__DIR__ . "/connection.php");


if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_GET["id_funcionario"])) {
  $tipo_acesso = $_SESSION["usuario"][2];
  $id_funcionario = $_GET["id_funcionario"];

    
  if($tipo_acesso !== "ADMIN"){
    echo "<script>window.location = '../login.php'</script>";
  }

  try {
    //code...
    $query = $connection->prepare("DELETE FROM funcionarios WHERE id_funcionario = ?");
    $query->execute(array($id_funcionario));
    echo "<script>alert('Funcionario Eliminado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante a eliminação do funcionario')</script>";
  }

  echo "<script>window.location = '../funcionarios.php'</script>";  

} else {
  echo "<script>window.location = './login.php'</script>";
}
?>