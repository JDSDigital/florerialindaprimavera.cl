<?php

use common\widgets\InputTemplate;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'form-categories']); ?>
<div class="row">
	<div class="col-sm-12">
		<div class="row mt10 mb40">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-body">
                        <legend class="text-bold">Datos de la categoría</legend>
						<div class="row">
                            <div class="col-md-12">
							    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                            </div>
						</div>
                        <div class="row">
                            <div class="col-md-12">
							    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>
                            </div>
						</div>
                        <div class="row">
                            <div class="col-md-12">
							    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
                            </div>
						</div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php ActiveForm::end(); ?>