<?php
namespace frontend\controllers;

use common\models\Categories;
use common\models\Products;
use Yii;
use yii\base\InvalidParamException;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
     * Displays Products index view.
     *
     * @return mixed
     */
    public function actionIndex($id)
    {
        $query = Products::find()
            ->where(['status' => Products::STATUS_ACTIVE])
            ->andWhere(['category_id' => $id])
            ->orderBy('name');

        $categories = Categories::find()
            ->where([Categories::tableName() . '.status' => Categories::STATUS_ACTIVE])
            ->all();

        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 6]);
        $products = $query->offset($pagination->offset)->limit(6)->all();

        return $this->render('index', [
            'products' => $products,
            'categories' => $categories,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays single product.
     *
     * @return mixed
     */
    public function actionView()
    {
        return $this->render('view');
    }

}
