<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $categories common\models\Categories */

$this->title = 'Crear Producto';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>
