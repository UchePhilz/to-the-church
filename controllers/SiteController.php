<?php

namespace app\controllers;

use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
                'only' => ['logout', 'writings', 'view-writing'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['writings', 'view-writing'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
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
     * @return string|yii\web\Response
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $this->layout = 'public_scroll';
            return $this->render('index');
        }
        $this->layout = 'admin_layout';
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        $this->layout = 'main';

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
        $this->layout = 'public_scroll';
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
        $this->layout = 'public_scroll';
        return $this->render('about');
    }

    /**
     * Lists all Writings for public view.
     *
     * @return string
     */
    public function actionWritings($church_group_id = null)
    {
        $this->layout = 'public_scroll';
        $query = \app\models\Writings::find()->orderBy(['created_at' => SORT_DESC]);
        
        if ($church_group_id) {
            $query->andWhere(['church_group_id' => $church_group_id]);
        }
        
        $countQuery = clone $query;
        $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $writings = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('writings', [
            'writings' => $writings,
            'pages' => $pages,
        ]);
    }

    /**
     * Displays a single Writing for public view.
     *
     * @param int $id
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionViewWriting($id)
    {
        $this->layout = 'public_scroll';
        $model = \app\models\Writings::findOne($id);
        if (!$model) {
            throw new \yii\web\NotFoundHttpException('The requested writing does not exist.');
        }

        return $this->render('view-writing', [
            'model' => $model,
        ]);
    }
}
