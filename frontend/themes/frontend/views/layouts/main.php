<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$this->title = \Yii::t('app', 'Frontend');
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
                'brandLabel' => \Yii::t('app', 'Frontend'),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => \Yii::t('app', 'Registros'), 'url' => ['/site/infoup'], 'visible'=>(!Yii::$app->user->isGuest)],
                ['label' => \Yii::t('app', 'Inicio'), 'url' => ['/site/index'], 'visible'=>(Yii::$app->user->isGuest)],
                ['label' => \Yii::t('app', 'Quiénes Somos'), 'url' => ['/site/about'], 'visible'=>(Yii::$app->user->isGuest)],
                ['label' => \Yii::t('app', 'Contáctenos'), 'url' => ['/site/contact'], 'visible'=>(Yii::$app->user->isGuest)],
                
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => \Yii::t('app', 'Registrarse'), 'url' => ['/site/signup']];
                $menuItems[] = ['label' => \Yii::t('app', 'Ingresar'), 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => \Yii::t('app', 'Salir').' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            if(isset($_GET['action'])) {
                $menuItems[] = [
                    'label' => Yii::$app->language=="es" ? 'English': 'Español', 'url' => [Yii::$app->controller->action->id, 'lang'=>Yii::$app->language=="es"? "en-US": "es", 'action'=>$_GET['action']]
                ];
            }
            elseif(isset($_GET['id'])) {
                $menuItems[] = [
                    'label' => Yii::$app->language=="es" ? 'English': 'Español', 'url' => [Yii::$app->controller->action->id, 'lang'=>Yii::$app->language=="es"? "en-US": "es", 'id'=>$_GET['id']]
                ];
            } else {
                $menuItems[] = ['label' => Yii::$app->language=="es" ? 'English': 'Español', 'url' => [Yii::$app->controller->action->id, 'lang'=>Yii::$app->language=="es"? "en-US": "es"]];
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
        <?= Alert::widget() ?>
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
