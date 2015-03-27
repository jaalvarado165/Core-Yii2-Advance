<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use kartik\widgets\FileInput;
use yii\helpers\Url;

//use yii\bootstrap\Carousel;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form ActiveForm */

$this->title = \Yii::t('app', 'Multimedia');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Multimedia'), 'url' => ['mediafiles']];
$this->params['breadcrumbs'][] = $this->title;


//$this->registerJs('$(".btn-danger").confirm();');

?>

<h1><?= \Yii::t('app', 'Multimedia') ?></h1>
<div class="form_profile">

    <h3><?= \Yii::t('app', 'Cargar Foto de Perfil') ?></h3>
    <?php

    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
    ?>

    <?php
//    echo $form->field($model, 'profile_photo')->widget(FileInput::classname(), [
//        'options' => ['accept' => 'image/*'],
//    ])
    
    echo $form->field($model, 'profile_photo')->fileInput();
    
    ?>
    <div class="form-group">

<?php echo Html::submitButton(Yii::t('app', 'Cargar'), ['class' => 'btn btn-success'])  ?>
    </div>
<?php ActiveForm::end(); ?>

</div><!-- form_profile -->
<br/>

<h3><?= \Yii::t('app', 'Fotos Adicionadas') ?></h3>

<?php //dosamigos\gallery\Gallery::widget(['items' => $items]);

//others photos
if(count($profile_photo) > 0 ){
foreach ($profile_photo as $photo) { ?>
    <div class='img_others'>
        <img src='<?= Yii::$app->request->baseUrl ?>/uploads/profile-photos/<?= $photo->hash ?>.<?= $photo->extension?>'>
        <?php  echo Html::a('<span class="fa fa-search"></span>' . Yii::t('app', 'Eliminar'), Url::to(['deletemediafile', 'id' => $photo->id]), [
                                'title' => Yii::t('app', 'Eliminar'),
                                'class' => 'btn btn-danger btn-xs',
                                'data-confirm' => Yii::t('app', '¿Esta seguro que desea borrar esta foto?'),
                    ]);?>
    </div>

<?php
} } else {
    echo "<h3>". \Yii::t('app', 'Aún no ha subido fotos de perfil'). "</h3>";
}
?>