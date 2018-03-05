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

    <?= $form->field($model, 'attachmentFile')->textInput() ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createdDate')->textInput() ?>

    <?= $form->field($model, 'modifiedBy')->textInput() ?>

    <?= $form->field($model, 'modifiedDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
