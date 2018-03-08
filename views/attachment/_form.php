<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Attachment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attachment-form">

    <?php $form = ActiveForm::begin([
          'options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'historyID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachmentName')->textInput(['maxlength' => true]) ?>
        
    <?= $form->field($model, 'attachmentFile')->widget(FileInput::classname(), [
              'options' => ['accept' => 'image/*', 'multiple'=>false],
               'model' => $model,
               'attribute' => 'attachmentFile',
               'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],'showUpload' => false,
               'initialPreview'=>
               "data:image/jpeg;base64," . base64_encode($model->attachmentFile),
                    'initialPreviewAsData'=>true,
                    'overwriteInitial'=>false,
                    'initialPreviewConfig' => [
                        ['caption' =>  $model->attachmentName, 'size' => '873727']
                    ],
                ],
          ]);   ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
