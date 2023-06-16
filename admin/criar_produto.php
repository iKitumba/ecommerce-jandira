<?php
require("./actions/connection.php");
$query = $connection->prepare("SELECT * FROM categorias");

$query->execute();
$categorias = $query->fetchAll(PDO::FETCH_ASSOC);
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
                  <h4 class="font-weight-bold mb-0">Produtos</h4>
                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cadastrar produto</h4>
                  <form class="forms-sample" enctype="multipart/form-data" action="./actions/cadastrar_produto.php" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nome</label>
                      <input type="text" required name="nome_produto" class="form-control" id="exampleInputUsername1" placeholder="Nome o produto">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Descrição</label>
                      <textarea class="form-control" name="descricao_produto" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Quantidade</label>
                      <input type="number" required name="quantidade_produto" class="form-control" id="exampleInputUsername1" placeholder="Quantidade do produto">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Preço</label>
                      <input type="number" required name="preco_produto" class="form-control" id="exampleInputUsername1" placeholder="Preço do produto">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Categoria</label>
                      <select class="form-control" required name="categoria_id" id="exampleFormControlSelect2">
                        <?php
                        for ($i = 0; $i < sizeof($categorias); $i++) :
                          $actualCategoria = $categorias[$i]
                        ?>
                          <option value="<?php echo $actualCategoria["id_categoria"] ?>"><?php echo $actualCategoria["nome_categoria"] ?></option>
                        <?php endfor; ?>
                      </select>
                      <div class="form-group mt-4 flex flex-column">
                        <label>Imagem do produto</label>
                        <input required class="form-control" name="foto_produto" type="file" accept="image/*" />
                      </div>
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