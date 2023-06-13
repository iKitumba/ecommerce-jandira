<!DOCTYPE html>
<html lang="en">

<head>
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
      <?php
      require("./actions/connection.php");
      $tipo_acesso = $_SESSION["usuario"][2];
      if (!$connection or $tipo_acesso !== "ADMIN") {
        echo "<script>window.location = './login.php'</script>";
      }
      $query = $connection->prepare("SELECT * FROM acessos");
      $query->execute();
      $acessos = $query->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Usuários</h4>
                </div>
                <div>
                  <a href="./criar_usuario.php">
                    <button type="button" style="background-color: #cca152; border: none;" class="btn btn-success btn-rounded btn-icon-text">
                      <i class="ti-clipboard btn-icon-prepend"></i>Cadastrar</button>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Usuários BackOffice</h4>

                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          Nome
                        </th>
                        <th>
                          Tipo de Acesso
                        </th>
                        <th>
                          ID de Funcionario
                        </th>
                        <th>
                          Apagar
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      for ($i = 0; $i < sizeof($acessos); $i++) :
                        $actualAcesso = $acessos[$i];
                      ?>
                        <tr>
                          <td class="py-1">
                            <?php echo $actualAcesso["nome_usuario"] ?>
                          </td>
                          <td class="py-1">
                            <?php
                            if ($actualAcesso["tipo_acesso"] === "ADMIN") {
                              echo "Administrador";
                            } else {
                              echo "Normal";
                            }
                            ?>
                          </td>

                          <td>
                            <p><a href="./editar_funcionario.php?id_funcionario=<?php echo $actualAcesso["funcionario_id"] ?>"><?php echo $actualAcesso["funcionario_id"] ?></a></p>
                          </td>
                          <!-- <td>
                         <a href="./editar_usuario.php?usuario_id=<?php echo $actualAcesso["id_acesso"] ?>">
                         <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                        <i class="ti-pencil-alt"></i>
                      </button>
                         </a>
                         </td> -->
                          <td>
                            <a href="./actions/eliminar_acesso.php?acesso_id=<?php echo $actualAcesso["id_acesso"] ?>">
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
</body>

</html>