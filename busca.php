<?php
require("./admin/actions/connection.php");

if (isset($_GET["pesquisa"])) {
  $pesquisa = $_GET["pesquisa"];
  $query = $connection->prepare("SELECT * FROM produtos WHERE nome_produto LIKE ? OR descricao_produto LIKE ?");
  $pesquisa_para_bd = "%".$pesquisa."%";
  $query->execute(array($pesquisa_para_bd, $pesquisa_para_bd));

  $produtos = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
  echo "<script>window.location = './index.php'</script>";
}
?>


<!DOCTYPE html>
<html>
<head>
   
  <meta charset="UTF-8" />
    <title>Busca</title> 
    <link rel="shortcut icon" href="atelier.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="./aventais.css">

<style>
  #lista_podutos {
    width: 100%;
    display: grid;
    gap: 12px;
    grid-template-columns: 1fr 1fr 1fr;
  }
</style>
</head>
<body>

<?php require_once("./partials/_navbar.php") ?>
  

  <div class="container">
    <div class="row">
      <div class=" col col-md-12">
        <h2><?php echo sizeof($produtos) ?> PRODUTOS ENCONTRADOS</h2>
        <h5>Pesquisou por: <?php echo $pesquisa; ?></h5>
      </div>
  
    </div>
  </div>
 
  <!-- aventais-->
  <div class="container mt-3">
    
    <div id="lista_podutos">
      <!-- Início do loop de produtos -->
      <?php 
        for($i = 0; $i < sizeof($produtos); $i++):
          $actualProduto = $produtos[$i];
      ?>
      <div>
        <div class="card mb-3">
          <img src="./admin/fotos_produtos/<?php echo $actualProduto["foto_produto"] ?>" class="card-img-top " alt="Imagem do Produto">
          <div class="card-body">
            <h5 class="card-title"><?php echo $actualProduto["nome_produto"] ?></h5>
            <p class="card-text"><?php echo $actualProduto["descricao_produto"] ?></p>
            <h6 class="card-subtitle mb-2 text-muted">Preço: $ <?php echo $actualProduto["preco_produto"] ?></h6>
            <a href="#" class="btn btn-sm">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao " ></i> </a>
          </div>
          
        </div>
      </div>
          <?php endfor; ?>
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
</body>
</html>
