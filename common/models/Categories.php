<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "xcategories".
 *
 * @property int $id
 * @property string $name
 * @property string $summary
 * @property string $description
 * @property int $status
 * @property int $created_at Creation date
 * @property int $updated_at Update date
 *
 * @property Products[] $xproducts
 */
class Categories extends ActiveRecord
{

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xcategories';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'summary', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'summary' => 'Resumen',
            'description' => 'Descripción',
            'status' => 'Estado',
            'created_at' => 'Creado en',
            'updated_at' => 'Actualizado en',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['product_id' => 'id'])->via('products');
    }

    /**
     * @return array
     */
    public function getVegasImages()
    {
        $images = $this->images;
        $response = [];
        foreach ($images as $image)
            array_push($response, '../uploads/products/' . $image->file);

        return json_encode($response);
    }
}
