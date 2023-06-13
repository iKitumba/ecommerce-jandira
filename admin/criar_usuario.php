<?php
require("./actions/connection.php");
$query = $connection->prepare("SELECT * FROM funcionarios");

$query->execute();
$funcionarios = $query->fetchAll(PDO::FETCH_ASSOC);
?>


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
      if ($tipo_acesso !== "ADMIN") {
        echo "<script>window.location = './login.php'</script>";
      }
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

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastrar usuários</h4>
                  <form class="forms-sample" method="post" action="./actions/cadastrar_usuario.php">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome de usuário</label>
                      <input type="text" name="nome_usuario" required class="form-control" id="exampleInputUsername1" placeholder="alberto_kitumba">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Senha</label>
                      <input type="password" name="senha" required class="form-control" id="exampleInputUsername1" placeholder="********">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Tipo de acesso</label>
                      <select class="form-control" name="tipo_acesso" value="NORMAL" id="exampleFormControlSelect2">
                        <option value="NORMAL">Normal</option>
                        <option value="ADMIN">Administrador</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Funcionário</label>
                      <select name="funcionario_id" value="<?php echo $funcionarios[0]["id_funcionario"] ?>" class="form-control" id="exampleFormControlSelect2">
                        <?php
                        for ($i = 0; $i < sizeof($funcionarios); $i++) :
                          $actualFuncionario = $funcionarios[$i];
                        ?>
                          <option value="<?php echo $actualFuncionario["id_funcionario"] ?>"><?php echo $actualFuncionario["nome_funcionario"] ?></option>
                        <?php endfor; ?>
                      </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                  </form>
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