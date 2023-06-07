<?php
require("./admin/actions/connection.php");
require("./operacoes_carrinho.php");
  if(isset($_GET["id_produto"])){
    $id_produto = $_GET["id_produto"];
    removerDoCarrinho($id_produto);
    
    echo "<script>window.location = './carrinho.php' </script>";
    echo "<script>alert('Produto removido do carrinho')</script>";
  } else {
    echo "<script>window.location = './index.php' </script>";
  }
?>