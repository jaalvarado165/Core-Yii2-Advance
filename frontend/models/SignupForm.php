<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $status;
    public $role;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['status', 'required'],
            ['role', 'required'],
            ['first_name', 'required', 'message'=> 'Have to fill this field'],
            ['last_name', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    
     public function attributeLabels()
    {
        return [
            
            'username' => \Yii::t('app', 'Nombre Usuario'),
            'email' => \Yii::t('app', 'Correo'),
            'status' => \Yii::t('app', 'Estado'),
            'role' => \Yii::t('app', 'Rol'),
            'first_name' => \Yii::t('app', 'Nombres'),
            'last_name' => \Yii::t('app', 'Apellidos'),
            'password' => \Yii::t('app', 'Clave'),
        ];
    }
    
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->role = $this->role;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
    
    public function getRole($role) {
        if($role == 1) {
            $role_name="administrator";
        }elseif($role==2) {
            $role_name="user";
        }
        
        return $role_name;
    }
}
