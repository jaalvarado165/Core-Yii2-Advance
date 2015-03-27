<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = \Yii::t('app', 'Crear Usuario');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_sign_up', [
        'model' => $model,
    ]) ?>

</div>
