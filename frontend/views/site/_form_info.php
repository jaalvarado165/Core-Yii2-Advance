<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\tabs\TabsX;
use yii\jui\Autocomplete;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('app', 'Registros');
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title ?></h1>

<?php

Modal::begin([
    'options' => ['id' => 'kartik'],
    'header' =>  (isset($_GET['id'])) ? '<h4 style="margin:0; padding:0">' . \Yii::t('app', 'Editar Registro') . '</h4>': '<h4 style="margin:0; padding:0">' . \Yii::t('app', 'Agregar Registro') . '</h4>',
    'toggleButton' => ['label' => \Yii::t('app', 'Agregar Registro'), 'class' => 'btn btn-lg btn-success'],
]);

?>


<div class="form_profile">

    <?php 
         if(isset($_GET['id'])) {
            $form =  ActiveForm::begin(['action' => ['updateinfo', 'id'=>$_GET['id']]]);  
         
         }
         else {
             $form = ActiveForm::begin(); 
         }
    
    ?>
    <?php echo $form->field($model, 'first_name'); ?><br/>
    <?php echo $form->field($model, 'last_name'); ?><br/>
    <?php echo $form->field($model, 'phone'); ?><br/>
    <?php echo DatePicker::widget([
            'model' => $model,
             'form' => $form,
            'attribute' => 'date_birth',
            //'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'todayHighlight' => true,
                'format' => 'd-M-yy'
            ]
        ]);
        ?>
        <?= Html::error($model, 'date_birth') ?>
    <div class="form-group">

        <?= Html::submitButton((isset($_GET['id'])) ? Yii::t('app', 'Actualizar'): Yii::t('app', 'Enviar'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- form_profile -->
<?php
Modal::end();

?>

<h2><?= Yii::t('app', 'Todos los registros') ?></h2>

<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'first_name',
            'value' => function ($data) {
                return $data->first_name; //$data['name'] for array data, e.g. using SqlDataProvider.
            },
            'filter' => false
        ],
        [
            'attribute' => 'last_name',
            'value' => function ($data) {
                return $data->last_name; //$data['name'] for array data, e.g. using SqlDataProvider.
            },
            'filter' => false
        ],
        [
            'attribute' => 'phone', 
            'value' => function ($data) {
                return $data->phone; //$data['name'] for array data, e.g. using SqlDataProvider.
            },
            'filter' => false
        ],
        [
            'attribute' => 'date_birth', 
            'value' => function ($data) {
                if (!empty($data->date_birth)) {
                    $data->date_birth = date('d-M-y', $data->date_birth);
                }
                return $data->date_birth; //$data['name'] for array data, e.g. using SqlDataProvider.
            },
            'filter' => false
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a('<span class="fa fa-search"></span>' . Yii::t('app', 'Actualizar'), Url::to(['infoup', 'id' => $model->id]), [
                                'title' => Yii::t('app', 'Actualizar'),
                                'class' => 'btn btn-primary btn-xs',
                                'id' => 'modalButton'
                    ]);
                },
                //delete button
                'delete' => function ($url, $model) {
                    return Html::a('<span class="fa fa-search"></span>' . Yii::t('app', 'Borrar'), Url::to(['deleteinfo', 'id' => $model->id]), [
                                'title' => Yii::t('app', 'Borrar'),
                                'class' => 'btn btn-danger btn-xs',
                                'data-confirm' => Yii::t('app', '¿Esta seguro que desea borrar este ítem?'),
                    ]);
                },
                        //delete button
                
                    ],
                ],
            ],
        ]);
        ?>
    
    