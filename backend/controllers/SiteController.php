<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    public function beforeAction($action) {
        if (Yii::$app->session->has('lang')) {
            Yii::$app->language = Yii::$app->session->get('lang');
        } else {
            //or you may want to set lang session, this is just a sample
            Yii::$app->language = 'es';
        }
        return parent::beforeAction($action);
    }
    
    public function actionIndex() {
        
        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }
        
        return $this->render('index');
    }

    public function actionLogin() {
        
        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }
        
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->authManager->checkAccess(Yii::$app->user->getId(), 'administrator')) {
                return $this->goBack();
            } else {
                Yii::$app->user->logout();
                return $this->goHome();
            }
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
