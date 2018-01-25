<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Quienes Somos';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="container site-about pt40"></div>-->
<section class="custom-bg large-padding parallax mt0" data-bg="../images/sliderimages/bokeh.jpg">
    <div class="bg-layer"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <div class="box-about">
                    <h2 class="wsection-title st2 mb30">¡Amamos lo que hacemos!</h2>
                    <p class="custom-bg-p text-center mb10">Somos tu aliado para creer junto a ti ese gran detalle, para el día del Amor, para la Madre, la Secretaría o cualquier ocacion que desees que tu presencia se manifieste acompañado de las flores.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt50 pb50">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 sm-box2">
                <h2 class="wsection-title mb25 text-left st2">Nuestra Misión</h2>
                <p class="mb25">Ayudar y orientar para el momento en el que quieras demostrar y expresar con flores un:</p>
                <p><i class="fa fa-check main-color"></i> &nbsp; Te amo.</p>
                <p><i class="fa fa-check main-color"></i> &nbsp; Te quiero.</p>
                <p><i class="fa fa-check main-color"></i> &nbsp; Felicidades.</p>
                <p><i class="fa fa-check main-color"></i> &nbsp; Gracias.</p>
                <p><i class="fa fa-check main-color"></i> &nbsp; Perdóname.</p>
                <p><i class="fa fa-check main-color"></i> &nbsp; Etc.</p>
            </div>
            <div class="col-sm-12 col-md-6">
                <?= Html::img(Yii::getAlias('@web') . '/images/sliderimages/floral-design.jpg', ['class' => 'm0a img-responsive']) ?>
            </div>
        </div>
    </div>
</section>
<section class="custom-wsection wsection-dark pt50 pb50">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <h2 class="wsection-title st2 mb30">"Piensa en flores, piensa en Linda Primavera"</h2>
                <?= Html::a('Contactanos', ['/site/contact'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</section>
<section class="about-wsection wsection">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 xs-box2 wbr-box">
                <div class="box-content">
<!--                    <i class="fa fa-star fa-services"></i>-->
                    <?= Html::img(Yii::getAlias('@web') . '/images/icons/full-color/128px/star.png') ?>
                    <h3>Experiencia</h3>
                    <p>Tenemos mas de XX años de experiencia en arreglos florales</p>
                </div>
            </div>
            <div class="col-sm-4 xs-box2 wbr-box">
                <div class="box-content">
<!--                    <i class="fa fa-weixin fa-services"></i>-->
                    <?= Html::img(Yii::getAlias('@web') . '/images/icons/full-color/128px/heart.png') ?>
                    <h3>Clientes Satisfechos</h3>
                    <p>Podemos cumplir cualquier deseo que puedas imaginar.</p>
                </div>
            </div>
            <div class="col-sm-4 wbr-box last">
                <div class="box-content">
<!--                    <i class="fa fa-check-square-o fa-services"></i>-->
                    <?= Html::img(Yii::getAlias('@web') . '/images/icons/full-color/128px/brightness.png') ?>
                    <h3>Nuevos Conceptos</h3>
                    <p>Constantemente estamos realizando nuevos diseños para cualquier ocasión.</p>
                </div>
            </div>
        </div>
    </div> <!-- END Container -->
</section>
<section class="wsection-3 custom-wsection cs2 mb0 mt0">
    <div class="container">
        <div class="row mt20 mb20">
            <div class="col-sm-12">
                <h2 class="wsection-title">Nuestra Visión</h2>
                <p class="text-center mb0">Nuestra visión es transformar la belleza de las flores, en obras expresivas y sorprender a tu ser querido.</p>
            </div>
        </div>
    </div>
</section>
