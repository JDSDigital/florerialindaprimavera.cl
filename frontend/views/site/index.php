<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Florería Linda Primavera';
?>
<div class="container site-index"></div>
<section class="pb40">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <?= Html::img(Yii::getAlias('@web') . '/images/slider1.jpg', ['class' => 'm0a']) ?>
          </div>

          <div class="item">
            <?= Html::img(Yii::getAlias('@web') . '/images/slider2.jpg', ['class' => 'm0a']) ?>
          </div>

          <div class="item">
            <?= Html::img(Yii::getAlias('@web') . '/images/slider3.jpg', ['class' => 'm0a']) ?>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<!-- Products Section -->
<section class="wsection-full-width">
    <div class="container">
        <div class="row text-center">
            <h2>Algunos de nuestros productos</h2>
            <div class="wdivider d3 w25"></div>
        </div>
        <div class="row shop-products">
            <?php foreach ($products as $product) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <figure class="shop-product">
                        <div class="shop-image">
                            <?= (isset($product->image->file)) ? Html::img(['uploads/products/' . $product->image->file]) : '' ?>
                            <div class="shop-actions">
                                <p><?= $product->summary ?></p>
                                <?= Html::a('<i class="fa fa-search"></i>', ['//products/view', 'id' => $product->id], ['class' => 'btn see', 'data-toggle' => 'tooltip', 'title' => $product->name]) ?>
                            </div>
                        </div>
                        <figcaption class="shop-description">
                            <h4><?= $product->name ?></h4>
                            <div class="pull-center">
                                <ins class="shop-price"><?= Yii::$app->formatter->asCurrency($product->price, 'CLP') ?></ins>
                            </div>
                        </figcaption>
                    </figure>
                </div> <!-- END shop Item -->
            <?php endforeach; ?>
        </div>
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