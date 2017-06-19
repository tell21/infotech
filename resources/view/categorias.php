<?php $categorias = json_decode($_SESSION['categorias'], true); ?>
<div class="col-md-3">
    <p class="lead">Infotech</p>
    <div class="list-group">
        <a href="../controller/indexcontroller.php" class="list-group-item">Todas as categorias</a>
        <?php foreach ($categorias as $key => $value) { ?>
            <a href="../controller/indexcategoriascontroller.php?id=<?= $value['id']; ?>" class="list-group-item"><?= $value['nome'] ?></a>
        <?php } ?>
    </div>
</div>
