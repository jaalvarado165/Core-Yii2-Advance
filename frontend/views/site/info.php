<?php
use yii\helpers\Html;


?>
<div class="row">
    <div class="col-sm-3">
        <?= $this->render('nav_sidebar', [
    ]) ?>
    </div>
    <div class="col-sm-9">
        
         <?= $this->render('_form_info', [
             'model' => $model,
             'searchModel' => $searchModel,
             'dataProvider' =>$dataProvider
    ]) ?>

    </div>
</div>