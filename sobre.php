<!DOCTYPE html>
<html>

<head>
  <meta name="theme-color" content="#000000" />


  <title>Atelier Dyanne </title>
  <link rel="shortcut icon" href="atelier.ico" type="image/x-icon" />
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="./pagina.css" />

</head>

<body>
  <!--barra de navegação-->
  <?php require_once("./partials/_navbar.php") ?>
  <!--  capa da página  -->
  <!--  conteúdo  -->
  <section id="sobre" class="center py-5" style="min-height: calc(100vh - 70px)">
    <div class="container">
      <div class="row" style="display: flex; width: 100%; align-items: center">
        <!-- imagens -->
        <div class="col-md-6">
          <div class="row" id="imagens">
            <div class="col-md-6">
              <img src="./img/2.svg" alt="" style="border-radius: 10px" />
            </div>
          </div>
        </div>
        <!-- fim imagens -->

        <!-- texto -->
        <div class="col-md-6">
          <h2 style="color: #cca152; text-align: center">
            O que o Atelier Dyanne tem?
          </h2>
          <h3 style="color: #cca152">Vestidos de Noivas e acessórios</h3>
          <p>
            O Atelier Dyanne tem diversidade de produtos para o gosto de todas
            as mulheres, combinações perfeitas para noivas e damas de honra
          </p>

          <h3 style="color: #cca152">Diversidade de acessórios e bolsas</h3>
          <p>
            O Atelier Dyanne oferece aos seus clientes acessórios e bolsas
            para usar e desfrutar no seu dia-a-dia, aqui você pode encontrar o
            acesssório ideal para compartilhar com quem ama ou estar
            deslumbrante em qualquer evento.
          </p>

          <h3 style="color: #cca152">Serviços mais solicitados</h3>
          <p>
            O Atelier Dyanne é a escolha Nº1 de muitos noivos e padrinhos.
            Oferecendo sempre Serviços de qualidade feitos com muito amor.
          </p>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>