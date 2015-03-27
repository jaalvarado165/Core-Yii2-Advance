<?php
namespace yii\console\controllers;
 
use yii\console\Controller;

class RbacController extends \yii\console\Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "dashboard" permission
        $dashboard = $auth->createPermission('dashboard');
        $dashboard->description = 'Acces to dashboard';
        $auth->add($dashboard);
//
//        // add "updatePost" permission
//        $updatePost = $auth->createPermission('updatePost');
//        $updatePost->description = 'Update post';
//        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        $secretary = $auth->createRole('secretary');
        $auth->add($secretary);
        $auth->addChild($secretary, $dashboard);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $administrator = $auth->createRole('administrator');
        $auth->add($administrator);
        $auth->addChild($administrator, $dashboard);
        
        $doctor = $auth->createRole('doctor');
        $auth->add($doctor);
        $auth->addChild($doctor, $dashboard);
        
        $clinic = $auth->createRole('clinic');
        $auth->add($clinic);
        $auth->addChild($clinic, $dashboard);
        
        $customersupport = $auth->createRole('customersupport');
        $auth->add($customersupport);
        $auth->addChild($customersupport, $dashboard);
        
        $patient = $auth->createRole('patient');
        $auth->add($patient);
        $auth->addChild($patient, $dashboard);
        
        //$auth->addChild($administrator, $secretary);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($customersupport, 6);
        $auth->assign($secretary, 5);
        $auth->assign($patient, 4);
        $auth->assign($clinic, 3);
        $auth->assign($doctor, 2);
        $auth->assign($administrator, 1);
    }
}