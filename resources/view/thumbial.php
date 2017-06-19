<?php $produtos = json_decode($_SESSION['produtos'], true); ?>
<link rel="stylesheet" href="../../../assets/css/thumbial.css" />
<?php $cont=1; foreach ($produtos as $key => $value){  if($cont > (count($produtos) - 1)) break; ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
      <div class="thumbnail ">
        <div id="carousel-produtos-<?php echo $value['id']; ?>" class="carousel slide" data-ride="carousel">

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
        <div class="caption" style="height:auto;">
          <h5 class="pull-right"><?= $value['categoria_nome']; ?>  <span class="glyphicon glyphicon-tag"></span></h4>
          <h4><a href="#"><?php echo $value['nome']; ?></a></h4>
          <h6>Disponivel: <?php echo $value['estoque_quantidade']; ?></h4>
          <h4 class="pull-right" style="margin-top: -23px; padding-right: 12px;">R$ <?php echo $value['preco']; ?></h4><br>
          <p style="margin-top:-20px;"><?= $value['descricao']; ?></p>
        </div>
        <?php if($value['estoque_quantidade'] > 1){ ?>
        <div class="panel-footer">
          <form id="cartForm-<?= $value['id']; ?>" action="../controller/addcarrinhocontroller.php" method="POST">
            <input type="hidden" form="cartForm-<?= $value['id']; ?>" name="id" value="<?= $value['id']; ?>"/>
            <button type="submit" form="cartForm-<?= $value['id']; ?>" class="btn btn-primary btn-sm">Adicionar ao carrinho</button>
            <input type="number" style="width: 80px;" max="<?= $value['estoque_quantidade'] ?>"
            min="1" step="1" pattern="\d+" value="1" class="pull-right btn btn-danger btn-sm"
            form="cartForm-<?= $value['id']; ?>" name="qtd">
          </form>
        </div>
        <?php } ?>
      </div>
  </div>
<?php $cont=$cont+1; } ?>
<?php unset($_SESSION['produtos']); ?>
