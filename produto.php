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

  <meta charset="UTF-8" />
  <title>Aventais</title>
  <link rel="shortcut icon" href="atelier.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./aventais.css">
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
    <img style="flex: 1; height: 450px; object-fit: cover; border-radius: 12px;" src="./admin/fotos_produtos/<?php echo $produto["foto_produto"]; ?>" />
    <div style="flex: 1; display: flex; flex-direction: column; gap: 1rem;">
      <h1><?php echo $produto["nome_produto"]; ?></h1>
      <h4>Preço: $ <strong><?php echo $produto["preco_produto"]; ?></strong></h4>
      <strong style="font-size: 12px; color: green;">Entrega feita dentro de 2 semana</strong>
      <p>
        <?php echo $produto["descricao_produto"]; ?>
      </p>
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
        <a id="produto_id" href="./adicionar_carrinho.php?id_produto=<?php echo $produto["id_produto"]; ?>" style="height: 36px; background-color: #cca152; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #f5f5f5; padding: 0px 2rem;">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a>
      </div>
    </div>

  </div>
  <!-- Fim do loop de produtos -->


  <!-- rodapé-->
  <footer class="text-light mt-4" style="background-color: #2b2b2b;">
    <div class="container">
      <br>
      <div class="row">
        <div class="col-md-4">
          <h5>Informações de Contato</h5>
          <p>Endereço da Empresa</p>
          <p>Telefone: (+244) 923 459 813<br> (+244) 999 459 813</p>
          <p>Email: neprobes@gmail.com</p>
        </div>
        <div class="col-md-4">
          <h5>Links Úteis</h5>
          <ul class="list-unstyled">
            <li><a class="links" href="#">Sobre Nós</a></li>
            <li><a class="links" href="#">Política de Privacidade</a></li>
            <li><a class="links" href="#">Termos e Condições</a></li>

          </ul>
        </div>
        <div class="col-md-4">
          <h5>Siga-nos</h5>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="https://www.facebook.com/robespersonalizadoseacessoriosdenoivas"><i class="fab fa-facebook"></i> Facebook</a></li><br>
            <li class="list-inline-item"><a href="https://wa.me/923459813"><i class="fab fa-whatsapp" style="color: green;"></i> Whatsapp</a></li><br>
            <li class="list-inline-item"><a href="https://www.instagram.com/noivos_e_padrinhos/"><i class="fab fa-instagram" style="color: darkmagenta;"> </i> Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center p-3">
      <img src="img/logo.png" alt="logo"><br>
      &copy; 2023 Noivos & Padrinhos. Todos os direitos reservados.
    </div>
  </footer>


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
</body>

</html>