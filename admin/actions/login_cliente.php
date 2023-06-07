<?php
require("connection.php");
if (isset($_POST["telefone_cliente"]) && isset($_POST["senha_cliente"]) && $connection !== null) {
  $telefone_cliente = $_POST["telefone_cliente"];
  $senha_cliente = $_POST["senha_cliente"];

  $query = $connection->prepare("SELECT * FROM clientes WHERE telefone_cliente = ? AND senha_cliente = ?");
  $hash =  md5($senha_cliente);
  $query->execute(array($telefone_cliente, $hash));

  if ($query->rowCount()) {
    $cliente = $query->fetchAll(PDO::FETCH_ASSOC)[0];

    session_start();
    $_SESSION["cliente"] = array($cliente["id_cliente"], $cliente["nome_cliente"], $cliente["telefone_cliente"], $cliente["email_cliente"], $cliente["endereco_cliente"]);
    
    echo "<script>window.location = '../../index.php'</script>";
  } else {
    echo "<script>window.location = '../../login.php'</script>";
  }
} else {
  echo "<script>window.location = '../../login.php'</script>";
}
?>
