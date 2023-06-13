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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="min-height: 70px">
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
</nav>