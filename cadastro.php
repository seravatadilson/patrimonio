<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assets Manager - login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap4/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/estilo.css" >
    <script>
        function valida() {
            if (document.cadastro.cpf.validity.patternMismatch) {
                alert("O CPF está incorreto");
            } else {
                alert("O CPF está correto");
            }
            return false;
        }
        function cpf_incorreto(el) {
            alert("O valor " + el.value + " não é um CPF");
            return false;
            // ^ Evita processamento padrão do Opera (mostrar erro em vermelho)
        }
    </script>
</head>
<body>

<!-- Barra de Navegação -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.html"><span class="img-logo">Assets Manager</span></a>
    </div>
</nav>
<!-- Conteúdo -->
<?php
require_once ('bd/Connection.php');
$con = new Connection();
#seleciona os dados da tabela setor
$sql = "SELECT ID_Setor, Setor_Nome FROM setor";
  $resultado = mysqli_query($con->connection(),$sql) or die(mysqli_error());
?>

<div class="container conteudo">
    <div class="row">
        <div class="col-md-8">

            <h2>Cadastrar</h2>
            <form name="cadastro" class="form-index" action="action/cadastrar.php" method="post">
              <div class="form-group">
                  <label for="siape">Siape</label>
                  <input type="text" class="form-control" id="siape" name="siape" required="required">
              </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" required="required" class="form-control cpf-mask" id="cpf" name="cpf" placeholder="Digite seu CPF. Ex: 111.111.111-11" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
                </div>
                <div class="form-group">
                    <label for="siape">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" required="required">
                </div>
                <div class="form-group">
                    <label for="siape">Cargo/Função</label>
                    <input type="text" class="form-control" id="cargo" name="cargo" required="required">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" required="required" class="form-control" id="senha" name="senha" placeholder="Digite uma senha">
                </div>
                <div class="form-group">
                    <label for="confsenha">Confirme sua Senha</label>
                    <input type="password" required="required" class="form-control" id="confsenha" name="confsenha" placeholder="Confirme sua senha">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" required="required" maxlength="15" class="form-control tel-mask"  id="telefone" name="telefone" placeholder="Digite um número para contato. Ex: (xx) xxxxx-xxxx" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" required="required" class="form-control" id="email" name="email" placeholder="Digite um email para contato">
                </div>
                <div class="form-group">
                    <label for="setor">Unidade/Setor</label>
                    <select class="form-control" id="setor" name="setor">
                          <?php while($setor = mysqli_fetch_array($resultado)) { ?>
                            <option value="<?php echo $setor['ID_Setor']; ?>">

                              <?php echo $setor['Setor_Nome']; ?>

                            </option>
                          <?php } ?>

                        </select>

                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </form>
        </div>
    </div>
</div>
<!-- = $resultado['siape'] -->
<!-- Rodapé -->
<footer class="fixed-bottom">

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
<script src="js/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.cpf-mask').mask('000.000.000-00');
        $('.tel-mask').mask('(00) 00000-0000');
        $('.nasc-mask').mask('00/00/0000');
    });
</script>

</body>
</html>
