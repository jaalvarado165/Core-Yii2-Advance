<?php

namespace backend\modules\user\controllers;

use Yii;
use backend\models\User;
use backend\modules\user\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\SignupForm;
use yii\rbac\DbManager;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

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
                        'actions' => ['logout', 'index', 'create', 'update', 'delete', 'view', 'rbac'],
                        'allow' => true,
                        'roles' => ['administrator'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
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
    
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        
        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }
        
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        
        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }
        
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        
        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }
        
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                
                //assign role to user
                $auth = Yii::$app->authManager;
                $authorRole = $auth->getRole($model->getRole($user->role));
                $auth->assign($authorRole, $user->getId());

                return $this->redirect(['view', 'id' => $user->id]);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        
        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionRbac() {

        $r = new DbManager;
        $r->init();

        $manage_user = $r->createPermission('manage users');
        $manage_user->description = 'Manage Users';
        $r->add($manage_user);

        $administrator = $r->createRole('administrator');
        $r->add($administrator);
        $r->addChild($administrator, $manage_user);

        $doctor = $r->createRole('user');
        $r->add($doctor);


        return $this->render('rbac');
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        
        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
