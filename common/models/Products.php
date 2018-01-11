<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "xproducts".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property double $price
 * @property string $summary
 * @property string $description
 * @property int $status
 * @property int $created_at Creation date
 * @property int $updated_at Update date
 *
 * @property Categories $category
 */
class Products extends ActiveRecord
{

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xproducts';
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
            [['category_id', 'name'], 'required'],
            [['category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['name', 'summary', 'description'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Categoría',
            'name' => 'Nombre',
            'price' => 'Precio',
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
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Images::className(), ['product_id' => 'id']);
    }
}
