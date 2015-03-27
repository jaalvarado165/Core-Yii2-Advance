<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p><?=\Yii::t('app', 'Hola') ?> <?= Html::encode($user->username) ?>,</p>

    <p><?=\Yii::t('app', 'Gracias por registrarse. Haga clic en el siguiente enlace para confirmar su cuenta')?>:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
