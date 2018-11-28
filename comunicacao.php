<!DOCTYPE html>
<?php
require "verifica.php";
date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/Y');
$sessao = $_SESSION['siape'];
 ?>
<html lang="en">
<head>
    <title>Assets Manager - home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/estilo.css" >
</head>
<body>

<!-- Barra de Navegação -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="home.php"><span class="img-logo">Assets Manager</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#togglenavbar" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Alternar navegação</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="togglenavbar" class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="reservar.php">Reserva de Local</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="transporte-form.php">Reserva de transporte</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="comunicacao.php">Comunicação Interna</a></li>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="faleconosco.php">Contatos</a></li>
            </ul>
            <ul class="nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="images/si-glyph-gear.svg" class="img-fluid" width="20px" height="20px">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDrop">
                        <a class="dropdown-item" href="alterar-senha.php">Alterar Senha</a>
                        <div class="dropdown-divider"></div>
                        <?php if($_SESSION['admin'] == 0) { ?>
                            <a class="dropdown-item" href="painel.php">Minhas Solicitações</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="painel.php">Reservas</a>
                            <a class="dropdown-item" href="lista-servidores.php">Servidores Cadastrados</a>
                            <a class="dropdown-item" href="lista-siapes.php">Lista de Siapes</a>
                        <?php }?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="finalizar.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Conteúdo -->

<?php
require_once ('bd/Connection.php');
$con = new Connection();

#seleciona os dados da tabela setor
$sql = "SELECT Siape,Nome,email FROM servidor where Siape = '$sessao'";
  $resultado = mysqli_query($con->__connection(),$sql) or die(mysqli_error()); ?>

<div class="container conteudo">
    <div class="row form-titulo">
        <div class="col-md-12 form-text-titulo">
            <h2>Comunicação Interna</h2>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <form action="email.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="solicitante">Solicitante</label>
                            <?php $nome = mysqli_fetch_array($resultado) ?>
                            <input type="text" class="form-control" readonly id="nome_solicitante" name="nome_solicitante" value="<?php echo $nome['Nome']; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data_solicitacao">Data Solicitação</label>
                            <input type="text" class="form-control" id="data_solicitacao" readonly name="data_solicitacao" value="<?php echo $date ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email_solicitante">Email Solicitante</label>
                            <input type="text" class="form-control" id="email_solicitante" readonly name="email_solicitante" value="<?php echo $nome['email']; ?>">
                        </div>
                    </div>
                </div>
                <div class=" row">
                  <div class="form-group col-md-12">
                        <label for="conteudo">Mensagem</label>
                        <textarea name="conteudo" id="conteudo" rows="15" cols="120"></textarea>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Enviar</button>

                    </div>
                </div>
                </div>
            </form>
        </div>
</div>



<!-- Rodapé -->
<footer>

    <p>&copy;Todos os direitos reservados</p>

</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap4/assets/js/vendor/jquery-slim.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('[data-toggle="popover"]').popover()
    })
</script>
<script src="bootstrap4/assets/js/vendor/popper.min.js"></script>
<script src="bootstrap4/dist/js/bootstrap.min.js" ></script>
</body>
</html>
