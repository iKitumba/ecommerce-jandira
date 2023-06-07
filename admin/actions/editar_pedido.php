<?php
session_start();
require(__DIR__ . "/connection.php");


if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"]) && isset($_POST["endereco_entrega"]) && isset($_POST["estado_pedido"]) && isset($_POST["id_pedido"])) {
  $usuario_id = $_SESSION["usuario"][0];
  $funcionario_id = $_SESSION["usuario"][3];
  $endereco_entrega = $_POST["endereco_entrega"];
  $estado_pedido = $_POST["estado_pedido"];
  $id_pedido = $_POST["id_pedido"];

  try {
    //code...
    $query = $connection->prepare("UPDATE pedidos SET endereco_entrega = ?, estado_pedido = ?, funcionario_id = ? WHERE id_pedido = ?");
    $query->execute(array($endereco_entrega, $estado_pedido, $funcionario_id, $id_pedido));
    echo "<script>alert('Pedido Editado com sucesso!')</script>";
  } catch (\Throwable $th) {
    echo "<script>alert('Houve um erro durante a edição do produto')</script>";
  }

  echo "<script>window.location = '../pedidos.php'</script>";  

} else {
  echo "<script>window.location = '../login.php'</script>";
}
?>