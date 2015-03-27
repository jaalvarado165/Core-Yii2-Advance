<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


//\Yii::$app->language = 'en-US';
$this->title = \Yii::t('app', 'Usuarios');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(\Yii::t('app', 'Crear Usuario'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            // 'status',
//            [
//                'attribute' => 'created_at',
//                'value' => 'created_at',
//                'format' => 'raw',
//                'filter'=>false
////                'filter' => DatePicker::widget([
////                    'model' => $searchModel,
////                    'attribute' => 'created_at',
////                    'template' => '{addon}{input}',
////                    'clientOptions' => [
////                        'autoclose' => true,
////                        'format' => 'yyyy-mm-dd'
////                    ]
////                ])
//            ],
            //'created_at',
            // 'updated_at',
            'first_name',
            'last_name',
            [
                'attribute' => 'role',
                'value' => function ($data) {
                    return $data->getRoleData($data->role); //$data['name'] for array data, e.g. using SqlDataProvider.
                },
                'filter' => [1 => \Yii::t('app', 'Administrador'), 2 => \Yii::t('app', 'Doctor'), 3 => \Yii::t('app', 'Clínica'), 4 => \Yii::t('app', 'Paciente'), 5 => \Yii::t('app', 'Secretaria'), 6 => \Yii::t('app', 'Soporte al Cliente')]
            ],
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->getStatusData($data->status); //$data['name'] for array data, e.g. using SqlDataProvider.
                },
                'filter' => [1 => \Yii::t('app', 'Activo'), 2 => \Yii::t('app', 'Inactivo')]
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>
