<?php
session_start();
require(__DIR__ . "/connection.php");


if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_GET["acesso_id"])) {
  $tipo_acesso = $_SESSION["usuario"][2];
  $acesso_id = $_GET["acesso_id"];

  if($tipo_acesso !== "ADMIN"){
    echo "<script>window.location = '../login.php'</script>";
  }

  try {
    //code...
    $query = $connection->prepare("DELETE FROM acessos WHERE id_acesso = ?");
    $query->execute(array($acesso_id));
    echo "<script>alert('Acesso Eliminado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante a eliminação do acesso')</script>";
  }

  echo "<script>window.location = '../usuarios.php'</script>";  

} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>