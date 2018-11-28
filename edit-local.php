<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/estilo.css" >
    
    
</head>
<?php
require_once ('bd/Connection.php');

    $id = $_GET['id'];
    $con = new Connection();
    #seleciona os dados da tabela transporte
   // $sql_status = "SELECT reserva.ID_Reserva, reserva.Setor_ID, reserva.Nome_Atividade,reserva.Local_ID_Local, reserva.Status, setor.ID_Setor, setor.Setor_Nome, local.ID_Local, local.Local_Nome,Status, data_solicitacao.Reserva_ID_Reserva, data_solicitacao.Data, data_solicitacao.id_hora, Hora FROM ((((reserva INNER JOIN local ON reserva.Local_ID_Local = local.ID_Local) INNER JOIN setor ON reserva.Setor_ID = setor.ID_Setor) INNER JOIN data_solicitacao ON data_solicitacao.Reserva_ID_Reserva = '$id' ) INNER JOIN hora ON hora.ID_Hora = data_solicitacao.id_hora ) WHERE ID_Reserva = '$id'";
   $sql_status = "SELECT reserva.ID_Reserva, reserva.Setor_ID, reserva.Nome_Atividade,reserva.Local_ID_Local, reserva.Hora_Solicitacao,reserva.Status, setor.ID_Setor, setor.Setor_Nome,
     local.ID_Local, local.Local_Nome, data_solicitacao.Reserva_ID_Reserva, data_solicitacao.Data FROM ((((reserva INNER JOIN local ON reserva.Local_ID_Local = local.ID_Local) INNER JOIN
    setor ON reserva.Setor_ID = setor.ID_Setor) INNER JOIN data_solicitacao ON data_solicitacao.Reserva_ID_Reserva = '$id')) WHERE ID_Reserva = '$id'"; 
   $resultado = mysqli_query($con->__connection(),$sql_status) or die(mysqli_error());
    $status_t = array();
    while($row = mysqli_fetch_assoc($resultado)){
        $status_t = $row;
    }

$sql_setor = "SELECT ID_Setor, Setor_Nome FROM setor";
$result = mysqli_query($con->__connection(),$sql_setor) or die(mysqli_error());
?>

<body>

    <div class="container cardpane">
    <div class="card">
        <div class="card-header main-color-bg">
            <h5 class="card-subtitle">Atualizar dados</h5>
        </div>

        <div id="alert-success" class="alert alert-success" role="alert" style="display:none; margin-top: 10px;">Atualizado com sucesso!</div>
        <div id="alert-fail"  class="alert alert-danger" role="alert" style="display:none; margin-top: 10px;">Houve erro!</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form id="edit-status">
                        <input type="hidden" class="form-control" id="serv" name="id-rserv" value="<?php echo  $status_t['ID_Reserva']; ?>">
                        <div class="form-group">
                            <label for="siape">ID Reserva</label>
                            <input type="text" readonly class="form-control" id="siape" name="id-reserva" required="required" value="<?php echo  $status_t['ID_Reserva'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="siape">Atividade</label>
                            <input type="text" class="form-control" id="nome" name="nome_ativiadade" value="<?php echo $status_t['Nome_Atividade'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Setor </label>
                            <select class="form-control" id="setor" name="setor" placeholder="Selecione o setor">
                            <?php while($setor_sql = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $setor_sql['ID_Setor']; ?>" style="color:blue;">

                                <?php echo $setor_sql['Setor_Nome']; ?>

                                </option>
                            <?php } ?>
                            </select>
                            <!--input type="text" class="form-control" id="cargo" name="nome_setor" value="<!--?php echo $status_t['Setor_Nome'] ?" required="required"---->
                        </div>
                        <div class="form-group">
                            <label for="siape">Local </label>
                            <input type="text" class="form-control" id="cargo" name="nome_local" value="<?php echo $status_t['Local_Nome'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Data Solicitação</label>
                            <input type="text" class="form-control" id="cargo" readonly name="local_destino" value="<?php echo $status_t['Data'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Hora da Solicitacao</label>
                            <input type="text" readonly class="form-control"  name="hora_st" value="<?php echo $status_t['Hora_Solicitacao'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Status</label>
                            <select class="form-control custom-select" name="lt-status"  id="status" placeholder="Selecionar status">
                                <option value="aberto">Alterar Status</option>
                                <option name="status-aberto" disabled="disabled"  value="<?php echo $status_t['Status'] ?>" style="color:blue;"><?php echo $status_t['Status']?></option>
                                <option name="status-indeferido" value="indeferido">indeferido</option>
                                <option name="status-deferido" value="deferido">reservado</option>
                               
                            </select>

                        </div>
                        <input type="button" class="btn btn-primary" id="update" value="Atualizar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script  type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script  type="text/javascript" src="bootstrap4/assets/js/vendor/popper.min.js"></script>
<script  type="text/javascript" src="bootstrap4/dist/js/bootstrap.min.js" ></script>

<script type="text/javascript">

$(document).ready(function () {

    $('#update').click(function () {
        var dados = $('#edit-status').serialize();
        var alert = document.getElementById(alert);
        $.ajax({
            type:'POST',
            url: 'action/atualizar-local.php',
            data:dados,
            dataType:'text',
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
        return false;
    });
});
</script>
</body>
</html>