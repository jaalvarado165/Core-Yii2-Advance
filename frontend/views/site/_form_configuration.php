<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form ActiveForm */

$this->title = \Yii::t('app', 'Configuración');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Configuración'), 'url' => ['configuration']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= \Yii::t('app', 'Configuración') ?></h1>


<div class="form_configuration">

    <?php $form = ActiveForm::begin(); ?>
    <?php
        if($model->scenario == 'password') {
           echo $form->field($model, 'password')->passwordInput();
           echo $form->field($model, 'new_password')->passwordInput();
        }elseif($model->scenario == 'username') {
            echo $form->field($model, 'email');
           echo $form->field($model, 'new_email');
        }

    ?>
    

    <div class="form-group">

        <?= Html::submitButton(Yii::t('app', 'Enviar'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- form_profile -->
