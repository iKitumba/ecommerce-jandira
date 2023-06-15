<?php
require("./admin/actions/connection.php");
require("./operacoes_carrinho.php");
$query = $connection->prepare("SELECT * FROM categorias");
$query->execute();
$categorias = $query->fetchAll(PDO::FETCH_ASSOC);
$logado = isset($_SESSION["cliente"]);
?>

<style>
  @font-face {
    font-family: "Jost";
    src: url("./fonts/Jost-VariableFont_wght.ttf");
  }

  * {
    font-family: "Jost";
  }
</style>

<!-- <nav class="navbar fixed-top navbar-expand-lg" style="background-color: #2b2b2b">
  <a class="navbar-brand" href="./index.php">
    <img src="./img/logo.svg" style="width: 36px;" alt="" />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Início</a>
      </li>
      <?php
      for ($i = 0; $i < sizeof($categorias); $i++) :
        $actualCategoria = $categorias[$i];
      ?>
        <li class="nav-item">
          <a class="nav-link" href="./categoria.php?categoria_id=<?php echo $actualCategoria["id_categoria"] ?>"><?php echo $actualCategoria["nome_categoria"]; ?></a>
        </li>
      <?php endfor; ?>
    </ul>

    <form class="form-inline ml-auto" action="./busca.php">
      <input class="form-control mr-sm-2" id="buscar" type="search" name="pesquisa" minlength="3" placeholder="Buscar" aria-label="Search" required />
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
        <i class="fas fa-search"></i> Buscar
      </button>
      <a class="nav-link" href="./carrinho.php">
        <i class="fa fa-shopping-cart fa-1x"></i><?php echo numerosItemsNoCarrinho(); ?></a>
      <?php
      if ($logado) :
      ?>
        <a class="nav-link" href="./pedidos.php">
          <i class="fa fa-heart"></i></a>
        <a class="nav-link" href="./pedidos.php">
          <i class="fa fa-user"></i></a>
      <?php endif ?>
      <?php
      if (!$logado) :
      ?>
        <a class="nav-link btn btn-primary" href="./login.php">
          Entar
        </a>
      <?php endif ?>
    </form>
  </div>
</nav> -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="min-height: 70px">
  <a class="navbar-brand" href="#">
    <img src="./img/logo.svg" height="40" width="120" alt="Logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Início <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./sobre.php">Sobre</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php
          for ($i = 0; $i < sizeof($categorias); $i++) :
            $actualCategoria = $categorias[$i];
          ?>
            <a class="dropdown-item" href="./categoria.php?categoria_id=<?php echo $actualCategoria["id_categoria"] ?>">
              <?php echo $actualCategoria["nome_categoria"]; ?>
            </a>

          <?php endfor; ?>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form class="form-inline my-2 my-lg-0" action="./busca.php">
          <input class="form-control mr-sm-2" name="pesquisa" minlength="3" type="search" placeholder="O que procuras?" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./carrinho.php">
          <i class="fas fa-shopping-cart"></i>
          <span class="badge badge-light"><?php echo numerosItemsNoCarrinho(); ?></span>
        </a>
      </li>
      <?php
      if ($logado) :
      ?>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-heart"></i>
            <span class="badge badge-light">20</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Minha conta</a>
            <a class="dropdown-item" href="./pedidos.php">Meus Pedidos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./logout.php">Sair</a>
          </div>
        </li>
      <?php endif ?>
      <?php
      if (!$logado) :
      ?>
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-light px-4" href="./login.php">Entrar</a>
        </li>
      <?php endif ?>
    </ul>
  </div>
</nav> -->


<nav class="navbar navbar-expand-lg navbar-light sticky-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
  <div class="container">
    <a class="navbar-brand d-inline-flex align-items-center" href="./index.php">
      <img class="d-inline-block" style="height: 40px;" src="./img/logo.svg" alt="logo" /><span class="text-1000 fs-0 fw-bold ms-2">ATELIER DYANNE</span></a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
        for ($i = 0; $i < sizeof($categorias); $i++) :
          $actualCategoria = $categorias[$i];
        ?>
          <li class="nav-item px-2">
            <a href="./categoria.php?categoria_id=<?php echo $actualCategoria["id_categoria"] ?>" class="nav-link fw-medium active" aria-current="page" href="#categoryWomen"><?php echo $actualCategoria["nome_categoria"] ?></a>
          </li>
        <?php endfor ?>
      </ul>

      <!-- <form class="form-inline">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
          <i class="fas fa-search"></i> Buscar
        </button>
      </form> -->
      <form class="d-flex align-items-center">
        <a class="text-1000" href="./busca.php">
          <svg class="feather feather-search me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg></a>
        <a class="text-1000 d-flex me-3" href="./carrinho.php">
          <svg class="feather feather-shopping-cart" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"></circle>
            <circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
          </svg><span class="text-secondary font-weight-bold" style="font-size: 12px; font-weight: bold"><?php echo numerosItemsNoCarrinho(); ?></span></a>

        <?php
        if ($logado) :
        ?>
          <a class="text-1000" href="./pedidos.php">
            <svg class="feather feather-user me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg></a>
          <a class="text-1000 text-danger" href="./logout.php">Sair</a>
        <?php endif ?>
        <?php
        if (!$logado) :
        ?>
          <a class="btn btn-lg btn-dark" href="./login.php">Entrar</a>
        <?php endif ?>
        <!-- <a class="text-1000" href="#!">
          <svg class="feather feather-heart me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
          </svg></a> -->
      </form>
    </div>
  </div>
</nav>