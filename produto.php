<?php
require("./admin/actions/connection.php");

if (isset($_GET["id_produto"])) {
  $id_produto = $_GET["id_produto"];
  $query = $connection->prepare("SELECT * FROM produtos WHERE id_produto = ?");
  $query->execute(array($id_produto));
  if ($query->rowCount()) {
    $produto = $query->fetchAll(PDO::FETCH_ASSOC)[0];
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
  <meta name="theme-color" content="#000000" />



  <meta charset="UTF-8" />
  <title>Aventais</title>
  <link rel="shortcut icon" type="image/x-icon" href="./img/2.svg" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./aventais.css"> -->

  <link href="assets/css/theme.css" rel="stylesheet" />
  <!-- 
  <style>
    @media(max-width: 600px) {
      body {
        background-color: red;
      }
    }
  </style> -->

</head>

<body>

  <?php require_once("./partials/_navbar.php") ?>


  <!-- aventais-->
  <div class="container mt-3" style="display: flex; padding: 2rem 0px; gap: 2rem">
    <img style="flex: 1; height: 450px; object-fit: cover; " src="./admin/fotos_produtos/<?php echo $produto["foto_produto"]; ?>" />
    <div style="flex: 1; display: flex; flex-direction: column; gap: 1rem;">
      <h1 class="card-title"><?php echo $produto["nome_produto"]; ?></h1>
      <h6 class="font-weight-bold text-success">Preço: $ <?php echo $produto["preco_produto"] ?></h6>
      <!-- <h4>Preço: $ <strong><?php echo $produto["preco_produto"]; ?></strong></h4> -->
      <span class="text-700">Entrega feita dentro de 2 semana</span>
      <!-- <strong style="font-size: 12px;" class="text-primary">Entrega feita dentro de 2 semana</strong> -->

      <p class="mb-5 fs-1" id="descricao_produto"><?php echo $produto["descricao_produto"]; ?></p>
      <!-- <h5 class="card-title"><?php echo $actualProduto["nome_produto"] ?></h5> -->
      <div style="display: flex; gap: 2rem; align-items: center;">
        <!-- <div style="display: flex; gap: 8px">
            <div style="width: 35px; border: 2px solid #dddddd; height: 35px; cursor: pointer; border-radius: 30px; background-color: none; display:flex; align-items: center; justify-content: center; font-size: 14px; font-weight: normal;">
              M
            </div>
            <div style="width: 35px; border: 2px solid #dddddd; height: 35px; cursor: pointer; border-radius: 30px; background-color: #cca152; display:flex; align-items: center; justify-content: center; font-size: 14px; font-weight: normal;">
              M
            </div>
            <div style="width: 35px; border: 2px solid #dddddd; height: 35px; cursor: pointer; border-radius: 30px; background-color: none; display:flex; align-items: center; justify-content: center; font-size: 14px; font-weight: normal;">
              M
            </div>
      </div> -->
        <div style="display: flex; background-color: #cccccc; width: 120px; align-items: center; justify-content: space-between; border-radius: 20px; overflow: hidden">
          <button id="menius" style="flex: 1; display: flex; align-items: center; justify-content: center; border: none; background: none; cursor: pointer; border-right: 1px solid #dddddd; outline: none">-</button>
          <div id="result" style="flex: 1; display: flex; align-items: center; justify-content: center; ">1</div>
          <button id="add" style="flex: 1; display: flex; align-items: center; justify-content: center; border: none; background: none; cursor: pointer; border-left: 1px solid #dddddd; outline: none">+</button>
        </div>
      </div>
      <div style="margin-top: 3rem; display: flex; align-items: center">
        <div class="d-grid gap-2 d-md-block">
          <a id="produto_id" class="btn btn-lg btn-dark" href="./adicionar_carrinho.php?id_produto=<?php echo $produto["id_produto"]; ?>" role="button">Adicionar ao carrinho</a>

        </div>
        <!-- <a id="produto_id" href="./adicionar_carrinho.php?id_produto=<?php echo $produto["id_produto"]; ?>" style="height: 36px; background-color: #cca152; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #f5f5f5; padding: 0px 2rem;">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a> -->
      </div>
    </div>

  </div>
  <!-- Fim do loop de produtos -->


  <?php
  require_once("./partials/_footer.php");
  ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    const add = document.querySelector("#add");
    const menius = document.querySelector("#menius");
    const result = document.querySelector("#result");
    const produto_id = document.querySelector("#produto_id");

    menius.addEventListener("click", function() {
      result.innerHTML = Number(result.innerHTML) <= 1 ? 1 : Number(result.innerHTML) - 1;
      produto_id.href = `./adicionar_carrinho.php?id_produto=<?php echo $produto["id_produto"]; ?>&quantidade=${result.innerHTML}`;
    });

    add.addEventListener("click", function() {
      result.innerHTML = Number(result.innerHTML) + 1;
      produto_id.href = `./adicionar_carrinho.php?id_produto=<?php echo $produto["id_produto"]; ?>&quantidade=${result.innerHTML}`;
    });
  </script>
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