<?php
require("./admin/actions/connection.php");

if (isset($_GET["categoria_id"])) {
  $categoria_id = $_GET["categoria_id"];
  $query1 = $connection->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
  $query2 = $connection->prepare("SELECT * FROM produtos WHERE categoria_id = ?");
  $query1->execute(array($categoria_id));
  $query2->execute(array($categoria_id));
  if ($query1->rowCount()) {
    $categoria = $query1->fetchAll(PDO::FETCH_ASSOC)[0];
    $produtos = $query2->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo "<script>window.location = './index.php'</script>";
  }
} else {
  echo "<script>window.location = './index.php'</script>";
}
?>


<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8" />
  <title>Aventais</title>
  <!-- <link rel="shortcut icon" type="image/x-icon" href="./img/2.svg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./aventais.css"> -->
  <link rel="shortcut icon" type="image/x-icon" href="./img/2.svg" />
  <link href="assets/css/theme.css" rel="stylesheet" />

  <style>
    #lista_podutos {
      width: 100%;
      display: grid;
      gap: 12px;
      grid-template-columns: 1fr 1fr 1fr;
    }

    #descricao_produto {

      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
  </style>
</head>

<body>

  <?php require_once("./partials/_navbar.php") ?>


  <div class="container">
    <div class="row">
      <div class="col text-center col-md-12 py-4">
        <h2> ATÉ 60% DE DESCONTO</h2>
        <h5 class="text-primary"><?php echo $categoria["nome_categoria"]; ?></h5>
      </div>

    </div>
  </div>

  <!-- aventais-->
  <div class="container mt-3">

    <div id="lista_podutos">
      <!-- Início do loop de produtos -->
      <?php
      for ($i = 0; $i < sizeof($produtos); $i++) :
        $actualProduto = $produtos[$i];
      ?>
        <div>
          <div class="card mb-3">
            <a href="./produto.php?id_produto=<?php echo $actualProduto["id_produto"] ?>">
              <img src="./admin/fotos_produtos/<?php echo $actualProduto["foto_produto"] ?>" class="card-img-top " style="height: 320px; object-fit: cover;" alt="Imagem do Produto">
            </a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $actualProduto["nome_produto"] ?></h5>
              <p class="card-text" id="descricao_produto"><?php echo $actualProduto["descricao_produto"] ?></p>
              <h6 class="font-weight-bold text-success">Preço: $ <?php echo $actualProduto["preco_produto"] ?></h6>
              <div class="mt-4" style="display: flex; align-items: center; justify-content: space-between;">
                <div class="d-grid gap-2 d-md-block">
                  <a class="btn btn-lg btn-dark" href="./adicionar_carrinho.php?id_produto=<?php echo $actualProduto["id_produto"] ?>" role="button">Adicionar ao carrinho</a>

                </div>
                <a href="" class="fav py-4" style="font-size: 20px;"> &hearts;<i class="fa fa-heart coracao"></i> </a>
                <!-- <a  class="btn btn-primary" style="flex: 1">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a> -->
              </div>
            </div>

          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
  <!-- Fim do loop de produtos -->


  <!-- rodapé-->
  <?php
  require_once("./partials/_footer.php");
  ?>

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="vendors/@popperjs/popper.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.min.js"></script>
  <script src="vendors/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="vendors/feather-icons/feather.min.js"></script>
  <script>
    feather.replace();
  </script>
  <script src="assets/js/theme.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
</body>

</html>