<?php
require("./actions/connection.php");
  if(!$connection){
    echo "<script>window.location = './login.php'</script>";
  }
  $query = $connection->prepare("SELECT * FROM cargos");
  
  $query->execute();
  $cargos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
  if(isset($_POST["nome_cargo"])){
    $nome_cargo = $_POST["nome_cargo"];
    $query2 = $connection->prepare("SELECT * FROM cargos WHERE nome_cargo = ?");
    $query2->execute(array($nome_cargo));

    if($query2->rowCount()){
      echo "<script>alert('Já existe esse cargo cadastrado!')</script>";
    }else {
      

    $query2 = $connection->prepare("INSERT INTO cargos(nome_cargo) VALUES(?)");
  
    $query2->execute(array($nome_cargo));
    echo "<script>alert('Cargo cadastrado com sucesso!')</script>";
    }
  }
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
      <?php
        
        $tipo_acesso = $_SESSION["usuario"][2];
        if($tipo_acesso !== "ADMIN"){
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
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastrar funcionário</h4>
                  <form class="forms-sample" enctype="multipart/form-data" method="post" action="./actions/cadastrar_funcionario.php">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome</label>
                      <input type="text" name="nome_funcionario" required class="form-control" id="exampleInputUsername1" placeholder="Nome completo">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Telefone</label>
                      <input type="tel" name="telefone_funcionario" required minlength="9" maxlength="9" class="form-control" id="exampleInputUsername1" placeholder="Número de telefone">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">E-Mail</label>
                      <input type="email" name="email_funcionario" class="form-control" id="exampleInputEmail1" placeholder="Digite o E-mail">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Endereço</label>
                      <input type="text" name="endereco_funcionario" required class="form-control" id="exampleInputPassword1" placeholder="Digite o endereço">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Salário</label>
                      <input type="number" name="salario_funcionario" required class="form-control" id="exampleInputPassword1" placeholder="Qual o valor do salário">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Cargo</label>
                    <select class="form-control" name="cargo_id" id="exampleFormControlSelect2">
                      <?php
                        for($i = 0; $i < sizeof($cargos); $i++):
                          $actualCargo = $cargos[$i];
                      ?>
                      <option value="<?php echo $actualCargo["id_cargo"] ?>"><?php echo $actualCargo["nome_cargo"] ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                  <div class="form-group mt-4 flex flex-column">
                      <label>Fotográfia do funcionário</label>
                      <input name="foto_funcionario" required class="form-control" type="file" accept="image/*" />
                      </div>
                  
                    <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cargos</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nome</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        for($i = 0; $i < sizeof($cargos); $i++):
                          $actualCargo = $cargos[$i];
                      ?>
                      <tr>
                          <td><?php echo $actualCargo["nome_cargo"] ?></td>
                        </tr>
                        <?php endfor ?>
                      </tbody>
                    </table>
                  </div>
                  <form class="forms-sample mt-2" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome</label>
                      <input type="text" name="nome_cargo" class="form-control" id="exampleInputUsername1" placeholder="Nome do cargo">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Novo cargo</button>
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
