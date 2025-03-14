<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-button.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../recursos/js/jquery-3.5.1.min.js"></script>
  <script src="../recursos/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../recursos/css/login.css">
  <link href="../recursos/imagens/icon.png" rel="icon">

  <title>LOGIN</title>
</head>

<body class="login_bg">
  <!-- Botão do WhatsApp -->
  <a id="robbu-whatsapp-button" target="_white" href="https://api.whatsapp.com/send?phone=5511958780556&text=Ol%C3%A1,%20eu%20gostaria%20de%20fazer%20um%20pedido!%0AProduto(s):%0AQuantidade:%0AMeu%20endere%C3%A7o:%0AMeu%20nome:%0ARetirar%20ou%20entrega:">
    <div class="rwb-tooltip" style="background-color: #fff;">Faça o seu pedido agora!</div>
    <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg">
  </a>
  <main>
    <div class="login-title text-center">
      <a href="/">
        <img src="../recursos/imagens/logo_nav.png" alt="Logo" class="logo">
      </a>
      <h1>LOGIN</h1>
    </div>

    <!-- Login Form -->
    <div class="container container-form-login mt-5" id="login-form">
      <form method="post" action="../controladora/processar_login.php">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" class="form-control" id="email" placeholder="digite o seu e-mail" name="email" required>
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" class="form-control" id="password" placeholder="digite a sua senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-custom-primary btn-block">Entrar</button>
      </form>
      <div id="login-error-alert" class="alert alert-danger d-none mt-3" role="alert">
        Login incorreto. Verifique seu e-mail e senha e tente novamente.
      </div>

      <form method="post" action="cadastrar_cliente.php" class="mt-2">
        <button type="submit" class="btn btn-custom-secondary btn-block">Novo Cadastro</button>
      </form>
    </div>

</body>

</html>
