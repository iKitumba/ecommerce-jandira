<?php
require("./actions/connection.php");
require("./utils/show_status.php");
  $query1 = $connection->prepare("SELECT COUNT(*) FROM pedidos");
  $query2 = $connection->prepare("SELECT COUNT(*) FROM clientes");
  $query3 = $connection->prepare("SELECT COUNT(*) FROM produtos");
  $query4 = $connection->prepare("SELECT COUNT(*) FROM funcionarios");
  $query5 = $connection->prepare("SELECT pedidos.*, clientes.nome_cliente FROM pedidos JOIN clientes ON pedidos.cliente_id = clientes.id_cliente ORDER BY pedidos.data_pedido DESC LIMIT 5");
  $query1->execute();
  $query2->execute();
  $query3->execute();
  $query4->execute();
  $query5->execute();
  $n_pedidos = $query1->fetchAll(PDO::FETCH_ASSOC)[0]["COUNT(*)"];
  $n_clientes = $query2->fetchAll(PDO::FETCH_ASSOC)[0]["COUNT(*)"];
  $n_produtos = $query3->fetchAll(PDO::FETCH_ASSOC)[0]["COUNT(*)"];
  $n_funcionarios = $query4->fetchAll(PDO::FETCH_ASSOC)[0]["COUNT(*)"];
  $pedidos = $query5->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>RoyalUI Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
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
                    <h4 class="font-weight-bold mb-0">Dados gerais</h4>
                  </div>
                  <div>
                    <button
                      type="button"
                      onclick="imprimirRecibo()"
                      class="btn btn-primary btn-icon-text btn-rounded"
                    >
                      <i class="ti-clipboard btn-icon-prepend"></i>Relatório
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">
                      Pedidos 
                    </p>
                    <div
                      class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                    >
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                      <?php echo($n_pedidos); ?>
                      </h3>
                      <i
                        class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"
                      ></i>
                    </div>
                    <!-- <p class="mb-0 mt-2 text-danger">0.12% <span class="text-black ms-1"><small>(30 days)</small></span></p> -->
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">
                      Clientes
                    </p>
                    <div
                      class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                    >
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                      <?php echo($n_clientes); ?>
                      </h3>
                      <i
                        class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"
                      ></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">
                      Produtos
                    </p>
                    <div
                      class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                    >
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                      <?php echo($n_produtos); ?>
                      </h3>
                      <i
                        class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"
                      ></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">
                      Funcionarios
                    </p>
                    <div
                      class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                    >
                      <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                      <?php echo($n_funcionarios); ?>
                      </h3>
                      <i
                        class="ti-layers-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"
                      ></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Últimos pedidos</h4>
                  
                  <div class="table-responsive">
                  <table class="table table-striped" id="imprimir">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Cliente
                          </th>
                          <th>
                            Estado
                          </th>
                          <th>
                            Valor
                          </th>
                          <th>
                            Data
                          </th>
                          <th>
                            Editar
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          for($i = 0; $i < sizeof($pedidos); $i++):
                            $actualPedido = $pedidos[$i];
                            $dataFormatada = date("d/m/Y", strtotime($actualPedido["data_pedido"]));
                        ?>
                          <tr>
                          <td class="py-1">
                            #<?php echo $actualPedido["id_pedido"] ?>
                          </td>
                          <td class="py-1">
                          <?php echo $actualPedido["nome_cliente"] ?>
                          </td>
                          <td>
                          <?php show_status($actualPedido["estado_pedido"]); ?>
                          </td>
                          <td>
                            $ <?php echo $actualPedido["valor_total"] ?>
                          </td>
                          <td>
                            <?php echo $dataFormatada ?>
                          </td>
                          <td>
                          <a href="./editar_pedido.php?id_pedido=<?php echo $actualPedido["id_pedido"] ?>">
                          <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                        <i class="ti-pencil-alt"></i>
                      </button>
                          </a>
                          </td>
                        </tr>
                        <?php endfor ?>
                      </tbody>
                    </table>
                  </div>
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
    <script src="./lib/html2pdf.bundle.min.js"></script>
    <script>
    function imprimirRecibo() {
        const item = document.querySelector("#imprimir");
        var opt = {
            margin: 1,
            filename: "ultimos_pedidos.pdf",
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: "in",
                format: "letter",
                orientation: "portrait"
            }
        }

        html2pdf().set(opt).from(item).save()
    }
    </script>
    <!-- End custom js for this page-->
  </body>
</html>
