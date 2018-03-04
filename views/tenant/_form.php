<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tenant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tenant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tenantSurname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenantGivenName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenantMiddleName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenantBirthdate')->textInput() ?>

    <?= $form->field($model, 'tenantSSN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createdDate')->textInput() ?>

    <?= $form->field($model, 'modifiedBy')->textInput() ?>

    <?= $form->field($model, 'modifiedDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
