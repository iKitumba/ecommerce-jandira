<!DOCTYPE html>
<html>

<head>
  <meta name="theme-color" content="#000000" />



  <title>Aventais</title>
  <link rel="shortcut icon" type="image/x-icon" href="./img/2.svg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="favoritos.css">
</head>

<body>
  <!-- barra de navegação -->
  <nav class="navbar navbar-expand-lg fixed-top " style="background-color: #2b2b2b;">
    <!-- logotipo -->
    <a class="navbar-brand" href="#">
      <img src="img/logo.png" alt="">
    </a>

    <!-- botão toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- itens da barra de navegação-->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home.html">Início</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="acessorios.html">Acessórios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aventais.html">Aventais</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="robes.html">Robes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pantufas.html">Pantufas</a>
        </li>

      </ul>
      <!-- pesquisar -->
      <form class="form-inline ml-auto">
        <input class="form-control mr-sm-2" id="buscar" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Buscar</button>
        <a class="nav-link" href="carrinho.html"> <i class="fa fa-shopping-cart fa-1x"></i></a>
        <a class="nav-link" href="favoritos.html"> <i class="fa fa-heart"></i></a>
      </form>

    </div><!-- /itens da barra de navegação-->
  </nav><!-- /barra de navegação -->


  <div class="container">
    <div class="row">
      <div class=" col col-md-12">
        <h2> ATÉ 60% DE DESCONTO</h2>
        <h5>Brincos, bolsas e muito mais</h5>
      </div>

    </div>
  </div>

  <!-- aventais-->
  <div class="container mt-3">
    <h2 class="texto1"> <i class="fa fa-heart" style="color: #cca152;"></i> Favoritos</h2>

    <div class="row">
      <img src="" alt="">
      <!-- Início do loop de produtos -->
      <div class="col-md-3">
        <div class="card mb-3">
          <img src="imagens/avent10.jpeg" class="card-img-top " alt="Imagem do Produto">
          <div class="card-body">
            <h5 class="card-title">Avental Bride Shower</h5>
            <p class="card-text">Tecido leve, inclui um bolso e a personalização</p>
            <h6 class="card-subtitle mb-2 text-muted">Preço: AOA 8.000,00</h6>
            <a href="#" class="btn btn-sm">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a>
          </div>

        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-3">
          <img src="imagens/avent11.jpeg" class="card-img-top" alt="Imagem do Produto">
          <div class="card-body">
            <h5 class="card-title">Avental Xadrez</h5>
            <p class="card-text">Tecido leve, inclui um bolso e personalização. </p>
            <h6 class="card-subtitle mb-2 text-muted">Preço: AOA 10.000,00</h6>
            <a href="#" class="btn btn-sm">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a>
          </div>

        </div>
      </div>

      <div class="col-md-3">
        <div class="card mb-2">
          <img src="imagens/aventalnovo1.jpeg" class="card-img-top" alt="Imagem do Produto">
          <div class="card-body">
            <h5 class="card-title">Avental Bride </h5>
            <p class="card-text">Tecido de qualidadeAvental personalizado, inclui renda + personalização.</p>
            <h6 class="card-subtitle mb-2 text-muted">Preço: AOA 23.000,00</h6>
            <a href="#" class="btn btn-sm">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a>
          </div>

        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-3">
          <img src="imagens/avnt5.jpg" class="card-img-top" alt="Imagem do Produto">
          <div class="card-body">
            <h5 class="card-title">Nome do Produto</h5>
            <p class="card-text">Descrição do Produto</p>
            <h6 class="card-subtitle mb-2 text-muted">Preço: AOA 10.000,00</h6>
            <a href="#" class="btn btn-sm">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a>
          </div>

        </div>
      </div>
      <BR></BR>
      <!-- segunda fila -->
      <div class="col-md-3">
        <div class="card mb-3">
          <img src="imagens/2023.jpg" class="card-img-top" alt="Imagem do Produto">
          <div class="card-body">
            <h5 class="card-title">Nome do Produto</h5>
            <p class="card-text">Descrição do Produto</p>
            <h6 class="card-subtitle mb-2 text-muted">Preço: AOA 4.500,00</h6>
            <a href="#" class="btn btn-sm">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a>
          </div>

        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-3">
          <img src="imagens/avnt4.jpg" class="card-img-top" alt="Imagem do Produto">
          <div class="card-body">
            <h5 class="card-title">Nome do Produto</h5>
            <p class="card-text">Descrição do Produto</p>
            <h6 class="card-subtitle mb-2 text-muted">Preço: AOA 10.000,00</h6>
            <a href="#" class="btn btn-sm">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a>
          </div>

        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-3">
          <img src="imagens/avent13.jpeg" class="card-img-top" alt="Imagem do Produto">
          <div class="card-body">
            <h5 class="card-title">Nome do Produto</h5>
            <p class="card-text">Descrição do Produto</p>
            <h6 class="card-subtitle mb-2 text-muted">Preço: AOA 10.000,00</h6>
            <a href="#" class="btn btn-sm">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a>
          </div>

        </div>
      </div>
      <div class="col-md-3">
        <div class="card mb-3">
          <img src="imagens/avent11.jpeg" class="card-img-top" alt="Imagem do Produto">
          <div class="card-body">
            <h5 class="card-title">Nome do Produto</h5>
            <p class="card-text">Descrição do Produto</p>
            <h6 class="card-subtitle mb-2 text-muted">Preço: AOA 10.000,00</h6>
            <a href="#" class="btn btn-sm">Adicionar ao Carrinho</a><a href="" class="fav"> <i class="fa fa-heart coracao "></i> </a>
          </div>

        </div>
      </div>

      <!-- Fim do loop de produtos -->
    </div>
  </div>

  <!-- rodapé-->
  <footer class=" text-light mt-4" style="background-color: #2b2b2b;">
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