<?php
require("./actions/connection.php");
$id_funcionario = $_GET["id_funcionario"];
$query = $connection->prepare("SELECT * FROM cargos");
$query2 = $connection->prepare("SELECT * FROM funcionarios WHERE id_funcionario = ?");

$query->execute();
$query2->execute(array($id_funcionario));
$cargosBuscado = $query->fetchAll(PDO::FETCH_ASSOC);

if ($query2->rowCount()) {

  $funcionarioBuscado = $query2->fetchAll(PDO::FETCH_ASSOC)[0];
} else {
  echo "<script>alert('Funcionario não encontrado!')</script>";
  echo "<script>window.location = './funcionarios.php'</script>";
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
  <div class="container-scroller mt-6">
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
                  <h4 class="font-weight-bold mb-0">Funcionários</h4>
                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editar funcionário</h4>
                  <form class="forms-sample" action="./actions/editar_funcionario.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome</label>
                      <input type="hidden" name="id_funcionario" value="<?php echo $funcionarioBuscado["id_funcionario"] ?>" class="form-control" id="exampleInputUsername1" placeholder="Nome completo">
                      <input type="text" name="nome_funcionario" value="<?php echo $funcionarioBuscado["nome_funcionario"] ?>" class="form-control" id="exampleInputUsername1" placeholder="Nome completo">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Telefone</label>
                      <input type="text" name="telefone_funcionario" value="<?php echo $funcionarioBuscado["telefone_funcionario"] ?>" class="form-control" id="exampleInputUsername1" placeholder="Número de telefone">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">E-Mail</label>
                      <input type="email" name="email_funcionario" value="<?php echo $funcionarioBuscado["email_funcionario"] ?>" class="form-control" id="exampleInputEmail1" placeholder="Digite o E-mail">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Salário</label>
                      <input type="number" name="salario_funcionario" value="<?php echo $funcionarioBuscado["salario_funcionario"] ?>" class="form-control" id="exampleInputPassword1" placeholder="Qual o valor do salário">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Endereço</label>
                      <input type="text" name="endereco_funcionario" value="<?php echo $funcionarioBuscado["endereco_funcionario"] ?>" class="form-control" id="exampleInputPassword1" placeholder="Digite o endereço">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Cargo</label>
                      <select class="form-control" name="cargo_id" value="<?php echo $funcionarioBuscado["cargo_id"] ?>" id="exampleFormControlSelect2">
                        <?php
                        for ($i = 0; $i < sizeof($cargosBuscado); $i++) :
                          $actualCargo = $cargosBuscado[$i];
                        ?>
                          <option value="<?php echo $actualCargo["id_cargo"] ?>"><?php echo $actualCargo["nome_cargo"] ?></option>
                        <?php endfor; ?>
                      </select>
                    </div>
                    <div class="form-group mt-4 flex flex-column">
                      <label>Foto do funcionario</label>
                      <img class="col-md-4 grid-margin stretch-card" src="./fotos_funcionarios/<?php echo $funcionarioBuscado["foto_funcionario"] ?>" alt="<?php echo $funcionarioBuscado["foto_funcionario"] ?>">
                    </div>

                    <button style="background-color: #cca152; border: none;" type="submit" class="btn btn-primary me-2">Editar</button>
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