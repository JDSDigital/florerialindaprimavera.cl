<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="page-404">
    <div class="container site-error pt40 pb40">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="content-404">
                    <div class="relative">
                        <div class="text-404">404</div>
                        <h2 class="wsection-title over-404">Oops, Esta página no existe!</h2>
                    </div>
                    <p class="mt20">Desafortunadamente la página que buscabas no pudo ser encontrada. Puede estar temporalmente deshabilitada, o ya no existe.</p>
                    <div class="mt40">
                        <?= Html::a('<i class="fa fa-long-arrow-left"></i> Ir al inicio</a>', ['/site/index'], ['class' => 'btn rounded']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
