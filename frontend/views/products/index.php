<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Nuestros Productos';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-products">
    <section class="shop-wsection ">
		<div class="container">
			<div class="row">
				<div class="col-sm-7 col-md-9 col-md-push-3 col-sm-push-5 space-left ">
					<div class="shop-products list">
                        <?php foreach ($products as $product) : ?>
                            <div class="row shop-product">
                                <div class="col-sm-12 col-md-4">
                                    <div class="shop-image">
                                        <?= Html::img(['uploads/products/' . $product->image->file]) ?>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="shop-description">
                                        <h4><?= $product->name ?></h4>
                                        <div class="rating-system rate-product"></div>
                                        <small><?= $product->category->name ?></small>
                                        <p><?= $product->summary ?></p>
                                        <div class="price">
                                            <ins class="shop-price"><?= Yii::$app->formatter->asCurrency($product->price, 'CLP') ?></ins>
                                        </div>
                                        <div class="shop-buy">
                                            <?= Html::a('<i class="fa fa-search"></i> Ver detalles', ['//products/view', 'id' => $product->id], ['class' => 'btn']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
					</div>
					<?= LinkPager::widget([
						'pagination' => $pagination,
						'options' => [
							'class' => 'pagination',
						]
					]); ?>
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
