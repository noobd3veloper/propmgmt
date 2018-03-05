<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userPassword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userAuthKey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userAccessToken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userGivenName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userSurname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userResetToken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'companyName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createdDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
