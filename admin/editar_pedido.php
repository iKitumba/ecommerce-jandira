<?php
require("./actions/connection.php");
if (isset($_GET["id_pedido"])) {
  $id_pedido = $_GET["id_pedido"];
  $query = $connection->prepare("SELECT p.*, c.nome_cliente, c.telefone_cliente FROM pedidos p JOIN clientes c ON p.cliente_id = c.id_cliente WHERE p.id_pedido = ?");
  $query2 = $connection->prepare("SELECT pr.nome_produto, pr.preco_produto, ip.quantidade_item FROM itens_pedido ip JOIN produtos pr ON ip.produto_id = pr.id_produto WHERE ip.pedido_id = ?");

  $query->execute(array($id_pedido));
  $query2->execute(array($id_pedido));
  if ($query->rowCount()) {

    $pedido = $query->fetchAll(PDO::FETCH_ASSOC)[0];
    $itens_pedido = $query2->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo "<script>alert('Pedido não encontrado!')</script>";
    echo "<script>window.location = './pedidos.php'</script>";
  }
} else {
  echo "<script>window.location = './pedidos.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="theme-color" content="#000000" />


  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Atelier Dyanne</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- endinject -->
  <link rel="shortcut icon" href="images/2.svg" />
</head>

<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <?php
    require_once("./partials/_navbar.php");
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php
      require_once("./partials/_sidebar.php");
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Pedidos</h4>
                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editar pedido</h4>
                  <form class="forms-sample" action="./actions/editar_pedido.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Cliente</label>
                      <input type="hidden" name="id_pedido" value="<?php echo $id_pedido; ?>" class="form-control">
                      <input type="text" readonly value="<?php echo $pedido["nome_cliente"] ?>" class="form-control" disabled id="exampleInputUsername1" placeholder="Nome completo">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Telefone</label>
                      <input type="text" readonly value="<?php echo $pedido["telefone_cliente"] ?>" class="form-control" disabled id="exampleInputUsername1" placeholder="Número de telefone">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Data</label>
                      <input type="text" readonly value="<?php
                                                          $dataFormatada = date("d/m/Y", strtotime($pedido["data_pedido"]));
                                                          echo $dataFormatada;
                                                          ?>" class="form-control" id="exampleInputEmail1" disabled placeholder="Data do pedido">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Endereço de entrega</label>
                      <input type="text" required name="endereco_entrega" value="<?php echo $pedido["endereco_entrega"] ?>" class="form-control" id="exampleInputPassword1" placeholder="Digite o endereço">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Estado</label>
                      <select name="estado_pedido" value="<?php echo $pedido["estado_pedido"] ?>" class="form-control" id="exampleFormControlSelect2">
                        <option value="PAGO">Pago</option>
                        <option value="A_CAMINHO">A caminho</option>
                        <option value="ENTREGUE">Entregue</option>
                        <option value="CANCELADO">Cancelado</option>
                      </select>
                    </div>

                    <button style="background-color: #cca152; border: none;" type="submit" class="btn btn-primary me-2">Editar</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Produtos do pedido</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Produto</th>
                          <th>Valor</th>
                          <th>Quantidade</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        for ($i = 0; $i < sizeof($itens_pedido); $i++) :
                          $actualItem = $itens_pedido[$i];
                        ?>
                          <tr>
                            <td><?php echo $actualItem["nome_produto"] ?></td>
                            <td>$ <?php echo $actualItem["preco_produto"] ?></td>
                            <td><?php echo $actualItem["quantidade_item"] ?></td>
                            <td><?php echo "$ " . $actualItem["quantidade_item"] * $actualItem["preco_produto"] ?></td>
                          </tr>
                        <?php endfor; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->

      <!-- plugins:js -->
      <script src="vendors/base/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <script src="vendors/chart.js/Chart.min.js"></script>
      <script src="js/jquery.cookie.js" type="text/javascript"></script>
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="js/off-canvas.js"></script>
      <script src="js/hoverable-collapse.js"></script>
      <script src="js/template.js"></script>
      <script src="js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="js/dashboard.js"></script>
      <!-- End custom js for this page-->
</body>

</html>