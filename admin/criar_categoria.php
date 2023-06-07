<?php
if(isset($_POST["nome_categoria"])){
  require("./actions/connection.php");
    session_start();
    $tipo_acesso = $_SESSION["usuario"][2];

    if(!$connection or $tipo_acesso !== "ADMIN"){
      echo "<script>window.location = './login.php'</script>";
    }

    $nome_categoria = $_POST["nome_categoria"];
    $query = $connection->prepare("SELECT * FROM categorias WHERE nome_categoria = ?");
    $query->execute(array($nome_categoria));

    if($query->rowCount()){
      echo "<script>alert('Essa categoria já existe!')</script>";
    } else {
      $query = $connection->prepare("INSERT INTO categorias(nome_categoria) VALUES(?)");
      $query->execute(array($nome_categoria));
      echo "<script>alert('Categoria cadastrada com sucesso!')</script>";
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
                    <h4 class="font-weight-bold mb-0">Nova categoria</h4>
                  </div>
                  <div>
                  
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Nome</label>
                      <input type="text" name="nome_categoria" required class="form-control" id="exampleInputName1" placeholder="Nome da categoria">
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2">Cadastrar</button>
                  </form>
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
