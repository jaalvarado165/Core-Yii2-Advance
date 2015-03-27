<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $role
 * @property string $first_name
 * @property string $last_name
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $password;
    
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'first_name', 'last_name'], 'required'],
            [['status', 'created_at', 'updated_at', 'role'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['first_name', 'last_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => \Yii::t('app', 'Nombre Usuario'),
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => \Yii::t('app', 'Correo'),
            'status' => \Yii::t('app', 'Estado'),
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role' => \Yii::t('app', 'Rol'),
            'first_name' => \Yii::t('app', 'Nombres'),
            'last_name' => \Yii::t('app', 'Apellidos'),
        ];
    }
    
    public function getRoleData($role) {
        if($role == 1) {
            $role_name=\Yii::t('app', 'Administrador');
        }elseif($role==2) {
            $role_name=\Yii::t('app', 'Doctor');
        }elseif ($role==3) {
            $role_name=\Yii::t('app', 'Clínica');
        }elseif($role==4){
            $role_name=\Yii::t('app', 'Paciente');
        }elseif($role==5){
            $role_name=\Yii::t('app', 'Secretaria');
        }elseif ($role==6) {
            $role_name=\Yii::t('app', 'Servicio al Cliente');
        }
        return $role_name;
    }
    
    public function getStatusData($status) {
        if($status == 1) {
            $status_name=\Yii::t('app', 'Activo');
        }elseif($status==2) {
            $status_name=\Yii::t('app', 'Inactivo');
        }
        return $status_name;
    }
    
}
