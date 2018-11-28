
<?php

require_once ('bd/Connection.php');
require "verifica.php";
require "bd/Select.php";

$con = new Connection();



#$sessao = $_SESSION['siape'];
//if ($_SESSION['admin'] == 0) {
  
  //$siape = $_SESSION['siape'];

  //$sql = "SELECT ID_Reserva,Nome_Atividade,Setor_Nome,Local_Nome,Data_Solicitacao,Status, Nome FROM reserva,servidor,setor,local WHERE Servidor_Siape = '$siape' AND Siape = Servidor_Siape AND ID_Setor = Setor_ID AND ID_Local = Local_ID_Local ORDER BY Data_Solicitacao DESC";
 // $resultado = mysqli_query($con->__connection(),$sql);

 // $sql = "SELECT Local_de_Saida,Destino,Numero_Passageiros,Nome_Responsavel,Data_St_Transporte,Hora_Solicitacao,Status_Transporte, Siape FROM transporte, servidor WHERE Siape = '$siape' AND Codigo_Siape = '$siape'";
 // $rest = mysqli_query($con->__connection(),$sql) or die(mysqli_error());
  
    
//} else {

  $sql = "SELECT ID_Reserva, Nome_Atividade,Setor_Nome,Local_Nome,Data_Solicitacao,Status, Nome FROM reserva,servidor,setor,local WHERE Siape = Servidor_Siape AND ID_Setor = Setor_ID AND ID_Local = Local_ID_Local ORDER BY Data_Solicitacao DESC";
  $resultado = mysqli_query($con->__connection(),$sql);

 $sql = "SELECT ID_Transporte,Local_de_Saida,Destino,Numero_Passageiros,Nome_Responsavel,Data_St_Transporte,Hora_Solicitacao,Status_Transporte, Siape FROM transporte, Servidor WHERE Siape = Codigo_siape";
 $rest = mysqli_query($con->__connection(),$sql) or die(mysqli_error());

 
//}

$dados = array();
$hI = array();
$hF = array();

//while($r = mysqli_fetch_array($resultado)) {
  //$hora_in = "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_in AND  Reserva_ID_Reserva ='$r[ID_Reserva]'";
 // $hora_final = "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_fim AND  Reserva_ID_Reserva ='$r[ID_Reserva]'";
 /// $r2 = mysqli_query($con->__connection(), $hora_in);
 /// $r1 = mysqli_query($con->__connection(), $hora_final);
 // $rw = mysqli_fetch_array($r2); 
 // $rf = mysqli_fetch_array($r1); 


// $hI[] = $rw;
// $hF[] = $rf;
 ////$dados[] = $r;
 //var_dump($dados);
// echo $dados['0'];
//
 
  
//}

///var_dump($hF//);

while($st = mysqli_fetch_array($rest)){
    
 // $dados[] = array("id" => $resultado['id'], "nome" => $resultado['nome'], "idade" => $resultado['idade'], "cidade" => $resultado['cidade']);
  //$t[] =  array("id:"=>$st['ID_Reserva']);
   /// $dadosTransporte = json_encode($t,JSON_UNESCAPED_UNICODE);
    //echo $dadosTransporte;
    
  }


  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset='utf-8'/>
<link href='fullcalendar-3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar-3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link rel="stylesheet" type="text/css" href="bootstrap4/dist/css/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<!--script type="text/javascript"  src="bootstrap4/dist/js/bootstrap.min.js"></script-->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script src='fullcalendar-3.9.0/lib/moment.min.js'></script>
  <script src='fullcalendar-3.9.0/lib/jquery.min.js'></script>
  <script src='fullcalendar-3.9.0/fullcalendar.min.js'></script>
  <script src='fullcalendar-3.9.0/locale/pt-br.js'></script>
  
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('[data-toggle="popover"]').popover()
    })
</script>
<script src="bootstrap4/assets/js/vendor/popper.min.js"></script>
<script src="bootstrap4/dist/js/bootstrap.min.js" ></script>
<script>

  $(document).ready(function() {

$('#calendar').fullCalendar({
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
  },
    defaultDate: Date(),
    navLinks: true, // can click day/week names to navigate views
    editable: false,
    eventLimit: true, // allow "more" link when too many events
      events: [
      <?php  while($r = mysqli_fetch_array($resultado)) {
          $hora_in = "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_in AND  Reserva_ID_Reserva ='$r[ID_Reserva]'";
          $hora_final = "Select Hora FROM hora, data_solicitacao WHERE ID_Hora = id_hora_fim AND  Reserva_ID_Reserva ='$r[ID_Reserva]'";
          $r2 = mysqli_query($con->__connection(), $hora_in);
          $r1 = mysqli_query($con->__connection(), $hora_final);
          $rw = mysqli_fetch_array($r2,MYSQLI_ASSOC); 
          $rf = mysqli_fetch_array($r1,MYSQLI_ASSOC);
          ?>
          
          {
            id: '<?php echo $r['ID_Reserva'];?>',
            title:'<?php echo $r['Nome_Atividade']." - Solicitante: ".$r['Nome'];?>',
            start:'<?php echo $r['Data_Solicitacao']." ".$rw['Hora'];?>',
            end:'<?php echo $r['Data_Solicitacao']." ".$rf['Hora'];?>',
            color:'#00BFFF'
          },<?php
          }
        ?>
      ]
    });

  });

</script>
<style>

  body {
    margin: 0px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
    margin-top:20px;
  }

</style>
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

  <div id='calendar'></div>
  





</body>
</html>
