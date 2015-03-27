<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = \Yii::t('app', 'Actualizar Usuario').': ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = \Yii::t('app', 'Actualizar');
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= 
        $this->render('_form_sign_up', [
        'model' => $model,
    ]) ?>

</div>
