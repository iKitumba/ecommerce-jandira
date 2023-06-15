<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Entrar - Atelier Dyanne</title>
  <link rel="shortcut icon" href="atelier.ico" type="image/x-icon" />
  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" /> -->
  <link rel="stylesheet" href="./login.css" />

  <link href="assets/css/theme.css" rel="stylesheet" />
  <style>
    @font-face {
      font-family: "Jost";
      src: url("./fonts/Jost-VariableFont_wght.ttf");
    }

    * {
      margin: 0;
      padding: 0;
      outline: 0;
      box-sizing: border-box;
      font-family: "Jost", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
        sans-serif;
    }

    img {
      max-width: 100%;
    }

    .logo {
      width: 100px;
      align-self: center;
    }

    #form-cadastro {
      width: 400px;
      max-width: 100%;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 12px;
      padding: 0 12px;
    }

    #form-cadastro .form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    /* #form-cadastro .form-group input {
      height: 36px;
      border-radius: 4px;
      border: none;
      padding: 0 12px;
    } */

    h2 {
      align-self: center;
      font-size: 2rem;
      font-weight: bold;
      font-family: serif;
    }

    /* 
    .container {
      width: 100%;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    } */

    #form-cadastro .form-group label {
      font-family: "Jost", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
        Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
        sans-serif;
      font-size: 1rem;
    }

    /* 
    #form-cadastro button {
      width: 100%;
      height: 36px;
      border-radius: 4px;
      margin-top: 2rem;
      border: none;
      background-color: #cca152;
      font-size: 1rem;
      font-weight: bold;
      color: #2b2b2b;
      cursor: pointer;
      font-family: serif;
    } */

    .login {
      font-size: 12px;
      margin-top: 12px;
      display: block;
      text-align: center;
    }
  </style>
</head>

<body>

  <!-- <input class="form-control mr-sm-2" name="pesquisa" id="buscar" type="search" placeholder="Buscar" aria-label="Search" /> -->
  <?php
  // require_once("./partials/_navbar.php");
  ?>
  <div class="containe mt-6">
    <div>
      <form id="form-cadastro" method="post" action="./admin/actions/login_cliente.php">
        <div class="form-group">
          <img src="img/logo.svg" style="width: 70px;" class="logo" />
          <h2>Faça login</h2>
        </div>
        <div class="form-group">
          <label for="email">Telefone</label>
          <!-- <input class="form-control mr-sm-2" name="telefone_cliente" id="Telefone" type="text" placeholder="+(244)" required minlength="9" maxlength="9" /> -->
          <input type="tel" id="Telefone" class="form-control" placeholder="+(244)" name="telefone_cliente" required minlength="9" maxlength="9" />
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" id="senha_cliente" name="senha_cliente" class="form-control" placeholder="Digite sua senha" />
        </div>

        <button class="btn btn-lg btn-dark mt-4">Entar</button>
        <div class="footer">
          <a href="cadastro.php" class="login" style="color: #d8990d">Ainda não tem uma conta? Clique aqui</a>
        </div>
      </form>

    </div>
  </div>
  <?php
  // require_once("./partials/_footer.php");
  ?>

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