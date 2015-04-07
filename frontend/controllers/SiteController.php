<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use common\models\InfoTest;
use common\models\User;
use common\models\StorageFile;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\InfoTestForm;
use frontend\models\StorageForm;
use frontend\models\ContactForm;
use frontend\models\InfoSearch;
use frontend\models\ConfigurationForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup', 'dashboard'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['logout', 'dashboard'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['signup', 'index', 'about', 'contact', 'login', 'RequestPasswordReset', 'reset', 'pass', 'confirm'],
                        'allow' => true,
//                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'dashboard', 'infoup', 'updateinfo', 'deleteinfo', 'mediafiles', 'deletemediafile', 'configuration_pass', 'configuration_user'],
                        'allow' => true,
                        'roles' => ['user', 'administrator'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
            if (Yii::$app->authManager->checkAccess(Yii::$app->user->getId(), 'administrator') || Yii::$app->authManager->checkAccess(Yii::$app->user->getId(), 'user')) {
                //return $this->goBack();
                return $this->redirect(['site/infoup']);
            } else {
                Yii::$app->user->logout();
                return $this->render('login', [
                            'model' => $model,
                ]);
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

    public function actionDashboard() {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        return $this->render('dashboard', [
        ]);
    }

    public function actionContact() {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        return $this->render('about');
    }

    public function actionSignup() {

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

                if (Yii::$app->getUser()->login($user)) {
                    //return $this->goHome();
                    return $this->redirect(['site/dashboard']);
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionInfoup() {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        $model = new InfoTestForm();

        $searchModel = new InfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {

            if ($info = $model->infoup()) {
                //send email

                $user = User::findOne(['id' => Yii::$app->user->getId()]);

//                \Yii::$app->mailer->compose(['html' => 'info-html', 'text' => 'info-text'], ['user' => $user, 'info' => $info])
//                        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
//                        ->setTo($user->email)
//                        ->setSubject(\Yii::t('app', 'Información Agregada'))
//                        ->send();

                Yii::$app->session->setFlash('success', \Yii::t('app', 'Información agregada exitosamente'));
                return $this->redirect(['site/infoup']);
            }
        }

        if (isset($_GET['id'])) {
            //assign values
            $info_test = InfoTest::findOne(['id' => $_GET['id']]);
            $model->first_name = $info_test->first_name;
            $model->last_name = $info_test->last_name;
            $model->phone = $info_test->phone;
            if (!empty($info_test->date_birth)) {
                $model->date_birth = date('d-M-y', $info_test->date_birth);
            }

            $js = '$("#kartik").modal("show")';
            $this->getView()->registerJs($js);

            //$entity = Entity::
        }

        return $this->render('info', [
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
        ]);
    }

    public function actionUpdateinfo() {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        $model = new InfoTestForm();


        if ($model->load(Yii::$app->request->post())) {

            if ($info = $model->infoup($_GET['id'])) {
                Yii::$app->session->setFlash('success', \Yii::t('app', 'Información actualizada exitosamente'));
            } else {
                Yii::$app->session->setFlash('info', \Yii::t('app', 'Sus datos no fueron actualizados'));
            }
            return $this->redirect(['infoup']);
        } else {

            return $this->render('info', [
                        'model' => $model,
            ]);
        }
    }

    public function actionRequestPasswordReset() {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionReset() {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', \Yii::t('app', 'Le hemos enviado un enlace a su correo para reestablecer su clave.'));

                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('error', \Yii::t('app', 'Email no encontrado.'));
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionPass($token) {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }



        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
            //Yii::$app->getSession()->setFlash('success', \Yii::t('app', 'Clave actualizada.'));
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', \Yii::t('app', 'Clave actualizada.'));

            return $this->redirect(['login']);
            //return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionDeleteinfo($id) {
        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        InfoTest::deleteAll(['created_by' => Yii::$app->user->getId(), 'id' => $id]);
        Yii::$app->session->setFlash('info', \Yii::t('app', 'Ítem borrado exitosamente'));
        return $this->redirect(['infoup']);
    }

    public function actionMediafiles() {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }


        $model = new StorageForm();
        //search profile photo

        $profile_photo = StorageFile::findAll(['relatedid' => Yii::$app->user->getId(), 'type' => 1]);



        if ($model->load(Yii::$app->request->post())) {

            $storagefile = $model->uploadphotoprofile();

            //dumpx($storagefile);
            //upload profile photo
            if (empty($storagefile)) {
                Yii::$app->session->setFlash('error', \Yii::t('app', 'Debe subir una foto'));
            } else {
                Yii::$app->session->setFlash('success', \Yii::t('app', 'Foto cargada exitosamente'));
            }

            return $this->refresh();
        } else {

            return $this->render('index_media_file', [
                        'model' => $model,
                        'profile_photo' => $profile_photo,
            ]);
        }
    }

    public function actionDeletemediafile($id) {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        $find_photo = StorageFile::findOne(['id' => $id]);

        unlink(APP_DIR . "/uploads/profile-photos/" . $find_photo->hash . "." . $find_photo->extension);

        StorageFile::deleteAll(['id' => $id]);


        Yii::$app->session->setFlash('info', \Yii::t('app', 'Foto borrada exitosamente'));


        return $this->redirect(['mediafiles']);
    }
    
    
    public function actionConfiguration_pass() {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        $model = new ConfigurationForm();
        $model->scenario = 'password';

        //dumpx($_POST);
        if ($model->load(Yii::$app->request->post()) && $configuration = $model->configurationup()) {
            //upload profile photo
            Yii::$app->session->setFlash('success', \Yii::t('app', 'Datos actualizados exitosamente'));

            return $this->refresh();
        } else {

            return $this->render('configuration', [
                        'model' => $model,
                        'action' => 'pass'
            ]);
        }
    }
    
    public function actionConfiguration_user() {

        if (isset($_GET['lang'])) {

            Yii::$app->session->set('lang', $_GET['lang']);
            Yii::$app->language = Yii::$app->session->get('lang');
        }

        $model = new ConfigurationForm();
        $model->scenario = 'username';


        if ($model->load(Yii::$app->request->post()) && $configuration = $model->configurationup()) {
            //upload profile photo
            Yii::$app->session->setFlash('success', \Yii::t('app', 'Datos actualizados exitosamente'));

            return $this->refresh();
        } else {

            return $this->render('configuration', [
                        'model' => $model,
                        'action' => 'user'
            ]);
        }
    }
    

}
