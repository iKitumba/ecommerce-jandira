<?php
require("./actions/connection.php");

if (isset($_GET["categoria_id"])) {
  $categoria_id = $_GET["categoria_id"];
  $query = $connection->prepare("SELECT * FROM produtos WHERE categoria_id = ?");
  $query->execute(array($categoria_id));
  $query2 = $connection->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
  $query2->execute(array($categoria_id));
  $categoria = null;

  if ($query2->rowCount()) {
    $categoria = $query2->fetchAll(PDO::FETCH_ASSOC)[0];
  }
} elseif (isset($_GET["pesquisa"])) {
  $pesquisa = $_GET["pesquisa"];
  $query = $connection->prepare("SELECT * FROM produtos WHERE nome_produto LIKE ? OR descricao_produto LIKE ?");
  $db_pesquisa = "%" . $pesquisa . "%";
  $query->execute(array($db_pesquisa, $db_pesquisa));
  $categoria = null;
} else {
  $query = $connection->prepare("SELECT * FROM produtos");
  $categoria = null;
  $query->execute();
}
$produtos = $query->fetchAll(PDO::FETCH_ASSOC);
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
                <div>
                  <a href="./criar_produto.php">
                    <button type="button" style="background-color: #cca152; border: none;" class="btn btn-success btn-rounded btn-icon-text">
                      <i class="ti-clipboard btn-icon-prepend"></i>Cadastrar</button>
                  </a>
                  <button type="button" class="btn btn-primary btn-icon-text btn-rounded" onclick="imprimirRecibo()">
                    <i class="ti-printer btn-icon-prepend"></i>Relatório
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"> <?php
                                        if ($categoria) {
                                          echo $categoria["nome_categoria"];
                                        } else {
                                          echo "Nossos produtos";
                                        }
                                        ?></h4>

                <div class="table-responsive">
                  <table class="table table-striped" id="imprimir">
                    <thead>
                      <tr>
                        <th>Foto</th>
                        <th>
                          Nome
                        </th>
                        <th>
                          Preço
                        </th>
                        <th>
                          Quantidade
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
                      for ($i = 0; $i < sizeof($produtos); $i++) :
                        $actualProducto = $produtos[$i];
                      ?>

                        <tr>
                          <td class="py-1">
                            <img src="./fotos_produtos/<?php echo $actualProducto["foto_produto"] ?>" alt="image" />
                          </td>
                          <td class="py-1">
                            <?php echo $actualProducto["nome_produto"] ?>
                          </td>
                          <td class="py-1">
                            <?php echo $actualProducto["preco_produto"] ?> kz
                          </td>
                          <td class="py-1">
                            <?php echo $actualProducto["quantidade_produto"] ?>
                          </td>
                          <td>
                            <a href="./editar_produto.php?produto_id=<?php echo $actualProducto["id_produto"] ?>">
                              <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                                <i class="ti-pencil-alt"></i>
                              </button>
                            </a>
                          </td>
                          <td>
                            <a title="Eliminar" href="./actions/eliminar_produto.php?id_produto=<?php echo $actualProducto["id_produto"] ?>">
                              <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon">
                                <i class="ti-trash"></i>
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
  <!-- End custom js for this page-->
  <script src="./lib/html2pdf.bundle.min.js"></script>
  <script>
    function imprimirRecibo() {
      const item = document.querySelector("#imprimir");
      var opt = {
        margin: 1,
        filename: "produtos.pdf",
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