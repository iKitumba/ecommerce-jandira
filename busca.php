<?php
require("./admin/actions/connection.php");

if (isset($_GET["pesquisa"])) {
  $pesquisa = $_GET["pesquisa"];
  $query = $connection->prepare("SELECT * FROM produtos WHERE nome_produto LIKE ? OR descricao_produto LIKE ?");
  $pesquisa_para_bd = "%" . $pesquisa . "%";
  $query->execute(array($pesquisa_para_bd, $pesquisa_para_bd));

  $produtos = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
  $pesquisa = null;
  $produtos = array();
}
?>


<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8" />
  <title>Busca</title>
  <link rel="shortcut icon" type="image/x-icon" href="./img/2.svg" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./aventais.css"> -->

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
        <form action="" class="d-flex mb-4">
          <input class="form-control mr-sm-2" name="pesquisa" id="buscar" type="search" placeholder="Buscar" aria-label="Search" />
          <button class="btn btn-lg btn-dark" type="submit">
            <svg class="feather feather-search me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
          </button>
        </form>
        <?php
        if ($pesquisa) :
        ?>
          <h2><?php echo sizeof($produtos) ?> PRODUTOS ENCONTRADOS</h2>
          <h5 class="text-primary">Pesquisou por: <?php echo $pesquisa; ?></h5>
        <?php endif ?>
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