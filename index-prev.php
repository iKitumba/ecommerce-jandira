<!DOCTYPE html>
<html>

<head>
  <meta name="theme-color" content="#000000" />


  <title>Atelier Dyanne </title>
  <link rel="shortcut icon" href="atelier.ico" type="image/x-icon" />
  <meta charset="UTF-8" />
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="./pagina.css" /> -->

  <link href="assets/css/theme.css" rel="stylesheet" />
  <style>
    button {
      cursor: pointer;
    }

    .banner {
      height: calc(100vh - 70px);
      /* background-color: #1d1e20; */
      padding: 0px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: transform 0.5s ease-in-out;
      overflow: hidden;
    }

    .wrapper {
      height: 100%;
      display: flex;
      width: 500vw;
      transition: all 1.5s ease-in-out;
    }

    .bannerContent {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0px 150px;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      transition: transform 0.5s ease-in-out;
      width: 100vw;
    }


    /* .bannerContent.active {
        display: flex;
        opacity: 1;
      }

      .bannerContent:not(.active) {
        opacity: 0;
      } */


    .bannerLeftSide {
      /* flex: 1; */
      display: flex;
      flex-direction: column;
      gap: 12px;
      width: 460px;
    }

    .bannerLeftSide h1 {
      /* font-size: 46px;
      font-weight: bold; */
      text-transform: uppercase;
      /* color: #CCA152; */
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .bannerLeftSide p {
      /* color: #CCA152;
      font-size: 16px;
      line-height: 22.4px; */
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .actions {
      margin-top: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .arrow-buttons {
      width: 70px;
      height: 70px;
      font-size: 53.43px;
      /* display: flex;
        align-items: center;
        justify-content: center; */
      color: #707070;
      background: none;
      border: none;
      cursor: pointer;
      outline: 0;
      position: absolute;
      top: 0;
      bottom: 0;
      margin: auto;
      z-index: 100;
    }

    .bannerRightSide {
      width: 481px;
      height: 376px;
      object-fit: cover;
      border-radius: 24px;
    }

    .add-to-cart {
      height: 36px;
      padding: 8px 36px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      color: #ffffff;
      background-color: #109E00;
      text-decoration: none;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .add-to-cart:hover {
      border: 1px solid #CCA152;
      background: none;
      color: #CCA152;
    }

    .add-to-favorite {
      width: 36px;
      height: 36px;
      border-radius: 4px;
      font-size: 24px;
      color: #C7C8C9;
      background: none;
      border: 1px solid rgba(255, 255, 255, 0.11);
    }
  </style>

</head>

<body>
  <!--barra de navegação-->
  <?php require_once("./partials/_navbar.php") ?>
  <!--  capa da página  -->

  <?php
  // session_start();
  require("./admin/actions/connection.php");
  if (isset($_SESSION["cliente"])) {
    $nome_cliente = $_SESSION["cliente"][1];
    $telefone_cliente = $_SESSION["cliente"][2];
    $email_cliente = $_SESSION["cliente"][3];
    $endereco_cliente = $_SESSION["cliente"][4];
    $tem_sessao = true;
  } else {
    $tem_sessao = false;
  }

  $query = $connection->prepare("SELECT p.*, COUNT(*) as total_pedidos
FROM produtos p
JOIN itens_pedido ip ON p.id_produto = ip.produto_id
GROUP BY p.nome_produto
ORDER BY total_pedidos DESC
LIMIT 5");
  $query->execute();
  $produtos = $query->fetchAll(PDO::FETCH_ASSOC);
  ?>


  <div class="banner">
    <button class="arrow-buttons" id="left-slide" style="left: 0;"> &LeftAngleBracket; </button>
    <div class="wrapper" style="transform: translateX(0vw);">
      <?php
      for ($i = 0; $i < sizeof($produtos); $i++) :
        $proActual = $produtos[$i];
      ?>
        <div class="bannerContent <?php echo $produtos[0] ? "active" : "" ?>">
          <div class="bannerLeftSide">
            <h1 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6"><?php echo $proActual["nome_produto"] ?></h1>
            <p class="font-weight-bold text-success">Preço: $ <?php echo $proActual["preco_produto"] ?></p>

            <p class="mb-5 fs-1">
              <?php echo $proActual["descricao_produto"] ?>
            </p>
            <div class="actions">
              <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-lg btn-dark" href="./adicionar_carrinho.php?id_produto=<?php echo $proActual["id_produto"] ?>" href="#" role="button">Adicionar ao carrinho</a>
                <button class="add-to-favorite">&hearts;</button>
              </div>
            </div>
          </div>
          <img src="./admin/fotos_produtos/<?php echo $proActual["foto_produto"] ?>" class="bannerRightSide" />
        </div>
      <?php endfor ?>
    </div>
    <button class="arrow-buttons" id="right-slide" style="right: 0;"> &RightAngleBracket; </button>
  </div>

  <script>
    const banner = document.querySelector(".banner");
    const wrapper = document.querySelector(".wrapper");
    const leftSlide = document.querySelector("#left-slide");
    const rightSlide = document.querySelector("#right-slide");
    const [...bannerContents] = banner.querySelectorAll(".bannerContent");
    // console.log(bannerContents);
    setInterval(() => handleSlide("r"), 5000);

    function handleSlide(type) {
      let activeElementIndex = bannerContents.findIndex(element => element.classList.contains("active"));
      bannerContents[activeElementIndex].classList.remove("active");

      if (type === "l") {
        if (activeElementIndex > 0) {
          bannerContents[activeElementIndex - 1].classList.add("active");
          wrapper.setAttribute("style", `transform: translateX(${-100 * (activeElementIndex - 1)}vw);`);
        } else {
          bannerContents[bannerContents.length - 1].classList.add("active");
          wrapper.setAttribute("style", `transform: translateX(${-100 * (bannerContents.length - 1)}vw);`);
        }
      }

      if (type === "r") {
        if (activeElementIndex < bannerContents.length - 1) {
          bannerContents[activeElementIndex + 1].classList.add("active");
          wrapper.setAttribute("style", `transform: translateX(${-100 * (activeElementIndex + 1)}vw);`);
        } else {
          bannerContents[0].classList.add("active");
          wrapper.setAttribute("style", `transform: translateX(${0}vw);`);
        }
      }

    }

    leftSlide.addEventListener("click", () => {
      handleSlide("l")
    });

    rightSlide.addEventListener("click", () => {
      handleSlide("r")
    })
  </script>

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


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