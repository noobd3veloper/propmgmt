<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attachment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attachment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'historyID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachmentName')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'attachmentFile')->fileInput([ 'accept' => 'image/*','pluginOptions' => [
           'previewFileType' => 'image',
           'allowedFileExtensions' => ['jpg', 'gif', 'png', 'bmp','jpeg'],
           'showUpload' => true,
           'overwriteInitial' => true,
       ]
       ]) ?>




    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
