<?php

use common\models\Products;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories common\models\Categories */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel">
        <header class="panel-heading">
			<?= Html::a('<i class="fa fa-plus mr5"></i>Añadir producto', ['create'], ['class' => 'btn bg-success btn-xs']) ?>
		</header>
		<div class="panel-body pl0 pr0">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options'        => [
                'class' => 'grid-view table-responsive',
            ],
            'tableOptions'   => [
                'class' => 'table table-striped table-hover',
            ],
            'pager'          => [
                'options' => ['class' => 'pagination ml20 mt10'],
            ],
            'summaryOptions' => [
                'class' => 'summary ml20 mt25',
            ],
            'layout'         => '{items}{pager}{summary}',
            'columns' => [
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value'     => function ($model) {
                        $check = ($model->status == Products::STATUS_ACTIVE) ? "checked='checked'" : null;

                        return "<div class='switchery-xs m0'>
                                    <input id='status-$model->id' type='checkbox' class='switchery switchStatus' $check>
                                </div>";
                    },
                    'contentOptions' => ['style' => 'width: 90px;min-width: 90px'],
                ],
                [
                    'attribute' => 'category_id',
                    'format' => 'raw',
                    'filter' => $categories,
                    'value' => function ($model) {
                        return $model->category->name;
                    }
                ],
                'name',
                'price',
//                'summary',
                //'description',
                //'created_at',
                //'updated_at',

                [
                    'class'          => 'yii\grid\ActionColumn',
                    'template'       => '{ul}{update}{delete}',
                    'contentOptions' => ['style' => 'width: 80px;min-width: 50px'],
                ],
            ],
        ]); ?>
    </div>
</section>
