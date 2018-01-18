<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Categorías';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-categories pt40 pb40">
    <div class="row shop-products">
        <?php foreach ($categories as $category) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <figure class="shop-product">
                    <div class="shop-image">
<!--                        --><?//= Html::img(['images/demo/e-101.jpg']) ?>
                        <?= Html::img(['uploads/products/' . $category->products[0]->image->file]) ?>
                        <div class="shop-actions">
                            <p><?= $category->summary ?></p>
                        </div>
                    </div>
                    <figcaption class="shop-description">
                        <h4><?= Html::a($category->name, ['//products/index', 'id' => $category->id]) ?></h4>
                    </figcaption>
                </figure>
            </div>
        <?php endforeach; ?>
    </div>
</div>
