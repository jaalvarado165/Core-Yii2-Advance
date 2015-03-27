<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm', 'token' => $user->password_reset_token]);
?>
<?=\Yii::t('app', 'Hola') ?> <?= $user->username ?>,

<?=\Yii::t('app', 'Gracias por registrarse. Haga clic en el siguiente enlace para confirmar su cuenta')?>:

<?= $resetLink ?>
