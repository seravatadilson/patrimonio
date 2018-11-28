<!DOCTYPE html>
<?php
require "verifica.php";
require "bd/Select.php";

#$sessao = $_SESSION['siape'];
if ($_SESSION['admin'] == 0) {
    $busca = buscaReservas($_SESSION['siape']);
    $buscar_st = buscarTransporte($_SESSION['siape']);
    
} else {
    $busca = buscaReservasAdmin();
    $buscar_st = buscarTransporteAdm();
}

$dados = array();

while($r = mysqli_fetch_array($busca)) {
    $dados[]=$r;
}

while($st = mysqli_fetch_array($buscar_st)){
    $t[] = $st;
  }

?>
<?php
require_once ('bd/Connection.php');
$con = new Connection();
#seleciona os dados da tabela transporte
/*$sql = "SELECT ID_Transporte,Local_de_Saida,Destino,Nome_Responsavel,Data_St_Transporte,Hora_Solicitacao,Status_Transporte FROM transporte";
  $resultado = mysqli_query($con->__connection(),$sql) or die(mysqli_error());
    $t = array();
  while($st = mysqli_fetch_array($resultado)){
    $t[] = $st;
  }*/
  //foreach ($dados as $d) {
  //$horas = "Select Hora FROM hora, data_solicitacao, reserva WHERE ID_Hora = id_hora_in AND  Reservar_ID_reserva = ID_Reserva";
  ///$hora_in = "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_in AND  Reserva_ID_Reserva ='$d[ID_Reserva]'";
 // $hora_final= "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_fim AND  Reserva_ID_Reserva ='$d[ID_Reserva]'";
 // $r = mysqli_query($con->__connection(), $hora_in);
 // $r1 = mysqli_query($con->__connection(), $hora_final);
 // $rw = mysqli_fetch_array($r,MYSQLI_ASSOC); 
 // $rf = mysqli_fetch_array($r1,MYSQLI_ASSOC); 
 
   // }
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

