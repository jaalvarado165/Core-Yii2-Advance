<?php

use yii\helpers\Html;
?>
<div class="row">
    <div class="col-sm-3">
        <?= $this->render('nav_sidebar', [
        ])
        ?>
    </div>
    <div class="col-sm-9">
        
        <?=
        $this->render('_form_media_file', [
            'model' => $model,
            'profile_photo' => $profile_photo,
        ])
        ?>

    </div>
</div>