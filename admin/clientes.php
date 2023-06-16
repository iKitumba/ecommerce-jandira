<?php
require("./actions/connection.php");
$query = $connection->prepare("SELECT * FROM clientes");
$query->execute();
$clientes = $query->fetchAll(PDO::FETCH_ASSOC);
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
                  <h4 class="font-weight-bold mb-0">Clientes</h4>
                </div>
                <div>
                  <button style="background-color: #cca152; border: none;" type="button" class="btn btn-primary btn-icon-text btn-rounded" onclick="imprimirRecibo()">
                    <i class="ti-printer btn-icon-prepend"></i>Relatório
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Nossos clientes</h4>

                <div class="table-responsive">
                  <table class="table table-striped" id="imprimir">
                    <thead>
                      <tr>
                        <th>
                          Nome
                        </th>
                        <th>
                          Telefone
                        </th>
                        <th>
                          E-Mail
                        </th>
                        <th>
                          Editar
                        </th>
                        <th>
                          Apagar
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      for ($i = 0; $i < sizeof($clientes); $i++) :
                        $atualCliente = $clientes[$i];
                      ?>
                        <tr>
                          <td class="py-1">
                            <?php echo $atualCliente["nome_cliente"]; ?>
                          </td>
                          <td class="py-1">
                            <?php echo $atualCliente["telefone_cliente"]; ?>
                          </td>
                          <td>
                            <a class="text-info" href="mailto:alberkitumba@gmail.com">
                              <?php echo $atualCliente["email_cliente"]; ?>
                            </a>
                          </td>
                          <td>
                            <a href="./editar_cliente.php?cliente_id=<?php echo $atualCliente["id_cliente"] ?>">
                              <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                                <i class="ti-pencil-alt"></i>
                              </button>
                            </a>
                          </td>
                          <td>
                            <a href="./actions/eliminar_cliente.php?cliente_id=<?php echo $atualCliente["id_cliente"] ?>">
                              <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon">
                                <i class="ti-trash"></i>
                              </button>
                            </a>
                          </td>
                        </tr>
                      <?php endfor; ?>
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
  <!-- End custom js for this page-->
  <script src="./lib/html2pdf.bundle.min.js"></script>
  <script>
    function imprimirRecibo() {
      const item = document.querySelector("#imprimir");
      var opt = {
        margin: 1,
        filename: "clientes.pdf",
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
</body>

</html>