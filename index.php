<!DOCTYPE html>
<html lang="pt-BR">
  <?php
        session_start();
    ?>
<head>
  <title>Alcântara Gás</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- LINKS -->
  <link rel="icon" href="../recursos/imagens/icon.png" type="image/png">
  <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
  <script src="../recursos/js/bootstrap.bundle.min.js"></script>
  <script src="../recursos/js/jquery-3.5.1.slim.min.js"></script>
  <script src="../recursos/js/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../recursos/css/styles.css">
  <link rel="stylesheet" href="../recursos/css/whatsapp-button.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 

  <!-- FIM DOS LINKS -->
</head>
<body>

  <nav class="navbar navbar-expand-sm navbar-custom navbar-dark fixed-top">
    <div class="container-fluid">
      <!-- NAVBAR -->
      <a class="navbar-brand" href="#">
        <img src="../recursos/imagens/logo_nav.png" alt="Logo da Empresa" style="height: 40px;">
      </a>
      
      <!-- BOTAO PARA EXIBIR O MENU EM TELAS MENORES -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <!-- LINKS DE NAVEGACAO E BOTOES -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto d-flex align-items-center">
          <li class="nav-item">
            <a class="nav-link scrollto active" href="#hero">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scrollto active" href="#hero">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scrollto active" href="#hero">Empresa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link scrollto active" href="#hero">Contatos</a>
          </li>
          <!-- Botoes de Logar e Cadastrar -->
          <li class="nav-item">
            <a class="btn btn-outline-light ms-2" href="#">Logar</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-light ms-2" href="#">Cadastrar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- Carrossel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicadores -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  </div>

  <!-- Slideshow/carrossel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../recursos/imagens/banner.jpg" alt="Banner" class="d-block w-100 carousel-image">
    </div>
    <div class="carousel-item">
      <img src="../recursos/imagens/faixada.jpg" alt="Faixada" class="d-block w-100 carousel-image">
    </div>

  </div>

  <!-- Controles/Icones esquerdo e direito -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- SESSAO DO CATALOGO -->
<div class="custom-title">PÁGINA EM CONSTRUÇÃO!</div>

<div class="container produtos-container mt-5">
        <div class="row produtos-row gx-1"> <!-- 'gx-1' para ajustar o espaçamento entre as colunas -->
            <!-- Card 1 -->
            <div class="col-4">
                <div class="card custom-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <h5 class="card-title">Gas Liquigas P13</h5>
                        <p class="card-text">Produzido com altos padrões de segurança e qualidade, é ideal para uso doméstico. O botijão é fabricado com aço de alta resistência e possui válvula de segurança para evitar vazamentos.</p>
                        <a href="#" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-4">
                <div class="card custom-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 2">
                    <div class="card-body">
                        <h5 class="card-title">Gas Nacional P13</h5>
                        <p class="card-text">Feito com aço de alta resistência, o botijão conta com uma válvula de segurança avançada para prevenir vazamentos e garantir a proteção do usuário. Ideal para atender suas necessidades de cozinhar com eficiência e confiança.</p>
                        <a href="#" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-4">
                <div class="card custom-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 3">
                    <div class="card-body">
                        <h5 class="card-title">Gas P20 </h5>
                        <p class="card-text">O Gás P20 é um botijão de GLP com capacidade de 20 kg, ideal para uso em estabelecimentos comerciais e residenciais que requerem maior volume de gás.</p>
                        <a href="#" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-4">
                <div class="card custom-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 4">
                    <div class="card-body">
                        <h5 class="card-title">Gas P45</h5>
                        <p class="card-text">Ideal para uso industrial e comercial.O Gás P20 é um botijão de GLP com capacidade de 45 kg.</p>
                        <a href="#" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="col-4">
                <div class="card custom-card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 5">
                    <div class="card-body">
                        <h5 class="card-title">Agalão de Água</h5>
                        <p class="card-text">O Galão de Água 20L é projetado para armazenar e fornecer água potável de forma prática e segura. Fabricado com plástico de alta qualidade, livre de BPA e outras substâncias nocivas, assegura a integridade e pureza da água. </p>
                        <a href="#" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=11958780556&text=Ol%C3%A1,%20gostaria%20de%20fazer%20um%20pedido!">
  <div class="rwb-tooltip">Faça o seu pedido agora!</div>
  <img src="https://cdn.positus.global/production/resources/robbu/whatsapp-button/whatsapp-icon.svg">
</a>

<!-- SESSÃO DA EMPRESA -->

<div class="container company-container mt-5">
        <div class="row company-row gx-4 justify-content-center"> <!-- 'gx-4' para ajustar o espaçamento entre as colunas -->
            <!-- Coluna de Localização -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h2>Localização</h2>
                <h5>Alcantara Gás</h5>
                <div class="mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3661.052068874323!2d-46.34871968822513!3d-23.42248617880744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce7d43a74efa8f%3A0x50bbde1a6226054f!2sM%20de%20Alc%C3%A2ntara%20Pereira%20G%C3%A1s!5e0!3m2!1spt-BR!2sbr!4v1724381294662!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <p>Estrada Pedro Cunha A Lopes 1873 - FR, SP</p>
                <h3 class="mt-4">Contatos</h3>
                <p>Quer fazer um pedido? Fale conosco!</p>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <hr class="d-sm-none">
            </div>
            <!-- Coluna de Informações da Empresa -->
            <div class="col-lg-8 col-md-12 mb-4">
                <h2>Informações sobre a empresa</h2>
                <h5>Title description, Dec 7, 2020</h5>
                <div class="faixada">
                    <img src="../recursos/imagens/faixada.jpg" class="img-faixada rounded" alt="Cinque Terre">
                </div>
                <p>Some text..</p>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
            </div>
        </div>
    </div>

<!-- FIM DA SESSAO DA EMPRESA -->

<!-- ======= RODAPÉ ======= -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="footer-info">
            <h3>ALCÂNTARA GÁS<span>.</span></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer-contact">
            <h4>Horário de Funcionamento</h4>
            <p>
              Seg - Sex: 8h - 18h<br>
              Sábado: 8h - 14h<br>
              Domingo: Fechado
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer-contact">
            <h4>Endereço</h4>
            <p>
              Rua Exemplo, 123<br>
              Bairro, Cidade - Estado<br>
              CEP: 12345-678<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer-contact">
            <h4>Siga-nos</h4>
            <div class="social-links">
              <a href="https://www.facebook.com/m.de.alcantara.pereira.gas/" target="_blank" class="social-icon"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/alcantara_gas" target="_blank" class="social-icon"><i class="bi bi-instagram"></i></a>
              <a href="https://wa.me/+55 11 95878-0556" target="_blank" class="social-icon"><i class="bi bi-whatsapp"></i></a>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>Alcântara Gás</span></strong><br>
      Todos os direitos reservados
    </div>
  </div>
</footer><!-- FINAL DO RODAPÉ -->



</body>
</html>
