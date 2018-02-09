<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Nuestros Productos';
$this->params['breadcrumbs'][] = ['label' => 'Categorías', 'url' => ['/categories/index']];
$this->params['breadcrumbs'][] = ($products[0]->category->name) ? $products[0]->category->name : $this->title;
?>
<div class="container site-products pt40 pb40">
    <section class="shop-wsection ">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-md-3 ">
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
				<div class="col-sm-7 col-md-9">
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
                                        <div class="price">
                                            <ins class="shop-price"><?= Yii::$app->formatter->asCurrency($product->price, 'CLP') ?></ins>
                                        </div>
                                        <p><?= $product->summary ?></p>
                                        <div class="shop-buy">
                                            <?= Html::a('<i class="fa fa-search"></i> Ver detalles', ['//products/view', 'id' => $product->id], ['class' => 'btn pl0']) ?>
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
			</div>
		</div>
	</section>
</div>
