<!DOCTYPE html>
<html lang="pt-BR">
<?php
session_start(); 

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario']) || $_SESSION['idNivelUsuario'] != 2) {
    // Se não estiver logado ou se não for admin, redireciona para a página de login ou uma página de erro
    header("Location: formLogin.php"); // ou qualquer outra página desejada
    exit();
}
?>

<head>
  <title>EDITAR USUARIO</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../recursos/css/produtos.css">
  <link rel="icon" href="../recursos/imagens/icon.png" type="image/png">
  <link href="../recursos/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../recursos/css/produtos.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="../recursos/js/bootstrap.bundle.min.js"></script>
  <script src="../recursos/js/jquery-3.5.1.min.js"></script>
  <script src="../recursos/js/popper.min.js"></script>
  <script src="../recursos/js/script.js"></script>

</head>
<?php
include '../controladora/conexao.php';
include '../modelo/usuario.php';
include '../repositorio/usuarios_repositorio.php';

$usuariosRepositorio = new usuarioRepositorio($conn);
$usuarios = $usuariosRepositorio->buscarTodosClientes();
?>

<body>
  <div class="login-title text-center">
    <a href="/">
      <img src="../recursos/imagens/logo.png" alt="Logo" class="logo">
    </a>
    <h1>EDITAR USUARIO</h1>
  </div>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto d-flex align-items-center">
    </ul>
  </div>
  </div>
  </nav>

  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="container container-form-login mt-5" id="login-form">
          <div class="icon-box">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $idUsuario = $_POST["id"];
              $sql = "SELECT * FROM usuario WHERE idUsuario = $idUsuario";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
            ?>
                <!-- Formulário de edição -->
                <form action="../controladora/processar_editar_usuario.php" method="POST" enctype="multipart/form-data" class="formulario-edicao">
                  <input type="hidden" name="idUsuario" value="<?= $usuario["idUsuario"] ?>">

                  <label for="nome" class="titulo-campo">Nome:</label>
                  <input type="text" name="nome" placeholder="Digite seu nome" value="<?= $usuario["nome"] ?>" class="custom-input"><br>

                  <label for="email" class="titulo-campo">Email:</label>
                  <input type="text" name="email" placeholder="Digite seu email" value="<?= $usuario["email"] ?>" class="custom-input"><br>

                  <label for="senha" class="titulo-campo">Nova Senha:</label>
                  <input type="password" class="form-control custom-input" id="senha" placeholder="Digite uma senha" name="senha">
                  <div class="invalid-feedback">A senha deve ter no mínimo 6 caracteres, incluindo letras e números.</div><br>

                  <label for="cpf" class="titulo-campo">CPF:</label>
                  <input type="text" placeholder="Digite o CPF" name="cpf" value="<?= $usuario["cpf"] ?>" class="custom-input"><br>

                  <label for="telefone" class="titulo-campo">Telefone:</label>
                  <input type="text" placeholder="Digite o telefone" name="telefone" value="<?= $usuario["telefone"] ?>" class="custom-input"><br>

                  <label for="cep" class="required titulo-campo">CEP</label>
                  <input type="text" class="form-control" id="cep" placeholder="Digite seu cep" name="cep"><br>

                  <label for="logradouro" class="required titulo-campo">Rua</label>
                  <input type="text" class="form-control" id="logradouro" placeholder="Digite a rua" name="logradouro"><br>

                  <label for="complemento" class="titulo-campo">Complemento</label>
                  <input type="text" class="form-control" id="complemento" placeholder="Digite o complemento" name="complemento"><br>

                  <label for="numero" class="required titulo-campo">Número</label>
                  <input type="text" class="form-control" id="numero" placeholder="Digite o número" name="numero"><br>

                  <label for="bairro" class="required titulo-campo">Bairro</label>
                  <input type="text" class="form-control" id="bairro" placeholder="Digite o bairro" name="bairro"><br>

                  <label for="cidade" class="required titulo-campo">Cidade</label>
                  <input type="text" class="form-control" id="cidade" placeholder="Digite a cidade" name="cidade"><br>
                  <button type="submit" class="btn btn-primary btn-lg btn-block botao-salvar-edicoes">Salvar edições</button>
                </form><br><br>
          </div>

          <script type="text/javascript">
            $(function() {
              // Desativa a exibição de tooltip por hover
              $('[data-bs-toggle="tooltip"]').tooltip('dispose');
            });

            // Função para mostrar o tooltip
            function mostrarTooltip(element, message) {
              element.attr('data-bs-title', message);
              element.tooltip('show');
            }

            // Função para limpar os tooltips
            function limparTooltips() {
              $('[data-bs-toggle="tooltip"]').tooltip('dispose');
            }

            // Validação de CEP
            function limpa_formulário_cep() {
              $("#logradouro").val("");
              $("#bairro").val("");
              $("#cidade").val("");
              $("#uf").val("");
            };

            $("#cep").blur(function() {
              var cep = $(this).val().replace(/\D/g, '');
              if (cep != "") {
                var validacep = /^[0-9]{8}$/;
                if (validacep.test(cep)) {
                  $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                    if (!("erro" in dados)) {
                      $("#logradouro").val(dados.logradouro);
                      $("#bairro").val(dados.bairro);
                      $("#cidade").val(dados.localidade);
                      $("#uf").val(dados.uf);
                    } else {
                      limpa_formulário_cep();
                      mostrarTooltip($('#cep'), 'CEP não encontrado.');
                    }
                  });
                } else {
                  limpa_formulário_cep();
                  mostrarTooltip($('#cep'), 'Formato de CEP inválido.');
                }
              } else {
                limpa_formulário_cep();
              }
            });
          </script>
      <?php

              } else {
                echo "Usuario não encontrado";
              }
            }
            $conn->close(); ?>
        </div>
      </div>
    </div>
    </div>
  </section>

</body>

</html>
