<!DOCTYPE html>
<?php

require_once ("bd/Select.php");

?>


<html lang="pt-br" xmlns="http://www.w3.org/1999/html">
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
<div class="container cardpane">
    <div class="card">
        <div class="card-header main-color-bg">
            <h5 class="card-subtitle">Atualizar dados</h5>
        </div>

        <div id="alert-success" class="alert alert-success" role="alert" style="display:none; margin-top: 10px;">Cadastrado com sucesso!</div>
        <div id="alert-fail" class="alert alert-danger" role="alert" style="display:none; margin-top: 10px;">Houve erro!</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form id="edit-servidor">
                        <div class="form-group">
                            <label for="siape">Siape</label>
                            <input type="text" class="form-control" id="siape" name="siape" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Cargo/Função</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" required="required">
                        </div>
                        <input type="button" class="btn btn-primary" id="update" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script  type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script  type="text/javascript" src="bootstrap4/assets/js/vendor/popper.min.js"></script>
<script  type="text/javascript" src="bootstrap4/dist/js/bootstrap.min.js" ></script>
<script type="text/javascript">

    $(document).ready(function () {

        $('#update').click(function () {
            var dados = $('#edit-servidor').serialize();
            var alert = document.getElementById(alert);
            $.ajax({
                type:'POST',
                url: 'action/cadastra-siape.php',
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
</body>
</html>