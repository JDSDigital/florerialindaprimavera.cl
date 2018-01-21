<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Categorías';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-categories pt40 pb40">
    <div class="row shop-products">
        <?php foreach ($categories as $category) : ?>
            <div class="col-sm-4">
                <div class="portfolio-inner-item view">
                    <?= Html::img(['uploads/products/' . $category->products[0]->image->file]) ?>
                    <div class="mask">
                        <h3 class="project-title"><?= $category->name ?></h3>
                        <p class="descr"><?= $category->summary ?></p>
                        <?= Html::a('<i class="fa fa-search"></i>', ['//products/index', 'id' => $category->id], ['class' => 'info']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
