<?php if(!isset($_SESSION['usuario:administrador'])) header("Location: http://localhost/infotech/resources/view/erro.php"); ?>
<?php $produtos = json_decode($_SESSION['produtos'], true); ?>
<link rel="stylesheet" href="../../../assets/css/thumbial.css" />
<?php $cont=1; foreach ($produtos as $key => $value){  if($cont > (count($produtos) - 1)) break; ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail ">
        <div id="carousel-produtos-<?php echo $value['id']; ?>" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php $active = 'active';  ?>
            <?php foreach($produtos['imagens']["".$value['id']] as $k => $v){ ?>
              <li data-target="#carousel-produtos-<?php echo $value['id']; ?>" data-slide-to="<?php echo $k; ?>" class="<?php echo $active; ?>"></li>
            <?php $active = '';  ?>
            <?php } ?>
          </ol>
          <div class="carousel-inner">
            <?php $active = 'active';  ?>
            <?php foreach($produtos['imagens']["".$value['id']] as $k => $v){ ?>
              <div class="item <?php echo $active; ?>">
                <img style="img-thumbial" src="http://localhost/infotech/assets/images/<?php echo $v['url']; ?>" alt="">
              </div>
            <?php $active = '';  ?>
            <?php } ?>
          </div>
          <a class="left carousel-control" href="#carousel-produtos-<?= $value['id']; ?>" data-slide="prev"
            style="display: <?= count($produtos['imagens'][$value['id']]) > 1 ? 'block' : 'none'; ?>">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-produtos-<?= $value['id']; ?>" data-slide="next"
            style="display: <?= count($produtos['imagens'][$value['id']]) > 1 ? 'block' : 'none'; ?>">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
        <div class="caption">
          <h5 class="pull-right"><?= $value['categoria_nome']; ?>  <span class="glyphicon glyphicon-tag"></span></h4>
          <h4><a href="#"><?php echo $value['nome']; ?></a></h4>
          <h6>Disponivel: <?php echo $value['estoque_quantidade']; ?></h4>
          <hr>
          <h4 class="pull-right">R$ <?php echo $value['preco']; ?></h4><br>
          <p><?php echo $value['descricao']; ?></p>
        </div>
        <div class="panel-footer">
          <form id="editForm-<?= $value['id']; ?>" action="../../../controller/editarprodutocontroller.php" method="POST">
            <input type="hidden" form="editForm-<?= $value['id']; ?>" name="id" value="<?= $value['id']; ?>"/>
            <button type="submit" form="editForm-<?= $value['id']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span></button>
            <button type="button" class="pull-right btn btn-danger btn-sm"
              data-toggle="modal" data-target="#modalConfirm-<?= $value['id']; ?>"><span class="glyphicon glyphicon-remove"></span></button>
          </form>
          <div id="modalConfirm-<?= $value['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                     <h3>Remover produto</h3>
                </div>
                <div class="modal-body">
                    <p>Voce esta deletando o produto "<?= $value['nome']; ?>".</p>
                    <p>Voce deseja proceder?</p>
                </div>
                <div class="modal-footer">
                  <form method="post" action="../../../controller/removerprodutocontroller.php" id="remover-<?= $value['id']; ?>">
                    <input type="hidden" name="idExcluir" form="remover-<?= $value['id']; ?>" value="<?= $value['id']; ?>"/>
                    <input type="submit" class="btn btn-danger btn-sm" form="remover-<?= $value['id']; ?>" value="Sim">
                    <button data-dismiss="modal" aria-hidden="true" class="btn btn-secndary btn-sm">Nao</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
<?php $cont=$cont+1; } ?>
<?php unset($_SESSION['produtos']); ?>
