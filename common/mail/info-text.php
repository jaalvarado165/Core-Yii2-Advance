<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */



?>
<?=\Yii::t('app', 'Hola') ?> <?= $user->username ?>,

<?=\Yii::t('app', 'Usted ha agregado un registro nuevo')?>:
    <?=\Yii::t('app', 'Nombres')?><?= $info->first_name; ?>
    <?=\Yii::t('app', 'Apellidos')?><?= $info->last_name; ?>
    <?=\Yii::t('app', 'Teléfono')?><?= $info->phone; ?>
    <?=\Yii::t('app', 'Fecha de Nacimiento')?><?php if (!empty($info->date_birth)) {
                 echo date('d-M-y', $info->date_birth);
                } ?>
