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

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'sizes' => '196x196', 'href' => Yii::getAlias('@web') . '/images/favicon-196x196.png']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'sizes' => '96x96', 'href' => Yii::getAlias('@web') . '/images/favicon-96x96.png']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'sizes' => '32x32', 'href' => Yii::getAlias('@web') . '/images/favicon-32x32.png']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'sizes' => '16x16', 'href' => Yii::getAlias('@web') . '/images/favicon-16x16.png']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'sizes' => '128x128', 'href' => Yii::getAlias('@web') . '/images/favicon-128.png']);

$this->registerLinkTag(['rel' => 'apple-touch-icon-precomposed', 'sizes' => '57x57', 'href' => Yii::getAlias('@web') . '/images/apple-touch-icon-57x57.png']);
$this->registerLinkTag(['rel' => 'apple-touch-icon-precomposed', 'sizes' => '114x114', 'href' => Yii::getAlias('@web') . '/images/apple-touch-icon-114x114.png']);
$this->registerLinkTag(['rel' => 'apple-touch-icon-precomposed', 'sizes' => '72x72', 'href' => Yii::getAlias('@web') . '/images/apple-touch-icon-72x72.png']);
$this->registerLinkTag(['rel' => 'apple-touch-icon-precomposed', 'sizes' => '144x144', 'href' => Yii::getAlias('@web') . '/images/apple-touch-icon-144x144.png']);
$this->registerLinkTag(['rel' => 'apple-touch-icon-precomposed', 'sizes' => '60x60', 'href' => Yii::getAlias('@web') . '/images/apple-touch-icon-60x60.png']);
$this->registerLinkTag(['rel' => 'apple-touch-icon-precomposed', 'sizes' => '120x120', 'href' => Yii::getAlias('@web') . '/images/apple-touch-icon-120x120.png']);
$this->registerLinkTag(['rel' => 'apple-touch-icon-precomposed', 'sizes' => '76x76', 'href' => Yii::getAlias('@web') . '/images/apple-touch-icon-76x76.png']);
$this->registerLinkTag(['rel' => 'apple-touch-icon-precomposed', 'sizes' => '152x152', 'href' => Yii::getAlias('@web') . '/images/apple-touch-icon-152x152.png']);

$this->registerMetaTag(['name' => 'application-name', 'content' => 'Floreria Linda Primavera']);
$this->registerMetaTag(['name' => 'msapplication-TileColor', 'content' => '#FFFFFF']);
$this->registerMetaTag(['name' => 'msapplication-TileImage', 'content' => './images/mstile-144x144.png']);
$this->registerMetaTag(['name' => 'msapplication-square70x70logo', 'content' => './images/mstile-70x70.png']);
$this->registerMetaTag(['name' => 'msapplication-square150x150logo', 'content' => './images/mstile-150x150.png']);
$this->registerMetaTag(['name' => 'msapplication-wide310x150logo', 'content' => './images/mstile-310x150.png']);
$this->registerMetaTag(['name' => 'msapplication-square310x310logo', 'content' => './images/mstile-310x310.png']);

$categories = Categories::find()->where(['status' => Categories::STATUS_ACTIVE])->limit(4)->orderBy(['rand()' => SORT_DESC])->all();
$products = Products::find()->where(['status' => Products::STATUS_ACTIVE])->limit(8)->orderBy(['rand()' => SORT_DESC])->all();
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
    <div class="nav-contact">
        <div class="container">
            <div class="row vertical-align">
                <div class="col-xs-10 text-left">
                    <p class="m0">CONTACTO: +56 9 7818 1442 | contacto@floreríalindaprimavera.cl</p>
                </div>
                <div class="col-xs-2 text-right">
                    <p class="m0">
                      <a target="_blank" title="Facebook" href="https://www.facebook.com/Floreria-Linda-Primavera-1924980567819540/"><i class="fa fa-facebook box-icon color-white facebook"></i></a>
                      <a target="_blank" title="instagram" href="https://www.instagram.com/florerialindaprimavera/"><i class="fa fa-instagram box-icon color-white instagram"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
    NavBar::begin([
        'brandLabel' => Html::img(Yii::getAlias('@web') . '/images/logo3.png', ['class' => 'nav-logo img-responsive', 'alt' => 'Florería Linda Primavera']),
        'brandOptions' => ['class' => 'pt5 pb5'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'header-wrapper main-header',
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

    <?php if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') : ?>
    <?php else : ?>
        <!-- Page Header -->
        <header class="titlebar titlebar1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-title pull-left"><?= $this->title ?></h1>
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options' => [
                                'class' => 'breadcrumb pull-right'
                            ]
                        ]) ?>
                    </div>
                </div>
            </div>
        </header> <!-- END Page Header -->
    <?php endif; ?>
    <div class="">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<!-- Footer Wrapper -->
<footer class="footer-wrapper">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="row">
                        <div class="col-sm-12 col-md-11">
                            <div class="footer-widget">
                                <div class="text-center">
                                    <?= Html::img(Yii::getAlias('@web') . '/images/logo-white.png', ['class' => 'img-responsive logo-footer m0a']) ?>
                                    <p class="mb25">Piensa en flores, piensa en Linda Primavera</p>
                                </div>
                                <address class="contact-info">
                                    <p><i class="fa fa-map-marker box-icon color-white"></i>  Marcoleta 372 - Local 24. Santiago, Chile</p>
                                    <p><i class="fa fa-phone box-icon color-white"></i>  +56 9 7818 1442</p>
                                    <p><i class="fa fa-envelope box-icon color-white"></i>  contacto@floreríalindaprimavera.cl</p>
                                </address>
                            </div> <!-- END Footer Widget Keep in touch -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="footer-widget">
                                <h3 class="widget-title">Nuestras Categorías</h3>
                                <ul class="footer-posts">
                                    <?php foreach ($categories as $category) : ?>
                                        <li><?= Html::a($category->name, ['//products/index', 'id' => $category->id]) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div> <!-- END Latest posts -->
                        </div>
                        <div class="col-sm-6 hidden-xs">
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
            <p>Copyright © <?= date('Y') ?> <?= Html::a('florerialindaprimavera.cl',['//site/index']) ?> / Diseño y desarrollo por <?= Html::a('Geknology', Url::to('http://www.geknology.com/')) ?></p>
        </div>
        <div class="pull-right hidden-xs">
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
