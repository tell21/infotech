<?php session_start(); ?>
<?php
$usuario = array();
if(isset($_SESSION['usuario:administrador'])) {
    $usuario = json_decode($_SESSION['usuario:administrador'], true);
}
else if (isset($_SESSION['usuario:cliente'])) {
    $usuario = json_decode($_SESSION['usuario:cliente'], true);
}
?>
<?php if(!isset($_SESSION['usuario:administrador']) && !isset($_SESSION['usuario:cliente'])) { ?>
<?php   $_SESSION['msg:login'] = "E necessario estar logado."    ?>
<?php   header("Location: login.php"); ?>
<?php } ?>
<?php $produtos = json_decode($_SESSION['carrinho:produtos'], true); ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Infotech</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../assets/css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php include_once'header.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php include_once'categorias.php'; ?>

            <div class="col-md-9">
                <p class="lead">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    Carrinho de compras
                </p>
                <div class="row" style="background-color:#D3D3D3; font-size:14pt;">
                    <div class="col-md-8" style="background-color:#A9A9A9;">
                        <p class="lead">Nome</p>
                    </div>
                    <div class="col-md-2" style="background-color:#A9A9A9;">
                        <p class="lead">Quantidade</p>
                    </div>
                    <div class="col-md-2" style="background-color:#A9A9A9;">
                        <p class="lead">Preço unit</p>
                    </div>
                </div>
                <?php $som = 0; foreach ($produtos as $key => $value) { ?>
                <form method="POST" action="../controller/mudarcarrinhcontroller.php"
                    id="carrinho-<?= $value['id']; ?>" name="carrinho-<?= $value['id']; ?>" >
                <div class="row" style="background-color:#D3D3D3; font-size:14pt;">
                    <div class="col-md-8">
                        <?= $value['nome']; ?>
                    </div>
                    <div class="col-md-2">
                        <input type="number" step="1" min="1" style="width:100%; text-align:center; background:none; border:none;"
                        max="<?= $value['estoque_quantidade']; ?>" value="<?= $value['qtd']; ?>"
                        name="quantidade-<?= $value['id']; ?>" form="carrinho-<?= $value['id']; ?>">
                    </div>
                    <div class="col-md-2">
                        R$ <?= $value['preco']; ?>
                    </div>
                </div>
                </form>
                <?php $som = $som + ($value['preco'] * $value['qtd']); } ?>
                <div class="row" style="background-color:#D3D3D3; font-size:14pt;">
                    <div class="col-md-10">
                        Total:
                    </div>
                    <div class="col-md-2">
                        R$ <?= $som; ?>
                    </div>
                </div>
                <div class="row" style="background-color:#D3D3D3;">
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-2">
                        <a href="../controller/indexcontroller.php" class="btn btn-primary" style="font-size:8pt;">Continuar comprando</a>
                    </div>
                </div>
                <hr>
                <form method="post" action="../controller/mudarenderecocontroller.php">
                <input type="hidden" name="idEndereco"
                    value="<?= isset($usuario['endereco']['id']) ? $usuario['endereco']['id'] : '0'; ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Endereco</label>
                            <input class="form-control" placeholder="logradouro" name="logradouro"
                                value="<?= isset($usuario['endereco']['logradouro']) ? $usuario['endereco']['logradouro'] : ''  ?>" required>
                            <p class="help-block">Insira o logradouro juntamente com o numero.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input class="form-control" placeholder="cep" id="cep" name="cep"
                                value="<?= isset($usuario['endereco']['cep']) ? $usuario['endereco']['cep'] : ''  ?>" required>
                            <p class="help-block">Insira o cep do endereço.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control" placeholder="Cidade" name="cidade"
                                value="<?= isset($usuario['endereco']['cidade']) ? $usuario['endereco']['cidade'] : ''  ?>" required>
                            <p class="help-block">Insira a cidade.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input class="form-control" placeholder="UF" name="uf"
                                value="<?= isset($usuario['endereco']['uf']) ? $usuario['endereco']['uf'] : ''  ?>" required>
                            <p class="help-block">Insira o UF.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Salvar alteraçoes
                            </button>
                        </div>
                    </div>
                </div>
                </form>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Forma de pagamento</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="pagamento" id="optionsRadios1" value="cartao-de-credito" checked>Cartao de credito
                                </label>
                                <label>
                                    <input type="radio" name="pagamento" id="optionsRadios2" value="boleto">Boleto
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cartao-de-credito">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input class="form-control" placeholder="nome do titular" required>
                                <p class="help-block">Insira nome do titular como esta no cartao.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input class="form-control" placeholder="nº do cartao" min="1"  type="number" step="1" required>
                                <p class="help-block">Insira o numero de cartao de credio. Sem pontos, somente numeros.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="MM/AA" id="data">
                                <p class="help-block">Insira a data de validade de cartao.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="form-control" placeholder="cod seguranca" min="1"  type="number" step="1" required>
                                <p class="help-block">Insira o codigo de segurança. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="font-size:14pt;">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        <center>
                            <button class="btn btn-primary " onclick="comprar();">Comprar</button>
                            <a href="../controller/cancelarcarrinhocontroller.php" class="btn btn-primary">Cancelar carrinho</a>
                        </center>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Infotech 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../assets/js/jquery-1.9.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

    <script>
    $(document).ready(function(){
        $("input[name=pagamento]").change(function() {
            var test = $(this).val();
            if(test == "cartao-de-credito"){
                $("#cartao-de-credito").show();
            } else {
                $("#cartao-de-credito").hide();
            }
        });
        <?php foreach ($produtos as $key => $value) { ?>

        $("input[name=quantidade-<?= $value['id']; ?>]").change(function() {
            var test = $(this).val();
            window.location.href = "../controller/mudarcarrinhocontroller.php?id=<?= $value['id']; ?>&qtd="+test;
        });

        <?php } ?>
    });
    </script>
    <script>
      $(document).ready(function () {
        $("#data").mask("99/99");
        $("#cep").mask("99999-999");
      });
    </script>
    <script>
    function comprar(){
        var radios = document.getElementsByName('pagamento');

        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked && radios[i].value == 'boleto') {
                window.location.href = "../controller/compraboletocontroller.php";
                break;
            }
        }
    }
    </script>

</body>

</html>
