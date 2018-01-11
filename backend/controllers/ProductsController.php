<?php

namespace backend\controllers;

use common\models\Categories;
use common\models\Images;
use Yii;
use common\models\Products;
use common\models\search\ProductsSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $categories = Categories::find()->select(['id', 'name'])->asArray()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => ArrayHelper::map($categories, 'id', 'name'),
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $pathProducts = Yii::getAlias('@frontend') . '/web/uploads/products';

        FileHelper::createDirectory($pathProducts, $mode = 0775, $recursive = true);

        $model = new Products();
        $image = new Images();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $uploadedImage = UploadedFile::getInstances($image,'file');

            if (!empty($uploadedImage)){
                $name = $model->id . '-' . str_replace(' ', '-', $model->name) . '.' . $uploadedImage[0]->extension;
                $uploadedImage[0]->saveAs(Yii::getAlias('@frontend') . '/web/uploads/products/'.$name);

                $image->product_id = $model->id;
                $image->file = $name;
                $image->save();
            }

            return $this->redirect('index');
        }

        $categories = Categories::find()->select(['id', 'name'])->asArray()->all();

        return $this->render('create', [
            'model' => $model,
            'image' => $image,
            'categories' => ArrayHelper::map($categories, 'id', 'name'),
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;
        $imagesFolder = str_replace('backend', 'frontend', Yii::getAlias('@web'));

        $previews = [];
        $previewsConfig = [];

        if ($model->image->file != null){
            $previews[] = Url::to($imagesFolder . '/uploads/products/') . $model->image->file;
            $previewsConfig[] = [
                'caption' => $model->image->file,
                'url' => Url::to(["//products/deleteimage", 'id' => $model->id])
            ];
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $prev_image = (isset($model->image->name)) ? $model->image->name : '';
            $uploadedImage = UploadedFile::getInstances($image,'file');

            if (count($uploadedImage) > 0){
                $name = $model->id . '-' . str_replace(' ', '-', $model->name) . '.' . $uploadedImage[0]->extension;
                $uploadedImage[0]->saveAs(Yii::getAlias('@frontend') . '/web/uploads/products/'.$name);

                $image->product_id = $model->id;
                $image->file = $name;
                $image->save();
            } else {
                // Check if there's an image in the folder
                // if there isn't... delete
                if (file_exists('uploads/products/' . $prev_image))
                    $model->image_file = $prev_image;
                else
                    $model->image_file = null;
            }

            return $this->redirect('index');
        }

        $categories = Categories::find()->select(['id', 'name'])->asArray()->all();

        return $this->render('update', [
            'model' => $model,
            'image' => $image,
            'previews' => $previews,
            'previewsConfig' => $previewsConfig,
            'categories' => ArrayHelper::map($categories, 'id', 'name'),
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     *
     * Delete Product Image
     *
     * @return bool
     */
    public function actionDeleteimage($id){

        $product = $this->findModel($id);

        // Delete image from the folder
        if (unlink('../../frontend/web/uploads/products/' . $product->image->file))
            return true;
        else
            return false;
    }

    /**
     * Changes ProductsStatus.
     *
     * @return string
     */
    public function actionStatus()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();

            $model = Products::findOne($data['id']);

            if ($model->status)
                $model->status = Products::STATUS_DELETED;
            else
                $model->status = Products::STATUS_ACTIVE;

            $model->save();
        }

        return null;
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
