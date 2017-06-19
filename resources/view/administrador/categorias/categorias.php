<?php session_start(); ?>
<?php if(!isset($_SESSION['usuario:administrador'])) header("Location: http://localhost/infotech/resources/view/erro.php"); ?>
<?php $usuario = json_decode($_SESSION['usuario:administrador'], true); ?>

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

        <link href="../../../../assets/css/table.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../../../../assets/css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href="../../../../assets/css/datatables.bootstrap.min.css" rel="stylesheet" type="text/css">


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
                                Categorias
                                <small>Cadastro / Ediçao / exclusao </small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="http://localhost/infotech/resources/view/administrador/index.php">Painel Administrativo</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Categorias
                                </li>
                            </ol>
                        </div>
                    </div>
                    <hr>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 col-md-12" >
                            <div class="form-group input-group">
                                <input type="text" class="form-control" placeholder="Procure por categorias" />
                                <a href="#" class="btn btn-info btn-lg input-group-addon">
                                    <span class="glyphicon glyphicon-search"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php include_once'tabela.php'; ?>
                    </div>
                </div>
            </div>
                            <!-- /#page-wrapper -->

        </div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../../../../assets/js/jquery-1.9.1.min.js"></script>
<script src="../../../../assets/js/table.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../../assets/js/bootstrap.min.js"></script>

</body>

</html>
