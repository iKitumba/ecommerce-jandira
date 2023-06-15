<!DOCTYPE html>
<html lang="pt" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Atelier Dyanner</title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <!-- <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png" /> -->
  <link rel="shortcut icon" type="image/x-icon" href="./img/2.svg" />
  <link rel="manifest" href="assets/img/favicons/manifest.json" />
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png" />
  <meta name="theme-color" content="#ffffff" />

  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link href="assets/css/theme.css" rel="stylesheet" />
</head>

<body>
  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <?php
    require_once("./partials/_navbar.php");
    ?>
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
  LIMIT 2");
    $query2 = $connection->prepare("SELECT *
  FROM produtos p
  GROUP BY p.nome_produto
  ORDER BY p.preco_produto ASC
  LIMIT 4");
    $query3 = $connection->prepare("SELECT *
  FROM produtos p
  GROUP BY p.nome_produto
  ORDER BY p.criado_aos DESC
  LIMIT 4");
    $query->execute();
    $query2->execute();
    $query3->execute();
    $produtos_mais_pedidos = $query->fetchAll(PDO::FETCH_ASSOC);
    $produtos_caros = $query2->fetchAll(PDO::FETCH_ASSOC);
    $produtos_novos = $query3->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <!--/.bg-holder-->
    <section class="py-0 pb-11 pt-7 bg-light-gradient border-bottom border-white border-5">
      <div class="bg-holder overlay overlay-light" style="
            background-image: url(assets/img/gallery/header-bg.png);
            background-size: cover;
          "></div>


      <div class="container">
        <div class="row flex-center">
          <div class="col-12 mb-10">
            <div class="d-flex align-items-center flex-column">
              <h1 class="fw-normal">
                Com um estilo excepcional, apenas para você
              </h1>
              <h1 class="fs-4 fs-lg-8 fs-md-6 fw-bold">
                Feito especialmente para você.
              </h1>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0" id="header" style="margin-top: -23rem !important">
      <div class="container">
        <div class="row g-0">
          <?php
          for ($i = 0; $i < sizeof($produtos_mais_pedidos); $i++) :
            $pmp_atual = $produtos_mais_pedidos[$i];
          ?>
            <div class="col-md-6">
              <div class="card card-span h-100 text-white">
                <img class="img-fluid" style="height: 544px !important; object-fit: cover;" src="./admin/fotos_produtos/<?php echo $pmp_atual["foto_produto"] ?>" width="790" alt="..." />
                <div class="card-img-overlay d-flex flex-center">
                  <a class="btn btn-lg btn-light" href="./produto.php?id_produto=<?php echo $pmp_atual["id_produto"] ?>">Ver melhor</a>
                </div>
              </div>
            </div>
          <?php endfor ?>
          <!-- <div class="col-md-6">
            <div class="card card-span h-100 text-white">
              <img class="img-fluid" src="assets/img/gallery/him.png" width="790" alt="..." />
              <div class="card-img-overlay d-flex flex-center">
                <a class="btn btn-lg btn-light" href="#!">Ver melhor</a>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <!-- end of .container-->
    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0">
      <div class="container">
        <div class="row h-100">
          <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">Melhores ofertas</h5>
          </div>
          <div class="col-12">
            <div class="carousel slide" id="carouselBestDeals" data-bs-touch="false" data-bs-interval="false">
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <div class="row h-100 align-items-center g-2">
                    <?php
                    for ($i = 0; $i < sizeof($produtos_caros); $i++) :
                      $pc_atual = $produtos_caros[$i];
                      $prev_preco = number_format((($pc_atual["preco_produto"] * 0.5) + $pc_atual["preco_produto"]));
                      $actual_preco = number_format($pc_atual["preco_produto"]);
                    ?>
                      <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                        <div class="card card-span h-100 text-white">
                          <img class="img-fluid h-100" style="height: 360px !important; object-fit: cover;" src="./admin/fotos_produtos/<?php echo $pc_atual["foto_produto"] ?>" alt="..." />
                          <div class="card-img-overlay ps-0"></div>
                          <div class="card-body ps-0 bg-200">
                            <h5 class="fw-bold text-1000 text-truncate">
                              <?php echo $pc_atual["nome_produto"] ?>
                            </h5>
                            <div class="fw-bold">
                              <span class="text-600 me-2 text-decoration-line-through">$<?php echo $prev_preco ?></span><span class="text-primary">$<?php echo $actual_preco ?></span>
                            </div>
                          </div>
                          <a class="stretched-link" href="./produto.php?id_produto=<?php echo $pc_atual["id_produto"] ?>"></a>
                        </div>
                      </div>
                    <?php endfor ?>
                  </div>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-center mt-5">
                <a class="btn btn-lg btn-dark" href="./busca.php?pesquisa=">Ver todos</a>
              </div>
            </div>
          </div>
          <!-- end of .container-->
    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <!-- <section> close ============================-->
    <!-- ============================================-->

    <section class="py-0 mb-11 mt-7">
      <div class="container">
        <div class="row h-100">
          <div class="col-lg-7 mx-auto text-center mb-6">
            <h5 class="fs-3 fs-lg-5 lh-sm mb-3">Confira as novidades</h5>
          </div>
          <div class="col-12">
            <div class="carousel slide" id="carouselNewArrivals" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <div class="row h-100 align-items-center g-2">
                    <?php
                    for ($i = 0; $i < sizeof($produtos_novos); $i++) :
                      $pn_actual = $produtos_novos[$i];
                    ?>
                      <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                        <div class="card card-span h-100 text-white">
                          <img class="card-img h-100" style="height: 544px !important; object-fit: cover;" src="./admin/fotos_produtos/<?php echo $pn_actual["foto_produto"] ?>" alt="..." />
                          <div class="card-img-overlay bg-dark-gradient d-flex flex-column-reverse">
                            <h6 class="text-primary">$<?php echo number_format($pn_actual["preco_produto"]) ?></h6>
                            <!-- <p class="text-400 fs-1">Jumper set for Women</p> -->
                            <h4 class="text-light"><?php echo $pn_actual["nome_produto"]; ?></h4>
                          </div>
                          <a class="stretched-link" href="./produto.php?id_produto=<?php echo $pn_actual["id_produto"] ?>"></a>
                        </div>
                      </div>
                    <?php endfor ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================-->

    <section class="py-11">
      <div class="bg-holder overlay overlay-0" style="
            background-image: url(assets/img/gallery/cta.png);
            background-position: center;
            background-size: cover;
          "></div>
      <!--/.bg-holder-->

      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="carousel slide carousel-fade" id="carouseCta" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                  <div class="row h-100 align-items-center g-2">
                    <div class="col-12">
                      <div class="text-light text-center py-2">
                        <h5 class="display-4 fw-normal text-400 fw-normal mb-4">
                          Visite nossas lojas em
                        </h5>
                        <h1 class="display-1 text-white fw-normal mb-8">
                          London
                        </h1>
                        <a class="btn btn-lg text-light fs-1" href="#!" role="button">Ver o endereço
                          <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                          </svg></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                  <div class="row h-100 align-items-center g-2">
                    <div class="col-12">
                      <div class="text-light text-center py-2">
                        <h5 class="display-4 fw-normal text-400 fw-normal mb-4">
                          Visite nossas lojas em
                        </h5>
                        <h1 class="display-1 text-white fw-normal mb-8">
                          Bristol
                        </h1>
                        <a class="btn btn-lg text-light fs-1" href="#!" role="button">Ver o endereço
                          <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                          </svg></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <div class="row h-100 align-items-center g-2">
                    <div class="col-12">
                      <div class="text-light text-center py-2">
                        <h5 class="display-4 fw-normal text-400 fw-normal mb-4">
                          Visite nossas lojas em
                        </h5>
                        <h1 class="display-1 text-white fw-normal mb-8">
                          Birmingham
                        </h1>
                        <a class="btn btn-lg text-light fs-1" href="#!" role="button">Ver o endereço
                          <svg class="bi bi-arrow-right-short" xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
                          </svg></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouseCta" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouseCta" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next </span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <?php
    require_once("./partials/_footer.php");
    ?>
    <!-- <section> close ============================-->
    <!-- ============================================-->
  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->

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