<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
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
    $sql_status = "SELECT ID_Transporte, Local_de_Saida, Destino, Nome_responsavel, Data_St_transporte, Hora_Solicitacao, status_transporte FROM transporte WHERE ID_Transporte = '$id'";
    $resultado = mysqli_query($con->__connection(),$sql_status) or die(mysqli_error());
    $status_t = array();
    while($row = mysqli_fetch_assoc($resultado)){
        $status_t = $row;
    }
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
                        <input type="hidden" class="form-control" id="serv" name="id-t" value="<?php echo  $status_t['ID_Transporte']; ?>">
                        <div class="form-group">
                            <label for="siape">Solicitação</label>
                            <input type="text" readonly class="form-control" id="siape" name="id-transporte" required="required" value="<?php echo  $status_t['ID_Transporte'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="siape">Responsavel</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $status_t['Nome_responsavel'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Local de Saida</label>
                            <input type="text" class="form-control" id="cargo" name="local_saida" value="<?php echo $status_t['Local_de_Saida'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Local Destino</label>
                            <input type="text" class="form-control" id="cargo" name="local_destino" value="<?php echo $status_t['Destino'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Data Solicitacao</label>
                            <input type="text" readonly class="form-control"  name="data_st_transporte" value="<?php echo $status_t['Data_St_transporte'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Hora da Solicitacao</label>
                            <input type="text" readonly class="form-control"  name="hora_st" value="<?php echo $status_t['Hora_Solicitacao'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Status</label>
                            <select class="form-control custom-select" name="at-status"  id="status" placeholder="Selecionar status">
                                <option value="aberto">Alterar Status</option>
                                <option name="status-aberto" disabled="disabled"  value="<?php echo $status_t['status_transporte'] ?>" style="color:blue;"><?php echo $status_t['status_transporte']?></option>
                                <option name="status-indeferido" value="indeferido">indeferido</option>
                                <option name="status-deferido" value="deferido">deferido</option>
                               
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
            url: 'action/atualizar-st-transporte.php',
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