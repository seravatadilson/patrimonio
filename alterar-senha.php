<?php
require_once ('bd/Connection.php');
require_once "verifica.php";
$sessao = $_SESSION['siape'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alterar | Senha </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" type="text/css" href="bootstrap4/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!--script type="text/javascript"  src="bootstrap4/dist/js/bootstrap.min.js"></script-->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
 

<!-- Funcao JavaScript Para Mostrar Senha -->
<script type="text/javascript">
    
        jQuery(document).ready(function($) {
    
        $('#show_password').hover(function(e) {
            e.preventDefault();
            if ( $('#novaSenha').attr('type') == 'password' ) {
            $('#novaSenha').attr('type', 'text');
            $('#show_password').attr('class', 'fa fa-eye');
            } else {
                $('#novaSenha').attr('type', 'password');
                $('#show_password').attr('class', 'fa fa-eye-slash');
            }
        });

        $('#show_password1').hover(function(e) {
            e.preventDefault();
            if ( $('#repetirSenha').attr('type') == 'password' ) {
            $('#repetirSenha').attr('type', 'text');
            $('#show_password1').attr('class', 'fa fa-eye');
            } else {
                $('#repetirSenha').attr('type', 'password');
                $('#show_password1').attr('class', 'fa fa-eye-slash');
            }
        });
        
        });
</script>
<!-- Fim da Função-->

<!--Incio da função em Jquery para submeter o forms -->
<script type="text/javascript">
$(document).ready(function(){// ao carregor o arquivo vai carregar a função
$("#enviar").click(function(){// ao click do botão enivar inicia a função 'repare que eu utilizei # mais ID do botão.
	var usuario = $("#usuario").val();//pega o valor do campo usuario e guarda em uma variavel.
	var login = $("#login").val();//pega o valor do campo login e guarda em uma variavel.
	var passwd = $("#passwd").val();//pega o valor do campo senha e guarda em uma variavel.
	$.post("action/atualizar-senha.php",{usuario: usuario, login: login, passwd:passwd}, function(retorno){//aqui o Jquery envia dos dados via post para o arquivo cadUser.php onde acontecerá as validações, após as validações o arquivo retornará uma mensagem de erro ou ok.
		beforeSend:$("#retorno").html(retorno);//a o Jquery vai receber a resposta e escreve-lá na div retorno.
	});
});
});
</script>
<!-- fim da função -->
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
        
    </div>
</nav>

<!-- div que contem o formulario -->
<div class="container">

    <form class="form-index" action="action/atualizar-senha.php" method="POST">

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Senha Atual</label>
                        <input type="password" class="form-control" name= "senhaAtual" id="senhaAtual" aria-describedby="emailHelp" placeholder="Inserir senha atual">
                        <small id="emailHelp" class="form-text text-muted">Nunca compartilhe sua senha.</small>
                    </div>

                    <div class="checkbox col-md-8 mt-2">
                        <label for="exampleInputEmail1"> Nova Senha</label>
                        <input type="password" class="form-control" name="novaSenha" id="novaSenha" aria-describedby="emailHelp" placeholder="Repita a senha">
                        
                    </div>
                    <div class="checkbox col-md-4">
                        <!--button type="button" id="show_password" name="show_password" class="fa fa-eye-slash" aria-hidden="true"></button--> 
                        <!--label><input type="checkbox" id="check1" value=""> Mostrar Senha</label-->
                        <img id="show_password" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII="/>
                    </div> 

                    <div class="checkbox col-md-8 mt-2">
                        <label for="exampleInputEmail1"> Repetir Senha</label>
                        <input type="password" class="form-control" name="repetirSenha" id="repetirSenha" aria-describedby="emailHelp" placeholder="Repita a senha">
                    </div>
                    <div class="checkbox col-md-4">
                        <img id="show_password1" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII="/>
                        <!--label><input type="checkbox" id="check2" value=""> Mostrar Senha</label-->
                    </div> 

                     <div class="col-md-8 mt-4">
                        <div class="captcha_wrapper">
                            <div class="g-recaptcha" data-sitekey="6LdOSHoUAAAAAP8Di2kZlmJRdbPjhpeYojI584pg"></div>
                        </div>
                    </div>

                    <div class="col-md-8 mt-4">
                        <button type="submit" id="enviar" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>      
    </form>

</div>
  

<!-- Rodapé -->
<footer class="fixed-bottom">

    <p>&copy;Todos os direitos reservados</p>

</footer>
</body>

</html>