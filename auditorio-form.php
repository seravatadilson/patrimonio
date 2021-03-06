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
                <li class="nav-item"><a class="nav-link" href="sobre.html">sobre</a></li>
                <li class="nav-item"><a class="nav-link" aria-haspopup="true" href="reservar.php">solicitação</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Comunicação Interna</a></li>

            </ul>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="faleconosco.html">fale conosco</a></li>
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
            <h2>Reserva de Auditório</h2>
        </div>
    </div>
    <div class="row">
        <div class="container">
        <form>
            <div class="row">

                <div class="col-md-6">
                    <fieldset class="form-group">
                        <legend>Recursos Audiovisuais</legend>
                        <div class="form-check">
                            <div class="col-md-6 form-float">
                                <label class="form-check-label"><input class="form-check-input" type="checkbox" id="Pro_Mul" name="Pro_Mul" value="1">Projetor multimidia</label>
                                <label class="form-check-label"><input class="form-check-input" type="checkbox" id="TV_Video" name="Tv_Video" value="2">TV/Video cassete</label>
                                <label class="form-check-label"><input class="form-check-input" type="checkbox" id="Ret_Pro" name="Ret_Pro" value="3">Retro projetor</label>
                            </div>
                            <div class="col-md-6 form-float">
                                <label class="form-check-label"><input class="form-check-input" type="checkbox" id="Microfone" name="Microfone" value="4">Microfone</label><br>
                                <label class="form-check-label"><input class="form-check-input" type="checkbox" id="Mesa_Som" name="Mesa_Som" value="5">Mesa de som</label>
                                <label class="form-check-label"><input class="form-check-input" type="checkbox" id="Tela_Proj" name="Tela_Proj" value="6">Tela para projeção</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="custom-radio">
                            <div>
                                <label>Finalidade</label>
                            </div>
                            <label>
                                <input type="radio" name="opcoes"> Atividades curriculares do Curso de Graduação/ICET
                            </label>
                            <label>
                                <input type="radio" name="opcoes"> Atividades curriculares do Curso de Pós-Graduação/ICET
                            </label><br>
                            <label>
                                <input type="radio" name="opcoes"> Outras
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea class="form-control" id="finalidade-outras" name="finalidade-outras" placeholder="Qual a finalidade?"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="evento">Atividade/Evento</label>
                        <input type="text" class="form-control" id="evento" name="evento" placeholder="Informe a atividade ou evento">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="data-inicio">Data de Início</label>
                        <input class="form-control" type="date" id="data-inicio" name="data-inicio">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="data-encerramento">Data de Encerramento</label>
                        <input class="form-control" type="date" id="data-encerramento" name="data-encerramento">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="hora-inicio">Hora de início</label>
                        <select class="form-control" id="hora-inicio" name="hora-inicio">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="hora-enceramento">Hora de encerramento</label>
                        <select class="form-control" id="hora-enceramento" name="hora-encerramento">
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

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="data-inicio2">Data de Início</label>
                        <input class="form-control" type="date" id="data-inicio2">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="data-encerramento2">Data de Encerramento</label>
                        <input class="form-control" type="date" id="data-encerramento2">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="hora-inicio2">Hora de início</label>
                        <select class="form-control" id="hora-inicio2" name="hora-inicio2">
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="hora-enceramento2">Hora de encerramento</label>
                        <select class="form-control" id="hora-enceramento2" name="hora-encerramento2">
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

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="data-inicio3">Data de Início</label>
                        <input class="form-control" type="date" id="data-inicio3">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="data-encerramento3">Data de Encerramento</label>
                        <input class="form-control" type="date" id="data-encerramento3">
                    </div>
                </div>
                <div class="col-md-3">
                        <div class="form-group">
                            <label for="hora-inicio3">Hora de início</label>
                            <select class="form-control" id="hora-inicio3" name="hora-inicio3">
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
            <div class="col-md-3">
                <div class="form-group">
                    <label for="hora-enceramento3">Hora de encerramento</label>
                    <select class="form-control" id="hora-enceramento3" name="hora-encerramento3">
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

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data-solicitacao">Data da solicitação</label>
                        <p id="data-solicitacao">
                          <?php   date_default_timezone_set('America/Manaus');
                              $date = date('d-m-Y');
                                echo $date;   ?>

                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="hora_solicitacao">Hora da Solicitação</label>
                            <p id="hora-solicitacao">
                              <?php   date_default_timezone_set('America/Manaus');
                                  $date = date('H:i');
                                    echo $date;   ?> </p>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status-solicitacao">Status da solicitação</label>
                        <p id="status-solicitacao" class="text-primary">Em aberto</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="auth">Autenticação automática</label>
                        <p id="auth">asdasdasd</p>
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
