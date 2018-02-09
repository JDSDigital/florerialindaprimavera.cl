<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Nuestros Productos';
$this->params['breadcrumbs'][] = ['label' => 'Categorías', 'url' => ['/categories/index']];
$this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => ['index', 'id' => $product->category_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-products pt40 pb40">
    <section class="shop-wsection">
		<div class="container">
			<div class="row">
				<div class="col-sm-7 col-md-9 col-md-push-3 col-sm-push-5 space-left ">
					<div class="row mb40">
						<div class="col-sm-12 col-md-5">
							<div id="owl-shop" class="owl-carousel">
								<div class="owl-item-shop zoom">
									<?= Html::img(['uploads/products/' . $product->image->file]) ?>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-7">
							<div class="shop-description-product">
								<h3><?= $product->name ?></h3>
								<div class="shop-prices">
									<ins class="shop-price">
										<?= ($product->price != 0 || $product->price != '') ? Yii::$app->formatter->asCurrency($product->price, 'CLP') : Html::a('Solicitar presupuesto', ['site/contact'])?>
									</ins>
								</div>
								<p class="hidden-md"><?= $product->description ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5 col-md-3 col-md-pull-9 col-sm-pull-7 ">
					<aside class="sidebar shop-sidebar">
						<div class="sidebar-widget mt0">
							<?php $form = ActiveForm::begin([
								'id' => 'form-products-search',
								'action' => ['products/search'],
							]); ?>
							<div class="input-group">
									<?= $form->field($productsSearch, 'name')
										->textInput([
											'value' => (isset(Yii::$app->request->post()['search'])) ? Yii::$app->request->post()['search'] : $productsSearch->name,
											'class' => 'form-control',
											'placeholder' => ' Buscar'])
										->label(false)
									?>
								<span class="input-group-btn">
										<?= Html::submitButton('<i class="fa fa-search"></i>', [
											'class' => 'btn btn-primary mt10',
										]) ?>
									</span>
								</div>
							<?php ActiveForm::end(); ?>
						</div>
						<div class="sidebar-widget">
							<h3 class="sidebar-title">Categorías</h3>
							<ul class="categories">
                                <?php foreach ($categories as $category) : ?>
									<li><?= Html::a($category->name, ['//products/index', 'id' => $category->id]) ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</section>
</div>
