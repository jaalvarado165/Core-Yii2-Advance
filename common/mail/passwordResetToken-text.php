<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/pass', 'token' => $user->password_reset_token]);
?>
<?=\Yii::t('app', 'Hola') ?> <?= $user->username ?>,

<?=\Yii::t('app', 'Haga clic en el siguiente enlace para cambiar su clave')?>:

<?= $resetLink ?>
