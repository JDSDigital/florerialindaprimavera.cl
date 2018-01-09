<?php

use common\models\Categories;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorías';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="panel">
        <header class="panel-heading">
			<?= Html::a('<i class="fa fa-plus mr5"></i>Añadir categoría', ['create'], ['class' => 'btn bg-success btn-xs']) ?>
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
						$check = ($model->status == Categories::STATUS_ACTIVE) ? "checked='checked'" : null;

						return "<div class='switchery-xs m0'>
                                    <input id='status-$model->id' type='checkbox' class='switchery switchStatus' $check>
                                </div>";
					},
					'contentOptions' => ['style' => 'width: 90px;min-width: 90px'],
				],
				'name',
				'summary',
				[
					'attribute' => 'created_at',
					'format' => ['date', 'Y-MM-dd'],
				],
				[
					'attribute' => 'updated_at',
					'format' => ['date', 'Y-MM-dd'],
				],

				[
					'class'          => 'yii\grid\ActionColumn',
					'template'       => '{ul}{update}{delete}',
					'contentOptions' => ['style' => 'width: 80px;min-width: 50px'],
				],
			],
		]); ?>
	</div>
</section>