<div class="container conteudo">
    <div class="container "> 
        <div class="row" >
            <div class="col-md-4 btn-group">      
                <div class="form-check-inline btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio"  onchange="mostraSelect();" id="rbSTransporte" autocomplete="off" name="optradio">Solicitações de Transporte
                    </label>
                </div>
            </div>
            <div class="col-md-8 btn-group">     
                <div class="form-check-inline btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio"  onchange="mostraSelect();"id="rbSLocal" autocomplete="off" name="optradio" checked>Solicitações de Locais
                    </label>
                </div>
            </div>
        </div>
    </div> 

    <?php if ($_SESSION['admin'] == 1) { ?>
    
    <div class="container" id="ssLocal">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover"  id="ssLocal">
                    <thead class="thead-dark">
                        <tr >
                            <td>Nome Solicitante</td>
                            <td>Atividade</td>
                            <td>Setor</td>
                            <td>Local</td>
                            <td>Data da Solicitação</td>
                            <td>Horário Reservado</td>
                            <td>Status</td>
                            <td>Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    
                        foreach ($dados as $d) {
                            $hora_in = "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_in AND  Reserva_ID_Reserva ='$d[ID_Reserva]'";
                            $hora_final= "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_fim AND  Reserva_ID_Reserva ='$d[ID_Reserva]'";
                            $r = mysqli_query($con->__connection(), $hora_in);
                            $r1 = mysqli_query($con->__connection(), $hora_final);
                            $rw = mysqli_fetch_array($r,MYSQLI_ASSOC); 
                            $rf = mysqli_fetch_array($r1,MYSQLI_ASSOC); 
 
                            ?>
                            <tr>
                                <td><?php echo $d['Nome'];?></td>
                                <td><?php echo $d['Nome_Atividade'];?></td>
                                <td><?php echo $d['Setor_Nome'];?></td>
                                <td><?php echo $d['Local_Nome'];?></td>
                                <td align="center"><?php echo date('d/m/Y', strtotime($d['Data_Solicitacao']));?></td>
                                <td align="center"><?php echo $rw['Hora']." - " .  $rf['Hora'];?></td>
                                <td align="center"
                                    <?php switch ($d['Status']) {
                                        case 'em aberto':
                                            echo "class='text-primary'";
                                            break;
                                        case 'indeferido':
                                            echo "class='text-danger'";
                                            break;
                                        case 'em avaliação':
                                            echo "class='text-warning'";
                                            break;
                                        case 'reservado':
                                            echo "class='text-success'";
                                            break;
                                    }
                                    ?>(>

                                    <?php echo $d['Status'];?></td>
                                <td class="action">
                                    <a onclick="editarLocal('<?php echo $d['ID_Reserva'];?>')"><span><img class="iconlist edit" title="Editar" src="images/si-glyph-pencil.svg"></span></a>
                                    <a onclick="excluirLocal('<?php echo $d['ID_Reserva'];?>')"><span><img class="iconlist delete" title="Excluir" src="images/si-glyph-trash.svg"></span></a>
                                </td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="container" id="ssTransporte"> 
        <div class="row" >
            <div class="col-md-12">
                <table class="table table-striped table-hover" >
                    <thead class="thead-dark">
                        <tr style="text-align:center;">
                        <td>Responsavél</td>
                        <td>Local Siada</td>
                        <td>Destino</td>
                        <td>Qtd. Passageiros</td>
                        <td>Data </td>
                        <td>Hora</td>
                        <td>Status</td>
                        <td>Ações</td>
                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($t as $value){ ?>  
                       
                        <tr style="text-align:center;">            
                        <td><?php echo $value['Nome_Responsavel'];?></td>
                        <td><?php echo $value['Local_de_Saida'];?></td>
                        <td><?php echo $value['Destino'];?></td>
                        <td><?php echo $value['Numero_Passageiros'];?></td>
                        <td><?php echo $value['Data_St_Transporte'];?></td>
                        <td><?php echo $value['Hora_Solicitacao'];?></td>
                        <td><?php echo $value['Status_Transporte'];?></td>
                        <td class="action">
                        <a onclick="editarStatus('<?php echo $value['ID_Transporte'];?>')"><img class="iconlist edit" title="Editar" src="images/si-glyph-pencil.svg"></a>
                        <a onclick="excluirStatus('<?php echo $value['ID_Transporte'];?>')"><img class="iconlist delete" title="Excluir" src="images/si-glyph-trash.svg"></a>
                        </td>
                        </tr>
                        
                        <?php } ?>
                                    
                    </tbody>
                </table> 
            </div>
        </div>
    </div>

    <?php 
        } else{ ?>
        <div class="container" id="ssLocal">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr >
                                <td>Nome Solicitante</td>
                                <td>Atividade</td>
                                <td>Setor</td>
                                <td>Local</td>
                                <td>Data da Solicitação</td>
                                <td>Horário Reservado</td>
                                <td>Status</td>
                                <!--td>Ações</td-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            
                                foreach ($dados as $d) {
                                    
                                    $hora_in = "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_in AND  Reserva_ID_Reserva ='$d[ID_Reserva]'";
                                    $hora_final= "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_fim AND  Reserva_ID_Reserva ='$d[ID_Reserva]'";
                                    $r = mysqli_query($con->__connection(), $hora_in);
                                    $r1 = mysqli_query($con->__connection(), $hora_final);
                                    $rw = mysqli_fetch_array($r,MYSQLI_ASSOC); 
                                    $rf = mysqli_fetch_array($r1,MYSQLI_ASSOC); 
                                     ?>
 
                                    <tr style="text-align: center;">
                                        <td><?php echo $d['Nome'];?></td>
                                        <td><?php echo $d['Nome_Atividade'];?></td>
                                        <td><?php echo $d['Setor_Nome'];?></td>
                                        <td><?php echo $d['Local_Nome'];?></td>
                                        <td align="center"><?php echo date('d/m/Y', strtotime($d['Data_Solicitacao']));?></td>
                                        <td align="center"><?php echo $rw['Hora']." - " .$rf['Hora'];  ?></td>
                                        <td align="center"
                                            <?php switch ($d['Status']) {
                                                case 'em aberto':
                                                    echo "class='text-primary'";
                                                    break;
                                                case 'indeferido':
                                                    echo "class='text-danger'";
                                                    break;
                                                case 'em avaliação':
                                                    echo "class='text-warning'";
                                                    break;
                                                case 'reservado':
                                                    echo "class='text-success'";
                                                    break;
                                            }
                                            ?>(>

                                            <?php echo $d['Status'];?></td>
                                        <!--td class="action">
                                            <a><span><img class="iconlist edit" title="Editar" src="images/si-glyph-pencil.svg"></span></a>
                                            <a ><span><img class="iconlist delete" title="Excluir" src="images/si-glyph-trash.svg"></span></a>
                                        </td-->
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    

    <div class="container" id="ssTransporte"> 
        <div class="row" >
            <div class="col-md-12">
                <table class="table table-striped table-hover" >
                    <thead class="thead-dark">
                        <tr style="text-align:center;">
                        <td>Responsavél</td>
                        <td>Local Siada</td>
                        <td>Destino</td>
                        <td>Qtd. Passageiros</td>
                        <td>Data </td>
                        <td>Hora</td>
                        <td>Status</td>
                        <!--td>Ações</td-->
                    
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($t as $value){ ?>  
                        <tr style="text-align:center;">                 
                        <td><?php echo $value['Nome_Responsavel'];?></td>
                        <td><?php echo $value['Local_de_Saida'];?></td>
                        <td><?php echo $value['Destino'];?></td>
                        <td><?php echo $value['Numero_Passageiros'];?></td>
                        <td><?php echo $value['Data_St_Transporte'];?></td>
                        <td><?php echo $value['Hora_Solicitacao'];?></td>
                        <td><?php echo $value['Status_Transporte'];?></td>
                        <!--td class="action">
                        <a ><img class="iconlist edit" title="Editar" src="images/si-glyph-pencil.svg"></a>
                        <a ><img class="iconlist delete" title="Excluir" src="images/si-glyph-trash.svg"></a>
                        </td-->
                        </tr>
                        
                        <?php } ?>
                                    
                    </tbody>
                </table> 
            </div>
        </div>
    </div>


   <?php }  ?>
</div>

<!-- Rodapé -->
<footer class="fixed-bottom">

    <p>&copy;Todos os direitos reservados</p>

</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--script type="text/javascript" src="bootstrap4/assets/js/vendor/jquery-slim.min.js"></script-->
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
  function editarStatus(obj) {
      console.log(obj);
        var route = 'edit-status.php?id='+obj;
        varWindow = window.open(route,'popup',"width=500,height=650,top=100,left=100,scrollbars=1,location bar=0,locationbar=0,menubar=no,toolbar=0,resizable=0");
    }

    function excluirStatus(siape) {
        
        $.ajax({
            url: 'action/excluir-transporte.php',
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
<script type="text/javascript">
   document.getElementById('ssLocal').style.display = 'block';
   document.getElementById('ssLocal').style.display = 'none';
  function mostraSelect() {
      if (document.getElementById('rbSLocal').checked) {
        document.getElementById('ssLocal').style.display = 'block';
           document.getElementById('ssTransporte').style.display = 'none';
      }
      else if(document.getElementById('rbSTransporte').checked){
           document.getElementById('ssTransporte').style.display = 'block';
          document.getElementById('ssLocal').style.display = 'none';
      }
  }
</script>

<script>
  function editarLocal(obj) {
      console.log(obj);
        var route = 'edit-local.php?id='+obj;
        varWindow = window.open(route,'popup',"width=500,height=650,top=100,left=100,scrollbars=1,location bar=0,locationbar=0,menubar=no,toolbar=0,resizable=0");
    }

    function excluirLocal(id) {

        $.ajax({
            url: 'action/excluir-local.php',
            type:'POST',
            data:{id:id},
            dataType:'HTML',
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
