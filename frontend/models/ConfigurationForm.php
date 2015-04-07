<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\helpers\ArrayHelper;
/**
 * ProfileForm is the model behind the profile form.
 */
class ConfigurationForm extends Model {

    public $password;
    public $new_password;
    public $email;
    public $new_email;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // name, email, subject and body are required
            [['email', 'new_email'], 'required', 'on' => 'username'],
            [['password', 'new_password'], 'required', 'on' => 'password'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            [['new_password'], 'compare', 'compareAttribute'=>'password', 'operator'=>'=='],
            [['email'], 'compare', 'compareAttribute'=>'new_email', 'operator'=>'=='],
            [['password', 'new_password'], 'string', 'min' => 6],
                // email has to be a valid email address
//            ['email', 'email'],
                // verifyCode needs to be entered correctly
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'password' => \Yii::t('app', 'Nueva Clave'),
            'new_password' => \Yii::t('app', 'Repetir Nueva Clave'),
            'email' => \Yii::t('app', 'Nuevo Correo'),
            'new_email' => \Yii::t('app', 'Repetir Nuevo Correo'),
        ];
    }

    /**
     * 
     * @return string
     */
    public function scenarios() {

        $scenarios = parent::scenarios();
        return $scenarios;
    }
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function configurationup() {
        
        if ($this->validate()) {
            //save configuration
            
            $user = User::findOne(['id' => Yii::$app->user->getId()]);
            if($this->scenario == 'password') {
                $user->setPassword($this->password);
                $user->generateAuthKey();
            }elseif($this->scenario == 'username') {
                $user->email = $this->email;
            }
            //dumpx($user->attributes);
          
            if($user->save()){
                return $user;
            }
            
            
        }

        return null;
    }


}
