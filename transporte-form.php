<!DOCTYPE html>
<?php
require "verifica.php";
$sessao = $_SESSION['siape'];
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
    <script src="js/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
        function change() {
            
            var items = $("#tp-veiculo").val();
          
            if (items == "Ranger") {
                var placa1 = "NOK-3025";
                document.getElementById("btn-placa").value = placa1;
                //alert(items);
                
            }else if(items == "Triton L-200") {
                //(items);
                var placa2 = "PHG-7308";
                document.getElementById("btn-placa").value = placa2;
            }           
        }
    </script>
</head>
<body>
<?php
require_once ('bd/Connection.php');
$connect = new Connection();

#seleciona os dados da tabela setor
$sql = "SELECT Siape, Nome, Telefone, email FROM servidor where Siape = '$sessao'";
  $resultado = mysqli_query($connect->__connection(),$sql) or die(mysqli_error());


$sql_local = "SELECT ID_Local, Local_Nome FROM local";
$result_local = mysqli_query($connect->__connection(),$sql_local) or die(mysqli_error());

$select_car = "SELECT Placa_Veiculo, Modelo FROM veiculo";
$result_car = mysqli_query($connect->__connection(),$select_car) or die(mysqli_errno());


$select_motorista = "SELECT CPF_Motorista, Nome FROM motorista";
$result_mt = mysqli_query($connect->__connection(),$select_motorista) or die(mysqli_errno());


?>
<!-- Barra de Navegação -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="home.php"><span class="img-logo">Assets Manager</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#togglenavbar" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Alternar navegação</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="togglenavbar" class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="home.php">home</a></li>
                <li class="nav-item"><a class="nav-link" href="sobre.php">sobre</a></li>
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

