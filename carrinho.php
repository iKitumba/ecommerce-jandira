<!DOCTYPE html>
<html>

<head>
  <title>Carrinho</title>
  <link rel="shortcut icon" href="atelier.ico" type="image/x-icon">

  <link rel="stylesheet" href="carrinho.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <!-- barra de navegação -->
  <?php
  require_once("./partials/_navbar.php");
  ?>
  <?php
  // require("./operacoes_carrinho.php");
  // if (!isset($_SESSION["carrinho"])) {
  //   session_start();
  // }

  if (isset($_SESSION["carrinho"])) {
    $carrinho = $_SESSION["carrinho"];
  } else {
    $carrinho = array();
  }

  $logado = isset($_SESSION["cliente"])
  ?>


  <!-- /barra de navegação -->


  <!-- Carrinho -->
  <div class="container mt-5">
    <h2 class="texto1"> <i class="fa fa-shopping-basket" style="color: #cca152;"></i> Seu Carrinho</h2>
    <table class="table">
      <thead>
        <tr class="linha1">
          <th scope="col">Produto</th>
          <th scope="col">Nome</th>
          <th scope="col">Preço</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Total</th>
          <th scope="col">Excluir</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($carrinho as $produto => $item) :
        ?>
          <tr class="linha">
            <td class="produto">
              <img src="./admin/fotos_produtos/<?php echo $item["produto"]["foto_produto"] ?>" style="width: 100px; height: 120px;" alt="">
            </td>
            <td>

              <strong>
                <?php echo $item["produto"]["nome_produto"]; ?>
              </strong>
            </td>
            <td>$ <?php echo $item["preco_produto"] ?></td>
            <td><?php echo $item["quantidade_produto"] ?></td>
            <td>$ <?php
                  $total = $item["preco_produto"] * $item["quantidade_produto"];
                  echo $total;
                  ?></td>
            <td>
              <a href="./remover_carrinho.php?id_produto=<?php echo $item["produto"]["id_produto"] ?>">
                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Excluir</button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="text-right">
      <h5>Total: $ <?php
                    $totalCar = calcularTotal();
                    echo $totalCar;
                    ?></h5>
    </div>
    <?php
    if ($totalCar && $logado) :
    ?>
      <div class="text-right">
        <button class="btn btn-primary" id="checkout">Finalizar Compra</button>
      </div>
    <?php endif ?>
  </div>
  <!-- sugestões -->



  </div>
  <script src="https://js.stripe.com/v3"></script>
  <script>
    const stripe = Stripe("pk_test_51NFrF5A31164qptK3Efi5highp7KvIEhmZgXFMYeEDBtWtiHntp6oBTfV4uYXFO9l0YorLLrAJeWbmFK0E6TJZkk005v47jhO2");
    const button = document.querySelector("#checkout");

    button?.addEventListener("click", () => {
      fetch('./checkout.php', {
          method: "POST",
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({})
        }).then(res => {
          console.log(res);
          return res.json()
        })
        .then(payload => {
          console.log(payload);
          stripe.redirectToCheckout({
            sessionId: payload.id
          })
        }).catch(console.log)
    })
  </script>


</body>

</html>