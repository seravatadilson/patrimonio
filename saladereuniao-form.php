<!DOCTYPE html>
<?php
require "verifica.php";
 ?>
<html lang="en">
<head>
    <title>Assets Manager - reserva</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/estilo.css" >
</head>
<body>

<!-- Barra de Navegação -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="home.php"><span class="img-logo">Assets Manager</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#togglenavbar" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Alternar navegação</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="togglenavbar" class="navbar-collapse collapse">
            <ul class="nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="home.php">home</a></li>
                <li class="nav-item"><a class="nav-link" href="sobre.php">sobre</a></li>
                <li class="nav-item"><a class="nav-link" aria-haspopup="true" href="reservar.php">solicitação</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Comunicação Interna</a></li>

            </ul>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="faleconosco.php">fale conosco</a></li>
            </ul>

            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="finalizar.php">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Conteúdo -->
<div class="container conteudo">
    <div class="row">
        <div class="col-md-12">
            <h2>Reserva da Sala de Reunião</h2>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="solicitante">Solicitante</label>
                            <input type="text" class="form-control" id="solicitante" placeholder="Digite seu SIAPE">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" placeholder="Digite seu número de contato">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="setor">Unidade/Setor</label>
                            <select class="form-control" id="setor" placeholder="Selecione o setor">
                                <option name="">Diretoria</option>
                                <option name="">Coordenação Acadêmica</option>
                                <option name="">Coordenação de Cursos</option>
                                <option name="">Patrimônio</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="atividade">Nome da Atividade/Evento</label>
                        <input type="text" class="form-control" id="atividade" placeholder="Digite o nome da atividade">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="datas">Data</label>
                            <input type="text" class="form-control" id="datas" placeholder="Digite a data">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label>Hora de realização</label>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-float">
                                <select class="form-control">
                                    <option name="">08:00</option>
                                    <option name="">08:30</option>
                                    <option name="">09:00</option>
                                    <option name="">09:30</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-float">
                                <select class="form-control">
                                    <option name="">08:00</option>
                                    <option name="">08:30</option>
                                    <option name="">09:00</option>
                                    <option name="">09:30</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Solicitar</button>
                <button type="reset" class="btn btn-light">Cancelar</button>
            </form>
        </div>
    </div>
</div>
<!-- Rodapé -->
<footer class = "fixed-bottom">

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