<div class="container conteudo">
    <div class="row form-titulo">
        <div class="col-md-12 form-text-titulo">
            <h2>Reserva de Transporte</h2>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <form action="action/solicitar_transport.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="local-saida">Local de saída</label>
                            <input type="text" class="form-control" id="local-saida" name ="origem" placeholder="Origem">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="destino">Destino</label>
                            <input type="text" class="form-control" id="destino" name="destino" placeholder="Destino">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="finalidade">Finalidade</label>
                            <textarea class="form-control" id="finalidade" name="finalidade" placeholder="Qual a finalidade?"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="passageiros">Número de Passageiros</label>
                            <input type="text" class="form-control" name="passageiros" id="passageiros" placeholder="Digite o número de passageiros">
                        </div>
                    </div>
                </div>

                <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php $nome = mysqli_fetch_array($resultado) ?>
                            <label for="responsável">Nome do responsável pela viagem</label>
                            <input type="text" class="form-control" name="nome-responsavel" id="responsável" value="<?php echo $nome['Nome']; ?>" placeholder="Nome do responsável">
                            <input type="hidden" class="form-control" name="email" value="<?php echo $nome['email']; ?>">
                            <input type="hidden" class="form-control" name="cod_siape" value="<?php echo $nome['Siape']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefone">Contato do Responsável</label>
                            <input type="text" class="form-control" name="resp-contato" id="telefone"  value="<?php echo $nome['Telefone']; ?>" placeholder="(92) xxxxx-xxxx">
                        </div>
                    </div>      
                </div>
                <div class="col-md-12 dropdown-divider"></div> 
                <div> <p><i> <b>Observação:</b> Todos os discentes devem possuir seguro de vida.</i></p></div>
         
                <div class="row"> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="passageiro">Nome do passageiro(a)</label>
                            <input type="text" class="form-control" name="passageiro1" id="passageiro" placeholder="Nome do passageiro(a)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="regpassageiro">Registro do Passageiro (Siape/CPF)</label>
                            <input type="text" class="form-control" name="p-registro1" id="regpassageiro" placeholder="Número do SIAPE ou CPF">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row"><p>Possui seguro?</p></div>
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" name="group0" value="sim" type="radio" id="radio115">
                                <label class="form-check-label" for="radio115">Sim</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" name="group0" value="nao" type="radio" id="radio116">
                                <label class="form-check-label" for="radio116">Não</label>
                            </div>
                        </div>
                        </div>                 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="passageiro">Nome do passageiro(a)</label>
                            <input type="text" class="form-control" name="passageiro2" id="passageiro" placeholder="Nome do passageiro(a)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="regpassageiro">Registro do Passageiro (Siape/CPF)</label>
                            <input type="text" class="form-control" name="p-registro2" id="regpassageiro" placeholder="Número do SIAPE ou CPF">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row"><p>Possui seguro?</p></div>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="group1" value="sim" type="radio" id="radio117">
                                    <label class="form-check-label" for="radio117">Sim</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="group1" value="nao" type="radio" id="radio118">
                                    <label class="form-check-label" for="radio118">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>        

                <div class="row">  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="passageiro">Nome do passageiro(a)</label>
                            <input type="text" class="form-control" name="passageiro3" id="passageiro" placeholder="Nome do passageiro(a)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="regpassageiro">Registro do Passageiro (Siape/CPF)</label>
                            <input type="text" class="form-control" name="p-registro3" id="regpassageiro" placeholder="Número do SIAPE ou CPF">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row"><p>Possui seguro?</p></div>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="group2" value="sim" type="radio" id="radio118">
                                    <label class="form-check-label" for="radio118">Sim</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="group2" value="nao" type="radio" id="radio119">
                                    <label class="form-check-label" for="radio119">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="passageiro">Nome do passageiro(a)</label>
                            <input type="text" class="form-control" name="passageiro4"  id="passageiro" placeholder="Nome do passageiro(a)">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="regpassageiro">Registro do Passageiro (Siape/CPF)</label>
                            <input type="text" class="form-control" name="p-registro4" id="regpassageiro" placeholder="Número do SIAPE ou CPF">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row"><p>Possui seguro?</p></div>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="group3" value="sim" type="radio" id="radio121">
                                    <label class="form-check-label" for="radio121">Sim</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="group3" value="nao" type="radio" id="radio122">
                                    <label class="form-check-label" for="radio122">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="veiculo">Veículo</label>
                            <select class="form-control custom-select" onChange="change();" name="veiculo" id="tp-veiculo" placeholder="Selecione o veículo">
                            <option>Selecionar Veiculo</option>
                            <?php while($pegar_nome = mysqli_fetch_array($result_car)){ ?>
                                <option name="t-veiculo" value="<?php echo $pegar_nome['Modelo']; ?>">
                                    <?php echo $pegar_nome['Modelo']; ?>
                                <?php } ?>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="placa">Placa</label>
                            <input type="text"  name="btn-placa" id="btn-placa"  class="form-control" value="">
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="motorista">Motorista</label>
                            <select class="form-control custom-select" name="mt-veiculo"  id="motorista" placeholder="Selecione o motorista">
                                <option>Selecionar Motorista</option>
                                <?php while($pegar_mtr = mysqli_fetch_array($result_mt)){ ?>
                                <option name="mt-veiculo" value="<?php echo $pegar_mtr['CPF_Motorista']; ?>">
                                    <?php echo $pegar_mtr['Nome']; ?>
                                <?php } ?>
                                </option>
                            </select>
                        </div>              
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data-solicitacao">Data da solicitação</label>
                            <input type="text" class="form-control" name="data-solicitacao" value="<?php echo date('d-m-Y'); ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hora-solicitacao">Hora da Solicitação</label>
                            <input type="text" class="form-control" name="hora-solicitacao" value="<?php  date_default_timezone_set('UTC'); date_default_timezone_set('America/Manaus'); echo date('G:i');  ?>"/> 
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-float">
                            <button type="submit" name="submit" class="btn btn-primary">Solicitar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>
                
            </form>

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
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('[data-toggle="popover"]').popover()
    });
</script>
<script src="bootstrap4/assets/js/vendor/popper.min.js"></script>
<script src="bootstrap4/dist/js/bootstrap.min.js" ></script>
</body>
</html>
