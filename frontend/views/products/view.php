<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Nuestros Productos';
$this->params['breadcrumbs'][] = ['label' => 'Categorías', 'url' => ['/categories/index']];
$this->params['breadcrumbs'][] = ['label' => $product->category->name, 'url' => ['index', 'id' => $product->category_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container site-products">
    <section class="shop-wsection wsection-4">
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
								<div class="rating-system rate-product"></div>
								<small><?= $product->category->name ?></small>
								<div class="shop-prices">
									<ins class="shop-price"><?= Yii::$app->formatter->asCurrency($product->price, 'CLP') ?></ins>
								</div>
								<p class="hidden-md"><?= $product->description ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5 col-md-3 col-md-pull-9 col-sm-pull-7 ">
					<aside class="sidebar shop-sidebar">
						<div class="sidebar-widget mt0">
							<form action="#" role="form">
								<div class="input-group">
									<input type="text" class="form-control" placeholder=" Search">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</form>
						</div>
						<div class="sidebar-widget">
							<h3 class="sidebar-title">Categories</h3>
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
