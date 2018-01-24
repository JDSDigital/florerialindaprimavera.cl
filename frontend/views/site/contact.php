<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact wsection page-contact pt0">
<!--    <iframe src="https://maps.google.com/?ie=UTF8&amp;q=-33.4481965,-70.6673917&amp;spn=0.031112,0.038581&amp;t=m&amp;z=15&amp;output=embed"></iframe>-->
    <iframe src="https://maps.google.com/?ie=UTF8&amp;q=-33.442636,-70.640467&amp;spn=0.031112,0.038581&amp;t=m&amp;z=15&amp;output=embed"></iframe>
    <div class="container mt40">
        <div class="row">
            <div class="col-lg-7 contact-wsection" style="color: inherit;">
                <h2 class="wsection-title st2 text-left mt10 mb25">Comunícate con nosotros</h2>
                <p class="contact-p">Atencion al cliente lunes a viernes 10 hrs - 20hrs sábados. 10:30 hrs - 16 hrs <br />Forma de pago : débito,  crédito, transferencia, cheque, efectivo.</p>
                <address class="mb50">
                    <p><i class="fa fa-map-marker"></i>  Marcoleta 372 - Local 24. Santiago, Chile</p>
                    <p><i class="fa fa-phone"></i>  +56 9 7818 1442</p>
                    <p><i class="fa fa-envelope"></i>  admin@floreríalindaprimavera.cl</p>
                </address>
            </div>
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
