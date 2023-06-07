<?php
  require("./actions/connection.php");
  if(isset($_POST["senha_anterior"]) && isset($_POST["nova_senha"])){

    $senha_anterior = $_POST["senha_anterior"];
    $nova_senha = $_POST["nova_senha"];
  
    $query = $connection->prepare("SELECT * FROM acessos WHERE senha = ?");
    $query->execute(array(md5($senha_anterior)));

    if($query->rowCount()){
      $acesso = $query->fetchAll(PDO::FETCH_ASSOC)[0];
      $query = $connection->prepare("UPDATE acessos SET senha = ? WHERE id_acesso = ?");
      $query->execute(array(md5($nova_senha), $acesso["id_acesso"]));
      echo "<script>alert('Senha alterada com sucesso!')</script>";
    } else {
      echo "<script>alert('Senha incorrecta!')</script>";
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
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h4 class="font-weight-bold mb-0">Acesso</h4>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Alterar senha</h4>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Senha anterior</label>
                      <input type="password" required name="senha_anterior" class="form-control" id="exampleInputUsername1" placeholder="******">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nova anterior</label>
                      <input type="password" required name="nova_senha" class="form-control" id="exampleInputUsername1" placeholder="******">
                    </div>
                    
                  
                    <button type="submit" class="btn btn-primary me-2">Alterar</button>
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
