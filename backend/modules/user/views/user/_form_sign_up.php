<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

?>
<div class="site-signup">

    <p><?=\Yii::t('app', 'Por favor rellena lo siguientes campos')?>:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'first_name') ?>
                <?= $form->field($model, 'last_name') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'status')->dropDownList([1 => \Yii::t('app', 'Activo'), 2 => \Yii::t('app', 'Inactivo')]) ?>
            <?= $form->field($model, 'role')->dropDownList([1 => \Yii::t('app', 'Administrador'), 2 => \Yii::t('app', 'Doctor'), 3 => \Yii::t('app', 'Clínica'), 4 => \Yii::t('app', 'Paciente'), 5 => \Yii::t('app', 'Secretaria'), 6 => \Yii::t('app', 'Soporte al Cliente')]) ?>
                <div class="form-group">
                    <?= Html::submitButton(!isset($model->isNewRecord) ? \Yii::t('app', 'Crear') : \Yii::t('app', 'Actualizar'), ['class' => !isset($model->isNewRecord) ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
