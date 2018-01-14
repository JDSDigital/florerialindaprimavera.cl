<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\models\Categories;
use common\models\Products;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$this->registerMetaTag(['name' => 'author', 'content' => 'geknology.com']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Arreglos florales para cualquier ocasión. Estamos ubicados en Santiago de Chile.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'floreria, floristeria, flores, arreglos, florales, santiago, chile']);

$categories = Categories::find()->where(['status' => Categories::STATUS_ACTIVE])->limit(4)->orderBy(['rand()' => SORT_DESC])->all();
$products = Products::find()->where(['status' => Products::STATUS_ACTIVE])->limit(6)->orderBy(['rand()' => SORT_DESC])->all();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Florería Linda Primavera',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'header-wrapper top-border main-header',
        ],
    ]);
    $menuItems = [
        ['label' => 'Inicio', 'url' => ['//site/index'], 'data-hover' => 'Inicio'],
        ['label' => 'Quienes Somos', 'url' => ['//site/about']],
        ['label' => 'Nuestros Productos', 'url' => ['//categories/index']],
        ['label' => 'Contacto', 'url' => ['//site/contact']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'menu pull-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<!-- Footer Wrapper -->
<footer class="footer-wrapper">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-sm-12 col-md-11">
                            <div class="footer-widget">
                                <h3 class="widget-title">Quienes Somos</h3>
                                <p class="mb25">Lorem ipsum dolor sit amet domo, consectetur adipisicing elit. Magnam, aliquam? Sequi dolore alias voluptate officiis nemo natus dolorum.</p>
                                <address class="contact-info">
                                    <p><i class="fa fa-map-marker box-icon color-white"></i>  Santiago, Chile</p>
                                    <p><i class="fa fa-phone box-icon color-white"></i>  +56 1 2345 6789</p>
                                </address>
                            </div> <!-- END Footer Widget Keep in touch -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="footer-widget">
                                <h3 class="widget-title">Nuestras Categorías</h3>
                                <ul class="footer-posts">
                                    <?php foreach ($categories as $category) : ?>
                                        <li><?= Html::a($category->name, ['//products/index', 'id' => $category->id]) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div> <!-- END Latest posts -->
                        </div>
                        <div class="col-sm-6">
                            <div class="footer-widget">
                                <h3 class="widget-title">Nuestros Productos</h3>
                                <ul id="" class="footer-projects">
                                    <?php foreach ($products as $product) : ?>
                                        <?= Html::a(Html::img(['uploads/products/' . $product->image->file]), ['//products/view', 'id' => $product->id] ) ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div> <!-- END Top projects widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- END Main Footer -->
</footer> <!-- END Footer -->

<div class="footer">
    <div class="container">
        <div class="pull-left">
            <p>Copyright © <?= date('Y') ?> <?= Html::a('Remesas.cl',['//site/index']) ?> / Diseño y desarrollo por <?= Html::a('Geknology', Url::to('http://www.geknology.com/')) ?></p>
        </div>
        <div class="pull-right">
            <ul class="footer-menu">
                <li><?= Html::a('Inicio', ['//site/index']) ?></li>
                <li><?= Html::a('Quienes Somos', ['//site/about']) ?></li>
                <li><?= Html::a('Nuestros Productos', ['//categories/index']) ?></li>
                <li><?= Html::a('Contáctanos', ['//site/contact']) ?></li>
            </ul>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
