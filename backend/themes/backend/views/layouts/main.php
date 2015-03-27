<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);


$this->title = \Yii::t('app', 'Backend');

if(isset($_GET['lang'])) {
    Yii::$app->language = $_GET['lang'];
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => \Yii::t('app', 'Backend'),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => \Yii::t('app', 'Inicio'), 'url' => ['/site/index'], 'visible'=>(!Yii::$app->user->isGuest && Yii::$app->authManager->checkAccess(Yii::$app->user->getId(), 'administrator'))],
                ['label' => \Yii::t('app', 'Usuarios'), 'url' => ['/user/user/index'], 'visible'=>(!Yii::$app->user->isGuest && Yii::$app->authManager->checkAccess(Yii::$app->user->getId(), 'administrator'))],
                //['label' => \Yii::t('app', 'Actualizar RBAC'), 'url' => ['/user/user/rbac']],
                ['label' => Yii::$app->language=="es" ? 'English': 'Español', 'url' => [Yii::$app->controller->action->id, 'lang'=>Yii::$app->language=="es"? "en-US": "es"]]
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => \Yii::t('app', 'Ingresar'), 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => \Yii::t('app', 'Salir').' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
            
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
