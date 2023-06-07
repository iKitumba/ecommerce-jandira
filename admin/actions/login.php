<?php
require("connection.php");

if (isset($_POST["nome_usuario"]) && isset($_POST["senha"]) && $connection !== null) {
  $nome_usuario = $_POST["nome_usuario"];
  $senha = $_POST["senha"];
  $query = $connection->prepare("SELECT * FROM acessos WHERE nome_usuario = ? AND senha = ?");
  $hash =  md5($senha);
  $query->execute(array($nome_usuario, $hash));

  if ($query->rowCount()) {
    $usuario = $query->fetchAll(PDO::FETCH_ASSOC)[0];

    session_start();
    $_SESSION["usuario"] = array($usuario["id_acesso"], $usuario["nome_usuario"], $usuario["tipo_acesso"], $usuario["funcionario_id"]);
    echo "<script>window.location = '../index.php'</script>";
  } else {
    echo "<script>window.location = '../login.php'</script>";
  }
} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>