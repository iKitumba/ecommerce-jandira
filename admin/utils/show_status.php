<?php
  function show_status($status_pedido){
    switch ($status_pedido) {
      case 'CANCELADO':
        echo "<p class='text-danger'>Cancelado</p>";
        break;
      
      case 'A_CAMINHO':
        echo "<p class='text-warning'>A caminho</p>";
        break;
      
      case 'ENTREGUE':
        echo "<p class='text-success'>Entregue</p>";
        break;
      
      default:
        echo "<p class='text-primary'>Pago</p>";
        break;
    }
  }
?>