<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\StorageFile;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * ProfileForm is the model behind the profile form.
 */
class StorageForm extends Model {

    public $profile_photo;
    public $file;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [

            //[['profile_photo'], 'required'],
            [['profile_photo'], 'file'/*, 'extensions' => ['png', 'jpg', 'gif'],
                'maxSize' => 1024*1024*/],
                // verifyCode needs to be entered correctly
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'profile_photo' => \Yii::t('app', 'Foto de Perfil'),
        ];
    }

    /**
     * Upload Profile Photo.
     *
     * @return StorageFile the saved model or null if saving fails
     */
    public function uploadphotoprofile() {


        $imagename = Yii::$app->getSecurity()->generateRandomString();
        $this->profile_photo = UploadedFile::getInstance($this, 'profile_photo');
        if (!empty($this->profile_photo)) {
            $this->profile_photo->saveAs('uploads/profile-photos/' . $imagename . '.' . $this->profile_photo->extension);
            
        } elseif(empty($this->profile_photo)) {
            $storage_file = false;
            return $storage_file;
        }
        if ($this->validate()) {

            //delete profile photo old
            //StorageFile::deleteAll(['relatedid' => Yii::$app->user->getId(), 'type' => 1]);


            $storage_file = new StorageFile();
            $storage_file->relatedid = Yii::$app->user->getId();
            $storage_file->name = $this->profile_photo->baseName;
            $storage_file->hash = $imagename;
            $storage_file->extension = $this->profile_photo->extension;
            $storage_file->create = time();
            $storage_file->type = 1;
            $storage_file->size = $this->profile_photo->size;
            //dumpx($storage_file->attributes);
            if ($storage_file->save()) {

                return $storage_file;
            }
        }

        return null;
    }


}
