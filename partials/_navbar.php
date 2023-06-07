<?php
  require("./admin/actions/connection.php");
  $query = $connection->prepare("SELECT * FROM categorias");
  $query->execute();
  $categorias = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<nav
      class="navbar fixed-top navbar-expand-lg"
      style="background-color: #2b2b2b"
    >
      <a class="navbar-brand" href="./index.php">
        <img src="./img/logo.png" alt="" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php">Início</a>
          </li>
          <?php 
            for($i = 0; $i < sizeof($categorias); $i++):
              $actualCategoria = $categorias[$i];
          ?>
          <li class="nav-item">
            <a class="nav-link" href="./categoria.php?categoria_id=<?php echo $actualCategoria["id_categoria"] ?>"><?php echo $actualCategoria["nome_categoria"]; ?></a>
          </li>
          <?php endfor; ?>
        </ul>

        <form class="form-inline ml-auto" action="./busca.php">
          <input
            class="form-control mr-sm-2"
            id="buscar"
            type="search"
            name="pesquisa"
            minlength="3"
            placeholder="Buscar"
            aria-label="Search"
            required
          />
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
            <i class="fas fa-search"></i> Buscar
          </button>
          <a class="nav-link" href="./carrinho.php">
            <i class="fa fa-shopping-cart fa-1x"></i
          ></a>
          <a class="nav-link" href="./pedidos.php">
            <i class="fa fa-heart"></i
          ></a>
        </form>
      </div>
    </nav>
