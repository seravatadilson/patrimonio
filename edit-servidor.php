<!DOCTYPE html>
<?php

    require_once ("bd/Select.php");

    $buscaServ = buscaServ($_GET['siape']);
    $servidor = array();

    while ($r = mysqli_fetch_array($buscaServ)) {
        $servidor = $r;
    }

    $busca = buscaSetor();

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

        <div id="alert-success" class="alert alert-success" role="alert" style="display:none; margin-top: 10px;">Atualizado com sucesso!</div>
        <div id="alert-fail" class="alert alert-danger" role="alert" style="display:none; margin-top: 10px;">Houve erro!</div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form id="edit-servidor">
                        <input type="hidden" class="form-control" id="serv" name="serv" value="<?php echo $servidor['Siape'] ?>">
                        <div class="form-group">
                            <label for="siape">Siape</label>
                            <input type="text" class="form-control" id="siape" name="siape" required="required" value="<?php echo $servidor['Siape'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" required="required" value="<?php echo $servidor['CPF'] ?>" placeholder="Digite seu CPF. Ex: 111.111.111-11" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
                        </div>
                        <div class="form-group">
                            <label for="siape">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $servidor['Nome'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="siape">Cargo/Função</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $servidor['Cargo'] ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="tel" required="required" maxlength="15" class="form-control" id="telefone" name="telefone" value="<?php echo $servidor['Telefone'] ?>" placeholder="Digite um número para contato. Ex: (xx) xxxxx-xxxx" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required="required" class="form-control" id="email" name="email" value="<?php echo $servidor['email'] ?>" placeholder="Digite um email para contato">
                        </div>
                        <div class="form-group">
                            <label for="setor">Unidade/Setor</label>
                            <select class="form-control" id="setor" name="setor">
                                <?php while($setor = mysqli_fetch_array($busca)) { ?>
                                    <option value="<?php echo $setor['ID_Setor']; ?>"
                                        <?php if($setor['ID_Setor'] == $servidor['Setor_ID_Setor']) { ?>
                                            selected="selected"
                                        <?php } ?>>

                                        <?php echo $setor['Setor_Nome']; ?>

                                    </option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label id="lbadmin" for="admin">Tornar Administrador</label>
                            <input type="checkbox" id="admin" name="admin" style="margin-left: 10px;">
                        </div>

                        <input type="button" class="btn btn-primary" id="update" value="Atualizar">
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
            url: 'action/atualiza-servidor.php',
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