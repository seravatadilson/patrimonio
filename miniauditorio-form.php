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
                <li class="nav-item"><a class="nav-link" href="comunicacao.php">Comunicação Interna</a></li>

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
    <div class="row form-titulo">
        <div class="col-md-12 form-text-titulo">
            <h2>Reserva de Mini Auditório</h2>
        </div>
    </div>
    <div class="row">
        <div class="container">
        <form action="action/solicitar_mini_auditorio.php">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="solicitante">Solicitante</label>
                        <input type="text" class="form-control" id="solicitante" name="siape" placeholder="Informe seu SIAPE">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="bfh-phone form-control" id="telefone" name="telefone" placeholder="Digite seu número, exemplo: (92) 12345-23345">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="setor">Unidade/Setor</label>
                        <select class="form-control" id="setor" name="setor" placeholder="Selecione o setor">
                            <option name="1">Diretoria</option>
                            <option name="2">Coordenação Acadêmica</option>
                            <option name="3">Coordenação de Cursos</option>
                            <option name="4">Patrimônio</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="atividade">Nome da Atividade/Evento</label>
                    <input type="text" class="form-control" id="atividade" name="atividade" placeholder="Informe a atividade ou evento">
                </div>
            </div>

            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="datas">Datas</label>
                            <input type="date" class="form-control" id="datas" name="data" placeholder="Informe uma data">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label>Hora de realização</label>
                        </div>
                        <div class="row">
                        <div class="col-md-6 form-float">
                            <select class="form-control" name="horainicio">
                                <option value="1">08:00</option>
                                <option value="2">08:30</option>
                                <option value="3">09:00</option>
                                <option value="4">09:30</option>
                                <option value="5">10:00</option>
                                <option value="6">10:30</option>
                                <option value="7">11:00</option>
                                <option value="8">11:30</option>
                                <option value="9">12:00</option>
                                <option value="10">12:30</option>
                                <option value="11">13:00</option>
                                <option value="12">13:30</option>
                                <option value="13">14:00</option>
                                <option value="14">14:30</option>
                                <option value="15">15:00</option>
                                <option value="16">15:30</option>
                                <option value="17">16:00</option>
                                <option value="18">16:30</option>
                                <option value="19">17:00</option>
                                <option value="20">17:30</option>
                                <option value="21">18:00</option>
                                <option value="22">18:30</option>
                                <option value="23">19:00</option>
                                <option value="24">19:30</option>
                                <option value="25">20:00</option>
                                <option value="26">20:30</option>
                                <option value="27">21:00</option>
                                <option value="28">21:30</option>
                                <option value="29">22:00</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-float">
                            <select class="form-control" name="horafim">
                                <option value="1">08:00</option>
                                <option value="2">08:30</option>
                                <option value="3">09:00</option>
                                <option value="4">09:30</option>
                                <option value="5">10:00</option>
                                <option value="6">10:30</option>
                                <option value="7">11:00</option>
                                <option value="8">11:30</option>
                                <option value="9">12:00</option>
                                <option value="10">12:30</option>
                                <option value="11">13:00</option>
                                <option value="12">13:30</option>
                                <option value="13">14:00</option>
                                <option value="14">14:30</option>
                                <option value="15">15:00</option>
                                <option value="16">15:30</option>
                                <option value="17">16:00</option>
                                <option value="18">16:30</option>
                                <option value="19">17:00</option>
                                <option value="20">17:30</option>
                                <option value="21">18:00</option>
                                <option value="22">18:30</option>
                                <option value="23">19:00</option>
                                <option value="24">19:30</option>
                                <option value="25">20:00</option>
                                <option value="26">20:30</option>
                                <option value="27">21:00</option>
                                <option value="28">21:30</option>
                                <option value="29">22:00</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!--div class="row">
                <!--div class="col-md-6">
                    <div class="form-group">
                        <label for="datas2">Datas</label>
                        <input type="date" class="form-control" id="datas2" placeholder="Informe uma data">
                    </div>
                </div11>
                <!--div class="col-md-6">
                    <div>
                        <label>Hora de realização</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-float">
                            <select class="form-control">
                                <option value="1">08:00</option>
                                <option value="2">08:30</option>
                                <option value="3">09:00</option>
                                <option value="4">09:30</option>
                                <option value="5">10:00</option>
                                <option value="6">10:30</option>
                                <option value="7">11:00</option>
                                <option value="8">11:30</option>
                                <option value="9">12:00</option>
                                <option value="10">12:30</option>
                                <option value="11">13:00</option>
                                <option value="12">13:30</option>
                                <option value="13">14:00</option>
                                <option value="14">14:30</option>
                                <option value="15">15:00</option>
                                <option value="16">15:30</option>
                                <option value="17">16:00</option>
                                <option value="18">16:30</option>
                                <option value="19">17:00</option>
                                <option value="20">17:30</option>
                                <option value="21">18:00</option>
                                <option value="22">18:30</option>
                                <option value="23">19:00</option>
                                <option value="24">19:30</option>
                                <option value="25">20:00</option>
                                <option value="26">20:30</option>
                                <option value="27">21:00</option>
                                <option value="28">21:30</option>
                                <option value="29">22:00</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-float">
                            <select class="form-control">
                            <option value="1">08:00</option>
                            <option value="2">08:30</option>
                            <option value="3">09:00</option>
                            <option value="4">09:30</option>
                            <option value="5">10:00</option>
                            <option value="6">10:30</option>
                            <option value="7">11:00</option>
                            <option value="8">11:30</option>
                            <option value="9">12:00</option>
                            <option value="10">12:30</option>
                            <option value="11">13:00</option>
                            <option value="12">13:30</option>
                            <option value="13">14:00</option>
                            <option value="14">14:30</option>
                            <option value="15">15:00</option>
                            <option value="16">15:30</option>
                            <option value="17">16:00</option>
                            <option value="18">16:30</option>
                            <option value="19">17:00</option>
                            <option value="20">17:30</option>
                            <option value="21">18:00</option>
                            <option value="22">18:30</option>
                            <option value="23">19:00</option>
                            <option value="24">19:30</option>
                            <option value="25">20:00</option>
                            <option value="26">20:30</option>
                            <option value="27">21:00</option>
                            <option value="28">21:30</option>
                            <option value="29">22:00</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div-->

            <!--div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="datas3">Datas</label>
                        <input type="date" class="form-control" id="datas3" placeholder="Informe uma data">
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <label>Hora de realização</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-float">
                            <select class="form-control">
                                <option value="1">08:00</option>
                                <option value="2">08:30</option>
                                <option value="3">09:00</option>
                                <option value="4">09:30</option>
                                <option value="5">10:00</option>
                                <option value="6">10:30</option>
                                <option value="7">11:00</option>
                                <option value="8">11:30</option>
                                <option value="9">12:00</option>
                                <option value="10">12:30</option>
                                <option value="11">13:00</option>
                                <option value="12">13:30</option>
                                <option value="13">14:00</option>
                                <option value="14">14:30</option>
                                <option value="15">15:00</option>
                                <option value="16">15:30</option>
                                <option value="17">16:00</option>
                                <option value="18">16:30</option>
                                <option value="19">17:00</option>
                                <option value="20">17:30</option>
                                <option value="21">18:00</option>
                                <option value="22">18:30</option>
                                <option value="23">19:00</option>
                                <option value="24">19:30</option>
                                <option value="25">20:00</option>
                                <option value="26">20:30</option>
                                <option value="27">21:00</option>
                                <option value="28">21:30</option>
                                <option value="29">22:00</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-float">
                            <select class="form-control">
                                <option value="1">08:00</option>
                                <option value="2">08:30</option>
                                <option value="3">09:00</option>
                                <option value="4">09:30</option>
                                <option value="5">10:00</option>
                                <option value="6">10:30</option>
                                <option value="7">11:00</option>
                                <option value="8">11:30</option>
                                <option value="9">12:00</option>
                                <option value="10">12:30</option>
                                <option value="11">13:00</option>
                                <option value="12">13:30</option>
                                <option value="13">14:00</option>
                                <option value="14">14:30</option>
                                <option value="15">15:00</option>
                                <option value="16">15:30</option>
                                <option value="17">16:00</option>
                                <option value="18">16:30</option>
                                <option value="19">17:00</option>
                                <option value="20">17:30</option>
                                <option value="21">18:00</option>
                                <option value="22">18:30</option>
                                <option value="23">19:00</option>
                                <option value="24">19:30</option>
                                <option value="25">20:00</option>
                                <option value="26">20:30</option>
                                <option value="27">21:00</option>
                                <option value="28">21:30</option>
                                <option value="29">22:00</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div-->
            <button type="submit" class="btn btn-primary">Solicitar</button>
            <button type="reset" class="btn btn-light">Cancelar</button>
        </form>
        </div>
    </div>
</div>
<!-- Rodapé -->
<footer class="fixed-bottom">

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
