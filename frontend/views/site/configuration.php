<?php
use yii\helpers\Html;

?>
<div class="row">
    <div class="col-sm-3">
        <?= $this->render('nav_sidebar', [
    ]) ?>
    </div>
    <div class="col-sm-9">
         
         <?= $this->render('_form_configuration', [
        'model' => $model,
        'action' => $_GET['action']
    ]) ?>

    </div>
</div>