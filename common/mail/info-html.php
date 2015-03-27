<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="password-reset">
    <p><?=\Yii::t('app', 'Hola') ?> <?= Html::encode($user->username) ?>,</p>

    <p><?=\Yii::t('app', 'Usted ha agregado un registro nuevo')?>:</p>
    <strong><?=\Yii::t('app', 'Nombres')?></strong><?= $info->first_name; ?><br/>
    <strong><?=\Yii::t('app', 'Apellidos')?></strong><?= $info->last_name; ?><br/>
    <strong><?=\Yii::t('app', 'Teléfono')?></strong><?= $info->phone; ?><br/>
    <strong><?=\Yii::t('app', 'Fecha de Nacimiento')?></strong><?php if (!empty($info->date_birth)) {
                 echo date('d-M-y', $info->date_birth);
                } ?><br/>
</div>
