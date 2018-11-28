<!DOCTYPE html>
<?php
require "verifica.php";
require "bd/Select.php";

$busca = buscaServidores();

$dados = array();

while ($r = mysqli_fetch_array($busca)) {
    $dados[]=$r;
}

?>

<html lang="pt-br">
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
        <div id="togglenavbar" class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Solicitação
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
                        <a class="dropdown-item" href="#">Alterar Senha</a>
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

<div class=" container home-body">
    <div class="row">
        <div class="col-md-12">

            <div id="alert-success" class="alert alert-success" role="alert" style="display:none; margin-top: 10px;">Excluído com sucesso!</div>
            <div id="alert-fail" class="alert alert-danger" role="alert" style="display:none; margin-top: 10px;">Houve erro!</div>

            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr style="text-align: center;">
                    <td>Siape</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Cargo</td>
                    <td>Setor</td>
                    <td>Ações</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($dados as $d) {?>
                    <tr>
                        <td><?php echo $d['Siape'];?></td>
                        <td><?php echo $d['Nome'];?></td>
                        <td><?php echo $d['email'];?></td>
                        <td><?php echo $d['Telefone'];?></td>
                        <td><?php echo $d['Cargo'];?></td>

                        <td><?php echo $d['Setor_Nome'];?></td>
                        <td class="action">
                            <a onclick="newPopup('<?php echo $d['Siape']?>')"><img class="iconlist edit" title="Editar" src="images/si-glyph-pencil.svg"></a>
                            <a onclick="exclui('<?php echo $d['Siape']?>')"><img class="iconlist delete" title="Excluir" src="images/si-glyph-trash.svg"></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Rodapé -->
<footer>

    <p>&copy;Todos os direitos reservados</p>

</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap4/assets/js/vendor/jquery-slim.min.js"></script>
<script  type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('[data-toggle="popover"]').popover()
    })
</script>
<script src="bootstrap4/assets/js/vendor/popper.min.js"></script>
<script src="bootstrap4/dist/js/bootstrap.min.js" ></script>
<script>
    function newPopup(obj) {
        var route = 'edit-servidor.php?siape='+obj;
        varWindow = window.open(route,'popup',"width=500,height=650,top=100,left=100,scrollbars=1,location bar=0,locationbar=0,menubar=no,toolbar=0,resizable=0");
    }

    function exclui(siape) {
        $.ajax({
            url: 'action/exclui-servidor.php',
            type:'post',
            data:{siape:siape},
            success:function (response) {
                console.log(response);
                if (response == 'success') {
                    $('#alert-success').show();
                    $('#alert-fail').hide();
                } else {
                    $('#alert-success').hide();
                    $('#alert-fail').show();
                }
            }
        });
    }
</script>
</body>
</html>
