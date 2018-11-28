
<?php
require_once "verifica.php";
$sessao = $_SESSION['siape'];
 ?>
 <!DOCTYPE html>
<html>
<head>
    <title>Reservar Local</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/estilo.css" >
    
    
    <link rel="stylesheet" href="css/datepicker.css">

</head>
<body>

<?php
require_once ('bd/Connection.php');
$con = new Connection();

#seleciona os dados da tabela setor
$sql = "SELECT Siape,Nome, Telefone FROM servidor where Siape = '$sessao'";
  $resultado = mysqli_query($con->__connection(),$sql) or die(mysqli_error());

$sql_setor = "SELECT ID_Setor, Setor_Nome FROM setor";
$result = mysqli_query($con->__connection(),$sql_setor) or die(mysqli_error());

$sql_local = "SELECT * FROM local";
$result_local = mysqli_query($con->__connection(),$sql_local) or die(mysqli_error());


$sql_h = "SELECT * FROM hora";
$result_hora = mysqli_query($con->__connection(), $sql_h);
$result_hora_f = mysqli_query($con->__connection(), $sql_h);

?>

<!-- Barra de Navegação -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
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
                        <a class="dropdown-item" href="alterar-senha">Alterar Senha</a>
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

<div class="container conteudo">
    <div class="row form-titulo">
        <div class="col-md-12 form-text-titulo">
            <h2>Reserva de Local</h2>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <form action="action/solicitacao.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="solicitante">Solicitante</label>
                            <?php $setor = mysqli_fetch_array($resultado) ?>
                            <input type="hidden" name="siape" value="<?php echo $setor['Siape']; ?>">
                            <input type="text" readonly class="form-control" id="solicitante" name="nome" value="<?php echo $setor['Nome']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" readonly class="bfh-phone form-control" id="telefone" name="telefone" value="<?php echo $setor['Telefone']; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="setor">Unidade/Setor</label>
                            <select class="form-control" id="setor" name="setor" placeholder="Selecione o setor" required>
                            <?php while($setor_sql = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $setor_sql['ID_Setor']; ?>">

                                <?php echo $setor_sql['Setor_Nome']; ?>

                                </option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="atividade">Nome da Atividade/Evento</label>
                        <input type="text" class="form-control" id="atividade" name="atividade" placeholder="Informe a atividade ou evento" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="local">Selecione Local Que Deseja Reservar</label>
                            <select class="form-control" id="local" name="local" placeholder="Selecione o setor" onchange="mostraM()"  required>
                                <option value="0">Escolha um local</option>
                                <?php while ($pegar_id_local = mysqli_fetch_assoc($result_local)) { ?>
                                        <option value="<?php echo $pegar_id_local['ID_Local'] ?>"><?php echo $pegar_id_local['Local_Nome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                                                
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="midias" id="turnoEstuda" style="display: none">Escolha a midia:
                            <div id="turnoEstuda" class="form-control">
                                <div class="radio">
                                    <label><input type="checkbox"  name="check_list[]" value="Projetor Multimidia"> Projetor Multimidia</label>
                                </div>
                                <div class="radio">
                                    <label><input type="checkbox"  name="check_list[]" value="TV / Videocasete"> TV / Videocasete</label>
                                </div>
                                <div class="radio">
                                    <label><input type="checkbox"  name="check_list[]" value="Microfone"> Microfone</label>
                                </div>
                                <div class="radio">
                                    <label><input type="checkbox"  name="check_list[]" value="Mesa de Som"> Mesa de Som</label>
                                </div>
                                <div class="radio">
                                    <label><input type="checkbox"  name="check_list[]" value="Tela de Projeção"> Tela de Projeção</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="data-hora" class="row">

                        <div class="col-md-12">
                            <a href="calendario.php" class="btn btn-outline-secondary btn-lg" role="button" aria-disabled="ftrue">Verificar Data Disponivel</a>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="datas">Data</label>
                                <!--input type="date" class="form-control" id="datas" name="data" onchange="pegaData('datas','inicio','fim')" placeholder="Informe uma data"-->
                                <input type="date" class="form-control " id="datas" name="data"  placeholder="Informe uma data">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label>Hora de Realização</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-float">
                                    <select class="form-control" id="inicio" name="horainicio">
                                        <option value="">Início</option>
                                        <option value="2">8:00:00</option>
                                        <option value="4">8:30:00</option>
                                        <option value="6">9:00:00</option>
                                        <option value="8">9:30:00</option>
                                        <option value="10">10:00:00</option>
                                        <option value="12">10:30:00</option>
                                        <option value="14">11:00:00</option>
                                        <option value="16">11:30:00</option>
                                        <option value="18">12:00:00</option>
                                        <option value="20">12:30:00</option>
                                        <option value="22">13:00:00</option>
                                        <option value="24">13:30:00</option>
                                        <option value="26">14:00:00</option>
                                        <option value="28">14:30:00</option>
                                        <option value="30">15:00:00</option>
                                        <option value="32">15:30:00</option>
                                        <option value="34">16:00:00</option>
                                        <option value="36">16:30:00</option>
                                        <option value="38">17:00:00</option>
                                        <option value="40">17:30:00</option>
                                        <option value="42">18:00:00</option>
                                        <option value="44">18:30:00</option>
                                        <option value="46">19:00:00</option>
                                        <option value="48">19:30:00</option>
                                        <option value="50">20:00:00</option>
                                        <option value="52">20:30:00</option>
                                        <option value="54">21:00:00</option>
                                        <option value="56">21:30:00</option>                                       
                                    </select>
                                </div>
                                <div class="col-md-6 form-float">
                                    <select class="form-control" id="fim"  name="horafim">
                                        <option  value="">Final</option>
                                        
                                        <option value="3">8:30:00</option>
                                        <option value="5">9:00:00</option>
                                        <option value="7">9:30:00</option>
                                        <option value="9">10:00:00</option>
                                        <option value="11">10:30:00</option>
                                        <option value="13">11:00:00</option>
                                        <option value="15">11:30:00</option>
                                        <option value="17">12:00:00</option>
                                        <option value="19">12:30:00</option>
                                        <option value="21">13:00:00</option>
                                        <option value="23">13:30:00</option>
                                        <option value="25">14:00:00</option>
                                        <option value="27">14:30:00</option>
                                        <option value="29">15:00:00</option>
                                        <option value="31">15:30:00</option>
                                        <option value="33">16:00:00</option>
                                        <option value="35">16:30:00</option>
                                        <option value="37">17:00:00</option>
                                        <option value="39">17:30:00</option>
                                        <option value="41">18:00:00</option>
                                        <option value="43">18:30:00</option>
                                        <option value="45">19:00:00</option>
                                        <option value="47">19:30:00</option>
                                        <option value="49">20:00:00</option>
                                        <option value="51">20:30:00</option>
                                        <option value="53">21:00:00</option>
                                        <option value="55">21:30:00</option>
                                        <option value="57">22:00:00</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>

                    <!--div id="mostrar">

                    </div-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data-solicitacao">Data da Solicitação</label>
                            <input type="text" readonly class="form-control" name="data-solicitacao" value="<?php echo date('d-m-Y'); ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hora-solicitacao">Hora da Solicitação</label>
                            <input type="text" readonly class="form-control" name="hora-solicitacao" value="<?php  date_default_timezone_set('UTC'); date_default_timezone_set('America/Manaus'); echo date('G:i');  ?>"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-float col-md-12">
                        <button type="submit" class="btn btn-primary">Enviar Solitação</button>
                    </div>
                </div>
            </form>
         </div>
    </div>
</div>

    </div>
     <!-- Rodapé -->
    <footer class="fixed-bottom">

    <p>&copy;Todos os direitos reservados</p>

    </footer>

<script src="js/functions.js"></script>
<script  type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script  type="text/javascript" src="bootstrap4/assets/js/vendor/popper.min.js"></script>
<script  type="text/javascript" src="bootstrap4/dist/js/bootstrap.min.js" ></script>



<script type="text/javascript">

  /* function pegaData(data,inicio,fim) {

        var d = document.getElementById(data).value;
        var s = document.getElementById(inicio);
        var f = document.getElementById(fim);
        var n = s.length;
        var m = f.length;
        
        while (n > 0) {
            
            s.remove(n);
            
            n--;
        }
        while (m > 0) {
            f.remove(m);
            m--;
        }

        $.ajax({
            url: 'action/teste.php',
            type:'post',
            data:{data:d,s,f},
            success:function (data) {
                console.log(json);
                var json = jQuery.parseJSON(data);
                for (var i in json) {
                   s.options[s.options.length] = new Option(json[i].Hora, json[i].ID_Hora);
                }
                for (var j in json) {
                    f.options[f.options.length] = new Option(json[j].Hora, json[j].ID_Hora);
                }
            }
        });
    }*/

    function mostraM() {
        var id = document.getElementById('local').value;
        console.log(id);
        if(id==1) {
            mostra();
        } else {
            esconde();
        }
    }

    function mostra() {
        if(document.getElementById("turnoEstuda").style.display == "none")
        {
            document.getElementById("turnoEstuda").style.display = "block";
        }
    }

    function esconde(){
        if(document.getElementById("turnoEstuda").style.display == "block"){
            document.getElementById("turnoEstuda").style.display = "none";
        }
        else {
            document.getElementById("turnoEstuda").style.display = "none";
        }
    }

    function duplicarCampos(){
        var clone = document.getElementById('data-hora').cloneNode(true);
        var destino = document.getElementById('mostrar');
        destino.appendChild(clone);
        var camposClonados = clone.getElementsByTagName('mostrar');
        for(i=1; i<camposClonados.length;i++){
            camposClonados[i].value = '';
        }
    }
    function removerCampos(id){
        var node1 = document.getElementById('mostrar');
        node1.removeChild(node1.childNodes[1]);
    }
    $(function(){
        $("#btn_adicionar").click(function(){
            $("#btn_remover").removeAttr('disabled');
        });

        $("#btn_remover").click(function(){
            if(removerCampos > 1)
                $("#btn_remover").attr('disabled', 'disabled');

            else{
                $("#btn_remover").removeAttr('disabled');
            }
        });
    });

</script>

</body>
</html>
