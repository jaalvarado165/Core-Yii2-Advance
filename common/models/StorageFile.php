<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "storage_file".
 *
 * @property integer $id
 * @property integer $relatedid
 * @property string $name
 * @property string $hash
 * @property string $extension
 * @property string $create
 * @property integer $type
 * @property integer $size
 */
class StorageFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'storage_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['relatedid', 'type', 'size'], 'integer'],
            [['relatedid', 'type', 'size', 'name', 'hash', 'extension', 'create'], 'required'],
//            [['name', 'hash'], 'string', 'max' => 200],
//            [['extension', 'create'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'relatedid' => Yii::t('app', 'Relatedid'),
            'name' => Yii::t('app', 'Name'),
            'hash' => Yii::t('app', 'Hash'),
            'extension' => Yii::t('app', 'Extension'),
            'create' => Yii::t('app', 'Create'),
            'type' => Yii::t('app', 'Type'),
            'size' => Yii::t('app', 'Size'),
        ];
    }
}
