<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Florería Linda Primavera';
?>
<div class="container site-index pt40 pb40"></div>
<!-- Products Section -->
<section class="wsection-full-width">
    <div class="row text-center">
        <h2>Algunos de nuestros productos</h2>
        <div class="wdivider d3 w25"></div>
    </div>
    <div class="row portfolio-full-width">
        <?php foreach ($products as $product) : ?>
            <div class="col-sm-4 col-md-3">
                <div class="portfolio-inner-item view">
                    <?= Html::img(Yii::getAlias('@web') . '/uploads/products/' . $product->image->file, ['alt' => $product->name]) ?>
                    <div class="mask">
                        <div class="mask-bordered">
                            <div class="widget-product-name align-middle">
                                <h2><?= $product->name ?></h2>
                                <p class="project-actions">
                                    <?= Html::a('<i class="fa fa-search"></i>', ['/products/view', 'id' => $product->id]) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- END portfolio Item -->
        <?php endforeach; ?>
    </div>
</section>
<!-- End Products Section -->
<section class="wsection-3 custom-wsection cs2 mt0 mb0">
    <div class="container animated" data-anim="bounceIn">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="wsection-title st2 mb25">Si te gusta lo que ves, mira todos nuestros productos</h2>
                <?= Html::a('Nuestros Productos', ['/categories/index'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</section>