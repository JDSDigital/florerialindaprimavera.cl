<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "ximages".
 *
 * @property int $id
 * @property int $product_id
 * @property string $file
 * @property int $status
 * @property int $created_at Creation date
 * @property int $updated_at Update date
 *
 * @property Products $product
 */
class Images extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ximages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['file'], 'required', 'on'=> 'create'],
            [['product_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['file'], 'string', 'max' => 255, 'skipOnEmpty' => true],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'file' => 'Archivo',
            'status' => 'Status',
            'created_at' => 'Creado en',
            'updated_at' => 'Actualizado en',
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $pathClients = Yii::getAlias('@frontend') . '/web/uploads/products';

        FileHelper::createDirectory($pathClients, $mode = 0775, $recursive = true);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    /**
     * Deletes image from folder and database
     *
     * @param $id
     * @return bool
     */
    public function deleteImage()
    {
        if (unlink('uploads/' . $this->file) && $this->delete())
            return true;
        else
            return false;
    }
}
