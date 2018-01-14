<?php
namespace frontend\controllers;

use common\models\Categories;
use common\models\Products;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

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
    public function actionView($id)
    {
        $product = $this->findModel($id);
        $categories = Categories::find()
            ->where([Categories::tableName() . '.status' => Categories::STATUS_ACTIVE])
            ->all();

        return $this->render('view', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
