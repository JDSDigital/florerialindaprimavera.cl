<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Categorías';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-categories pt40 pb40">
    <div class="row shop-products">
        <?php foreach ($categories as $category) : ?>
            <?php $class = 'category-' . $category->id; ?>
            <div class="col-sm-4">
                <div class="portfolio-inner-item view <?= $class ?>">
                    <div class="mask">
                        <h3 class="project-title"><?= $category->name ?></h3>
                        <p class="descr"><?= $category->summary ?></p>
                        <?= Html::a('<i class="fa fa-search"></i>', ['//products/index', 'id' => $category->id], ['class' => 'info']) ?>
                    </div>
                </div>
            </div>
            <?php
                $array = $category->vegasImages;
                $js = <<<JS
                    var array = $array;
                    var slides = [];
                    
                    for (var i = 0; i < array.length; i++) 
                        slides.push({ src: array[i]});
                    
                    $(".$class").vegas({
                        delay: 3000,
                        shuffle: true,
                        loop: true,
                        animation: 'random',
                        slides: slides
                    });
JS;
                $this->registerJs($js);
            ?>
        <?php endforeach; ?>
    </div>
</div>
