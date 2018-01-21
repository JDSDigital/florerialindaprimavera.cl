<?php

namespace frontend\models;

use yii\base\Model;

class ProductsSearchForm extends Model
{
    public $name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nombre',
        ];
    }
}