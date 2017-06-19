<?php session_start(); ?>
<?php if(isset($_SESSION['usuario:administrador'])) { ?>
<?php   header("Location: administrador/index.php"); ?>
<?php } else if(isset($_SESSION['usuario:cliente'])){ ?>
<?php   header("Location: cliente/index.php"); ?>
<?php } ?>
<?php $email = isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>
<?php $nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : '' ?>
<?php $cpf = isset($_SESSION['cpf']) ? $_SESSION['cpf'] : '' ?>
<?php $rg = isset($_SESSION['rg']) ? $_SESSION['rg'] : '' ?>
<?php $displayLogin = !isset($_SESSION['msg:login']) ? "none" : 'block' ?>
<?php $displayRegistro = !isset($_SESSION['msg:registro']) ? "none" : 'block' ?>
<?php $displayTelaLogin = isset($_SESSION['click:registro']) ? "none" : 'block' ?>
<?php $displayTelaRegistro = !isset($_SESSION['click:registro']) ? "none" : 'block' ?>
<html>
    <head>
        <title>Login - Infotech</title>
            <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../../assets/js/index.js" async defer></script>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js" async defer></script>
        <script language="JavaScript" type="text/javascript" src="../../assets/js/jquery-3.2.1.min.js" async defer></script>
        <link rel="stylesheet" 
            href="../../assets/css/bootstrap.min.css">

        <link rel="stylesheet" href="../../assets/css/style.css">

    </head>
    <body>
    <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" class="<?php echo $displayTelaLogin == 'block' ? 'active' : ''; ?>" id="login-form-link">Logar-se</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#" class="<?php echo $displayTelaRegistro == 'block' ? 'active' : ''; ?>" id="register-form-link">Registrar-se</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="../controller/logincontroller.php" method="post" role="form" style="display: <?php echo $displayTelaLogin; ?>">
                                        <div class="alert alert-danger alert-dismissible" role="alert" style="display:<?php echo $displayLogin; ?>">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Erro!</strong> <?php echo $_SESSION['msg:login']; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="username" tabindex="1" class="form-control" placeholder="Email" value="<?php echo $email ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="senha" id="password" tabindex="2" class="form-control" placeholder="Senha" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> Lembrar-se</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Logar-se">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Esqueceu sua senha?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="../../index.php" tabindex="5" class="forgot-password">Voltar ao site.</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="register-form" action="../controller/cadastrarclientecontroller.php" method="post" role="form" style="display: <?php echo $displayTelaRegistro; ?>">
                                        <div class="alert alert-danger alert-dismissible" role="alert" style="display:<?php echo $displayRegistro; ?>">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Erro!</strong> <?php echo $_SESSION['msg:registro']; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nome" id="username" tabindex="1" class="form-control" placeholder="Nome" value="<?php echo $nome; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="<?php echo $email; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="cpf" id="cpf" tabindex="2" class="form-control" placeholder="CPF" required value="<?php echo $cpf; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="rg" id="rg" tabindex="2" class="form-control" placeholder="RG" required value="<?php echo $rg; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="senha" id="password" tabindex="2" class="form-control" placeholder="Senha" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirmarSenha" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar senha" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Registrar-se agora">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php unset($_SESSION['email']); ?>
<?php unset($_SESSION['nome']); ?>
<?php unset($_SESSION['senha']); ?>
<?php unset($_SESSION['senhaConfirmar']); ?>
<?php unset($_SESSION['rg']); ?>
<?php unset($_SESSION['cpf']); ?>
<?php unset($_SESSION['msg:registro']); ?>
<?php unset($_SESSION['msg:login']); ?>
<?php unset($_SESSION['click:registro']) ?>