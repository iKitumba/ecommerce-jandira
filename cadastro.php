<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Criar conta - Atelier Dyanne</title>
    <link rel="shortcut icon" href="atelier.ico" type="image/x-icon" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./cadastro.css" />
    <style>
      * {
        margin: 0;
        padding: 0;
        outline: 0;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
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

      #form-cadastro .form-group input {
        height: 36px;
        border-radius: 4px;
        border: none;
        padding: 0 12px;
      }

      h2 {
        align-self: center;
        font-size: 2rem;
        font-weight: bold;
        font-family: serif;
      }

      .container {
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      #form-cadastro .form-group label {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
          Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue",
          sans-serif;
        font-size: 1rem;
      }

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
      }

      .login {
        font-size: 12px;
        margin-top: 12px;
        display: block;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <form id="form-cadastro" method="post" action="./admin/actions/cadastro_cliente.php">
        <div class="form-group">
          <img src="img/2.png" class="logo" />
          <h2>Criar Conta</h2>
          <label style="color: white" for="nome">Nome</label>
          <input
            type="text"
            id="nome"
            name="nome_cliente"
            required
            minlength="7"
            class="form-control"
            placeholder="Seu nome completo"
          />
        </div>
        <div class="form-group">
          <label style="color: white" for="email">Telefone</label>
          <input
            type="tel"
            id="Telefone"
            class="form-control"
            placeholder="+(244)"
            name="telefone_cliente"
            required
            minlength="9"
            maxlength="9"
          />
        </div>
        <div class="form-group">
          <label style="color: white" for="email">E-mail</label>
          <input
            type="email"
            id="email"
            required
            class="form-control"
            name="email_cliente"
            placeholder="exemplo@email.com"
          />
        </div>
        <div class="form-group">
          <label style="color: white" for="email">Endereço</label>
          <input
            type="text"
            id="endereco_cliente"
            class="form-control"
            placeholder="Endereço de sua residência"
            name="endereco_cliente"
            required
          />
        </div>

        <div class="form-group">
          <label style="color: white" for="senha">Senha</label>
          <input
            type="password"
            id="senha_cliente"
            name="senha_cliente"
            class="form-control"
            placeholder="Digite uma senha segura"
          />
        </div>

        <div class="footer">
          <button>Criar</button>
          <a href="login.php" class="login" style="color: #d8990d"
            >Já tem uma conta? Clique aqui</a
          >
        </div>
      </form>
    </div>
  </body>
</html>