<?php
  $nome;
  if(isset($_SESSION['usuario:administrador'])) {
      $json = json_decode($_SESSION['usuario:administrador'], true);
      $nome = $json["nome"];
  }
  else if (isset($_SESSION['usuario:cliente'])) {
      $json = json_decode($_SESSION['usuario:cliente'], true);
      $nome = $json["nome"];
  }

  $texto = !isset($nome) ? '<span class="glyphicon glyphicon-log-in"></span> Login' : 'Seja bem vindo, '. $nome;
  $carrinho = json_decode($_SESSION['carrinho:produtos'], true);
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="http://localhost/infotech">Inicio</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                  <li>
                      <a href="#">About</a>
                  </li>
                  <li>
                      <a href="#">Services</a>
                  </li>
                  <li>
                      <a href="#">Contact</a>
                  </li>
              </ul>
              <ul class="nav navbar-nav navbar-right" >
                  <?php if(isset($_SESSION['usuario:administrador'])) { ?>
                    <li>
                        <a href="http://localhost/infotech/resources/view/administrador/index.php">
                            Ir ao painel
                         </a>
                    </li>
                  <?php } ?>
                  <li>
                      <a href="<?php echo !isset($nome) ? 'login.php' : '#' ?>"> <?php echo $texto;  ?></a>
                  </li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> <b class="caret"></b></a>
                      <?php if($carrinho != null) { ?>
                      <ul class="dropdown-menu" style="width: 200px">
                          <?php $som = 0; ?>
                          <?php $cont = 1; ?>
                          <?php foreach ($carrinho as $key => $value) { if($cont == 3) {break; }?>
                          <li>
                              <div class="row" style="padding-left: 20px" style="text-align: center">
                                  <div class="col-sm-4">
                                      <?= $value['nome']; ?>
                                  </div>
                                  <div class="col-sm-2">
                                      <?= $value['qtd']; ?>
                                  </div>
                                  <div class="col-sm-6">
                                      R$ <?= $value['preco']; ?>
                                  </div>
                              </div>
                          </li>
                          <li class="divider"></li>
                          <?php $som = $som + ($value['preco'] * $value['qtd']);?>
                          <?php } ?>
                          <li>
                              <div class="row" style="padding-left: 20px" style="text-align: center">
                                  <div class="col-sm-6">
                                      Total:
                                  </div>
                                  <div class="col-sm-6">
                                      R$ <?= floatval($som); ?>
                                  </div>
                              </div>
                          </li>
                          <li style="text-align: center;">
                              <a href="carrinho.php" >Ver tudo / comprar</a>
                          </li>
                      </ul>
                      <?php $cont = $cont + 1; } ?>
                  </li>
                  <li style="display: <?php echo !isset($nome) ? 'none' : 'block'; ?> ">
                      <a href="../controller/saircontroller.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>
