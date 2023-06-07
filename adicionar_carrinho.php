<?php
require("./admin/actions/connection.php");
require("./operacoes_carrinho.php");
  if(isset($_GET["id_produto"])){
    $id_produto = $_GET["id_produto"];
    $query = $connection->prepare("SELECT * FROM produtos WHERE id_produto = ?");
    $query->execute(array($id_produto));

    if($query->rowCount()){
      $produto = $query->fetchAll(PDO::FETCH_ASSOC)[0];
      adicionarAoCarrinho($produto, 1, $produto["preco_produto"]);
      echo "<script>alert('Produto adicionado ao carrinho');</script>";
      echo "<script>window.location = './carrinho.php' </script>";
    } else {
      echo "<script>window.location = './index.php' </script>";
    }
  } else {
    echo "<script>window.location = './index.php' </script>";
  }
?>