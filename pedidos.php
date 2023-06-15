<!DOCTYPE html>
<html>

<head>
  <title>Carrinho</title>
  <link rel="shortcut icon" type="image/x-icon" href="./img/2.svg" />

  <!-- <link rel="stylesheet" href="carrinho.css"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

  <link href="assets/css/theme.css" rel="stylesheet" />
</head>

<body>
  <!-- barra de navegação -->
  <?php
  require_once("./partials/_navbar.php");
  ?>
  <?php
  require("./admin/utils/show_status.php");
  require("./admin/actions/connection.php");
  if (!isset($_SESSION["cliente"])) {
    echo "<script>window.location = './index.php' </script>";
  } else {
    $cliente_id = $_SESSION["cliente"][0];
    $query1 = $connection->prepare("SELECT * FROM pedidos WHERE cliente_id = ?");
    $query2 = $connection->prepare("SELECT pr.nome_produto, pr.foto_produto, pr.preco_produto, ip.quantidade_item FROM itens_pedido ip JOIN produtos pr ON ip.produto_id = pr.id_produto WHERE ip.pedido_id = ?");
    $query1->execute(array($cliente_id));

    if ($query1->rowCount()) {
      $pedidos = $query1->fetchAll(PDO::FETCH_ASSOC);
      $pedidos_ordenados = array();

      foreach ($pedidos as $pedido) {
        $query2->execute(array($pedido["id_pedido"]));
        if ($query2->rowCount()) {

          $items = $query2->fetchAll(PDO::FETCH_ASSOC)[0];
          $items["estado_pedido"] = $pedido["estado_pedido"];
          array_push($pedidos_ordenados, $items);
        }
        // print_r($query2->fetchAll(PDO::FETCH_ASSOC));
      }
    } else {
      $pedidos_ordenados = array();
    }
  }

  ?>

  <!-- /barra de navegação -->

  <!-- Carrinho -->
  <div class="container mt-5 mb-5">
    <h2 class="texto1 text-center mb-2">
      <i class="fa fa-shopping-basket" style="color: #cca152;"></i> Seus pedidos
    </h2>
    <table class="table">
      <thead>
        <tr class="linha1">
          <th scope="col">Foto</th>
          <th scope="col">Produto</th>
          <th scope="col">Preço</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Total</th>
          <th scope="col">Estado</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($pedidos_ordenados as $pedido) :
          // print_r($pedidos_ordenados);
        ?>
          <tr class="linha">
            <td class="produto" style="display: flex; flex-direction: column;">
              <img src="./admin/fotos_produtos/<?php echo $pedido["foto_produto"] ?>" style="width: 70px; height: 70px; object-fit: cover; border-radius: 4px" alt="">

            </td>
            <td>
              <strong>
                <?php echo $pedido["nome_produto"] ?>
              </strong>
            </td>
            <td>
              <?php echo $pedido["preco_produto"] ?>
            </td>
            <td>
              <?php echo $pedido["quantidade_item"] ?>
            </td>
            <td>
              $ <?php echo $pedido["quantidade_item"] * $pedido["preco_produto"]; ?>
            </td>
            <td>
              <?php show_status($pedido["estado_pedido"]); ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <!-- sugestões -->
    <h4 class="text-center my-5">
      <a class=" text-danger" style="font-size: 1rem;" href="./logout.php">
        Terminar sessão
      </a>
    </h4>
  </div>

  <?php
  require_once("./partials/_footer.php")
  ?>

  <script src="vendors/@popperjs/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/feather-icons/feather.min.js"></script>
  <script>
    feather.replace();
  </script>
  <script src="assets/js/theme.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
</body>

</html>