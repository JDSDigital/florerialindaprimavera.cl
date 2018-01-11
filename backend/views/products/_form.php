<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $categories common\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'id' => 'form-products',
        'enctype' => 'multipart/form-data',
    ]
]); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="row mt10 mb40">
                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            <legend class="text-bold">Datos del producto</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'category_id')->dropDownList($categories) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= $form->field($model, 'price')->textInput() ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($image, 'file', [
                                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon"></span>{input}</div>',
                                ])->widget(FileInput::className(), [
                                    'name' => 'file',
                                    'options'       => [
                                        'accept' => 'image/*'
                                    ],
                                    'pluginOptions' => [
                                        'allowedFileExtensions'=>['jpg', 'jpeg', 'png', 'gif'],
                                        'maxFileSize' => 2800,
                                        'maxFileCount' => 1,
                                        'showUpload' => false,
                                        'showDelete' => true,
                                        'previewFileType' => 'image',
                                        'overwriteInitial' => false,
                                        'initialPreview' => isset($previews) ? $previews : false,
                                        'initialPreviewAsData' => true,
                                        'initialPreviewShowDelete' => true,
                                        'initialPreviewConfig' => isset($previewsConfig) ? $previewsConfig : false,
                                    ],

                                ]); ?>
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
