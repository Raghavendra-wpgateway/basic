<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UserForm;
use GuzzleHttp\Psr7\Query;
use yii\base\ErrorException;
// use yii\db\Query;
// use yii\db\ActiveRecord;

// 
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * creating custom function to show and submit a user form data
     */

     public function actionUserform()
     {
         $model1 = new UserForm();
         $session = Yii :: $app->session;

         if(Yii::$app->request->post())
         {
              echo "<pre>";
              $post_Arr = Yii::$app->request->post();

            try{
               
               $model = new userForm();
            
              $model->firstname = $post_Arr['userForm']['firstname'];
              $model->lastname = $post_Arr['userForm']['lastname'];
              $model->email = $post_Arr['userForm']['email'];
              $model->password = $post_Arr['userForm']['password'];
              $model->contact = $post_Arr['userForm']['contact'];

              $insert_result = $model->save();
              
              if($insert_result)
              {
                $session->setFlash('db_success', 'User registered successfully');
                return $this->goBack(Yii::$app->request->referrer);
              }
              else{
                $session->setFlash('db_error', 'User registration failed');
                return $this->goBack(Yii::$app->request->referrer);

              }
            }
            catch(ErrorException $ex)
            {
                echo $ex->getMessage();
            }

         }
         else{
             return $this->render('user_form', ['model' => $model1 , 'session' => $session]);
         }
     }
}
