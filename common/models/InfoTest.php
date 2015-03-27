<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "info_test".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $date_birth
 * @property integer $created_by
 */
class InfoTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'date_birth', 'created_by'], 'required'],
            [['created_by'], 'integer'],
            [['first_name', 'last_name', 'phone'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'Nombres'),
            'last_name' => Yii::t('app', 'Apellidos'),
            'phone' => Yii::t('app', 'Teléfono'),
            'date_birth' => Yii::t('app', 'Fecha de Nacimiento'),
            'created_by' => Yii::t('app', 'Creado por'),
        ];
    }
}
