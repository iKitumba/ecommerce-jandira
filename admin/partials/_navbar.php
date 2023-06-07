<?php
session_start();
require("./actions/connection.php");

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
  $usuario_id = $_SESSION["usuario"][0];
  $nome_usuario = $_SESSION["usuario"][1];
  $tipo_acesso = $_SESSION["usuario"][2];
  $funcionario_id = $_SESSION["usuario"][3];
  $query = $connection->prepare("SELECT * FROM funcionarios WHERE id_funcionario = ?");
  $query->execute(array($funcionario_id));
  $funcionario = $query->fetchAll(PDO::FETCH_ASSOC)[0];
} else {
  echo "<script>window.location = './login.php'</script>";
}
?>

<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="index.php"><img src="images/logo.svg" class="me-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <form method="get" action="./produtos.php" class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
              </div>
              <input type="search" name="pesquisa" required minlength="3" class="form-control" id="navbar-search-input" placeholder="Pesquisar produto" aria-label="search" aria-describedby="search">
            </form>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown me-1">
            <?php echo $funcionario["nome_funcionario"] ?>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <img src="./fotos_funcionarios/<?php echo $funcionario["foto_funcionario"] ?>" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="./editar_usuario.php">
                <i class="ti-settings text-primary"></i>
                Configurações
              </a>
              <a class="dropdown-item" href="./actions/logout.php">
                <i class="ti-power-off text-primary"></i>
                Sair
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>