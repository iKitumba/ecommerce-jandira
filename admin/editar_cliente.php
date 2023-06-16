<?php
require("./actions/connection.php");
if (isset($_GET["cliente_id"])) {
  $cliente_id = $_GET["cliente_id"];
  $query = $connection->prepare("SELECT * FROM clientes WHERE id_cliente = ?");

  $query->execute(array($cliente_id));
  if ($query->rowCount()) {

    $cliente = $query->fetchAll(PDO::FETCH_ASSOC)[0];
  } else {
    echo "<script>alert('Cliente não encontrado!')</script>";
    echo "<script>window.location = './clientes.php'</script>";
  }
} else {
  echo "<script>window.location = './clientes.php'</script>";
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
                  <h4 class="font-weight-bold mb-0">Usuários</h4>
                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cliente</h4>
                  <form action="./actions/editar_cliente.php" class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome cliente</label>
                      <input type="hidden" name="id_cliente" value="<?php echo $cliente["id_cliente"] ?>" class="form-control">
                      <input type="text" required name="nome_cliente" value="<?php echo $cliente["nome_cliente"] ?>" class="form-control" id="exampleInputUsername1" placeholder="Alberto Kitumba">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Telefone</label>
                      <input type="text" required name="telefone_cliente" value="<?php echo $cliente["telefone_cliente"] ?>" class="form-control" id="exampleInputUsername1" placeholder="Alberto Kitumba">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">E-Mail</label>
                      <input type="email" required name="email_cliente" value="<?php echo $cliente["email_cliente"] ?>" class="form-control" id="exampleInputUsername1" placeholder="Alberto Kitumba">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Endereço</label>
                      <input type="text" required name="endereco_cliente" value="<?php echo $cliente["endereco_cliente"] ?>" class="form-control" id="exampleInputUsername1" placeholder="Alberto Kitumba">
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