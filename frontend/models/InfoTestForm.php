<?php
namespace frontend\models;

use common\models\User;
use common\models\InfoTest;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class InfoTestForm extends Model
{
    public $first_name;
    public $last_name;
    public $phone;
    public $date_birth;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'date_birth'], 'required'],
            [['phone'], 'integer'],
            [['first_name', 'last_name', 'phone'], 'string', 'max' => 100],
        ];
    }

    
     public function attributeLabels()
    {
        return [
            'first_name' => Yii::t('app', 'Nombres'),
            'last_name' => Yii::t('app', 'Apellidos'),
            'phone' => Yii::t('app', 'Teléfono'),
            'date_birth' => Yii::t('app', 'Fecha de Nacimiento'),
        ];
    }
    
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function infoup($id = null)
    {
        
        if ($this->validate()) {
            
            if(isset($_GET['id'])) {
                $info_test = InfoTest::findOne(['id' => $_GET['id']]);
            }else {
                $info_test = new InfoTest();
            }
            $info_test->first_name = $this->first_name;
            $info_test->last_name = $this->last_name;
            $info_test->phone = $this->phone;
            if (!empty($this->date_birth)) {
                $info_test->date_birth = strtotime($this->date_birth);
            }
            $info_test->created_by = Yii::$app->user->getId(); 
            //dumpx($info_test->attributes);
            if ($info_test->save()) {
                return $info_test;
            }
        }

        return null;
    }
    
}
