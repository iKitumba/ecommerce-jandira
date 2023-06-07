<?php
require(__DIR__ . "/admin/actions/connection.php");
require("./operacoes_carrinho.php");
  $carrinho = $_SESSION["carrinho"];
  $cliente_id = $_SESSION["cliente"][0];

  if(sizeof($carrinho) < 1){
    echo "<script>window.location = './index.php'</script>";
  } else {
    $query1 = $connection->prepare("INSERT INTO pedidos(cliente_id) VALUES(?)");
    $query1->execute(array($cliente_id));
    if(isset($_SESSION["id_pedido"])){
      $id_pedido = $_SESSION["id_pedido"];
    } else {
      $id_pedido = $connection->lastInsertId();
      $_SESSION["id_pedido"] = $id_pedido;
    }

    $query2 = $connection->prepare("INSERT INTO itens_pedido(pedido_id, produto_id, quantidade_item) VALUES(?, ?, ?)");
    $query3 = $connection->prepare("UPDATE produtos SET quantidade_produto = ? WHERE id_produto = ?");
    $query4 = $connection->prepare("SELECT * FROM produtos WHERE id_produto = ?");

    foreach ($carrinho as $item) {
      $query2->execute(array($id_pedido, $item["produto"]["id_produto"], $item["quantidade_produto"]));
      $query4->execute(array($item["produto"]["id_produto"]));
      $quantidade_produto =$query4->fetchAll(PDO::FETCH_ASSOC)[0]["quantidade_produto"];
      $query3->execute(array(intval($quantidade_produto) - intval($item["quantidade_produto"]), $item["produto"]["id_produto"]));
      $total_pago = calcularTotal();
      removerDoCarrinho($item["produto"]["id_produto"]);
    }
    $query5 = $connection->prepare("UPDATE pedidos SET valor_total = ? WHERE id_pedido = ?");
    $query5->execute(array($total_pago, $id_pedido));
    
    echo "<script>alert('Pedido realizado com sucesso!')</script>";
    echo "<script>window.location = './index.php'</script>";
  }
?>