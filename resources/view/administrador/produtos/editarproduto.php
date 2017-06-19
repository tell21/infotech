<?php session_start(); ?>
<?php if(!isset($_SESSION['usuario:administrador'])) header("Location: http://localhost/infotech/resources/view/erro.php"); ?>
<?php $usuario = json_decode($_SESSION['usuario:administrador'], true); ?>
<?php $categorias = json_decode($_SESSION['categorias'], true); ?>
<?php $imagens = json_decode($_SESSION['imagens'], true); ?>
<?php $produto = json_decode($_SESSION['produto'], true); ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Infotech - Painel Administrativo</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../../../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../../../assets/css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../../../../assets/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    </head>

    <body>
        <div id="wrapper">
            <?php include_once'../header.php'; ?>
            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Produtos
                                <small>Cadastro / Ediçao / exclusao </small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="http://localhost/infotech/resources/view/administrador/index.php">Painel Administrativo</a>
                                </li>
                                <li>
                                    <i class="fa fa-file"></i> <a href="http://localhost/infotech/resources/controller/produtoscontroller.php"> Produtos </a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Editar Produto
                                </li>
                            </ol>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12" >
                            <form id="editarProduto" role="form" action="../../../controller/editarprodutocontroller.php" method="post" enctype="multipart/form-data" multipart>
                                <input type="hidden" name="salvar" value="salvar"/>
                                <input type="hidden" name="id" value="<?= $produto['id']; ?>"/>
                                <div class="form-group">
                                  <label>Nome</label>
                                  <input class="form-control" name="nome" required value="<?= $produto['nome'] ?>">
                                  <p class="help-block">Insira o nome do produto.</p>
                                <div class="form-group">
                                  <label>Preço</label>
                                  <input id="num"  type=number step=0.01 data-bind="value:num" class="form-control" name="preco" required value="<?= $produto['preco'] ?>">
                                  <p class="help-block">Insira o preço do produto.</p>
                                </div>
                                <div class="form-group">
                                  <label>Estoque</label>
                                  <input type="number" id="replyNumber" step=0 min="0" data-bind="value:replyNumber" class="form-control" name="estoque" required value="<?= $produto['estoque_quantidade'] ?>">
                                  <p class="help-block">Insira a quantidade disponivel em estoque.</p>
                                </div>
                                <div class="form-group">
                                  <label>Categoria</label>
                                  <select class="form-control" name="categoria" required>
                                    <?php foreach ($categorias as $key => $value) { ?>
                                            <option value="<?= $value['id']; ?>" <?= $produto['categoria_nome'] == $value['nome'] ? 'selected' : '' ?>> <?= $value['nome']; ?> </option>
                                    <?php } ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Descriçao</label>
                                  <textarea class="form-control" rows="3" name="descricao" required><?= $produto['descricao'] ?></textarea>
                                </div>
                                <div class="form-group">
                                  <label>Fotos</label>
                                  <ul>
                                      <?php foreach ($imagens as $key => $value) { ?>
                                          <li>
                                              <form id="excluirImagem" action="../../../controller/removerimagemcontroller.php" method="POST">
                                              <a target="_blank" href="<?= "http://localhost/infotech/assets/images/".$value['url']; ?>">
                                                  <?= $value['url']; ?>
                                              </a>
                                              <input type="hidden" name="idImagem" value="<?= $value['id']; ?>">
                                              <input type="hidden" name="idProduto" value="<?= $produto['id']; ?>">
                                              <?php if(count($imagens) > 1) {?>
                                              <button type="submit" form="excluirImagem" style="background:transparent; border:none;"><span class="glyphicon glyphicon-remove" style="top: 2px;"></button>
                                              <?php }?>
                                              </form>
                                          </li>
                                      <?php } ?>
                                  </ul>
                                  <input type="file" name="files[]" multiple>
                                </div>

                              </div>

                                <input type="submit" form="editarProduto" class="btn btn-default" value="Salvar"></input>
                                <a href="http://localhost/infotech/resources/controller/produtoscontroller.php" class="btn btn-default" data-dismiss="modal">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../../assets/js/jquery-1.9.1.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../../../assets/js/bootstrap.min.js"></script>
    </body>

    </html>

    <?php unset($_SESSION['categorias']); ?>
    <?php unset($_SESSION['imagens']); ?>
    <?php unset($_SESSION['produto']); ?>
