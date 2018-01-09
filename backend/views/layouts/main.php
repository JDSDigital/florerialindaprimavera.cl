<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
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
    <?php
    NavBar::begin([
        'brandLabel' => Html::img(Yii::getAlias('@web') . '/images/logo-text.png', ['class' => 'img-responsive']),
        'brandUrl' => Yii::$app->homeUrl,
        'innerContainerOptions' => ['class' => ''],
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="page-container">
        <div class="page-content">

            <?php if (!Yii::$app->user->isGuest) : ?>
                <!-- Main sidebar -->
                <div class="sidebar sidebar-main sidebar-default">
                    <div class="sidebar-content">

                        <!-- User menu -->
                        <div class="sidebar-user-material">
                            <div class="category-content">
                                <div class="sidebar-user-material-content">
                                    <a class="legitRipple">
                                        <?= Html::img(Yii::getAlias('@web') . '/images/geknology-white.png', ['class' => 'img-circle img-responsive']) ?>
                                    </a>
                                    <h6>Geknology</h6>
                                    <span class="text-size-small">Techno Services</span>
                                </div>
                            </div>
                        </div>
                        <!-- /user menu -->

                        <!-- Main navigation -->
                        <div class="sidebar-category sidebar-category-visible">
                            <div class="category-content no-padding">
                                <ul class="navigation navigation-main navigation-accordion">

                                    <!-- Main -->
                                    <li class="navigation-header">
                                        <span>Main</span> <i class="icon-menu" title="Main pages"></i>
                                    </li>
                                    <li class="<?= (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                                        <?= Html::a('<i class="icon-home4"></i> <span>Dashboard</span>', ['//site/index']) ?>
                                    </li>
                                    <li class="<?= (Yii::$app->controller->id == 'categories' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                                        <?= Html::a('Categorías', ['//categories/index']) ?>
                                    </li>
                                    <li class="<?= (Yii::$app->controller->id == 'products' && Yii::$app->controller->action->id == 'index') ? 'active' : '' ?>">
                                        <?= Html::a('Productos', ['//products/index']) ?>
                                    </li>
                                    <!-- /Main -->
                                </ul>
                            </div>
                        </div>
                        <!-- /main navigation -->

                    </div>
                </div>
                <!-- /main sidebar -->
            <?php endif; ?>

            <!-- Main content -->
			<div class="content-wrapper">
                <?php if (!Yii::$app->user->isGuest): ?>
                    <!-- Page header -->
                    <div class="page-header page-header-default">
						<div class="page-header-content">
							<div class="page-title">
								<h4><?= $this->title ?></h4>
							</div>
							<div class="heading-elements hidden">
								<div class="heading-btn-group">
									<a href="#" class="btn btn-link btn-float has-text">
										<i class="fa fa-bar-chart fa-2x text-primary" aria-hidden="true"></i>
										<span>'Estadisticas'</span></a>
									<a href="#" class="btn btn-link btn-float has-text">
										<i class="fa fa-calculator fa-2x text-primary"></i>
										<span>'Facturas'</span></a>
								</div>
							</div>
						</div>
						<div class="breadcrumb-line">
							<?= Breadcrumbs::widget([
                                'homeLink' => [
                                    'label' => 'Inicio',
                                    'url'   => Yii::$app->homeUrl,
                                ],
                                'links'    => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]) ?>
						</div>
					</div>
                    <!-- /Page header -->
                <?php endif; ?>
                <div class="content">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Geknology <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
