<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $categories common\models\Categories */

$this->title = 'Actualizar Producto: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="products-update">

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>
