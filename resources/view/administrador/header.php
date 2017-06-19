<?php if(!isset($_SESSION['usuario:administrador'])) header("Location: http://localhost/infotech/resources/view/erro.php"); ?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/infotech/resources/view/administrador/index.php">Infotech - Painel Administrativo</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                   <a href="http://localhost/infotech/" >Voltar ao site</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usuario["nome"]; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="http://localhost/infotech/resources/controller/saircontroller.php"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php $active = (substr(strrchr($_SERVER['REQUEST_URI'], '/'), 1) == 'produtos.php' || substr(strrchr($_SERVER['REQUEST_URI'], '/'), 1) == 'editarproduto.php') ? 'active' : ''; ?>
                    <li class="<?php echo $active; ?>">
                        <a href="http://localhost/infotech/resources/controller/produtoscontroller.php">
                          <i class="fa fa-fw fa-dashboard"></i> Produtos</a>
                    </li>
                    <?php $active = (substr(strrchr($_SERVER['REQUEST_URI'], '/'), 1) == 'categorias.php') ? 'active' : ''; ?>
                    <li class="<?php echo $active; ?>">
                        <a href="http://localhost/infotech/resources/controller/categoriascontroller.php">
                          <i class="fa fa-fw fa-bar-chart-o"></i> Categorias</a>
                    </li>
                    <?php $active = (substr(strrchr($_SERVER['REQUEST_URI'], '/'), 1) == 'administradores.php') ? 'active' : ''; ?>
                    <li class="<?php echo $active; ?>">
                        <a href="http://localhost/infotech/resources/view/administrador/administradores/administradores.php">
                          <i class="fa fa-fw fa-bar-chart-o"></i> Administradores</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Clientes</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Notas Fiscais</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Cadastros</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Compras</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
