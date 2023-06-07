<?php
require("./actions/connection.php");
  $query = $connection->prepare("SELECT * FROM categorias");

  $query->execute();
  $categorias = $query->fetchAll(PDO::FETCH_ASSOC);
  $usuario_id = $_SESSION["usuario"][0];
  $nome_usuario = $_SESSION["usuario"][1];
  $tipo_acesso = $_SESSION["usuario"][2];
  $funcionario_id = $_SESSION["usuario"][3];
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./pedidos.php">
              <i class="ti-calendar menu-icon"></i>
              <span class="menu-title">Pedidos</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="ti-shopping-cart-full menu-icon"></i>
              <span class="menu-title">Produtos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <?php
                  for($i = 0; $i < sizeof($categorias); $i++):
                    $categoriaAtual = $categorias[$i];
                ?>
                <li class="nav-item"> <a class="nav-link" href="./produtos.php?categoria_id=<?php echo $categoriaAtual["id_categoria"] ?>"><?php echo $categoriaAtual["nome_categoria"] ?></a></li>
                <?php endfor; ?>
                <?php
                  if($tipo_acesso === "ADMIN"):
                ?>
                <li class="nav-item"> <a class="nav-link" href="./criar_categoria.php">Nova categoria</a></li>
                <?php
                  endif;
                ?>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./clientes.php">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Clientes</span>
            </a>
          </li>
          <?php
                  if($tipo_acesso === "ADMIN"):
                ?>
          <li class="nav-item">
            <a class="nav-link" href="./funcionarios.php">
              <i class="ti-briefcase menu-icon"></i>
              <span class="menu-title">Funcionários</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./usuarios.php">
              <i class="ti-lock menu-icon"></i>
              <span class="menu-title">Usuários</span>
            </a>
          </li>
          <?php 
            endif;
          ?>
          
        </ul>
      </nav>