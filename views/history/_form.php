<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tenantID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'historyStartDate')->textInput() ?>

    <?= $form->field($model, 'historyEndDate')->textInput() ?>

    <?= $form->field($model, 'historyStatus')->dropDownList([ 'GOOD' => 'GOOD', 'BAD' => 'BAD', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'historyDetail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createdDate')->textInput() ?>

    <?= $form->field($model, 'modifiedBy')->textInput() ?>

    <?= $form->field($model, 'modifedDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
